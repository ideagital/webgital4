<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <title>POS - RICO</title>
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- start: MAIN CSS -->
        <link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/themify-icons/themify-icons.min.css">
        <link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/animate.css/animate.min.css" media="screen">
        <link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/perfect-scrollbar/perfect-scrollbar.min.css" media="screen">
        <link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/switchery/switchery.min.css" media="screen">
        <!-- start: CLIP-TWO CSS -->
        <link rel="stylesheet" href="<?php echo $site_assets;?>/css/styles.css">
        <link rel="stylesheet" href="<?php echo $site_assets;?>/css/plugins.css">
        <link rel="stylesheet" href="<?php echo $site_assets;?>/css/themes/theme-2.css" id="skin_color" />
        <!-- end: CLIP-TWO CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/select2/select2.min.css" media="screen">
        <link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/DataTables/css/DT_bootstrap.css" media="screen">
        <link rel="stylesheet" href="<?php echo $site_assets;?>/fonts/font-style.css" type="text/css" media="all"  />        
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>
    <body>
        <div id="app">
            <?php include 'apps/_partials/sidebar.php';?>
            <div class="app-content">
            <?php include 'apps/_partials/header.php';?>
                <div class="main-content" >
	                <div class="wrap-content container" id="container" style="padding: 15px">
	                    <div class="row">
		                    <div class="col-lg-7">
						
								<section class="panel panel-white">
									<form action="" method="post">
			                        <header class="panel-heading border-light" >
										<div class="form-group">
											<label class="col-sm-3 control-label"><i class="fa fa-shopping-cart"></i> Basket Items</label>
											<div class="col-sm-6">
												<input type="text" class="form-control input-sm" placeholder="Barcode" name="product_barcode" autofocus>
												<span class="input-group-btn">
													<button class="btn btn-success" type="submit" style="display:none;"> </button>
													<input type="hidden" name="action" value="basket_add_barcode">
													<input type="hidden" name="product_qty" value="1">
													<input type="hidden" name="member_id" value="<?php echo $member_id;?>">
												</span>
											</div>
										</div>
										<div style="height:10px;">&nbsp;</div>
			                        </header>
									</form>
			                        <div class="panel-body" style="background: #fff">
									<?php
									if(count($basket) > 0) : 
									?>
			                            <table class="table table-striped table-hover no-footer">
			                                <thead>
			                                <tr>
			                                    <th>#</th>
			                                    <th>Product</th>
			                                    <th class="text-right">Qty</th>
			                                    <th class="text-right">Total PV</th>
			                                    <th class="text-right">Total Price</th>
			                                    <th></th>
			                                </tr>
			                                </thead>
			                                <tbody>
											<?php
											$number = 1;
											$total_price = '';
											$total_pv = '';
											foreach($basket as $product_id => $product_qty) : 
											$productAll = $posDetail->productAll("WHERE id='$product_id'");
											foreach($productAll AS $product) : endforeach; 
											$product_id=$product['id'];
											
											if($member_id=="") : $price=$product['price']*$basket["$product_id"];
											else : $price=$product['price_member']*$basket["$product_id"];
											endif;
											
											$total_price+=$price;
											
											$pv=$product['point']*$basket["$product_id"];
											$total_pv+=$pv;
											?>
			                                <tr>
			                                    <td><?php echo $number;?></td>
			                                    <td><?php echo $product['name'];?><br></td>
			                                    <td align="right">
													<a class="btn-link" id="ChangeQTYof<?php echo $product_id;?>" onclick="ShowHide('QTYof<?php echo $product_id;?>','ChangeQTYof<?php echo $product_id;?>')" style="cursor:pointer"><?php echo $basket[$product_id];?></a>
													<div id="QTYof<?php echo $product_id;?>" style="display:none;">
																<select id="<?php echo $product_id.'Qty';?>" class="form-control" >
																<?php for( $i=1; $i<100; $i++) : ?>
			                                                        <option href="<?php $site_url;?>/pos?action=basket_add&product_id=<?php echo $product['id'];?>&product_qty=<?php echo $i;?>&member_id=<?php echo $member_id;?>" <? if($basket[$product_id]==$i){ echo "selected";} ?> ><?php echo $i;?>
			                                                        </option>
																<?php endfor; ?>
			                                                    </select> 
																<script>
																		document.postElementById('<?php echo $product_id.'Qty';?>').onchange = function() {
																			window.location.href = this.children[this.selectedIndex].postAttribute('href');
																		}
																</script>
													</div>
												</td>
			                                    <td align="right"><?php echo number_format($product['point']*$basket[$product_id],2);?></td>
			                                    <td align="right"><?php echo number_format($price,2);?></td>
			                                    <td align="center"><a class="close-btn" onclick="<?php echo $product_id.'del';?>" href="pos?action=basket_delete&product_id=<?php echo $product['id'];?>&member_id=<?php echo $member_id;?>"><i class="fa fa-trash-o"></i></a> </td>
			                                </tr>
											<?php
											$number++;
											endforeach; // endforeach basket product
											?>
											<tr id="GiveDiscountBtn">
												<td align="right" colspan="4"><b>Discount :</b></td>
												<td align="right">
													<a class="btn-link"  onclick="ShowHide('GiveDiscount','GiveDiscountBtn')" style="cursor:pointer">
													<?php
													if(isset($_REQUEST['discount'])) :
														$discount=$_REQUEST['discount'];
														echo number_format($discount,2);
													else : echo $discount=0; endif;
													$net_total=$total_price-$discount;
													?>
													</a>
												</td>
												<td></td>
											</tr>
											<form action="#" method="post">
											<tr id="GiveDiscount" style="display:none;">
												<td align="right" colspan="4"><b>Discount :</b></td>
												<td align="right">
													<input  onClick="this.select();"  onkeydown="ShowHide('GiveDiscountSubmit','')" class="form-control input-sm text-right" name="discount" value="<?php echo $discount;?>" style="width:80px;">
												</td>
												<td align="center">
													<button id="GiveDiscountSubmit" type="submit" class="btn btn-primary btn-sm" style="display:none;">OK</button>
													<input type="hidden" name="member_id" value="<?php echo $member_id;?>">
												</td>
											</tr>
											</form>
											<tr>
												<td align="right" colspan="4"><b>Net Total :</b></td>
												<td align="right"><b><?php echo number_format($net_total,2);?></b></td>
												<td></td>
											</tr>
			                                </tbody>
			                            </table>
									<?php else : ?>
										<div class="alert alert-warning fade in">
			                                <button data-dismiss="alert" class="close close-sm" type="button">
			                                    <i class="fa fa-times"></i>
			                                </button>
			                                <strong>Warning!</strong> The Basket is empty.
			                            </div>
									<?php endif; // Endif check count basket ?>
			                        </div>
									
			                    </section>	<!-- end Section panel -->
			                    <div class="panel-group accordion" id="accordion">
			                    <?php
								foreach($arrCategory AS $category) : 
								$category_id = $category['id'];
								$category_na = $category['category'];
								?>
									<div class="panel panel-white">
										<div class="panel-heading">
											<h5 class="panel-title">
											<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#cat-<?php echo $category_id;?>">
												<i class="icon-arrow"></i> <?php echo $category_na;?>
											</a></h5>
										</div>
										<div id="cat-<?php echo $category_id;?>" class="panel-collapse collapse">
											<div class="panel-body">
												<ul class="nav nav-pills nav-stacked">
												<?php
												$productCategory = $posDetail->productCategory("'%[".$category_id."]%' ORDER BY name");
												foreach($productCategory AS $products) : $product_id = $products['id'];
												$picture = $posDetail->productPicture("product_id = $product_id");
												foreach($picture AS $picture) : endforeach; // endforeach loop pictures
												?>
												
													<li style="word-wrap: break-word;">
														<a class="addBasket" data-actionlink="<?php echo $site_url;?>/pos?action=basket_add&product_id=<?php echo $products['id'];?>&member_id=<?php echo $member_id;?>"> 
														<img src="<?php echo $site_path."/product/images/".$picture['id'].".".$picture['type'];?>" width="50"><span style="margin-left: 10px"> <?php echo $products['name'];?> </span>
														<span class="badge label-info pull-right r-activity">$<?php echo number_format($products['price_member'],2);?></span>
														</a>
													</li>
												
												<?php endforeach; // endforeach product category ?>
												</ul>
											</div>
										</div>
									</div>
								<?php endforeach; // endforeach loop category ?>
								</div> <!-- end panel-group -->
								
							</div> <!-- End col-lg-7 -->
							<div class="col-lg-5">

								<?php if($member_id=="") :  ?>
								<section class="panel" style="background: #fff">
									<header class="panel-heading" > Member </header>
				                    <div class="panel-body">
									
									<form action="" method="post"  class="form-group"> 
											<select class="js-example-placeholder-single js-states form-control" id="member_id" name="member_id">
											<!-- <select class="select2able" id="member_id" name="member_id" style="width:300px;"> -->
											<?php foreach($memberAll AS $members) : ?>
												<option value="<?php echo $members['id'];?>" selected>
													<?php echo $members['firstname']." ".$members['lastname']." (".$members['username'].")";?>
												</option>
											<?php endforeach; ?>
												<option value="" selected>--Select Member--</option>
											</select>&nbsp;
											<button type="submit" class="btn btn-white btn-sm"><i class="fa fa-search"></i> Select</button>
									</form>
									</div>
				                </section>
								<?php
								else : 
									$member_all = $posDetail->members("WHERE id='$member_id'");
									foreach($member_all AS $member) : endforeach; 
								?>
									<div class="panel panel-white no-radius">
										<div class="panel-heading border-bottom">
											<h4 class="panel-title text-center text-bold">Username : <?php echo $member['username']; ?></h4>
										</div>
										<div class="panel-body">
											<div class="text-center" style="padding: 10px">
											<?php if( $member['avatar']!="" ) : ?>
												<img src='<?php echo $site_assets;?>/images/avatar-1.jpg' class="img-circle" style="width: 80px" /><br/><br/>
											<?php else: ?>
												<img src='<?php echo $site_assets;?>/images/avatar-1.jpg' class="img-circle" style="width: 80px" /><br/><br/>

											<?php endif; ?>
												<span class="inline text-large no-wrap" style="margin-top: 5px">
													<?php echo $member['firstname']." ".$member['lastname']; ?>
												</span>
											</div>
											<div class="margin-top-20 text-center legend-xs inline">
												<div id="chart3Legend" class="chart-legend"></div>
											</div>
										</div>
										<div class="panel-footer">
											<div class="clearfix padding-5 space5">
												<div class="col-xs-8 text-center no-padding">
													<div class="border-right border-dark">
													<a href="#"><i class="fa fa-map-marker" style="margin-right: 5px"></i></a>
					                                <?php $memberAddress = $posDetail->memberAddress("WHERE id='$member_id'"); ?>
														<span style="font-size: 15px">
															<?php
															echo 
						                                	$memberAddress['sub-district']." ".
						                                	$memberAddress['district']." ".
						                                	$memberAddress['province']." ".
						                                	$memberAddress['postcode'];
															?>
														</span>
													</div>
												</div>
												<div class="col-xs-4 text-center no-padding">
													<div class="border-right border-dark">
														<span style="font-size: 15px">
														<a href="#">
															<i class="fa fa-phone" style="margin-right: 5px"></i>
														</a><?php echo $member['phone']; ?>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="panel-footer">
											<div class="clearfix padding-5 space5">
												<div class="col-sm-6">
													<div class="panel panel-white no-radius text-center">
														<div class="panel-body">
															<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
															<h2 class="StepTitle">$<?php echo number_format($member['wallet'],2); ?></h2>
															<p class="text-small">
																Wallet
															</p>
															<p class="links cl-effect-1">
																<div class="radio ">												
																	<label for="wallet"><input type="radio" name="payment_method" value="wallet"  id="wallet" <?php if($member['wallet']>=$net_total): echo "checked"; else: echo "disabled"; endif;?>>
																	</label>
																</div>
															</p>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="panel panel-white no-radius text-center">
														<div class="panel-body">
															<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
															<h2 class="StepTitle">$7777777777</h2>
															<p class="links cl-effect-1">
																<div class="radio ">												
																	<div class="radio clip-radio radio-primary">
																		<input type="radio" name="popoverType" id="top" value="top" checked="">
																		<label for="top">
																			Thai Epay
																		</label>
																	</div>
																</div>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									

										<section class="panel">
				                            <div class="twt-feed blue-bg">
				                                <div class="corner-ribon black-ribon">
				                                    <a href="<?php echo $site_url;?>/pos"><i class="fa fa-refresh"></i></a>
				                                </div>
				                                <div class="fa fa-user wtt-mark"></div>
				                                <a href="#">
													<?php 
													if( $member['avatar']!="" ) : echo "<img src='$site_assets/images/avatar-1.jpg' />";
													else : echo "<img src='$site_assets/images/avatar-1.jpg' />";
													endif; 
													?>
				                                </a>
				                                <h1><?php echo $member['firstname']." ".$member['lastname']; ?></h1>
				                                <p><?php echo $member['username']; ?> </p>

				                            </div>
				                            <div class="weather-category twt-category">
				                                <ul>
				                                    <li class="active">Wallet
				                                        <h5 style="color:#000000">$<?php echo number_format($member['wallet'],2); ?> </h5>
															<div class="col-sm-12 icheck ">
																<div class="square-blue single-row">
																	<div class="radio ">												
																		<label for="jWallet"><input type="radio" name="payment_method" value="wallet"  id="wallet" <?php if($member['wallet']>=$net_total): echo "checked"; else: echo "disabled"; endif;?>>
																		</label>
																	</div>
																</div>
															</div>
				                                    </li>
				                                </ul>
				                            </div>
				                            <footer class="twt-footer">
				                                <a href="#"><i class="fa fa-map-marker"></i></a>
				                                <?php 
				                                $memberAddress = $posDetail->memberAddress("WHERE id='$member_id'"); 
				                                echo "Address : ".
				                                	$memberAddress['sub-district']." ".
				                                	$memberAddress['district']." ".
				                                	$memberAddress['province']." ".
				                                	$memberAddress['postcode'];
				                                ?>
											<span class="pull-right">							
				                                <a href="#"><i class="fa fa-phone"></i></a><?php echo $member['phone']; ?>
											</span>
				                            </footer>
				                        </section>	
								<?php
								endif; // endif check member login
								
								if(count($basket)>0) :
								?>
									<section class="panel">
										<header class="panel-heading">
											<i class="fa fa-credit-card"></i> Payment
				                        </header>
				                        <div class="panel-body">	
												<?php
												isset($member['wallet']) ? $wallet=$member['wallet'] : $wallet=0;

												if($wallet>=$net_total) :
												?>
													
													<form class="form-horizontal bucket-form" method="post">
														<div class="form-group">
															<label class="col-sm-12"><h3>$<?php echo number_format($net_total);?></h3></label>
														</div>
														<div class="form-group">
															<label class="col-sm-3 control-label">$<?php echo number_format($net_total);?></label>
															<div class="col-sm-9 icheck ">
																<div class="square single-row">
																	<div class="radio ">
																		<input type="radio" name="payment_method" value="wallet" id="wallet" <?php if($member['wallet']>=$net_total) :  echo "checked"; else: echo "disabled"; endif;?>>
																		<label for="wallet"> Wallet </label>
																	</div>
																</div>
															</div>
														</div>

														<input type="hidden" name="process" value="order_confirm">
														<input type="hidden" name="sentfrom" value="genius"> 
														<input type="hidden" name="return"  value="http://genius.jinuemall.com?page=invoice">
														<button class="btn btn-primary narrow" type="submit" >Confirm</button>
														
													</form>
												<?php
												else : 
												?>
													<div class="alert alert-block alert-danger fade in">
														<button data-dismiss="alert" class="close close-sm" type="button">
															<i class="fa fa-times"></i>
														</button>
														<strong>Oh snap!</strong> Change a few things up and try submitting again.
													</div>
												<?php
												endif;
												?>
												
													
										</div>
									</section>
									<a class="btn-link pull-right" href="<?php echo $site_url;?>/pos?action=order_cancel"><i class="fa fa-trash-o"></i> Cancel</a>
								<?php endif; ?>
													
							</div> <!-- End col-lg-5 -->
	                    </div> <!-- End row -->
	                </div> <!-- End wrap contect -->
                </div> <!-- End main-content -->


                

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
        <script src="<?php echo $site_assets;?>/vendor/selectFx/classie.js"></script>
		<script src="<?php echo $site_assets;?>/vendor/selectFx/selectFx.js"></script>
        <script src="<?php echo $site_assets;?>/vendor/select2/select2.min.js"></script>
        <script src="<?php echo $site_assets;?>/vendor/DataTables/jquery.dataTables.min.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: CLIP-TWO JAVASCRIPTS -->
        <script src="<?php echo $site_assets;?>/js/main.js"></script>
        <script src="<?php echo $site_assets;?>/js/table-data.js"></script>
        <script src="<?php echo $site_assets;?>/js/form-elements.js"></script>
        <script src="<?php echo $site_assets;?>/js/pos.js"></script>
        <!-- start: JavaScript Event Handlers for this page -->
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
