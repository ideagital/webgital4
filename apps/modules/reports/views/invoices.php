<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Invoices Report</title>
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
									<h1 class="mainTitle">Invoices</h1>
									<span class="mainDescription"><?php echo  $invoices_count;?> Invoices</span>
								</div>
								<?php include "apps/_partials/breadcrumb.php";?>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<?php
						if($invoice_id == ''){
						?>
						<!-- start: YOUR CONTENT HERE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-striped table-hover" id="sample_1">
										<thead>
											<tr>
												<th class="text-center">Status</th>
												<th>Date</th>
												<th>Member</th>
												<th class="text-right">Total Price</th>
												<th class="text-center">Edit</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($invoices_total as $invoices) {
											?>
											<tr>
												<td class="text-center">
													<small>
														<span class="label label-sm 
														<?php
														if($invoices['status'] == 'success'){
															echo 'label-success';
														}elseif($invoices['status'] == 'pending'){
															echo 'label-warning';
														}elseif($invoices['status'] == 'cancel'){
															echo 'label-invert';
														}
														?>
														"><?php echo $invoices['status'];?></span>
													</small>
												</td>
												<td><?php echo $invoices['created_at'];?></td>
												<td><?php echo $invoices['fullname'];?></td>
												<td class="text-right"><?php echo $invoices['total_price'];?></td>
												<td class="text-center">
													<a href="<?php echo $site_url;?>/invoices/view/<?php echo $invoices['invoice_id'];?>" class="edit-row">
														<span class="ti ti-search"></span> View
													</a>
												</td>
											</tr>
											<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- end: STRIPED ROWS -->
						<!-- end: YOUR CONTENT HERE -->
						<?php
						}else{
						?>
						<div class="container-fluid container-fullw bg-white">
							<div class="panel panel-white" id="panel1">
								<div class="panel-body">
									<div class="invoice">
										<div class="row invoice-logo">
											<div class="col-xs-6 padding-top-30">
												<img src="http://www.ricooffice.com/global/assets/images/RICO.png" style="height:48px;">
											</div>
											<div class="col-xs-6">
												<p class="text-dark">
													<span class="">#<?php echo $invoice['invoice_id'];?></span>
													<small class="text-light"><?php echo $invoice['invoice_date'];?> </small>
												</p>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<h4>Client Detail</h4>
												<div class="well no-bg no-radius">
													<h4><strong class="text-dark sukhumvit-bold"><?php echo $invoice['member_fullname'];?></strong></h4>
													<div class="row">
														<div class="col-sm-6">
															<address>
																<?php echo $invoice['member_address'];?>
																<br>
																ประเทศไทย
															</address>
														</div>
														<div class="col-sm-6">
															<address>
																<strong title="Phone">Phone:</strong> <?php echo $invoice['member_phone'];?>
																<br>
																<strong class="text-dark">E-mail:</strong>
																<a href="mailto:<?php echo $invoice['member_email'];?>
																	">
																	<?php echo $invoice['member_email'];?>
																</a>
															</address>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-6 hidden">
												<h4>Payment Details:</h4>
												<ul class="list-unstyled invoice-details padding-bottom-30 padding-top-10 text-dark">
													<li>
														<strong>V.A.T Reg #:</strong> 233243444
													</li>
													<li>
														<strong>Account Name:</strong> Company Ltd
													</li>
													<li>
														<strong>SWIFT code:</strong> 1233F4343ABCDEW
													</li>
													<li>
														<strong>DATE:</strong> 01/01/2014
													</li>
													<li>
														<strong>DUE:</strong> 11/02/2014
													</li>
												</ul>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<h4>Order Detail</h4>
												<table class="table table-bordered margin-top-0 margin-bottom-0">
													<thead>
														<tr>
															<th class="text-center"> # </th>
															<th> Item </th>
															<th class="hidden-480"> Description </th>
															<th class="hidden-480"> Quantity </th>
															<th class="hidden-480"> Unit Cost </th>
															<th> Total </th>
														</tr>
													</thead>
													<tbody>
														<?php
														$i = 0;
														foreach($invoice['items'] as $items) :
														$i++;
														?>
														<tr>
															<td class="text-center"> <?php echo $i; ?> </td>
															<td> <?php echo $items['name']; ?> </td>
															<td class="hidden-480"> <?php echo $items['description'];?> </td>
															<td class="hidden-480"> <?php echo $items['amount'];?> </td>
															<td class="hidden-480"> ฿<?php echo $items['price'];?> </td>
															<td> ฿<?php echo $items['total_price'];?> </td>
														</tr>
														<?php
														endforeach;
														?>
													</tbody>
												</table>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12 invoice-block">
												<ul class="list-unstyled amounts text-small">
													<li>
														<strong>Sub-Total:</strong> ฿<?php echo $invoice['total_price'] - $vat;?>
													</li>
													<li>
														<strong>Discount:</strong> ฿<?php echo $discount;?>
													</li>
													<li>
														<strong>VAT:</strong> ฿<?php echo $vat;?>
													</li>
													<li class="text-extra-large text-dark margin-top-15">
														<strong>Total:</strong> ฿<?php echo $invoice['total_price'];?>
													</li>
												</ul>
												<br>
												<a onclick="javascript:window.print();" class="btn btn-default hidden-print">
													Print <i class="fa fa-print"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
						?>
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
