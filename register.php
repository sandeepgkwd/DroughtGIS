<?php
include('connectdb.php');

if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	//$password = md5(mysqli_real_escape_string($con,$_POST['password']));
	$password =  $_POST['password'];
	$usernamesql = "SELECT * FROM `users` WHERE uemail='$email'";
			$usernameres = mysqli_query($con, $usernamesql);
			$count = mysqli_num_rows($usernameres);
			if($count == 1){

				$fmsg = "Email id is exists, please try different email id or <a href='login.php'>click login</a> ";
			}else {

				$sql="INSERT INTO `users` ( `uname`, `uemail`, `upass`) VALUES ('$username', '$email', '$password');";
				//$sql = "INSERT INTO `login` (username, email, password) VALUES ('$username', '$email', '$password')";
				$result = mysqli_query($con, $sql);
				if($result){
					$smsg = "User Registration successful. Welcome to Open Research Academy. ";
					$id = mysqli_insert_id($con);
					$_SESSION['id'] = $id;
					// Create directory(folder) to hold each user's files(pics, MP3s, etc.)		
					mkdir("members/$id", 0755);	
					//!!!!!!!!!!!!!!!!!!!!!!!!!    Email User the activation link    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
					$to = "$email";
														 
					$from = "support@openresearchacademy.com"; // $adminEmail is established in [ scripts/connect_to_mysql.php ]
					$subject = 'Welcome to Open Research Academy';
					//Begin HTML Email Message
					$message = "Hi $username,

					Thank you for registration. We welcomes you at Open Research Academy.
					Please contribute you knowledge to make drought free world. 
					The Open Research Academy is a promoting open source technology and open research for betterment 
					of the world. With this inative, we have developed drought research unit for drought related studies.
					We have developed new platform with the integration of geospatial technology and smartphone technology.


					Click here to learn how to<a href='www.openresearchacademy.com/contribute.php'>contribute in Drought free nation.</a>

					Regards.
					Prof. K. V. Kale,
					Geospatial Lab.
					email:kvkale91@gmail.com
					   ";
				   //end of message
					$headers  = "From: $from\r\n";
					$headers .= "Content-type: text\r\n";

					mail($to, $subject, $message, $headers);
					$smg="Email send to you";
					
					//header("location: dashboard.php?uid=$id"); 
					mysqli_close($con);
				}else{
					$fmsg = "User registration failed. Please try again.";
				}
			}
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register for free access of drought assessment system</title>

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
             	<div class="row">
				<!-- Form Name -->
							<legend>Register</legend>
							  <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
							  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
    
					<form class="form-horizontal" action="register.php" method="POST">
							<fieldset>

							
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Name</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="username" placeholder="Your name is here" class="form-control input-md" required="" type="text">
							  <span class="help-block">Type your name</span>  
							  </div>
							</div>
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
								<button id="singlebutton"  type="submit"  class="btn btn-success"><span class="glyphicon glyphicon-send"></span>Register</button>
								<button id="singlebutton"   class="btn btn-default"><span class="glyphicon glyphicon-lock"></span>Login</button>
								 <span class="help-block">By clicking register button, it means you have accepted our terms and condition.</span>
							  </div>
							</div>

							</fieldset>
							</form>

				</div>
		 
			 
	
 
         <!-- footer
                        =================================================================================================-->
                      
                <footer> 
                
                					<?php
									 include("footer.php");
									 ?>
                	
             	</footer>
      </div> <!--  end of main container -->
                          
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