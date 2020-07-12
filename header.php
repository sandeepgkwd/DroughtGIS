 <!-- navbar 
            =================================================================================================  -->
<header class="navbar navbar-static-top bs-docs-nav navbar-fixed-top" id="top" role="navigation">  

  <div class="container-fluid">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse" >
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar" ></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php" class="navbar-brand"> DroughtGIS
      </a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li>
          <a href="dashboard.php"><span class="glyphicon glyphicon-home" style="font-size:18px; color:#5bc0de;"></span>&nbsp;Home</a>
        </li>
		 
				
        <li>
          <a href="geomapper/view-gm-map.php"><span class="glyphicon glyphicon-map-marker" style="font-size:18px; color:#5bc0de;"></span>&nbsp;Geomapper</a>
        </li>
		 <li>
          <a href="iot/iot-home.php"><span class="glyphicon glyphicon-briefcase" style="font-size:18px; color:#5bc0de;"></span>&nbsp;IoT</a>
        </li>
		<li>
          <a href="geomapper/view-gm-map.php"><span class="glyphicon glyphicon-globe" style="font-size:18px; color:#5bc0de;"></span>&nbsp;Map</a>
        </li>
		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">                
                <span class="glyphicon glyphicon-leaf" style="font-size:20px; color:#5bc0de;"></span>&nbsp;Drought<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="agricultural.php"><span class="glyphicon glyphicon-leaf"></span>Agricultural Drought</a></li>
                        <li><a href="meteorological.php"><span class="glyphicon glyphicon-fire"></span>Meteorological Drought</a></li>	
					</ul>
                        		
						 
        </li>
		
		
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">                
                <span class="glyphicon glyphicon-cog" style="font-size:20px; color:#5bc0de;"></span>&nbsp;Support<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="default.php"><span class="glyphicon glyphicon-arrow-right"></span>Send data software</a></li>
                        <li><a href="default.php"><span class="glyphicon glyphicon-arrow-left"></span>Get data from Software</a></li>
						<li><a href="default.php"><span class="glyphicon glyphicon-fire"></span>API</a></li>
						<li><a href="default.php"><span class="glyphicon glyphicon-cog"></span>Preferences</a></li> 
                    </ul>
        </li>
      </ul>
      <!--   check user session - profile menu  -->
     <!--  if user is logout or default menu  -->
	 <?php
	 
	   /* session_start();
		
			 echo $_SESSION['email'];
    	include("connectdb.php");
		
		if(isset($_SESSION['email'])){
			$email=$_SESSION['email'];
			$uid=$_SESSION['suid'];
			 $uid = mysqli_real_escape_string($con, $uid);
			$email = mysqli_real_escape_string($con, $email);
			$sql = "SELECT uid, uname FROM `users` WHERE uid='$uid' and uemail='$email'";
			 echo $sql;
			$res = mysqli_query($con, $sql);
			$count = mysqli_num_rows($res);
			$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
 
				 
	$login_user=$row['uname'];
	 
			if($login_user){
				 $login='<ul class="nav navbar-nav user-menu navbar-right">
                
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                <span
                    class="glyphicon glyphicon-user" style="font-size:20px; color:#5bc0de;"></span>&nbsp;'.$login_user.'<b class="caret"></b></a>
                    <ul class="dropdown-menu">
						<li><a href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span>Dashboard</a></li>
                        <li><a href="profile-setting.php"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                        <li><a href="account.php"><span class="glyphicon glyphicon-cog"></span>Account</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                    </ul>
                </li>
            </ul>';
				 
				 
				 echo $login;				
					 
			}	
		}else{*/
			 $logout='<ul class="nav navbar-nav user-menu navbar-right">              
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">                
                <span class="glyphicon glyphicon-user" style="font-size:20px; color:#5bc0de;"></span>&nbsp;User<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span>Login</a></li>
                        <li><a href="register.php"><span class="glyphicon glyphicon-cog"></span>Register</a></li>
                    </ul>
                </li>
            </ul>';
			 
	
			echo $logout;
			//header("Location: login.php");
			
		//}
					 
		 
	?>
	 
	
    </nav>
  </div>
</header> 