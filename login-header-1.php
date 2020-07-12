 <!-- navbar  for user untill he complete registration steps
            =================================================================================================  -->
<header class="navbar navbar-static-top bs-docs-nav navbar-fixed-top" id="top" role="navigation">  

  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="glyphicon glyphicon-minus"></span>
        <span class="glyphicon glyphicon-minus"></span>
        <span class="glyphicon glyphicon-minus"></span>
      </button>
      <a href="index.php" class="navbar-brand">Drought</a>
     </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation"> 
       <ul class="nav navbar-nav user-menu navbar-right" style=""> 
      		<li class="dropdown"><a href="geomapper.php" class="dropdown-toggle" data-toggle="dropdown"> 
                <span class="glyphicon glyphicon-user" style="font-size:20px; "></span>&nbsp;Geomapper<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="geomapper-map.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Map Viewer</a></li>
                        <li><a href="geomapper-project-add.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Create Project</a></li>
						<li><a href="geomapper-project-add-gcp.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Add Ground Truth</a></li>
                        <li><a href="geomapper-import.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Import </a></li>
                        <li><a href="project-export.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Export</a></li>
                        <li><a href="geomapper-help.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Help </a></li>                   
                          
                    </ul>
           </li>
		   <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                <span class="glyphicon glyphicon-user" style="font-size:20px; color:#fff;"></span>&nbsp;Profile<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Sign in</a></li>
                        <li><a href="register.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Sign up</a></li>
                          
                    </ul>
           </li>
       </ul>
     </nav>
  </div>
</header> 