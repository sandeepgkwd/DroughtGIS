<!DOCTYPE html>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Project Manager</title>


<link rel="stylesheet" href="dist/css/bootstrap.min.css" type="text/css" media="all">
<link href="dist/css/jquery.bootgrid.css" rel="stylesheet" />
<link href="dist/css/custom.css" rel="stylesheet">
<link href="dist/css/font-awesome-min.css" rel="stylesheet">	
<script src="dist/js/jquery-1.11.1.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/js/jquery.bootgrid.min.js"></script>


</head>
<body>
	    <!-- Navigation bar ============================================================================================== -->
          <?php 
		  include("header.php");
		  ?>
     <!-- 
      header start ============================================================================================== -->
  <div class="container" >
	<div class="row">
     	
            <div class="col-md-12" style="padding-top:80px; padding-bottom:200px;">
  								
  			
            	                 <!-- Col sidebar  
                ================================================================================================================== -->
                 
	           			<div class="col-md-2" >
                                    <?php
									include("Dashboard-sidebar.php");
									 ?>
                          
  							</div>
  				<!--  end of sidebar col 4-->
            
            <!-- inbox
            =====================================================================================-->
            
             <div class="col-md-9"  >
             	 
                <!-- textbox -->
				 

			    
                		
                 
            <!--post  start here 
           =================================================================================================-->
    <div class="col-md-12"   style="background-color:#fff;>
		       
         		
                  <!--Grid start here 
                        =================================================================================================-->
              
	    
				<div class="col-md-12" >
				<h3>Project Manager</h3> 
					<div class="well clearfix">
						  
						<div class="pull-left">
									<div class="btn-group">
										  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="glyphicon glyphicon-tasks"></span>GeoMapper Apps <span class="caret"></span>
										  </button>
											<ul class="dropdown-menu">
												<li><a href="#"> <span class="glyphicon glyphicon-certificate"></span>GeoWeather</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-file"></span>GeoSoil</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-tint"></span>GeoCrop</a></li>	
												<li><a href="#"><span class="glyphicon glyphicon-tint"></span>GeoDrought</a></li>
												 
											</ul>
										</div>
							<button type="button" class="btn  btn-success" id="command-add" data-row-id="0">
							<span class="glyphicon glyphicon-plus"></span> Add project</button>
						</div>
						<div class="pull-right">
							<a href="sample.php" class="btn btn-warning">
							<span class="glyphicon glyphicon-arrow-right"></span> View Records</a>
						</div>
					</div>
						
					<table id="sample_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
						<thead>
							<tr>
								<!--<th data-column-id="pid" data-type="numeric" data-identifier="true">project id</th>-->
								<th data-column-id="pid">Record #</th>
							
								<th data-column-id="pname">Name</th>
								
								<th data-column-id="pdetail">Detail</th>
								
								<th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
							</tr>
						</thead>
					</table>
				</div>
						
			</div>  <!-- end row --> 
				  
		</div><!-- end of col 12 -->
	</div><!-- end of row -->
    
      
                      
    
        
    </div> <!-- end of continer   -->
    
  
	
<div id="add_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Project Entry</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_add">
				<input type="hidden" value="add" name="action" id="action">

				  <div class="form-group">
                    <label for="pname" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="pname" name="pname"/>
                  </div>
                  
				  <div class="form-group">
                    <label for="pdetail" class="control-label">Detail:</label>
                    <input type="text" class="form-control" id="pdetail" name="pdetail"/>
                  </div>
				  
				  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_add" class="btn btn-primary">Save</button>
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
                    <input type="text" class="form-control" id="edit_pdetail" name="edit_pdetail"/>
                  </div>
	
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_edit" class="btn btn-primary">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>

</body>
</html>
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
			var g_apps = $(this).parent().siblings(':nth-of-type(3)').html();
			console.log(g_id);
            console.log(g_name);
			console.log(g_apps);

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
				$.ajax({
				  type: "POST",  
				  url: "project-response.php",  
				  data: data,
				  dataType: "json",       
				  success: function(response)  
				  {
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
