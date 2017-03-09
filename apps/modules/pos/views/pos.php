<?php
isset($_SESSION['basket'])?$basket=$_SESSION['basket']:$basket=array();
isset($_REQUEST['member_id'])?$member_id=$_REQUEST['member_id']:$member_id='';

//define variable
$total_price=0;
$total_pv=0;
$net_total=0;
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="<?php echo $site_dir;?>/images/favicon.png">
    <title>POS <?php echo " ‹ ".$site_title;?></title>
    <!--Core CSS -->
    <link href="<?php echo $site_dir;?>/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!--icheck-->
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/minimal/red.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/minimal/green.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/minimal/yellow.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/minimal/purple.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/square/square.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/square/red.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/square/green.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/square/blue.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/square/yellow.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/square/purple.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/flat/grey.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/flat/red.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/flat/blue.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/flat/yellow.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/flat/purple.css" rel="stylesheet">
	
    <link href="<?php echo $site_dir;?>/js/select2/select2.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/js/iCheck/skins/flat/purple.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo $site_dir;?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/css/style-responsive.css" rel="stylesheet" />
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="<?php echo $site_dir;?>/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo $site_dir;?>/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="<?php echo $site_dir;?>/https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section id="container" >
<?php 
include "header.php";
include "sidebar.php";
?>
    <!--main content start-->
    <section id="main-content" class="">
        <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-7">
				
					<section class="panel">
						<form action="<?php $site_url;?>/process" method="GET">
                        <header class="panel-heading" >
							<div class="form-group">
								<label class="col-sm-3 control-label"><i class="fa fa-shopping-cart"></i> Basket Items</label>
								<div class="col-sm-6">
											<input type="text" class="form-control input-sm" placeholder="Barcode" name="product_barcode" autofocus>
											<span class="input-group-btn">
												<button class="btn btn-success" type="submit" style="display:none;"> </button>
												<input type="hidden" name="process" value="basket_add_barcode">
												<input type="hidden" name="product_qty" value="1">
												<input type="hidden" name="member_id" value="<?php echo $member_id;?>">
											</span>
								</div>
							</div>
							<div style="height:10px;">
							&nbsp;
							</div>
                        </header>
						</form>
                        <div class="panel-body">
						<?php
						if(count($basket)>0){
						?>
                            <table class="table table-hover">
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
								$number=1;
								foreach($basket as $product_id => $product_qty){
								$product_query=mysqli_query($connect,"SELECT * FROM products WHERE product_id=$product_id;");
								$product=mysqli_fetch_array($product_query);
								$product_id=$product['product_id'];
								
								if($member_id==""){
									$price=$product['product_price']*$basket["$product_id"];
								}else{
									$price=$product['product_price_member']*$basket["$product_id"];
								}
								
								$total_price+=$price;
								
								$pv=$product['product_point']*$basket["$product_id"];
								$total_pv+=$pv;
								?>
                                <tr>
                                    <td><?php echo $number;?></td>
                                    <td><?php echo $product['product_name'];?><br></td>
                                    <td align="right">
										<a class="btn-link" id="ChangeQTYof<?php echo $product_id;?>" onclick="ShowHide('QTYof<?php echo $product_id;?>','ChangeQTYof<?php echo $product_id;?>')" style="cursor:pointer"><?php echo $basket[$product_id];?></a>
										<div id="QTYof<?php echo $product_id;?>" style="display:none;">
													<select id="<?php echo $product_id.'Qty';?>" class="form-control" >
													<?
													for($i=1;$i<100;$i++){
													?>
                                                        <option href="<?php $site_url;?>/process?process=basket_add&product_id=<?php echo $product['product_id'];?>&product_qty=<?php echo $i;?>&member_id=<?php echo $member_id;?>" <? if($basket[$product_id]==$i){ echo "selected";} ?> ><?php echo $i;?></option>
														
													<?
													}
													?>
                                                    </select> 
													<script>
															document.getElementById('<?php echo $product_id.'Qty';?>').onchange = function() {
																window.location.href = this.children[this.selectedIndex].getAttribute('href');
															}
													</script>
										</div>
									</td>
                                    <td align="right"><?php echo number_format($product['product_point']*$basket[$product_id],2);?></td>
                                    <td align="right"><?php echo number_format($price,2);?></td>
                                    <td align="center"><a class="close-btn" onclick="<?php echo $product_id.'del';?>" href="process.php?process=basket_delete&product_id=<?php echo $product['product_id'];?>&member_id=<?php echo $member_id;?>"><i class="fa fa-trash-o"></i></a> </td>
                                </tr>
								<?php
								$number++;
								}
								?>
								<tr id="GiveDiscountBtn">
									<td align="right" colspan="4"><b>Discount :</b></td>
									<td align="right">
										<a class="btn-link"  onclick="ShowHide('GiveDiscount','GiveDiscountBtn')" style="cursor:pointer">
										<?php
										if(isset($_REQUEST['discount'])){
											$discount=$_REQUEST['discount'];
											echo number_format($discount,2);
										}else{
											echo $discount=0;
										}
										
										
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
						<?php
						}else{
						?>
							<div class="alert alert-warning fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Warning!</strong> The Basket is empty.
                            </div>
						<?php
						}
						?>
                        </div>
						
                    </section>	
					<section class="panel">
						<div class="panel-group m-bot20" id="accordion">
						<?php
						$category_query=mysqli_query($connect,"SELECT * FROM product_category ORDER BY product_category_name");
						while($category=mysqli_fetch_array($category_query)){
						?>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#cat-<?php echo $category['product_category_name'];?>">
                                            <?php 
											echo $category['product_category_name'];
											$countpro = mysqli_query($connect,"SELECT COUNT(product_id) as countproduct FROM products WHERE product_category_id LIKE '%[".$category['product_category_id']."]%' ORDER BY product_name");
											$recount = mysqli_fetch_assoc($countpro);
											echo "(".$recount['countproduct'] .")";
											
											
											//echo " (".mysql_result(mysqli_query($connect,"SELECT COUNT(product_id) as countproduct FROM products WHERE product_category_id LIKE '%[".$category['product_category_id']."]%' ORDER BY product_name"),0).")";
											?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="cat-<?php echo $category['product_category_name'];?>" class="panel-collapse collapse">
									<ul class="nav nav-pills nav-stacked">
									<?php
									$products_query=mysqli_query($connect,"SELECT * FROM products WHERE product_category_id LIKE '%[".$category['product_category_id']."]%' ORDER BY product_name");
									while($products=mysqli_fetch_array($products_query)){
									$picture=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM product_pictures WHERE picture_index='#' AND product_id=".$products['product_id']));
									?>
									
										<li style="word-wrap: break-word;">
											<a href="<?php echo $site_url;?>/process/?process=basket_add&product_id=<?php echo $products['product_id'];?>&member_id=<?php echo $member_id;?>"> 
											<img src="<?php echo $site_main."/gallery/products/".$picture['picture_id'].".".$picture['picture_type'];?>" width="50">&nbsp;&nbsp;<?php echo $products['product_name'];?>
											<span class="badge label-info pull-right r-activity">$<?php echo number_format($products['product_price_member'],2);?></span>
											</a>
										</li>
									
									<?php
									}
									?>
									</ul>
                                </div>
                            </div>
						<?php
						}
						?>
                        </div>
					</section>
					
			</div>
				<div class="col-lg-5">
				<?php
				if($member_id==""){
				?>
				<section class="panel">
					<header class="panel-heading" >
					Member
					</header>
                    <div class="panel-body">
					
					<form action="" method="get"  class="form-group"> 

							<select class="select2able" id="member_id" name="member_id" style="width:300px;">
							<?php
							$members_query=mysqli_query($connect,'SELECT member_id,member_name,member_surname,member_username FROM members ORDER BY member_name');
							while($members=mysqli_fetch_array($members_query)){
							?>
								<option value="<?php echo $members['member_id'];?>" selected><?php echo $members['member_name']." ".$members['member_surname']." (".$members['member_username'].")";?></option>
							<?php
							}
							?>	
								<option value="" selected>--Select Member--</option>
								
							</select>&nbsp;
							<button type="submit" class="btn btn-white btn-sm"><i class="fa fa-search"></i> Select</button>
							<input type="hidden" name="page" value="pos">
					</form>
					</div>
                </section>
				<?php
				}else{
						
						$member_query=mysqli_query($connect,"SELECT * FROM members WHERE member_id=$member_id");
						$member=mysqli_fetch_array($member_query);
						?>
						<section class="panel">
                            <div class="twt-feed blue-bg">
                                <div class="corner-ribon black-ribon">
                                    <a href="<?php echo $site_url;?>/?page=pos"><i class="fa fa-refresh"></i></a>
                                </div>
                                <div class="fa fa-user wtt-mark"></div>
                                <a href="#">
									<?php
									if($member['member_avatar']!=""){
									?>
										<img src="http://jinuemall.com/system/@pages/profile/<?php echo $member_id;?>.<?php echo $member['member_avatar'];?>" />
									<?php 
									}else{
									?>
										<img src="http://jinuemall.com/system/@pages/images/avatar.png" />
									<?php
									}
									?>
                                </a>
                                <h1><?php echo $member['member_name']." ".$member['member_surname']; ?></h1>
                                <p><?php echo $member['member_username']; ?> </p>

                            </div>
                            <div class="weather-category twt-category">
                                <ul>
                                    <li class="active">J-Wallet
                                        <h5 style="color:#000000">$<?php echo number_format($member['jWallet'],2); ?> </h5>
											<div class="col-sm-12 icheck ">
												<div class="square-blue single-row">
													<div class="radio ">												
														<label for="jWallet"><input type="radio" name="payment_method" value="jWallet"  id="jWallet" <?php if($member['jWallet']>=$net_total){ echo "checked"; }else{ echo "disabled";}?>></label>
													</div>
												</div>
											</div>
                                    </li>
                                    <li>R-Money
                                        <h5 style="color:#000000">$<?php echo number_format($member['rMoney'],2); ?></h5>
											<div class="col-sm-12 icheck ">
												<div class="square-blue single-row">
													<div class="radio ">												
														<label for="rMoney"><input type="radio" name="payment_method" value="rMoney" id="rMoney" <?php if($member['rMoney']>=$net_total){ echo "checked"; }else{ echo "disabled";}?>></label>
													</div>
												</div>
											</div>
                                    </li>
                                    <li>J-Point
                                        <h5 style="color:#000000">$<?php echo number_format($member['jPoint'],2); ?></h5>
										
											<div class="col-sm-12 icheck">
												<div class="square-blue single-row">
													<div class="radio ">												
														<label for="jPoint"><input type="radio" name="payment_method" value="jPoint" id="jPoint" <?php if($member['jPoint']>=$net_total && in_array("1",$basket)  && in_array("2",$basket)  && in_array("3",$basket)  && in_array("83",$basket) ){ echo "checked"; }else{ echo "disabled";}?>></label>
													</div>
												</div>
											</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="twt-write col-sm-12">
                                <textarea placeholder="Write your Tweet and Enter" rows="1" class="form-control t-text-area"></textarea>
                            </div>
                            <footer class="twt-footer">
                                <a href="#"><i class="fa fa-map-marker"></i></a>
                                <?php echo $member['member_address']; ?>, <?php echo $member['member_city']; ?>
							<span class="pull-right">							
                                <a href="#"><i class="fa fa-phone"></i></a><?php echo $member['member_phone']; ?>
							</span>
                            </footer>
                        </section>	
						<?php
				}
				
				if(count($basket)>0){
				?>
					<section class="panel">
						<header class="panel-heading">
							<i class="fa fa-credit-card"></i> Payment
                        </header>
                        <div class="panel-body">	
								<?php
								isset($member['jWallet'])?$jWallet=$member['jWallet']:$jWallet=0;
								isset($member['rMoney'])?$rMoney=$member['rMoney']:$rMoney=0;
								isset($member['jPoint'])?$jPoint=$member['jPoint']:$jPoint=0;

								if($jWallet>=$net_total OR $rMoney>=$net_total OR $jPoint>=$net_total){
								?>
									
									<form class="form-horizontal bucket-form" method="get">
										<div class="form-group">
											<label class="col-sm-12"><h3>$<?php echo number_format($net_total);?></h3></label>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">$<?php echo number_format($net_total);?></label>
											<div class="col-sm-9 icheck ">
												<div class="square single-row">
													<div class="radio ">
														<input type="radio" name="payment_method" value="jWallet"  id="jWallet" <?php if($member['jWallet']>=$net_total){ echo "checked"; }else{ echo "disabled";}?>>
														<label for="jWallet">J-Wallet </label>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label"></label>
											<div class="col-sm-9 icheck ">
												<div class="square single-row">
													<div class="radio ">
														<input type="radio" name="payment_method" value="rMoney" id="rMoney" <?php if($member['rMoney']>=$net_total){ echo "checked"; }else{ echo "disabled";}?>>
														<label for="rMoney">R-Money </label>
													</div>
												</div>
											</div>
										</div>
									<?php
									if(in_array("1",$basket)  && in_array("2",$basket)  && in_array("3",$basket)  && in_array("83",$basket) ){
									?>
									
										<div class="form-group">
											<label class="col-sm-3 control-label"></label>
											<div class="col-sm-9 icheck ">
												<div class="square single-row">
													<div class="radio ">
														<input type="radio" name="payment_method" value="jPoint" id="jPoint" <? if($member['jPoint']>=$net_total){ echo "checked"; }else{ echo "disabled";}?>>
														<label for="jPoint">J-Point </label>
													</div>
												</div>
											</div>
										</div>
									<?php
									}
									?>
										<input type="hidden" name="process" value="order_confirm">
										<input type="hidden" name="sentfrom" value="genius"> 
										<input type="hidden" name="return"  value="http://genius.jinuemall.com?page=invoice">
										<button class="btn btn-primary narrow" type="submit" >Confirm</button>
										
									</form>
								<?php
								}else{
								?>
									<div class="alert alert-block alert-danger fade in">
										<button data-dismiss="alert" class="close close-sm" type="button">
											<i class="fa fa-times"></i>
										</button>
										<strong>Oh snap!</strong> Change a few things up and try submitting again.
									</div>
								<?php
								}
								?>
								
									
						</div>
					</section>
					<a class="btn-link pull-right" href="<?php echo $site_url;?>/process.php?process=order_cancel&goto=/?page=pos"><i class="fa fa-trash-o"></i> Cancel</a>
				<?php
				}
				?>
									
			</div>
		</div>
       
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<?php include "sidebar_right.php"; ?>
</section>
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="<?php echo $site_dir;?>/js/jquery.js"></script>
<script src="<?php echo $site_dir;?>/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo $site_dir;?>/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo $site_dir;?>/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="<?php echo $site_dir;?>/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="<?php echo $site_dir;?>/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.pie.resize.js"></script>
<script src="<?php echo $site_dir;?>/js/iCheck/jquery.icheck.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/select2/select2.js"></script>
<!--common script init for all pages-->
<script src="<?php echo $site_dir;?>/js/scripts.js"></script>
<!--icheck init -->
<script src="<?php echo $site_dir;?>/js/icheck-init.js"></script>
<script src="<?php echo $site_dir;?>/js/scripts.js"></script>
<script language="javascript">
$(document).ready(function() {
	$('.select2able').select2();
});
</script>
</body>
</html>