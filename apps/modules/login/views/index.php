<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
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
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/themify-icons/themify-icons.min.css">
		<link href="<?php echo $site_assets;?>/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo $site_assets;?>/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo $site_assets;?>/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<!-- end: MAIN CSS -->
		<!-- start: CLIP-TWO CSS -->
		<link rel="stylesheet" href="<?php echo $site_assets;?>/css/styles.css">
		<link rel="stylesheet" href="<?php echo $site_assets;?>/css/plugins.css">
		<link rel="stylesheet" href="<?php echo $site_assets;?>/css/themes/theme-2.css" id="skin_color" />
		<!-- end: CLIP-TWO CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $site_assets;?>/stylesheets/font-style.css" />
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login bg-black">
		<!-- start: LOCK SCREEN -->
		<div class="row">
			<div class="lock-screen">
				<div class="box-ls">
					<img alt="" src="<?php echo $site_assets;?>/images/RICO-White.png" class="<?php echo $site_name;?>" style="height:60px;"/>
					<div class="user-info">
						<br>
						<h4 class="text-white">Administrator</h4>
						<span></span><br>
						<form name="login-form" method="post" action="login">
						<p>
							<div class="input-group">
								<span class="input-group-btn">
									<div class="btn btn-default">
										<i class="ti ti-user"></i>
									</div>
								</span>
								<input type="text" name="input[username]" placeholder="Username" class="form-control" autofocus="autofocus">
							</div>
						</p>
						<p>
							<div class="input-group">
								<span class="input-group-btn">
									<div class="btn btn-default">
										<i class="ti ti-lock"></i>
									</div>
								</span>
								<input type="password" name="input[password]" placeholder="Password" class="form-control">
							</div>
						</p>
						<p>
							<button type="submit" class="btn btn-light-red btn-block">Login</button>
						</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div style="position:fixed;bottom:0px;right:20px;">
			<?php include 'apps/_partials/footer.php';?>
		</div>

		<!-- end: LOCK SCREEN -->
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="<?php echo $site_assets;?>/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo $site_assets;?>/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo $site_assets;?>/vendor/modernizr/modernizr.js"></script>
		<script src="<?php echo $site_assets;?>/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo $site_assets;?>/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="<?php echo $site_assets;?>/vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo $site_assets;?>/vendor/jquery-validation/jquery.validate.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="<?php echo $site_assets;?>/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="<?php echo $site_assets;?>/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
	<!-- end: BODY -->
</html>
