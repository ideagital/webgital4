<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Ranking - RICO</title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="<?php echo SITE_ASSETS;?>/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo SITE_ASSETS;?>/vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo SITE_ASSETS;?>/vendor/themify-icons/themify-icons.min.css">
		<link href="<?php echo SITE_ASSETS;?>/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo SITE_ASSETS;?>/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo SITE_ASSETS;?>/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<!-- end: MAIN CSS -->
		<!-- start: CLIP-TWO CSS -->
		<link rel="stylesheet" href="<?php echo SITE_ASSETS;?>/css/styles.css">
		<link rel="stylesheet" href="<?php echo SITE_ASSETS;?>/css/plugins.css">
		<link rel="stylesheet" href="<?php echo SITE_ASSETS;?>/css/themes/theme-2.css" id="skin_color" />
		<!-- end: CLIP-TWO CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link href="<?php echo SITE_ASSETS;?>/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo SITE_ASSETS;?>/vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo SITE_ASSETS;?>/stylesheets/font-style.css" />
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="stylesheet" href="<?php echo SITE_ASSETS;?>/stylesheets/font-style.css">
	</head>
	<!-- end: HEAD -->
	<body>
		<div id="app">
			<!-- sidebar -->
			<?php include 'apps/_partials/sidebar.php';?>
			<!-- / sidebar -->
			<div class="app-content">
				<!-- start: TOP NAVBAR -->
				<?php include 'apps/_partials/header.php';?>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title" class="">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle"><span class="ti ti-settings"></span> Settings</h1>
									<span class="mainDescription">
									
									</span>
								</div>
								<?php include "apps/_partials/breadcrumb.php"; ?>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: DYNAMIC TABLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-6">
									<div class="list-group">
										<?php										
										$i=0;
										foreach ($positions as $key=>$result) {
										?>
											<a class="list-group-item
											<?php
											if($result['id'] == $position_id) echo 'active';
											?>" 
											href="<?php echo $site_url.'/settings/rank/'.$result['id'];?>">
												<?php echo $result['name'];?>
											</a>
										<?php
										}
										?>
										<a class="list-group-item
										<?php
										if($position_id == 'new') echo 'active';
										?>" 
										href="<?php echo $site_url.'/settings/rank/new';?>">
											<i><span class="ti ti-plus"></span> New Position</i>
										</a>
									</div>
								</div>
								<div class="col-md-6">
								<form role="form" action="<?php echo $site_url;?>/settings/rank/<?php echo $position_id;?>" method="post">
									<div class="panel panel-white">
										<div class="panel-heading">
											<h5 class="panel-title">
											<?php 
											if($position_id == 'new'){
											?>
												<i class="ti ti-plus"></i> New Position
												<input type="hidden" name="action" value="settings_positions_new">
											<?php
											}else{
											?>
												<i class="ti ti-pencil"></i> Edit : <?php echo $position['name'];?>
												<input type="hidden" name="action" value="settings_positions_edit">
												<input type="hidden" name="id" value="<?php echo $position['id'];?>">
											<?php
											}
											?>
											</h5>
										</div>
										<div class="panel-body">
												<div class="form-group">
													<label for="name">
														Position Name
													</label>
													<input type="text" name="name" class="form-control" id="name" placeholder="<?php echo $position['name'];?>" value="<?php echo $position['name'];?>" autofocus>
												</div>
												<div class="form-group">
													<label for="point">
														Point
													</label>
													<input type="number" name="point" class="form-control" id="point" placeholder="<?php echo $position['point'];?>" value="<?php echo $position['point'];?>" min="0">
												</div>
												<div class="row">
													<div class="col-xs-6 form-group">
														<label for="pool_percent">
															Percent of Pool Bonus 
														</label>
														<div class="input-group">
															<input type="number" name="pool_percent" class="form-control text-right" id="pool_percent" placeholder="<?php echo $position['pool_percent'];?>%" value="<?php echo $position['pool_percent'];?>" min="0" max="100">									
															<span class="input-group-addon btn-default btn-squared">%</span>
														</div>														
													</div>
													<div class="col-xs-6 form-group">
														<label for="pool_share">
															Level for Pool Bonus starting
														</label>
														<select id="pool_share" name="pool_share" class="form-control">
														<?php 
														for($i=1;$i<=5;$i++){
														?>
															<option value="<?php echo $i;?>"
															<?php
															if($position['pool_share'] == $i) echo "selected";
															?>
															>Level <?php echo $i;?></option>
														<?php
														}
														?>
														</select>
													</div>
												</div>
												<button type="submit" class="btn btn-block btn-primary">
													<i class="ti ti-save"></i> Save
												</button>
												<br>
												<p class="text-center">
													<a href="<?php echo $site_url;?>/settings/rank/<?php echo $position_id;?>/?action=settings_positions_delete" class="text-light"> Delete this Position</a>
												</p>
										</div>
									</div>
								</div>
							</form>
							</div>
						</div>
						<!-- end: DYNAMIC TABLE -->
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
			<?php include 'footer.php';?>
			<!-- end: FOOTER -->
			<!-- start: OFF-SIDEBAR -->
			<?php include 'off-sidebar.php';?>
			<!-- end: OFF-SIDEBAR -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="<?php echo SITE_ASSETS;?>/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo SITE_ASSETS;?>/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo SITE_ASSETS;?>/vendor/modernizr/modernizr.js"></script>
		<script src="<?php echo SITE_ASSETS;?>/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo SITE_ASSETS;?>/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="<?php echo SITE_ASSETS;?>/vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo SITE_ASSETS;?>/vendor/select2/select2.min.js"></script>
		<script src="<?php echo SITE_ASSETS;?>/vendor/DataTables/jquery.dataTables.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="<?php echo SITE_ASSETS;?>/assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="<?php echo SITE_ASSETS;?>/assets/js/table-data.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
