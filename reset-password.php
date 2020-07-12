<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to knet, First Knowledge Networking Website,</title>

    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="dist/css/custom.css" rel="stylesheet">
    <link href="dist/css/font-awesome.css" rel="stylesheet">
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
          <?php include("login-header.php");?>
     <!-- 
      header start ============================================================================================== -->
  <div class="container" style="padding-top:80px; padding-bottom:200px;"> 
            
            <!-- main content
            =====================================================================================-->
               <center>            
                          <!--
         page :  login sidebar
         object to show login side on bar on index page
          
         -->             	   
               <div id="login">
        
                <h1><span class="fa fa-2x fa-wrench"></span>&nbsp;<strong>Change Password.</strong> </h1>
        
                <form action="" method="post"> 
                    <fieldset> 
                        <p><input type="password" required placeholder="New password"></p> <!-- JS because of IE support; better: placeholder="Password" --> 
                        <p><input type="password" required placeholder="Retype password"></p> <!-- JS because of IE support; better: placeholder="Password" -->
                        <input type="submit" value="Change Password">
                    </fieldset>
                </form>
        
                 
            </div> <!-- end login -->
         
            </center> 
 
  </div> <!--  end of main container -->
                
 
         <!-- footer
                        =================================================================================================-->
                      
                <footer class="container"> 
                
                					<?php
									 include("index-footer.php");
									 ?>
                	
             	</footer>
                
                  <!-- footer end here
                        =================================================================================================-->
     
	<!-- end of body  -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>
      <!-- main JS libs  -->
        <script src="theme/js/libs/jquery-1.11.0.min.js"></script>
        <script src="theme/js/libs/jquery-ui.min.js"></script>
        
        <!-- General Scripts -->
        <script src="theme/js/general.js"></script>

        <!--[if lt IE 9]>
        <script src="js/libs/html5shiv.js"></script>
        <script src="js/libs/respond.min.js"></script>
        <![endif]-->
  </body>
</html>