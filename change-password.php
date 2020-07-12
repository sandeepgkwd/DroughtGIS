<?php
session_start();
include('connectdb.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
  header('location: login.php');
}
$email = $_SESSION['email'];

if(isset($_POST) & !empty($_POST)){
  $cpass = md5($_POST['cpass']);
  $newpass = md5($_POST['newpass']);
  $newpass1 = md5($_POST['newpass1']);

  $passsql = "SELECT * FROM `users` WHERE email='$email";
  $passres = mysqli_query($con, $passsql);
  $passr = mysqli_fetch_assoc($passres);

  if($cpass == $passr['password']){
    if($newpass == $newpass1){
      $passusql = "UPDATE `usermanagement` SET password='$newpass' WHERE username='$username'";
      $passures = mysqli_query($connection, $passusql);
      if($passures){
        echo "Password Updated";
      }
    }
  }else{
    echo "Current Password Not Matching";
  }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change password, Drought Assessment System</title>

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
							<legend>Change password</legend>
					<form class="form-horizontal" method="POST">
							<fieldset>						 
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Password</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="textinput" placeholder=" Password is here" class="form-control input-md" required="" type="password">
							  <span class="help-block">Type your password</span>  
							  </div>
							</div>
							 
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Verify</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="textinput" placeholder=" Password is here" class="form-control input-md" required="" type="password">
							  <span class="help-block">Type your password</span>  
							  </div>
							</div>
							<!-- Textarea -->
							

							<!-- Button -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="singlebutton"> </label>
							  <div class="col-md-4">
								<button id="singlebutton" name="singlebutton" class="btn btn-success">Change Password</button>
								 
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
    
        <!--[if lt IE 9]>
        <script src="js/libs/html5shiv.js"></script>
        <script src="js/libs/respond.min.js"></script>
        <![endif]-->
  </body>
</html>