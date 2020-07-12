 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather Dashboard- Drought Assessment system </title>
  

<link href="dist/css/jquery.bootgrid.css" rel="stylesheet" />
<script src="dist/js/jquery-1.11.1.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/js/jquery.bootgrid.min.js"></script>
       

    <!-- Bootstrap -->
	 
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="dist/css/custom.css" rel="stylesheet">
	
    <link href="dist/css/font-awesome-min.css" rel="stylesheet">
	 
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link href='http://fonts.googleapis.com/css?family=Duru+Sans' rel='stylesheet' type='text/css'>
    
  </head>
  <body>
    <!-- 
     Navigation bar ============================================================================================== -->
          <?php include("header.php");?>
     <!-- 
      header start ============================================================================================== -->
  <div class="container" >
     	
            <div   style="padding-top:80px; padding-bottom:200px;">
  								
  			
            	                 <!-- Col sidebar  
                ================================================================================================================== -->
                 
	           			<div class="col-md-2" style="padding-left:0px;" >
                                   
									<?php
									 include("Dashboard-sidebar.php");
									 ?>
									 
									  
                          
  							</div>
  				<!--  end of sidebar col 4-->
            
            <!-- inbox
            =====================================================================================-->
            
             <div class="col-md-10">
             	<div class="col-md-12" >
                <!-- textbox -->
  		  
                  <?php
									 include("profile-header.php");
									 ?>
            <!--post  start here 
           =================================================================================================-->
            <div class="row"  style="background-color:#fff;">
            	 
            <!-- start friend -->
                <div class="col-md-12" style=" margin-bottom:20px; background-color:#fff;"> 
				
				<h3>IOT Weather data of Vaijapur</h3> 
				

                  <!--Grid start here 
                        =================================================================================================-->
                 
					<b><?php include("getWeather.php"); ?></b>
					 
			<table id="sample_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
			<thead>
				<tr>
					<!--<th data-column-id="pid" data-type="numeric" data-identifier="true">project id</th>-->
					<th data-column-id="wid">Record #</th>
				<!--	<th data-column-id="pgproject">Project</th>  
					<th data-column-id="wlocation">Location</th> -->
					<th data-column-id="wtemp">Temp</th>
					<th data-column-id="wmax_temp">Max Temp</th>
					<th data-column-id="wmin_temp">Min Temp</th>
					<th data-column-id="whumidity">Humidity</th>
					<th data-column-id="wwind_direction">Wind Dir</th>
			 	<th data-column-id="wweather">Condition</th>
					<th data-column-id="wrainfall">Rainfall</th>
					
					<!--
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th> -->
				</tr>
			</thead>
		</table>
	 
			 
				
		</div>  <!-- end row --> 
				<legend> Maximum Temperature of May 2017</legend>
				<div id="container1" style="min-width: 400px; height: 400px;   auto"></div>
      
		</div><!-- end of container -->
   
                      
               
   
    <!--  code for graph -->
			 
			 </div><!--end  post layout of col md 9-->
                
               
   </div><!-- end of col 9 -->
  </div><!-- col 12 -->
        
    </div> <!-- end of continer fluid -->
    
    
	<!-- end of body  -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    

        <!--[if lt IE 9]>
        <script src="js/libs/html5shiv.js"></script>
        <script src="js/libs/respond.min.js"></script>
        <![endif]-->
		 <script src="assets/chart/highcharts.js"></script>
        <script src="assets/chart/exporting.js"></script> 
		
<script type="text/javascript">
 

$( document ).ready(function() {
	var options = {
                    chart: {
                        renderTo: 'container1',
                        type: 'column'
                    },
                    title: {
                        text: 'Max Temp of May 2017.',
                        x: -20 //center
                    },
                    subtitle: {
                        text: 'Realtime graph generated from weather data.',
                        x: -20
                    },
                    xAxis: {
                        categories: []
                    },
                    yAxis: {
                        title: {
                            text: 'Max Temp'
                        },
                        plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>:<b>{point.y}</b> of total<br/>'
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y}'
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 100,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                        shadow: true
                    },
                    series: []
                };
                $.getJSON("chart-data/data-basic-colm.php", function(json) {
                    options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
                    options.series[0] = json[1];
                    chart = new Highcharts.Chart(options);
                });
	
	var grid = $("#sample_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
			};
		},
		
		url: "dashboard-weather-response.php",
		formatters: {
		        "commands": function(column, row)
		        {
		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-map\" data-row-id=\"" + row.pgid + "\"><span class=\"glyphicon glyphicon-map-marker\"></span></button> " + 
							"<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.pgid + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " + 
							"<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.pgid + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
		        }
		    }
   }).on("loaded.rs.jquery.bootgrid")
   
   
	 
});
 
</script>
 
		
  </body>
</html>