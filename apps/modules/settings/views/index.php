<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title><?php echo $site_title;?></title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: GOOGLE FONTS -->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<!-- end: GOOGLE FONTS -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="<?php echo SITE_ASSETS ;?>/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo SITE_ASSETS ;?>/vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo SITE_ASSETS ;?>/vendor/themify-icons/themify-icons.min.css">
		<link href="<?php echo SITE_ASSETS ;?>/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo SITE_ASSETS ;?>/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo SITE_ASSETS ;?>/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<!-- end: MAIN CSS -->
		<!-- start: CLIP-TWO CSS -->
		<link rel="stylesheet" href="<?php echo SITE_ASSETS ;?>/css/styles.css">
		<link rel="stylesheet" href="<?php echo SITE_ASSETS ;?>/css/plugins.css">
		<link rel="stylesheet" href="<?php echo SITE_ASSETS ;?>/css/themes/theme-2.css" id="skin_color" />
		<!-- end: CLIP-TWO CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<body>
		<div id="app">
			<!-- sidebar -->
			<?php include "apps/_partials/sidebar.php"; ?>
			<!-- / sidebar -->
			<div class="app-content">
				<!-- start: TOP NAVBAR -->
				<?php include "apps/_partials/header.php"; ?>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Starter Page</h1>
									<span class="mainDescription">Use this page to start from scratch and put your custom content</span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Pages</span>
									</li>
									<li class="active">
										<span>Blank Page</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: YOUR CONTENT HERE -->
						<!-- end: YOUR CONTENT HERE -->
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
			<?php include "apps/_partials/footer.php"; ?>
			<!-- end: FOOTER -->
			<!-- start: OFF-SIDEBAR -->
			<?php include "apps/_partials/off-sidebar.php"; ?>
			<!-- end: OFF-SIDEBAR -->
			<!-- start: SETTINGS -->
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="<?php echo SITE_ASSETS ;?>/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo SITE_ASSETS ;?>/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo SITE_ASSETS ;?>/vendor/modernizr/modernizr.js"></script>
		<script src="<?php echo SITE_ASSETS ;?>/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo SITE_ASSETS ;?>/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="<?php echo SITE_ASSETS ;?>/vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="<?php echo SITE_ASSETS ;?>/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
