<?php
include('connectdb.php');

if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = md5(mysqli_real_escape_string($_POST['password']));
	$usernamesql="SELECT * FROM `users` WHERE `uemail` = '$email' AND `upass` = '$password'"; 
	//$usernamesql = "SELECT * FROM `users` WHERE uemail='$email'";
			$usernameres = mysqli_query($con, $usernamesql);
			$count = mysqli_num_rows($usernameres);
			if($count == 1){
				$smsg="Welcome to user dashboard";
				$_SESSION['email'] = $email;
				header('location: dashboard.php');

				
			}else {
				$fmsg = "Invalid Email and Password, please try different email id or click login ";
				 
			}
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Drought Assessment System</title>

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
  <div class="container" style="padding-top:80px; padding-bottom:200px;"> 
            
            <!-- main content
            =====================================================================================-->
            <div class="container">
				<div class="row">
				<!-- Form Name -->
							<legend>Login</legend>

				 <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
							  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
    
					<form class="form-horizontal" method="POST">
							<fieldset>

							
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Email</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="email" placeholder="Email id is here" class="form-control input-md" required="" type="text">
							  <span class="help-block">Type your email id</span>  
							  </div>
							</div>
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Password</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="password" placeholder=" Password is here" class="form-control input-md" required="" type="password">
							  <span class="help-block">Type your password</span>  
							  </div>
							</div>
							<!-- Textarea -->
							

							<!-- Button -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="singlebutton"> </label>
							  <div class="col-md-4">
								<button id="singlebutton" type="submit" class="btn btn-success">Login</button>
								<a id="singlebutton" href="register.php" class="btn btn-default">Register</a>
								  
								<span class="help-block"><a href="forget-password.php">Forget Password</a></span>
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