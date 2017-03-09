<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Members - RICO</title>
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
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link href="<?php echo $site_assets;?>/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo $site_assets;?>/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo $site_assets;?>/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo $site_assets;?>/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: CLIP-TWO CSS -->
        <link rel="stylesheet" href="<?php echo $site_assets;?>/css/styles.css">
        <link rel="stylesheet" href="<?php echo $site_assets;?>/css/plugins.css">
        <link rel="stylesheet" href="<?php echo $site_assets;?>/css/themes/theme-2.css" id="skin_color" />
        <link href="<?php echo $site_assets;?>/vendor/sweetalert/sweet-alert.css" rel="stylesheet" media="screen">
        <link href="<?php echo $site_assets;?>/vendor/toastr/toastr.min.css" rel="stylesheet" media="screen">

        <!-- start: MAIN CSS -->
        <link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/DataTables/css/DT_bootstrap.css" media="screen">
        <link rel="stylesheet" href="<?php echo $site_assets;?>/fonts/font-style.css" type="text/css" media="all"  />
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>
    <!-- end: HEAD -->
    <body>
        <div id="app">
            <?php include 'apps/_partials/sidebar.php';?>
            <div class="app-content">
                <?php include 'apps/_partials/header.php';?>
                <div class="main-content" >
                    <div class="wrap-content container" id="container">
                        <!-- start: PAGE TITLE -->
                        <section id="page-title">
            							<div class="row">
            								<div class="col-sm-8">
            									<h1 class="mainTitle">Register</h1>
            								</div>
            								<ol class="breadcrumb">
            									<li>
            										<span>Member</span>
            									</li>
            									<li class="active">
            										<span>Register</span>
            									</li>
            								</ol>
            							</div>
            						</section>

                        <!-- end: PAGE TITLE -->
                        <!-- start: FORM VALIDATION EXAMPLE 1 -->
            						<div class="container-fluid container-fullw bg-white">
            							<div class="row">
            								<div class="col-md-12">
            									<form  method="post" role="form" action="">
            										<div class="row">
            											<div class="col-md-6">
                                    <legend>
                                      Personal Information
                                    </legend>
                                    <div class="form-group">
                                      <label class="control-label">
                                        Username <span class="symbol required"></span>
                                      </label>
                                      <input type="text" class="form-control" id="username" name="username" required="required">
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                													<label class="control-label">
                														First Name <span class="symbol required"></span>
                													</label>
                													<input type="text" class="form-control" id="firstname" name="firstname" required="required">
                												</div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                													<label class="control-label">
                														Last Name <span class="symbol required"></span>
                													</label>
                													<input type="text" class="form-control" id="lastname" name="lastname" required="required">
                												</div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                													<label class="control-label">
                														Gender <span class="symbol required"></span>
                													</label>
                													<div class="clip-radio radio-primary">
                														<input type="radio" value="f" name="gender" id="gender_female">
                														<label for="gender_female">
                															Female
                														</label>
                														<input type="radio" value="m" name="gender" id="gender_male">
                														<label for="gender_male">
                															Male
                														</label>
                													</div>
                												</div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label">
                                          Birth of Date <span class="symbol required"></span>
                                        </label>
              													<!-- <h5 class="text-bold margin-top-25 margin-bottom-15">Input</h5> -->
              													<div class="form-group">
              														<input class="form-control datepicker" type="text">
              													</div>
              												</div>
                                    </div>


                                    <div class="form-group">
            													<label class="control-label">
            														National ID Card <span class="symbol required"></span>
            													</label>
            													<input type="text" class="form-control" id="national_id" name="national_id" required="required">
            												</div>
            												<div class="form-group">
            													<label class="control-label">
            														Email Address <span class="symbol required"></span>
            													</label>
            													<input type="email" placeholder="your@mail.com" class="form-control" id="email" name="email" required="required">
            												</div>
                                    <div class="form-group">
            													<label class="control-label">
            														Mobile Phone <span class="symbol required"></span>
            													</label>
            													<input type="text" class="form-control" id="phone" name="phone" required="required">
            												</div>


            											</div>

            											<div class="col-md-6">
                                    <div class="row">
                                      <legend>
        																Address
        															</legend>

            													<div class="col-md-4">
            														<div class="form-group">
            															<label class="control-label">
            																Country  <span class="symbol required"></span>
            															</label>
                                          <select class="js-example-basic-single js-states form-control" name="country" id="country">
                                            <?php foreach ($arr_country AS $country){?>
                                            <option value="<?php echo $country['country_code'];?>"><?php echo $country['country'];?></option>
                                            <?php }; ?>
                                          </select>
            														</div>
            													</div>
            													<div class="col-md-8">
            														<div class="form-group">
            															<label class="control-label">
            																Address <span class="symbol required"></span>
            															</label>
            															<input class="form-control tooltips" type="text" name="address" id="address">
            														</div>
            													</div>
                                      <div class="col-md-8">
            														<div class="form-group">
            															<label class="control-label">
            																Sub District <span class="symbol required"></span>
            															</label>
            															<input class="form-control" type="text" name="subdistrict_id" id="subdistrict_id">
            														</div>
            													</div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="control-label">
                                            Zip Code <span class="symbol required"></span>
                                          </label>
                                          <input class="form-control" type="text" name="zipcode" id="zipcode">
                                        </div>
                                      </div>
            												</div>

                                    <legend>
                                      Business Info
                                    </legend>


                                    <div class="form-group">
            													<label class="control-label">
            														Sponsor<span class="symbol required"></span>
            													</label>
                                      <select class="js-example-basic-single js-states form-control" name="sponsor">
                                        <option value="0">Select Sponsor</option>
                                        <?php foreach ($arr_sponsor AS $sponsor){?>
                                        <option value="<?php echo $sponsor['id'];?>"><?php echo $sponsor['username'];?></option>
                                        <?php }; ?>
                                      </select>
            												</div>
                                    <div class="form-group">
            													<label class="control-label">
            														Upline<span class="symbol required"></span>
            													</label>
                                      <select class="js-example-basic-single js-states form-control" name="upline">
                                        <option value="0">Select Upline</option>
                                        <?php foreach ($arr_sponsor AS $sponsor){?>
                                        <option value="<?php echo $sponsor['id'];?>"><?php echo $sponsor['username'];?></option>
                                        <?php }; ?>
                                      </select>
            												</div>

                                    <div class="form-group">
            													<label class="control-label">
            														Position <span class="symbol required"></span>
            													</label>
            													<div class="clip-radio radio-primary">
            														<input type="radio" value="L" name="placement" id="left">
            														<label for="left">
            															Left
            														</label>
            														<input type="radio" value="R" name="placement" id="right">
            														<label for="right">
            															Right
            														</label>
            													</div>
            												</div>
            											</div>
            										</div>
            										<div class="row">
            											<div class="col-md-12">
            											</div>
            										</div>
            										<div class="row">
            											<div class="col-md-8">
            											</div>
            											<div class="col-md-4">
                                    <input type="hidden" name="action" value="add">
            												<input class="btn btn-primary btn-wide pull-right" value="Register" type="submit">
            											</div>
            										</div>
            									</form>
            								</div>
            							</div>
            						</div>
            						<!-- end: FORM VALIDATION EXAMPLE 1 -->
                        <!-- end: YOUR CONTENT HERE -->
                    </div>
                </div>
            </div>
            <?php include 'apps/_partials/footer.php';?>
        </div>


        <!-- start: MAIN JAVASCRIPTS -->
    		<script src="<?php echo $site_assets;?>/vendor/jquery/jquery.min.js"></script>
    		<script src="<?php echo $site_assets;?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    		<script src="<?php echo $site_assets;?>/vendor/modernizr/modernizr.js"></script>
    		<script src="<?php echo $site_assets;?>/vendor/jquery-cookie/jquery.cookie.js"></script>
    		<script src="<?php echo $site_assets;?>/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    		<script src="<?php echo $site_assets;?>/vendor/switchery/switchery.min.js"></script>
    		<!-- end: MAIN JAVASCRIPTS -->
    		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    		<script src="<?php echo $site_assets;?>/vendor/maskedinput/jquery.maskedinput.min.js"></script>
    		<script src="<?php echo $site_assets;?>/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    		<script src="<?php echo $site_assets;?>/vendor/autosize/autosize.min.js"></script>
    		<script src="<?php echo $site_assets;?>/vendor/selectFx/classie.js"></script>
    		<script src="<?php echo $site_assets;?>/vendor/selectFx/selectFx.js"></script>
    		<script src="<?php echo $site_assets;?>/vendor/select2/select2.min.js"></script>
    		<script src="<?php echo $site_assets;?>/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    		<script src="<?php echo $site_assets;?>/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <script src="<?php echo $site_assets;?>/vendor/toastr/toastr.min.js"></script>
    		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

        <!-- start: CLIP-TWO JAVASCRIPTS -->
        <script src="<?php echo $site_assets;?>/js/main.js"></script>
        <!-- start: JavaScript Event Handlers for this page -->
        <script src="<?php echo $site_assets;?>/js/form-validation.js"></script>
        <script src="<?php echo $site_assets;?>/js/ui-notifications.js"></script>
        <script src="<?php echo $site_assets;?>/js/form-elements.js"></script>

        <?php if(isset($_SESSION['flash']['type'])){ $msg = $_SESSION['flash']['msg'] ?>
            <?php if($_SESSION['flash']['type']=='success') {?>
              <script>
                  $(document).ready(function() {
                  var Message = '<?=$msg?>' ;
                  toastr.success(Message);
                  });
              </script>
            <?php } else if ($_SESSION['flash']['type']=='danger') { ?>
              <script>
                  $(document).ready(function() {
                  var Message = '<?=$msg?>' ;
                  toastr.error(Message);
                  });
              </script>
            <?php } else { ?><div></div><?php } ?>
        <?php } ?>

    		<script>
    			jQuery(document).ready(function() {
    				Main.init();
    				FormElements.init();
    			});
    		</script>

        <script>
          jQuery(document).ready(function() {
            Main.init();
            FormValidator.init();
          });
        </script>
        
        <script>
          jQuery(document).ready(function() {
            Main.init();
            UINotifications.init();
          });
        </script>

    </body>
</html>
