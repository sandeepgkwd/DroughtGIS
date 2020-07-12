<?php
require_once('connectdb.php');

if(isset($_POST) & !empty($_POST)){
	$useremail = mysqli_real_escape_string($con, $_POST['useremail']);
	$sql = "SELECT * FROM `users` WHERE uemail = '$useremail'";
	$res = mysqli_query($con, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['upass'];
		$to = $r['uemail'];
		$subject = "Your Recovered Password";
 
		$message = "Please use this password to login " . $password;
		$headers = "From : support@openresearchacademy.com";
		if(mail($to, $subject, $message, $headers)){
			$msg= "Your Password has been sent to your email id. <a href='index.php' class='btn btn-sm btn-success'> Click here to Login</a>";
		}else{
			$fmsg= "Failed to Recover your password, try again";
		}
 
	}else{
		$fmsg= "Email does not exist in database, if you are new user then <a href='index.php' class='btn btn-sm btn-warning'> Click here to Register</a>";
	}
}
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forget password. Drought Assessment System</title>

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
				 <?php if(isset($msg)){ ?><div class="alert alert-success" role="alert"> <?php echo $msg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
    <legend>Forget Password</legend>
					<form class="form-horizontal" method="POST">
							<fieldset>

							<!-- Form Name -->
							
							

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Email</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="useremail" placeholder="Email id is here" class="form-control input-md" type="text" required>
							  <span class="help-block">Type your email id</span>  
							  </div>
							</div>
							 
							

							<!-- Button -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="singlebutton"> </label>
							  <div class="col-md-4">
								<button    type="submit" class="btn btn-success"> Get password</button>
								<a href="index.php"  type="submit" class="btn btn-default"> Login</a>
								<span class="help-block"><a href="#">We have send password link to your registered email.</a></span> 
								 
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
      
        <!--[if lt IE 9]>
        <script src="js/libs/html5shiv.js"></script>
        <script src="js/libs/respond.min.js"></script>
        <![endif]-->
  </body>
</html>