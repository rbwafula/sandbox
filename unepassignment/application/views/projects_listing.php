  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
    	<!-- Content Header (Page header) -->
    	<section class="content-header">
      		<h1>All Project</h1>
      		<ol class="breadcrumb">
        		<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li class="active">All Projects</li>
	      	</ol>
    	</section>

    	<!-- Main content -->
    	<section class="content">
      		<div class="row">
        		<div class="col-xs-12">
        			<div class="box">
						<div class="box-header">
							<h3 class="box-title">&nbsp;</h3> <a href="<?php echo base_url(); ?>projects/add" type="button" class="btn btn-success"><i class="fa fa-plus"></i> New Project</a>
						</div>
            			<!-- /.box-header -->
            			<div class="box-body">
              				<table id="projects" class="table table-bordered table-striped">
					            <thead>
						            <tr>
										<th>Project Ref</th>
										<th>Country</th>
										<th>Implementing Office</th>
										<th>Project Title</th>
										<th>Grant Amount (USD)</th>
										<th>Dates from GCF</th>
										<th>Start Date</th>
										<th>Duration (Months)</th>
										<th>End Date</th>
										<th>Readiness or NAP</th>
										<th>Type of readiness</th>
										<th>First Disbursement Amount</th>
										<th>Status</th>
                                        <th>&nbsp;</th>
						            </tr>
					            </thead>
                				<tbody>
                					<?php
                                        if (!empty($projectslist)) {
                                            foreach ($projectslist as $project) {
                                                echo '<tr>';
                                                echo    '<td><a href="'.base_url().'projects/view/'.$project->ID.'">'.$project->Reference.'</a></td>';
                                                echo    '<td>'.$project->Countries.'</td>';
                                                echo    '<td>'.$project->ImplementingOffice.'</td>';
                                                echo    '<td><a href="'.base_url().'projects/view/'.$project->ID.'">'.$project->Title.'</a></td>';
                                                echo    '<td>'.$project->GrantAmount.'</td>';
                                                echo    '<td>'.date("d M Y", strtotime($project->gcfdate)).'</td>';
                                                echo    '<td>'.date("d M Y", strtotime($project->startdate)).'</td>';
                                                echo 	'<td>'.(abs( (date('Y', strtotime($project->enddate)) - date('Y', strtotime($project->startdate)))*12 + (date('m', strtotime($project->enddate)) - date('m', strtotime($project->startdate))))+0).'</td>';
                                                echo    '<td>'.date("d M Y", strtotime($project->enddate)).'</td>';
                                                echo    '<td>'.$project->napstatus.'</td>';
                                                echo    '<td>'.$project->naptype.'</td>';
                                                echo    '<td>'.$project->firstdisbursement.'</td>';
                                                echo    '<td>'.$project->status.'</td>';
                                                echo    '<td><div class="btn-group"><a href="'.base_url().'projects/view/'.$project->ID.'" class="btn btn-sm btn-primary">Edit</a><button id="'.$project->ID.'" class="btn btn-sm btn-danger delete">Delete</button></div></td>'; 
                                                echo '</tr>';
                                            }
                                        }
                                    ?>
                				</tbody>
              				</table>
			            </div>
			            <!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- page script -->
	<script>
	  $(function () {
        $('.delete').click(function(){
            if (confirm("Are you sure?")) {
                $.post('delete', {a: $(this).attr("id")} , function(data) {
                    var response = JSON.parse(data);
                    if (response.status == 0) {
                        alert(response);
                    } else if (response.status == 1) {
                        alert("Project Updated");
                    } else if (response.status == 2) {
                        alert("Project Deleted");
                        window.location.reload();
                    }
                });
            }
        });


	  	$('#projects').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                /*{extend: 'csv'},*/
                {extend: 'excel', title: 'Projects Listing'},
                {extend: 'pdf', title: 'Projects Listing'},
                {extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                        $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                    }
                }
            ]

        });
	  })
	</script>