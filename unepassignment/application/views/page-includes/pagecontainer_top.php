<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<header class="main-header">
    	<!-- Logo -->
    	<a href="<?php echo base_url(); ?>" class="logo">
      		<!-- mini logo for sidebar mini 50x50 pixels -->
      		<span class="logo-mini"><b>UN</b> E</span>
  			<!-- logo for regular state and mobile devices -->
      		<span class="logo-lg"><b>UN</b> Environment</span>
    	</a>
    	<!-- Header Navbar: style can be found in header.less -->
    	<nav class="navbar navbar-static-top">
      		<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
      		</a>

      		<div class="navbar-custom-menu">
		        <ul class="nav navbar-nav">
		          	<!-- User Account: style can be found in dropdown.less -->
		          	<li class="dropdown user user-menu">
		            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		              		<img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="Robert Wafula">
		              		<span class="hidden-xs"><?php echo $userdetails[0]; ?></span>
		            	</a>
		            	<ul class="dropdown-menu">
		              		<!-- User image -->
		              		<li class="user-header">
			                	<img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="Robert Wafula">
				                <p>
				                	<?php echo $userdetails[0]; ?>
				                	<small><?php echo $userdetails[1]; ?></small>
				                </p>
		              		</li>
		              		<!-- Menu Body -->
		              		<li class="user-body">
		                		<div class="row">
		                  			<div class="col-xs-6 text-center">
		                    			<a href="#"><b>0</b> My Projects</a>
		                  			</div>
		                  			<div class="col-xs-6 text-center">
		                    			<a href="#"><b>0</b> Pending Actions</a>
		              				</div>
		                		</div>
		                		<!-- /.row -->
		              		</li>
		              		<!-- Menu Footer-->
		              		<li class="user-footer">
		                		<div class="pull-left">
		                  			<a href="#" class="btn btn-default btn-flat">My Profile</a>
		        				</div>
		                		<div class="pull-right">
		                  			<a href="#" class="btn btn-default btn-flat">Sign out</a>
		                		</div>
		              		</li>
		            	</ul>
		          	</li>
		        </ul>
      		</div>
    	</nav>
  	</header>
  	<!-- Left side column. contains the logo and sidebar -->
  	<aside class="main-sidebar">
    	<!-- sidebar: style can be found in sidebar.less -->
    	<section class="sidebar">
      		<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?php echo $userdetails[0]; ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
      		<!-- search form -->
      		<form action="#" method="get" class="sidebar-form">
        		<div class="input-group">
          			<input type="text" name="q" class="form-control" placeholder="Search...">
          			<span class="input-group-btn">
                		<button type="submit" name="search" id="search-btn" class="btn btn-flat">
                			<i class="fa fa-search"></i>
                		</button>
              		</span>
        		</div>
      		</form>
      		<!-- /.search form -->
      
      		<!-- sidebar menu: : style can be found in sidebar.less -->
      		<ul class="sidebar-menu" data-widget="tree">
        		<li class="header">MAIN NAVIGATION</li>
        		<!--<li class="treeview">
          			<a href="#">
            			<i class="fa fa-dashboard"></i> 
            			<span>Dashboard</span>
            			<span class="pull-right-container">
              				<i class="fa fa-angle-left pull-right"></i>
        				</span>
          			</a>
					<ul class="treeview-menu">
						<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
						<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
					</ul>	
        		</li>-->
        		<li>
					<a href="<?php echo base_url();?>projects">
						<i class="fa fa-th"></i> <span>Projects</span>
						<span class="pull-right-container">
							<small class="label pull-right bg-green">new</small>
						</span>
					</a>
				</li>
		        <li class="header">JSON API</li>
		        <li><a target="_blank" href="<?php echo base_url(); ?>api/projects/all"><i class="fa fa-circle-o text-red"></i> <span>All Projects</span></a></li>
		        <li><a target="_blank" href="<?php echo base_url(); ?>api/projects/country/sudan"><i class="fa fa-circle-o text-yellow"></i> <span>All Projects from Country</span></a></li>
		        <li><a target="_blank" href="<?php echo base_url(); ?>api/projects/status/under%20implementation"><i class="fa fa-circle-o text-aqua"></i> <span>All Projects by Status</span></a></li>
      		</ul>
    	</section>
    	<!-- /.sidebar -->
  	</aside>