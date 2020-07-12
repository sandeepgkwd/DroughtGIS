<?php
session_start();
require_once('connectdb.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location: login.php');
} 
$email = $_SESSION['email'];

if(isset($_POST) & !empty($_POST)){
  $uname=htmlspecialchars(trim($_POST['uname']));
$uorg=htmlspecialchars(trim($_POST['uorg']));
$ubio=htmlspecialchars(trim($_POST['ubio']));

      $passusql = "UPDATE `users` SET uname='$uname',uorg='$uorg',ubio='$ubio'  WHERE uemail='$email'";
      $passures = mysqli_query($con, $passusql);
      if($passures){
        $smsg="Profile updated";
         
  }else{
    $fmsg= "Sorry, Profile could not update.";
  }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile settings - Dashboard Drought Assessment System</title>

    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="dist/css/navbar.css" rel="stylesheet">
	<link href="dist/css/custom.css" rel="stylesheet">
   
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
  <div class="container"> 
            
            <!-- main content
            =====================================================================================-->
			<div class="row" style="padding-top:80px; padding-bottom:200px;">
  								
  			              
            	                 <!-- Col sidebar  
                ================================================================================================================== -->
                 
	           			<div class="col-md-3" >
                                    <?php
									 include("left-profile-sidebar.php");
									 ?>
                          
  							</div>
  				<!--  end of sidebar col 4-->
            
            <!-- inbox
            =====================================================================================-->
            
             <div class="col-md-9" >
							<legend><span class="glyphicon glyphicon-cog fa-2x"></span>&nbsp;Profile Settings</legend>
							  <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
	 
					<form class="form-horizontal"  method="POST">
							<fieldset>

							
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Name</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="uname" placeholder="Your name is here" class="form-control input-md" required="" type="text">
							  <span class="help-block">Type your name</span>  
							  </div>
							</div>
							 
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Organization</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="uorg" placeholder="Organization is here" class="form-control input-md" required="" type="text">
							  <span class="help-block">Type your email id</span>  
							  </div>
							</div>
							<!-- Textarea -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textarea">Bio</label>
							  <div class="col-md-4">                     
								<textarea class="form-control" id="textarea" name="ubio" placeholder= "Detail"></textarea>
								<span class="help-block">Tell us about yourself.</span>  
							  </div>
							</div>

					<!-- Button -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="singlebutton"> </label>
							  <div class="col-md-8">
								<button id="singlebutton"   type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus fa-2x"></span>&nbsp;Save</button>
								<a href="dashboard.php" id="singlebutton"   class="btn btn-default"><span class="glyphicon glyphicon-user fa-2x"></span>&nbsp;Go to Dashboard</a>
							  </div>
							</div>
							 

							</fieldset>
							</form>

				</div>
		 
			</div>
	</div> <!--  end of main container -->
                
 
         <!-- footer
                        =================================================================================================-->
                      
                <footer class="container"> 
                
                					<?php
									 include("footer.php");
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