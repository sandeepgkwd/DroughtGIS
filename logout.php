<?php
session_start();
session_destroy();

$smsg= "You have logout successfully. Thank you";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logout - Open Research Academy</title>

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
            
             <div class="col-md-12" style="margin-top:20px;" >
                  
                 	  <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                        <div class="row">
						
						<legend><span class="glyphicon glyphicon-map-marker"></span> Try Geommaper V 1.0</legend> 
						<p> Application made for Ground truth data collection purpose.</p>	
						</br>
						 
						 
						<div class="col-md-12">
							<div class="col-md-9">
							<img class="img" src="img/gcp.png">
							</div>
							<div  class="col-md-3" style="  border:0px #fff solid">
							<center> <h3> Geommaper App</h3>  
							<p>Smartphone + Web based ground truth data collection system</p>
							
							</center>
							<a class="btn btn-success btn-lg btn-block" href="download-geomapper.php"><span class="glyphicon glyphicon-cloud-download"></span> Download </a>
							</div>
						</div>
						
						</div>
						
						
						 
                       
                 </div><!-- end of col-md -12   -->
                       
               
  						 
					<!-- Right Sidebar of login
                        =================================================================================================-->
                      
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="dist/js/bootstrap.min.js"></script>
		  <!-- main JS libs  -->
		   

			<!--[if lt IE 9]>
			<script src="js/libs/html5shiv.js"></script>
			<script src="js/libs/respond.min.js"></script>
			<![endif]-->
  </body>
</html>