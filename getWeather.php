 <script type="text/javascript">
	$(document).ready(function() {
		$(".place").click(function(){
			var value = $(this).attr("zmw");
			$("#placeFound").val(value);
			$("form").submit();
		});
	});
</script>
<?php
# Enable Error Reporting and Display:
error_reporting(~0);
ini_set('display_errors', 1);

/* read wunderground answer to file for testing 
$myFile = "json.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$json_string = curl_download("http://api.wunderground.com/api/YOUR-API-KEY-HERE/forecast/conditions/alerts/lang:US/q/zmw:00000.1.10838.json");
// $json_string = curl_download("json.txt");
fwrite($fh, $json_string);
fclose($fh);
*/

$placeUserisLookingFor = "vaijapur";

// 1. has user enterd a search term?
if(isset($_REQUEST["placeUserisLookingFor"]))
{
	$placeUserisLookingFor = $_REQUEST["placeUserisLookingFor"];
	$placeUserisLookingFor = ucwords($placeUserisLookingFor); // uppercase every Begining Of Every Word // makes the search function work better
}

if(isset($_REQUEST["placeFound"]))
{
	$placeUserisLookingFor = "";
}

// 1.1. no search term: use ulm as default, show search input field
if(empty($placeUserisLookingFor))
{
/*/	echo '
		<form>
			<label for="placeUserisLookingFor">search for Place:</label>
			<input id="placeUserisLookingFor" name="placeUserisLookingFor" value="'.$placeUserisLookingFor.'"></input>
		</form>
	';*/
}
else
{
	// 1.2. search term: display all alike places
	// $json_string = curl_download("searchResult.txt"); // for offline testing only
	$json_string = curl_download("http://autocomplete.wunderground.com/aq?query=".$placeUserisLookingFor);
	$places_array = json_decode($json_string);
	$places_array = $places_array->RESULTS;
	
	$placesFound = "";
	
	for ($i = 0; $i < count($places_array); $i++) {
		$placesFound .= '<input type="button" class="place" value="'.$places_array[$i]->name.'" zmw="'.$places_array[$i]->zmw.'"></input>';
	}

/*	echo '
		<form>
			<label for="placeUserisLookingFor">search for Place:</label>
			<input id="placeUserisLookingFor" name="placeUserisLookingFor" value="'.$placeUserisLookingFor.'"></input>
			'.$placesFound.'
			<input type="hidden" name="placeFound" id="placeFound"></input>
		</form>
	';*/
	if(empty($placesFound))
	{
		echo "<p>Nothing found, sorry. Try another search term. Maybe wunderground has no weather data on this place.</p>";
		echo "<p>Please use english Terms! Thanks!</p>";
	}
}

// 2. has user selected a place
if(isset($_REQUEST["placeFound"]))
{
	$placeFound = $_REQUEST["placeFound"];
}
// 2.1. no place selected -> do nothing

// 2.2. user has selected a place: display 3 day weather forecast of that place
if(empty($placeFound))
{
	if(empty($placesFound))
	{
		$placeFound = "00000.1.10838"; // default is ulm
	}
	else
	{
		$placeFound = $places_array[0]->zmw; // use the first hit in the searchlist
	}
}

$json_string = curl_download("http://api.wunderground.com/api/314f930653f8b0c0/forecast/conditions/alerts/lang:US/q/zmw:".$placeFound.".json");
// $json_string = curl_download("json.txt"); // for offline testing only
$parsed_json = json_decode($json_string);

