<?php
include('connectdb.php');
/* Session code is here  */
$uname="";
$uemail="";
$ubio="";
$udes="";
$uphoto="";
 $uid=1;
$sql = "SELECT  uname, udesignation, uemail, uphoto, ubio FROM users WHERE uid='$uid' ";
$result = mysqli_query($con, $sql);
					 
 
while ($row = mysqli_fetch_array($result)) {
    $uname=$row['uname'];
	$udes=$row['udesignation'];
	$uemail= $row['uemail'];
	$uphoto=$row['uphoto'];
	$ubio= $row['ubio'];
}
 

?>
            <div class="row">
                <div class="panel panel-default">
                
                <div class="panel-body"> 
                	<div class="col-md-12">
						<div class="row">
							<div class="col-md-2">
								<div style="padding-top:20px; ">           
									<img src="<?php echo "members/".$uid."/".$uphoto; ?>"  width= 100; class="img-rounded">
								</div>
								 
							</div>
							 <div class="col-md-10">
								 <div class="col-md-8">
								 <h3><?php echo $uname; ?></h3>
								 <h5 class="text-muted"><?php echo $udes;  echo " (".$uemail.")"; ?></i> </h5>
								 <p><?php echo $ubio; ?> </p>
								 
								 <div  class="pull-right" style="padding-top:5px; ">   
								 <a href="#" class="btn btn-default   btn-xs" style="padding-top:5px;"> <span class="glyphicon glyphicon-edit"></span> Profile</a>
								  <a href="#" class="btn btn-default   btn-xs" style="padding-top:5px;"><span class="glyphicon glyphicon-cog"></span> Settings</a>
								</div>
								 </div>
								  <div class="col-md-4">
								  
								  </div>
							 </div>
					   </div><!-- row end-->				  
                         <div class="row">
                         <hr>
                         
                         <ul class="nav nav-pills">
                         	<li  style="width:190px; padding-left:8px;">
                             <a href="geomapper.php" class="stats-count">
                                     <span class="glyphicon glyphicon-download-alt  arrow text-success "></span> 
                                      
                                    <h5 class="stat-value text-success">Geomapper</h5>
                                    <span class="stat-name">Android App</span>
                               </a>
                            </li>
                           	<li  style="width:190px;">
                             <a href="meteorological.php" class="stats-count">
                                     <span class="glyphicon glyphicon-cloud fa-2x arrow text-success hidden-tablet"></span> 
                                      
                                    <h5 class="stat-value text-success">Meteorological</h5>
                                    <span class="stat-name">Weather data</span>
                             </a>
                            </li>
                            
                           	<li  style="width:180px;">
                              <a href="agricultural.php"class="stats-count">
                                     <span class="glyphicon glyphicon-leaf fa-2x arrow text-success hidden-tablet"></span> 
                                      
                                    <h5 class="stat-value text-success">Agricultural</h5>
                                    <span class="stat-name">crop, farmer</span>
                              </a>
                            </li>
                           	 
							<li  style="width:180px;">
                             <a href="#" class="stats-count">
                                     <span class="glyphicon glyphicon-map-marker fa-2x arrow text-success hidden-tablet"></span> 
                                      
                                    <h5 class="stat-value text-success">DroughtGIS</h5>
                                    <span class="stat-name">Map</span>
                              </a>
                            </li>
							<li  style="width:180px;">
                             <a href="#" class="stats-count">
                                     <span class="glyphicon glyphicon-info-sign fa-2x arrow text-success hidden-tablet"></span> 
                                      
                                    <h5 class="stat-value text-success">Help</h5>
                                    <span class="stat-name">help</span>
                              </a>
                            </li>
							 
                         </ul>
                         </div>
                      </div>
                      
                </div>
            </div>
        </div>