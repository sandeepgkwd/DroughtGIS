<?php
	 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard- Drought Assessment system </title>


<link href="dist/css/jquery.bootgrid.css" rel="stylesheet" />
<script src="dist/js/jquery-1.11.1.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/js/jquery.bootgrid.min.js"></script>


    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="dist/css/custom.css" rel="stylesheet">
    <link href="dist/css/font-awesome-min.css" rel="stylesheet">
	 
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
  <div class="container" >
     	
            <div class="row" style="padding-top:80px; padding-bottom:200px;">
  								
  			
            	                 <!-- Col sidebar  
                ================================================================================================================== -->
                 
	           			<div class="col-md-3" >
                                    <?php
									 include("Dashboard-sidebar.php");
									 ?>
                          
  							</div>
  				<!--  end of sidebar col 4-->
            
            <!-- inbox
            =====================================================================================-->
            
             <div class="col-md-9" >
             	<div class="col-md-12">
                <!-- textbox -->
				<?php
					include("profile-header.php");
				?>               		  
                 
            <!--post  start here 
           =================================================================================================-->
            <div class="container-fluid"  style="background-color:#fff;">
            	 
            <!-- start friend -->
                <div class="col-md-12" style=" margin-bottom:20px; background-color:#fff;"> 
				<h3>List of projects</h3> 
                  <!--Grid start here 
                        =================================================================================================-->
              
				  <?php
				  /*
					  $q=mysqli_query($con,"select email from login where email = '".$_SESSION['email']."'")or die(mysql_error());
					  
					  while($rows = mysqli_fetch_assoc($q)):
					  
					  $e = $rows['email'];
					  
					  endwhile;*/
				  ?>
				  
					<h3><?php /*echo $e? */ ?></h3>
					 
       
				 
			
				<table id="sample_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
					<thead>
						<tr>
							<!--<th data-column-id="pid" data-type="numeric" data-identifier="true">project id</th>-->
							<th data-column-id="pid">Record #</th>
						
							<th data-column-id="pname">Name</th>
							
							<th data-column-id="pdetail">Detail</th>
							
							<th data-column-id="commands" data-formatter="commands" data-sortable="false">Edit/Delete</th>
						</tr>
					</thead>
				</table>		 
			 
				
		</div>  <!-- end row --> 
      
	</div><!-- end of container -->
    
      
                      
               
    </div><!--end  post layout of col md 9-->
                
               
   </div><!-- end of col 9 -->
  </div><!-- col 12 -->
        
    </div> <!-- end of continer fluid -->
    
  
	<!-- Modal Start  -->
<div id="add_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Create Project</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_add">
				<input type="hidden" value="add" name="action" id="action">

				  <div class="form-group">
                    <label for="pname" class="control-label">Title of project</label>
                    <input type="text" class="form-control" id="pname" name="pname" placeholder="Project title is here"/>
                  </div>
                  
				  <div class="form-group">
                    <label for="pdetail" class="control-label">About project </label>
					<textarea  class="form-control" id="pdetail" name="pdetail" placeholder="Tell me about your project"></textarea>
								 
                    
                  </div>
				  
				  
            </div>
            <div class="modal-footer">
				<button type="button" id="btn_add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Create Project</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
                
            </div>
			</form>
        </div>
    </div>
</div>
<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Project</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_edit">
				<input type="hidden" value="edit" name="action" id="action">
				
				<input type="hidden" value="0" name="edit_pid" id="edit_pid">
				   
                  <div class="form-group">
                    <label for="pname" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="edit_pname" name="edit_pname"/>
                  </div>
                  
				  <div class="form-group">
                    <label for="pdetail" class="control-label">Detail:</label>
					<textarea  class="form-control" id="edit_pdetail" name="edit_pdetail" placeholder="Detail"></textarea>
								<span class="help-block">Tell us about your project.</span> 
                    
                  </div>
	
                
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Update</button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                
            </div>
			</form>
        </div>
    </div>
</div>
<!-- Modal End  -->  
    
	<!-- end of body  -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    

        <!--[if lt IE 9]>
        <script src="js/libs/html5shiv.js"></script>
        <script src="js/libs/respond.min.js"></script>
        <![endif]-->
		
<script type="text/javascript">
$( document ).ready(function() {
	var grid = $("#sample_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
			};
		},
		
		url: "project-response.php",
		formatters: {
		        "commands": function(column, row)
		        {
		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-map\" data-row-id=\"" + row.pid + "\"><span class=\"glyphicon glyphicon-map-marker\"></span></button> " + 
							"<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.pid + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " + 
							"<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.pid + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
		        }
		    }
   }).on("loaded.rs.jquery.bootgrid", function()
{
    /* Executes after data is loaded and rendered */
    grid.find(".command-edit").on("click", function(e)
    {
        //alert("You pressed edit on row: " + $(this).data("row-id"));
			var ele =$(this).parent();
			var g_id = $(this).parent().siblings(':first').html();
            var g_name = $(this).parent().siblings(':nth-of-type(2)').html();
			console.log(g_id);
                    console.log(g_name);

		//console.log(grid.data());//
		$('#edit_model').modal('show');
					if($(this).data("row-id") >0) {
							
                                // collect the data
                                
								$('#edit_pid').val(ele.siblings(':first').html()); // in case we're changing the key
                                
								$('#edit_pname').val(ele.siblings(':nth-of-type(2)').html());
                                
								$('#edit_pdetail').val(ele.siblings(':nth-of-type(3)').html());
					} else {
					 alert('No row selected! First select row, then click edit button');
					}
    }).end().find(".command-delete").on("click", function(e)
    {
	
		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
					alert(conf);
                    if(conf){
                                $.post('project-response.php', { id: $(this).data("row-id"), action:'delete'}
                                    , function(){
                                        // when ajax returns (callback), 
										$("#sample_grid").bootgrid('reload');
                                }); 
								//$(this).parent('tr').remove();
								//$("#sample_grid").bootgrid('remove', $(this).data("row-id"))
                    }
    });
});

function ajaxAction(action) {
				data = $("#frm_"+action).serializeArray();
				alert(data);
				$.ajax({
				  type: "POST",  
				  url: "project-response.php",  
				  data: data,
				  dataType: "json",       
				  success: function(response)  
				  {
					  alert(response);
					$('#'+action+'_model').modal('hide');
					$("#sample_grid").bootgrid('reload');
				  }   
				});
			}
			
			$( "#command-add" ).click(function() {
			  $('#add_model').modal('show');
			});
			$( "#btn_add" ).click(function() {
			  ajaxAction('add');
			});
			$( "#btn_edit" ).click(function() {
			 
			  ajaxAction('edit');
			});
});
</script>

		
		
		
  </body>
</html>