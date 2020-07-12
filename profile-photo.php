<?php
session_start();
require_once('connectdb.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location: login.php');
} 
$email = $_SESSION['email'];

if(isset($_POST) & !empty($_POST)){
  $cpass = md5($_POST['cpass']);
  $newpass = md5($_POST['newpass']);
  $newpass1 = md5($_POST['newpass1']);

  $passsql = "SELECT * FROM `users` WHERE email='$email'";
  $passres = mysqli_query($con, $passsql);
  $passr = mysqli_fetch_assoc($passres);

  if($cpass == $passr['upass']){
    if($newpass == $newpass1){
      $passusql = "UPDATE `users` SET upass='$newpass' WHERE uemail='$email'";
      $passures = mysqli_query($con, $passusql);
      if($passures){
        $smsg="Password Updated";
      }
    }
  }else{
    $fmsg= "Current Password Not Matching";
  }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile photo - Dashboard Drought Assessment System</title>

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
							<legend><span class="glyphicon glyphicon-camera fa-2x"></span>&nbsp;Profile Photo</legend>
							  <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
							  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      
					<form class="form-horizontal"  method="POST">
							<fieldset>

							
							<!-- Text input-->
							 
							<div class="form-group">
							<div align="center"> <img alt="User Pic" src="<?php if(isset($r['profilepic']) & !empty($r['profilepic'])){ echo $r['profilepic']; }else{ echo "https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg";} ?>" id="profileimage" class="img-circle img-responsive"> 
							<div style="color:#999;" ><a href="upload.php">Upload Profile Pic</a></div>
							</div>
							 
						  </div>
							 
							<!-- Button -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="singlebutton"> </label>
							  <div class="col-md-4">
								<button id="singlebutton"  type="submit"  class="btn btn-success">Save</button>
								<button id="singlebutton"   class="btn btn-default">Cancel</button>
								 <span class="help-block">save your profile settings</span>
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