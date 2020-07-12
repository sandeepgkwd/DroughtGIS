<?php
	 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Drought Assessment system </title>


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
     	
        <div class="row" style="padding-top:80px; padding-bottom:200px;">
  								
  			
            	                 <!-- Col sidebar  
                ================================================================================================================== -->
                 
	           			<div class="col-md-2" >
                                    <?php
									 include("Dashboard-sidebar.php");
									 ?>
                          
  							</div>
  				<!--  end of sidebar col 4-->
            
            <!-- inbox
            =====================================================================================-->
            
            <div class="col-md-10">
             	<div class="col-md-12">
                <!-- textbox -->
				<?php
					include("profile-header.php");
				?>               		  
                 
					<!--post  start here 
				   =================================================================================================-->
					<div class="container-fluid"  style="background-color:#fff; margin-left: -15px;
margin-right: -15px;">
						 
					<!-- start friend -->
							<div class="services">							
						 
							<legend><span class="glyphicon glyphicon-cloud-upload"></span> Data collection Module</legend>

								 <div class="row" style="padding-bottom:20px">
								 
								  <div class="col-md-4 service-item">
									<div class="service-icon"><i class="glyphicon glyphicon-map-marker"></i></div>
									<div class="service-description">
										<h5>Ground Truth</h5>
										<p>The Geomapper app is developed for basic data collection for geospatial researcher. The app is directly send data to the webserver. </p>
										<a href="geomapper.php" class="btn btn-default btn-block"><i class="glyphicon glyphicon-folder-open"></i>&nbsp; Import/Export</a>
									</div>
								  </div>
								  <div class="col-md-4 service-item">
									<div class="service-icon"><i class="glyphicon glyphicon-cloud"></i></div>
									<div class="service-description">
										<h5>Weather API</h5>
										<p>Manager Realtime data and graph of weather data. The Weather-API is the source to retrive weather data such rainfall, temp, humidity etc.</p>
										<a href="#" class="btn btn-default btn-block"><i class="glyphicon glyphicon-cog"></i> Weather Manager</a>
									</div>
								  </div>
								  <div class="col-md-4 service-item">
									<div class="service-icon"><i class="glyphicon glyphicon-cog"></i></div>
									<div class="service-description">
										<h5>IOT Manager</h5>
										<p>Add delete and update Sensor detail. The IOT Manager is a provider of information regarding to Weather parameter.</p>
										<a href="#" class="btn btn-default btn-block"><i class="glyphicon glyphicon-user"></i> Farmers manager</a>
									</div>
								  </div>
								</div>
								
								<legend><span class="glyphicon glyphicon-cog"></span> Data processing module</legend>

							
								<div class="row" style="padding-bottom:20px">
								  <div class="col-md-4 service-item">
									<div class="service-icon"><i class="glyphicon glyphicon-cloud"></i></div>
									<div class="service-description">
										<h5>Meteorological Drought</h5>
										<p>Add monthly temperature in drought assessment system. System already have database from 1901 to 2015.</p>
										<a href="#" class="btn btn-default btn-block"><i class="glyphicon glyphicon-cloud"></i> Meteorological Dashboard</a>
									</div>
								  </div>
								  <div class="col-md-4 service-item">
									<div class="service-icon"><i class="glyphicon glyphicon-leaf"></i></div>
									<div class="service-description">
										<h5>Agricultural Drought</h5>
										<p>Add monthly Rainfall in drought assessment system. System already have database from 1901 to 2015.</p>
										<a href="#" class="btn btn-default btn-block"> <i class="glyphicon glyphicon-leaf"></i> Agricultural Dashboard</a>
									</div>
								  </div>
								  <div class="col-md-4 service-item">
									<div class="service-icon"><i class="glyphicon glyphicon-cog"></i></div>
									<div class="service-description">
										<h5>Geoprocessing Bridge</h5>
										<p>The Geoprocessing modules are bridge between server to stand alone system. Here desktop based software can able to send output to the web server. </p>
										<a href="#" class="btn btn-default btn-block"><i class="glyphicon glyphicon-cog"></i> Geoprocessing Panel </a>
									</div>
								  </div>
								</div>
								
								<legend><span class="glyphicon glyphicon-globe"></span> Data Visualization </legend>

							
								<div class="row">
								  <div class="col-md-4 service-item">
									<div class="service-icon"><i class="glyphicon glyphicon-map-marker"></i></div>
									<div class="service-description">
										<h5>DroughtGIS</h5>
										<p>DroughtGIS is a web based geospatial tool for drought assessment system. you can map the features like water, ground truth.</p>
										<a href="#" class="btn btn-default btn-block"><i class="glyphicon glyphicon-map-marker"></i> DroughtGIS</a>
									</div>
								  </div>
								  <div class="col-md-4 service-item">
									<div class="service-icon"><i class="glyphicon glyphicon-map-marker"></i></div>
									<div class="service-description">
										<h5>Geomapper</h5>
										<p>The Map viewer is powered by open sources geospatial technology such as leaflet and folium. You can access OSM, and Google Imegery.</p>
										<a href="#" class="btn btn-default btn-block"> <i class="glyphicon glyphicon-map-marker"></i> Map Viewer</a>
									</div>
								  </div>
								  <div class="col-md-4 service-item">
									<div class="service-icon"><i class="glyphicon glyphicon-globe"></i></div>
									<div class="service-description">
										<h5>Map embedding</h5>
										<p>The Map embedding modules are map integration ultility, where user can render the map with help of URL.  </p>
										<a href="#" class="btn btn-default btn-block"><i class="glyphicon glyphicon-cog"></i> Map embedding Panel </a>
									</div>
								  </div>
								</div>
							</div>
						</div><!-- end of container -->
						
						<div class="row" style="padding-bottom:20px">
									<h2> Message </h2>
									<p> Hello, welcome to DroughtGIS (Drought Assessment System) platform. we are developing geospatial technology based platform for near-realtime drought assessment.</p>
									<a href="#" class="btn btn-success"> Feedback</a>
						</div>							  
               
				</div><!--end  post layout of col md 9-->                
               
			</div><!-- end of col 9 -->
		</div><!-- col 12 -->
        
	</div> <!-- end of continer fluid --> 
  </body>
</html>