if(isset($parsed_json))
{
	if(!empty($parsed_json))
	{
		if(isset($parsed_json->current_observation))
		{
			if(!empty($parsed_json->current_observation))
			{
				// current conditions
				$location = $parsed_json->{'current_observation'}->{'display_location'}->{'full'};
				$temp_c = $parsed_json->{'current_observation'}->{'temp_c'};
				$relative_humidity = $parsed_json->{'current_observation'}->{'relative_humidity'};
				$wind_direction = $parsed_json->{'current_observation'}->{'wind_dir'};
				$weather = $parsed_json->{'current_observation'}->{'weather'};
				$wind_speed = $parsed_json->{'current_observation'}->{'wind_kph'}."km/h";
				 
				// forecast
				$forecast = $parsed_json->{'forecast'}->{'txt_forecast'}->{'forecastday'};
				$simpleforecast = $parsed_json->{'forecast'}->{'simpleforecast'}->{'forecastday'};
				
				$Today = printDay(getDay(0),"Prediction Today:");
			/*	$Tomorrow = printDay(getDay(1),"Prediction Tomorrow:");
				$DayAfterTomorrow = printDay(getDay(2),"Prediction the Day after Tomorrow:");
				*/
				$DayNumber=0; // 0 for today
				$wmax_temp =  $simpleforecast[$DayNumber]->{'high'}->{'celsius'}."°C";
				$wmin_temp = $simpleforecast[$DayNumber]->{'low'}->{'celsius'}."°C";
				$wrainfall=  $simpleforecast[$DayNumber]->{'pop'}."%"; // probability of precipitation = regenwahrscheinlichkeit
				$datetime = date("Y/m/d");
				
				include("connectdb.php");
				
				 $check=mysqli_query($con,"select * from weather where wtemp='$temp_c' and date(wdate)=date('$datetime')");
					$checkrows=mysqli_num_rows($check);

				   if($checkrows<1) {
					   
				$sql="INSERT INTO  `weather` (  `wlocation`, `wtemp`, `whumidity`, `wwind_direction`, `wwind_speed`, `wweather`, `wmax_temp`, `wmin_temp`, `wrainfall`,`wdate`) 
				VALUES ( '$location', '$temp_c', '$relative_humidity', '$wind_direction', '$wind_speed', '$weather', '$wmax_temp', '$wmin_temp', '$wrainfall','$datetime');";
				 $result = mysqli_query($con, $sql);
				if($result){
					//echo "Data saved in database. ";
				}else{
					echo "Having problem.";
				}
			  }
				$wparam= "<p style='font-weight: normal; font-size:12px'>Live Weather of <b>".$location. " city</b> </br> <b>Temp </b>".$temp_c.", <b>Humidity</b> ".$relative_humidity .", <b>Wind Direction</b> ". $wind_direction. ", <b>Wind Speed</b> ".$wind_speed.", <b>Weather Condition</b> ".$weather. ", <b>Max Temp</b> ".$wmax_temp. ", <b>Min  Temp</b> ".$wmin_temp. ", <b>Rainfall</b> ".$wrainfall."<br> Note: The LIVE data accessed from Weather Underground API. Database Updated.</p>";
				   echo $wparam;
				   
				  
				 
			}
			else
			{
				echo 'I am sorry, we are out of wunderground-tickets! (the <a href="http://www.wunderground.com/weather/api/">free service</a> only allows a certain amount of requests per day. <a href="http://www.wunderground.com/weather/api/d/terms.html">http://www.wunderground.com/weather/api/d/terms.html</a>';
			}
		}
	}
}

/* DayNumber is 0 = today, 1 = tomorrow, 2 = day after tomorrow... max 6 */
function getDay($DayNumber)
{
	global $forecast, $simpleforecast;
	
	$result = null;
	$day = $forecast[$DayNumber];
	$result['dayofweek'] = $day->{'title'};
	$result['text'] = $day->{'fcttext_metric'};
	$day_array = explode('.',$result['text']);
	$result['forecast_weather'] = $simpleforecast[$DayNumber]->{'conditions'}; // "conditions": "Teils Wolkig",
	$result['icon'] = $simpleforecast[$DayNumber]->{'icon_url'}; // "icon_url": "http://icons-ak.wxug.com/i/c/k/partlycloudy.gif", 
	$result['forecast_high'] = "MaxTemp: ".$simpleforecast[$DayNumber]->{'high'}->{'celsius'}."°C";
	$result['forecast_low'] = "LowTemp: ".$simpleforecast[$DayNumber]->{'low'}->{'celsius'}."°C";
	$result['forecast_humidity'] = "Humidity: ".$simpleforecast[$DayNumber]->{'avehumidity'}."%";
	$result['forecast_wind'] = "WindSpeed of: ".$simpleforecast[$DayNumber]->{'avewind'}->{'kph'}."km/h";
	$result['forecast_winddirection'] = $simpleforecast[$DayNumber]->{'avewind'}->{'dir'}; // Südwest
	$result['forecast_rainrisk'] = "Probability of Rain: ".$simpleforecast[$DayNumber]->{'pop'}."%"; // probability of precipitation = regenwahrscheinlichkeit
	
	return $result;
}

function printDay($day,$title)
{
	return "<p>
	<span class='bold'>
		$title
		<img src='".$day['icon']."'/> ".$day['forecast_weather']."
	</span>
	<br/>
	".$day['forecast_high']."
	<br/>
	".$day['forecast_low']."
	</br>
	".$day['forecast_rainrisk']."
	</br>
	Wind from
	".$day['forecast_winddirection']." 
	with
	".$day['forecast_wind']."
	</p>";
}

/* because file_get_contents(); and fopen are disabled on some servers use CURL */
function curl_download($Url){

	// is cURL installed yet?
	if (!function_exists('curl_init')){
		die('Sorry cURL is not installed!');
	}

	// OK cool - then let's create a new cURL resource handle
	$ch = curl_init();

	// Now set some options (most are optional)

	// Set URL to download
	curl_setopt($ch, CURLOPT_URL, $Url);

	// Set a referer
	// curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm"); // if server needs to think this post came from elsewhere

	// User agent
	curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");

	// Include header in result? (0 = yes, 1 = no)
	curl_setopt($ch, CURLOPT_HEADER, 0);

	// Should cURL return or print out the data? (true = return, false = print)
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Timeout in seconds
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);

	// Download the given URL, and return output
	$output = curl_exec($ch);

	// Close the cURL resource, and free system resources
	curl_close($ch);

	return $output;
}

?>
	 