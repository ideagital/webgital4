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
		<link href="<?php echo SITE_ASSETS ;?>/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo SITE_ASSETS ;?>/vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
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
									<h1 class="mainTitle">Packages</h1>
									<span class="mainDescription">4 Package</span>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Product</span>
									</li>
									<li class="active">
										<span>Packages</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: DYNAMIC TABLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-5">
									
									<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
										<thead>
											<tr>
												<th>Browser</th>
												<th class="hidden-xs">Creator</th>
												<th>Cost (
												USD)</th>
												<th class="hidden-xs"> Software license</th>
												<th>Current
												layout engine</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Amaya</td>
												<td class="hidden-xs">W3C,
												INRIA</td>
												<td>Free</td>
												<td class="hidden-xs">W3C</td>
												<td>Amaya</td>
											</tr>
											<tr>
												<td>AOL Explorer</td>
												<td class="hidden-xs">America Online, Inc</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Trident</td>
											</tr>
											<tr>
												<td>Arora</td>
												<td class="hidden-xs">Benjamin C. Meyer</td>
												<td>Free</td>
												<td class="hidden-xs">GPL</td>
												<td>WebKit</td>
											</tr>
											<tr>
												<td>Avant</td>
												<td class="hidden-xs">Avant Force</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Tri-engine</td>
											</tr>
											<tr>
												<td>Camino</td>
												<td class="hidden-xs">The Camino Project</td>
												<td>Free</td>
												<td class="hidden-xs">tri-license</td>
												<td>Gecko</td>
											</tr>
											<tr>
												<td>Chromium</td>
												<td class="hidden-xs">Google</td>
												<td>Free</td>
												<td class="hidden-xs">BSD</td>
												<td>WebKit</td>
											</tr>
											<tr>
												<td>Dillo</td>
												<td class="hidden-xs">The Dillo team</td>
												<td>Free</td>
												<td class="hidden-xs">GPL</td>
												<td>Dillo</td>
											</tr>
											<tr>
												<td>Dooble</td>
												<td class="hidden-xs">Dooble Team</td>
												<td>Free</td>
												<td class="hidden-xs">GPL</td>
												<td>WebKit</td>
											</tr>
											<tr>
												<td>ELinks</td>
												<td class="hidden-xs">Baudis, Fonseca, <i>et al.</i></td>
												<td>Free</td>
												<td class="hidden-xs">GPL</td>
												<td>built-in</td>
											</tr>
											<tr>
												<td>Web</td>
												<td class="hidden-xs">Marco Pesenti Gritti</td>
												<td>Free</td>
												<td class="hidden-xs">GPL</td>
												<td>WebKit</td>
											</tr>
											<tr>
												<td>Flock</td>
												<td class="hidden-xs">Flock Inc</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>WebKit</td>
											</tr>
											<tr>
												<td>Galeon</td>
												<td class="hidden-xs">Marco Pesenti Gritti</td>
												<td>Free</td>
												<td class="hidden-xs">GPL</td>
												<td>Gecko</td>
											</tr>
											<tr>
												<td>Google Chrome</td>
												<td class="hidden-xs">Google</td>
												<td>Free</td>
												<td class="hidden-xs">Google Chrome Terms of Service</td>
												<td>Blink</td>
											</tr>
											<tr>
												<td>GNU IceCat</td>
												<td class="hidden-xs">GNU</td>
												<td>Free</td>
												<td class="hidden-xs">MPL</td>
												<td>Gecko</td>
											</tr>
											<tr>
												<td>iCab</td>
												<td class="hidden-xs">Alexander Clauss</td>
												<td>$20 (Pro)</td>
												<td class="hidden-xs">Proprietary</td>
												<td>WebKit</td>
											</tr>
											<tr>
												<td>Internet Explorer</td>
												<td class="hidden-xs">Microsoft,
												<br>
												Spyglass</td>
												<td>comes with Windows</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Trident</td>
											</tr>
											<tr>
												<td>Internet Explorer for Mac (terminated)</td>
												<td class="hidden-xs">Microsoft</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Tasman</td>
											</tr>
											<tr>
												<td>K-Meleon</td>
												<td class="hidden-xs">Dorian, KKO, <i>et al.</i></td>
												<td>Free</td>
												<td class="hidden-xs">GPL</td>
												<td>Gecko</td>
											</tr>
											<tr>
												<td>Konqueror</td>
												<td class="hidden-xs">KDE</td>
												<td>Free</td>
												<td class="hidden-xs">GPL</td>
												<td>KHTML</td>
											</tr>
											<tr>
												<td>Links</td>
												<td class="hidden-xs">Patocka, <i>et al.</i></td>
												<td>Free</td>
												<td class="hidden-xs">GPL</td>
												<td>built-in</td>
											</tr>
											<tr>
												<td>Lunascape</td>
												<td class="hidden-xs">Lunascape Corporation</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Tri-engine</td>
											</tr>
											<tr>
												<td>Lynx</td>
												<td class="hidden-xs">Montulli, Grobe, Rezac, <i>et al.</i></td>
												<td>Free</td>
												<td class="hidden-xs">GPL</td>
												<td>built-in</td>
											</tr>
											<tr>
												<td>Maxthon</td>
												<td class="hidden-xs">Maxthon International Limited</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Trident</td>
											</tr>
											<tr>
												<td>Midori</td>
												<td class="hidden-xs">Christian Dywan, et al.</td>
												<td>Free</td>
												<td class="hidden-xs">LGPL</td>
												<td>WebKit</td>
											</tr>
											<tr>
												<td>Mosaic</td>
												<td class="hidden-xs">Marc Andreessen and
												Eric Bina,
												NCSA</td>
												<td>non-commercial use</td>
												<td class="hidden-xs">Proprietary</td>
												<td>built-in</td>
											</tr>
											<tr>
												<td>Mozilla Application Suite</td>
												<td class="hidden-xs">Mozilla Foundation</td>
												<td>Free</td>
												<td class="hidden-xs">tri-license</td>
												<td>Gecko</td>
											</tr>
											<tr>
												<td>Mozilla Firefox</td>
												<td class="hidden-xs">Mozilla Foundation</td>
												<td>Free</td>
												<td class="hidden-xs">MPL</td>
												<td>Gecko</td>
											</tr>
											<tr>
												<td>Netscape (v.6-7) </td>
												<td class="hidden-xs">Netscape Communications Corporation,
												AOL</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Gecko</td>
											</tr>
											<tr>
												<td>Netscape Browser (v.8)[note 2]</td>
												<td class="hidden-xs">Mercurial Communications for
												AOL</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Gecko, Trident</td>
											</tr>
											<tr>
												<td>Netscape Communicator (v.4)[note 2]</td>
												<td class="hidden-xs">Netscape Communications</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Mosaic</td>
											</tr>
											<tr>
												<td>Netscape Navigator (v.1-4)[note 2]</td>
												<td class="hidden-xs">Netscape Communications</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Mosaic</td>
											</tr>
											<tr>
												<td>Netscape Navigator 9[note 2]</td>
												<td class="hidden-xs">Netscape Communications
												<br>
												(division of AOL)</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Gecko</td>
											</tr>
											<tr>
												<td>NetSurf</td>
												<td class="hidden-xs">The NetSurf Developers</td>
												<td>Free</td>
												<td class="hidden-xs">GPL</td>
												<td>NetSurf built-in</td>
											</tr>
											<tr>
												<td>OmniWeb</td>
												<td class="hidden-xs">The Omni Group</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>WebKit</td>
											</tr>
											<tr>
												<td>Opera</td>
												<td class="hidden-xs">Opera Software</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Presto</td>
											</tr>
											<tr>
												<td>Opera Mobile</td>
												<td class="hidden-xs">Opera Software</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Presto</td>
											</tr>
											<tr>
												<td>Origyn Web Browser</td>
												<td class="hidden-xs">Sand-labs</td>
												<td>Free</td>
												<td class="hidden-xs">BSD</td>
												<td>WebKit</td>
											</tr>
											<tr>
												<td>QupZilla</td>
												<td class="hidden-xs">David Rosca</td>
												<td>Free</td>
												<td class="hidden-xs">GNU GPLv3</td>
												<td>WebKit</td>
											</tr>
											<tr>
												<td>Safari</td>
												<td class="hidden-xs">Apple Inc.</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>WebKit</td>
											</tr>
											<tr>
												<td>SeaMonkey</td>
												<td class="hidden-xs">SeaMonkey Council</td>
												<td>Free</td>
												<td class="hidden-xs">tri-license</td>
												<td>Gecko</td>
											</tr>
											<tr>
												<td>Shiira</td>
												<td class="hidden-xs">Happy Macintosh Developing Team</td>
												<td>Free</td>
												<td class="hidden-xs">BSD</td>
												<td>WebKit</td>
											</tr>
											<tr>
												<td>Sleipnir</td>
												<td class="hidden-xs">Fenrir Inc.</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Trident</td>
											</tr>
											<tr>
												<td>Torch Browser</td>
												<td class="hidden-xs">Torch Media</td>
												<td>Free</td>
												<td class="hidden-xs">Proprietary</td>
												<td>Webkit</td>
											</tr>
											<tr>
												<td>Uzbl</td>
												<td class="hidden-xs">Dieter Plaetinck</td>
												<td>Free</td>
												<td class="hidden-xs">GNU GPLv3</td>
												<td>Webkit</td>
											</tr>
											<tr>
												<td>WorldWideWeb (Later renamed Nexus)</td>
												<td class="hidden-xs">Tim Berners-Lee</td>
												<td>Free</td>
												<td class="hidden-xs">Public domain</td>
												<td>NeXTSTEP built-in</td>
											</tr>
											<tr>
												<td>w3m</td>
												<td class="hidden-xs">Akinori Ito</td>
												<td>Free</td>
												<td class="hidden-xs">MIT</td>
												<td>-</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-7">
									<h5 class="over-title margin-bottom-15">Edit <span class="text-bold">Rows</span></h5>
									<div class="row">
										<div class="col-md-12 space20">
											<button class="btn btn-green add-row">
												Add New <i class="fa fa-plus"></i>
											</button>
										</div>
										<p>
											DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.
										</p>
									</div>
									<div class="table-responsive">
										<table class="table table-striped table-hover" id="sample_2">
											<thead>
												<tr>
													<th>Full Name</th>
													<th>Role</th>
													<th>Phone</th>
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Peter Clark</td>
													<td>UI Designer</td>
													<td>(641)-734-4763</td>
													<td>
													<a href="#" class="edit-row">
														Edit
													</a></td>
													<td>
													<a href="#" class="delete-row">
														Delete
													</a></td>
												</tr>
												<tr>
													<td>Nicole Bell</td>
													<td>Content Designer</td>
													<td>(741)-034-4573</td>
													<td>
													<a href="#" class="edit-row">
														Edit
													</a></td>
													<td>
													<a href="#" class="delete-row">
														Delete
													</a></td>
												</tr>
												<tr>
													<td>Steven Thompson</td>
													<td>Visual Designer</td>
													<td>(471)-543-4073</td>
													<td>
													<a href="#" class="edit-row">
														Edit
													</a></td>
													<td>
													<a href="#" class="delete-row">
														Delete
													</a></td>
												</tr>
												<tr>
													<td>Ella Patterson</td>
													<td>Web Editor</td>
													<td>(799)-994-9999</td>
													<td>
													<a href="#" class="edit-row">
														Edit
													</a></td>
													<td>
													<a href="#" class="delete-row">
														Delete
													</a></td>
												</tr>
												<tr>
													<td>Kenneth Ross</td>
													<td>Senior Designer</td>
													<td>(111)-114-1173</td>
													<td>
													<a href="#" class="edit-row">
														Edit
													</a></td>
													<td>
													<a href="#" class="delete-row">
														Delete
													</a></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
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
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo SITE_ASSETS ;?>/vendor/select2/select2.min.js"></script>
		<script src="<?php echo SITE_ASSETS ;?>/vendor/DataTables/jquery.dataTables.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="<?php echo SITE_ASSETS ;?>/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="<?php echo SITE_ASSETS ;?>/js/table-data.js"></script>
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
