<?php
/*
Name: Sandeep Gaikwad
Module: Index page
File: Index.pp
Function:
		A. Home Page
		B. Login page 

*/ 
 error_reporting(0);
 
include('connectdb.php');

if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($con, $_POST['email']);
	//$password = md5(mysqli_real_escape_string($con,$_POST['password']));
	$password = $_POST['password'];
	$usernamesql="SELECT uid, uemail FROM `users` WHERE `uemail` = '$email' AND `upass` = '$password'"; 
	//$usernamesql = "SELECT * FROM `users` WHERE uemail='$email'";
	echo $usernamesql;
		 	$usernameres = mysqli_query($con, $usernamesql);
			$count = mysqli_num_rows($usernameres);  
			$row=mysqli_fetch_array($usernameres,MYSQLI_ASSOC);

			if($count){
				$smsg="Welcome to user dashboard";
				echo "<script>alert('Welcome to user dashboard');</script>";
				$_SESSION['suid'] = $row['uid'];
				$_SESSION['email'] = $row['uemail'];
				//header("Location: dashboard.php");
				echo $_SESSION['suid'];
			 
				
			}else {
				$fmsg = "Incorrect Credentials, Try again... ";
				 
			}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KVK-DAS Prof. K. V. Kale Drought Assessment System LIVE</title>

    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
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
  <div class="container" style="padding-top:80px;"> 
              
            <!-- main content
            =====================================================================================-->
            
             <div class="col-md-9" style="margin-top:20px;" >
                  
                 	<div class="col-md-12">
                        <div class="row">
						<legend>Welcome to KVK-DAS (Drought Assessment System) </legend> 
						 
					 
						  <?php include("slider.php");?>
						 
						<div class="col-md-4">
							<div style="height:200px; border:0px #fff solid">
							<center> <h3> Ground Truth</h3>  
							<p>Ground truth data collection platform for all end users</p>
							</center>
							<a class="btn btn-info btn-lg btn-block" href="geomapper/view-gm-map.php"><span class="glyphicon glyphicon-cloud-download"></span>Open </a>
							</div>
						</div>
						<div class="col-md-4">
							<div style="height:200px; border:0px #fff solid">
							<center> <h3> IoT Dashboard</h3>  
							<p>Integration of IoT, Android and cloud server</p>
							</center>
							<a class="btn btn-success btn-lg btn-block" href="iot/iot-home.php"><span class="glyphicon glyphicon-cloud-download"></span> Open </a>
							</div>
						</div>
						<div class="col-md-4">
							<div style="height:200px; border:0px #fff solid; color:#777">
								  <center><h3 style="color:#666"> Drought</h3> 
								  <p>Integration of RS, GIS and Smartphone Technology</p>
								  </center>
								<a class="btn btn-primary btn-lg btn-block" href="geomapper.php"><span class="glyphicon glyphicon-globe"></span> Drought</a>
							</div>
						</div>
						 
                             
                       </div><!-- row end--> 
                       
                 </div><!-- end of col-md -12   -->
                       
               </div><!-- end of col 9 -->
  						 
					<!-- Right Sidebar of login
                        =================================================================================================-->
                      
                <div class="col-md-3" style="padding-top:20px;"> 
				<legend>Welcome User</legend> 
				 <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
				<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
 
				<!--
				 page :  login sidebar object to show login side on bar on index page  -->             	   
					 
			
					<form class="form-horizontal" method="POST">
							<fieldset> 

								<!-- Text input-->
								<div class="form-group">
								   <input id="textinput" name="email" placeholder="Email id is here" class="form-control input-md" required="" type="text">
								   								   
								</div>
								<!-- Text input-->
								<div class="form-group">
								   
								  <input id="textinput" name="password" placeholder=" Password is here" class="form-control input-md" required="" type="password">
								     								  
								</div>
								<!-- Textarea -->
								

								<!-- Button -->
								<div class="form-group">
								   
									<button id="singlebutton"  type="submit" class="btn btn-lg btn-info"><span style="glyphicon glyphicon-send"></span> &nbsp;Login</button>
									<a id="singlebutton" href="register.php"   class="btn btn-lg btn-warning"><span style="glyphicon glyphicon-user"></span> &nbsp;Register</a>
								 
									<span class="help-block"><a href="forget-password.php">Forget Password</a></span>
								  </div>
								 
					</fieldset>
				</form>  <!-- end login -->
				<a class="btn btn-success btn-lg btn-block" href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Open Dashboard </a>
                              
                </div><!-- end of col-md-3 -->
				
				<div class="col-md-12" style="margin-top:20px;" >
				 			 
                 	 
                        <div class="row">
						<legend><span class="glyphicon glyphicon-map-marker"></span> Ground Truth Tool</legend> 
						<p> We have developed the revolutionary platform for geospatial survey and field compaign </p>	
						</br>
						<div class="col-md-12">
                        <div class="row">
						 
						 
						 
						<div class="col-md-4">
							<div style="height:200px; border:0px #fff solid">
							<center> <h3> Ground Truth  Projects </h3>  
							<p>Create the ground truth project for real time Field campaign</p>
							</center>
							<a class="btn btn-info btn-lg btn-block" href="geomapper/view-gm-projects.php"><span class="glyphicon glyphicon-briefcase"></span>Create Project </a>
							</div>
						</div>
						<div class="col-md-4">
							<div style="height:200px; border:0px #fff solid">
							<center> <h3>View Map</h3>  
							<p>View ground truth in Map, Export in CSV, PDF, and Excel Format</p>
							</center>
							<a class="btn btn-success btn-lg btn-block" href="geomapper/view-gm-map.php"><span class="glyphicon glyphicon-globe"></span> Open tool</a>
							</div>
						</div>
						<div class="col-md-4">
							<div style="height:200px; border:0px #fff solid; color:#777">
								  <center><h3 style="color:#666">Online Mapping</h3> 
								  <p>Map the spatial object using our online GeoMapper tool. You can drop the pin and export the data</p>
								  </center>
								<a class="btn btn-primary btn-lg btn-block" href="geomapper.php"><span class="glyphicon glyphicon-globe"></span> Drought</a>
							</div>
						</div>
						 
                             
                       </div><!-- row end--> 
                       
                 </div><!-- end of col-md -12   --> 
						 
						<div class="col-md-12">
						<div class="row">
							<div class="col-md-9">
							<img src="dist/img/droughtgis.jpg" class="img-responsive" alt="Responsive image">
							 
							 
						</div>
							
							<div  class="col-md-3" style="border:0px #fff solid">
							 <h3> Ground Truth  App</h3>  
							<p>Smartphone + Web based ground truth data collection system</p>
							 
							<a class="btn btn-success btn-lg btn-block" href="download-geomapper.php"><span class="glyphicon glyphicon-cloud-download"></span> Download the App </a>
							</div>
							
						</div>
						
						
						</div>
						
						<!-- drought GIS  -->
						<div class="row">
							<legend><span class="glyphicon glyphicon-leaf"></span> Drought Monitoring System</legend> 
							<p> Advance Drought Monitoring System is based </p>	
							</br>
							 </br>
						<div class="col-md-12">
                        <div class="row">
						 
						 
						 
						<div class="col-md-4">
							<div style="height:200px; border:0px #fff solid">
							<center> <h3> Meteorological Drought</h3>  
							<p>The IoT based devices and Online weather searvers are integrated for the estimation of Meteorological drought</p>
							</center>
							<a class="btn btn-info btn-lg btn-block" href="meteorological.php"><span class="glyphicon glyphicon-briefcase"></span>Open tool</a>
							</div>
						</div>
						<div class="col-md-4">
							<div style="height:200px; border:0px #fff solid">
							<center> <h3>Agricultural Drought</h3>  
							<p>You can add sown area, yield , and farmer information in the system</p>
							</center>
							<a class="btn btn-success btn-lg btn-block" href="agricultural.php"><span class="glyphicon glyphicon-globe"></span> Open tool</a>
							</div>
						</div>
						<div class="col-md-4">
							<div style="height:200px; border:0px #fff solid; color:#777">
								  <center><h3 style="color:#666">Map Viewer</h3> 
								  <p>Download the map in PDF and AgrGIS Format. The map is available after the authentication of the higher officers.</p>
								  </center>
								<a class="btn btn-primary btn-lg btn-block" href="geomapper.php"><span class="glyphicon glyphicon-globe"></span> Drought Viewer</a>
							</div>
						</div>
						 
                             
                       </div><!-- row end--> 
                       
                 </div><!-- end of col-md -12   --> 
							 
							<div class="col-md-12">
								<div class="col-md-9">
								<img src="dist/img/droughtgis-app.png" class="img-responsive" alt="Responsive image">
								 
								</div>
								<div  class="col-md-3" style="  border:0px #fff solid">
								<center> <h3> Drought Monitoring System</h3>  
								<p>Drought Monitoring system based on   Geospatial dataset</p>
								
								</center>
								<a class="btn btn-success btn-lg btn-block" href="download-geomapper.php"><span class="glyphicon glyphicon-cloud-download"></span> Download </a>
								</div>
							
						
						</div>
						<!-- drought GIS  -->
						<div class="row" style="padding-top:50px;">
							<legend><span class="glyphicon glyphicon-globe"></span> Developed by: Prof. K. V. Kale, Geospatial Research Lab India.</legend> 
							<p>If you have any suggestion please send us mail to <span class="glyphicon glyphicon-user"></span>Prof. K.V. Kale, <span class="glyphicon glyphicon-envelope"></span>kvkale91@gmail.com  <span class="glyphicon glyphicon-phone"></span>+91-900000000</u>.</p>	
							</br>
							 
							 
							 
						
						</div>
						
						 
                       
                 </div><!-- end of col-md -12   -->
                       
               
             </div> <!--  end of main container -->
                
 
         <!-- footer
                        =================================================================================================-->
                      
            <div class="container" style="padding-top:80px;"> 
                
				<?php  
				 include("footer.php");
				 ?>
                	
            </div>
                
			  <!-- footer end here
					=================================================================================================-->
 
		<!-- end of body  -->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="dist/js/jquery-1.11.1.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="dist/js/bootstrap.min.js"></script>
		  <!-- main JS libs  -->
		   

			<!--[if lt IE 9]>
			<script src="js/libs/html5shiv.js"></script>
			<script src="js/libs/respond.min.js"></script>
			<![endif]-->
  </body>
</html>