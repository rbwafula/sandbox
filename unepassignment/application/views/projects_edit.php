  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
    	<!-- Content Header (Page header) -->
    	<section class="content-header">
      		<h1>Add New Project</h1>
      		<ol class="breadcrumb">
        		<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        		<li><a href="<?php echo base_url(); ?>projects"> All Projects</a></li>
		        <li class="active">New Project</li>
	      	</ol>
    	</section>

    	<!-- Main content -->
    	<section class="content">
      		<div class="row">
      			<!-- form start -->
    			<form id="addproject" action="add" method="post" class="addproject">
	        		<div class="col-md-6">
	        			<div class="box box-primary">
	            			<div class="box-header with-border">
	              				<h3 class="box-title">Project Details</h3>
				            </div>
				            <!-- /.box-header -->
              				<div class="box-body">
              					<div class="form-group">
                  					<label for="projectReference">Reference</label>
                  					<input type="text" class="form-control" name="reference" id="projectReference" value="<?php echo $projectdetail->Reference; ?>" placeholder="Enter Project Reference">
                				</div>
                				<div class="form-group">
                					<label for="projectCountries">Countries</label>
                					<?php 
                						
            						?>
                					<select name="countries[]" class="form-control select2" multiple="multiple" id="projectCountries" data-placeholder="Select Project Countries" style="width: 100%;">
										<?php
                                            if (!empty($countrieslist)) {
                                            	$selectedcountries = explode(",", ($projectdetail->CountriesID));
		                						foreach ($countrieslist as $country) {
                                                	if (in_array($country->ID, $selectedcountries)) {
                                                		// Pre-select what was already selected
													    echo '<option value="'.$country->ID.'" selected="selected">'.$country->Name.'</option>';
													} else {
														echo '<option value="'.$country->ID.'">'.$country->Name.'</option>';
													}
                                                }
                                            } else {
                                                echo '<option disabled="" value="Null">No Countries</option>';
                                            }
                                        ?>
									</select>
								</div>
								<div class="form-group">
                					<label for="projectImplementingOffice">Implementing Office</label>
                					<select name="implementingoffice" class="form-control select2"  id="projectImplementingOffice" data-placeholder="Select Implementing Office" style="width: 100%;">
										<?php
                                            if (!empty($officelist)) {
                                            	$selectedoffice = $projectdetail->implementingofficeid;
                                                foreach ($officelist as $office) {
                                                	if ($office->ID == $selectedoffice) {
                                                		echo '<option value="'.$office->ID.'" selected="selected">'.$office->Name.'</option>';
                                                	} else {
                                                		echo '<option value="'.$office->ID.'">'.$office->Name.'</option>';
                                                	}
                                                }
                                            } else {
                                                echo '<option disabled="" value="Null">No Office</option>';
                                            }
                                        ?>
									</select>
								</div>
								<div class="form-group">
                  					<label for="projectTitle">Title</label>
                  					<input type="text" class="form-control" name="title" id="projectTitle" value="<?php echo $projectdetail->Title; ?>" placeholder="Enter Project Title">
                				</div>
								<div class="input-group">
									<label for="projectGrantAmount">Grant Amount</label>
								</div>
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input name="grantamount" value="<?php echo $projectdetail->GrantAmount; ?>" type="text" id="projectGrantAmount" class="form-control">
								</div>
								<div class="input-group">
									<label for="projectFirstDisbursement">First Disbursement Amount</label>
								</div>
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input name="firstdisbursement" value="<?php echo $projectdetail->firstdisbursement; ?>" type="text" id="projectFirstDisbursement" class="form-control">
								</div>
							</div>
							<div class="box-footer">
				            	Please fill the information in the next section.
				            </div>
				            <div class="hidden overlay">
			              		<i class="fa fa-refresh fa-spin"></i>
			            	</div>
	          			</div>
	          			<!-- /.box -->
	          			<!--<div class="alert alert-warning alert-dismissible">
                			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            				<h4><i class="icon fa fa-warning"></i> Error</h4>
            				<ul class="error-list">
            					<li>something</li>
            				</ul>
              			</div>-->
	      			</div>
	      			<div class="col-md-6">
	        			<div class="box">
							<div class="box-header">
								<h3 class="box-title">&nbsp;</h3>
							</div>
	            			<!-- /.box-header -->
	            			<div class="box-body">
	            				<div class="form-group">
                					<label>Date from GCF:</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input name="gcfdate" value="<?php echo date("m/d/Y", strtotime($projectdetail->gcfdate)); ?>" type="text" class="form-control pull-right datepicker" id="datefromgcf">
									</div>
									<!-- /.input group -->
								</div>
								<div class="form-group">
                					<label>Start Date:</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input name="startdate" value="<?php echo date("m/d/Y", strtotime($projectdetail->startdate)); ?>" type="text" class="form-control pull-right datepicker" id="startdate">
									</div>
									<!-- /.input group -->
								</div>
								<div class="form-group">
                					<label>End Date:</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input name="enddate" value="<?php echo date("m/d/Y", strtotime($projectdetail->enddate)); ?>" type="text" class="form-control pull-right datepicker" id="enddate">
									</div>
									<!-- /.input group -->
								</div>
								<div class="form-group">
                					<label for="projectReadinessNAP">Readiness or NAP</label>
                					<select name="napstatus" class="form-control select2"  id="projectReadinessNAP" data-placeholder="Select Readiness or NAP" style="width: 100%;">
										<?php
                                            if (!empty($napstatuslist)) {
                                                foreach ($napstatuslist as $napstatus) {
                                                	if ($napstatus->ID == $projectdetail->napstatus) {
                                                		echo '<option value="'.$napstatus->ID.'" selected="selected">'.$napstatus->Name.'</option>';
                                                	} else {
                                                    	echo '<option value="'.$napstatus->ID.'">'.$napstatus->Name.'</option>';
                                                    }
                                                }
                                            } else {
                                                echo '<option disabled="" value="Null">No NAP Status</option>';
                                            }
                                        ?>
									</select>
								</div>
								<div class="form-group">
                					<label for="projectNAPType">Type of Readiness</label>
                					<select name="naptype" class="form-control select2"  id="projectNAPType" data-placeholder="Select Type of Readiness" style="width: 100%;">
										<?php
                                            if (!empty($naptypelist)) {
                                                foreach ($naptypelist as $naptype) {
                                                	if ($naptype->ID == $projectdetail->naptype) {
                                                		echo '<option value="'.$naptype->ID.'" selected="selected">'.$naptype->Name.'</option>';
                                                	} else {
                                                    	echo '<option value="'.$naptype->ID.'">'.$naptype->Name.'</option>';
                                                    }
                                                }
                                            } else {
                                                echo '<option disabled="" value="Null">No NAP Type</option>';
                                            }
                                        ?>
									</select>
								</div>
								<div class="form-group">
                					<label for="projectStatus">Project Status</label>
                					<select name="projectstatus" class="form-control select2"  id="projectStatus" data-placeholder="Select Project Status" style="width: 100%;">
										<?php
                                            if (!empty($statuslist)) {
                                                foreach ($statuslist as $status) {
                                                	if ($status->ID == $projectdetail->status) {
                                                		echo '<option value="'.$status->ID.'" selected="selected">'.$status->Name.'</option>';
                                                	} else {
                                                    	echo '<option value="'.$status->ID.'">'.$status->Name.'</option>';
                                                    }
                                                }
                                            } else {
                                                echo '<option disabled="" value="Null">No Project Status</option>';
                                            }
                                        ?>
									</select>
								</div>
								<input type="hidden" id="projectid" name="projectid" value="<?php echo $projectdetail->ID; ?>">
	              				<div class="box-footer">
	                				<button type="submit" class="btn btn-primary">Update Project</button>
	                				<button id="delete" type="button" class="btn btn-danger">Delete Project</button>
	              				</div>
				            </div>
				            <!-- /.box-body -->
				            <div class="hidden overlay">
			              		<i class="fa fa-refresh fa-spin"></i>
			            	</div>
						</div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
				</form>
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	
	<!-- page script -->
	<script>
	  $(function () {
	  	$('.form-validation').addClass('hidden')
	  	//Initialize Select2 Elements
    	$('.select2').select2()

    	//Date picker
	    $('.datepicker').datepicker({
	      	autoclose: true
	    })

	    $('#delete').click(function(){
	    	if (confirm("Are you sure?")) {
				//txt = "You pressed OK!";
				$.post('../delete', {a: $("#projectid").val()} , function(data) {
		    		var response = JSON.parse(data);
		    		if (response.status == 0) {
		    			alert(response);
		    		} else if (response.status == 1) {
		    			alert("Project Updated");
		    		} else if (response.status == 2) {
		    			alert("Project Deleted");
		    			window.location.replace("../");
		    		}
		    	});
			}
	    });

	    $('form.addproject').on('submit', function(form){
	    	$('.form-validation')
	    	//$('.overlay').removeClass('hidden')
	    	form.preventDefault();
	    	$('.form-validation').html(''); // Clear the validation field for new validation

	    	$.post('../update', $('form.addproject').serialize(), function(data) {
	    		var response = JSON.parse(data);
	    		if (response.status == 0) {
	    			alert(response);
	    		} else if (response.status == 1) {
	    			alert("Project Updated");
	    		}
	    	});
	    });

	    
	  })
	</script>