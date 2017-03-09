<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Products - RICO</title>
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
        <!-- <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" /> -->
        <!-- end: GOOGLE FONTS -->
        <!-- start: MAIN CSS -->
        <link rel="stylesheet" href="<?php echo $site_dir;?>/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $site_dir;?>/vendor/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo $site_dir;?>/vendor/themify-icons/themify-icons.min.css">
        <link href="<?php echo $site_dir;?>/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo $site_dir;?>/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo $site_dir;?>/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
        <!-- start: CLIP-TWO CSS -->
        <link rel="stylesheet" href="<?php echo $site_dir;?>/assets/css/styles.css">
        <link rel="stylesheet" href="<?php echo $site_dir;?>/assets/css/plugins.css">
        <link rel="stylesheet" href="<?php echo $site_dir;?>/assets/css/themes/theme-2.css" id="skin_color" />
        <!-- end: CLIP-TWO CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $site_dir;?>/stylesheets/font-style.css" />
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>
    <!-- end: HEAD -->
    <body>
        <div id="app">
            <!-- sidebar -->
            <?php include 'sidebar.php';?>
            <!-- / sidebar -->
            <div class="app-content">
                <!-- start: TOP NAVBAR -->
                <?php include 'header.php';?>
                <!-- end: TOP NAVBAR -->
                <div class="main-content" >
                    <div class="wrap-content container" id="container">
                        <!-- start: PAGE TITLE -->
                        <section id="page-title" class="">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="mainTitle">Products</h1>
                                    <span class="mainDescription"><?php echo select_data('products','COUNT(id)');?> Products</span>
                                </div>
                                <?php include "breadcrumb.php";?>
                            </div>
                        </section>
                        <!-- end: PAGE TITLE -->
                        <!-- start: YOUR CONTENT HERE -->
                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-hover" id="sample-table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Images</th>
                                                <th class="hidden-phone">Product</th>
                                                <th class="hidden-phone text-center">Quantity</th>
                                                <th class="hidden-phone text-right">Member Price</th>
                                                <th class="hidden-phone text-right">PV</th>
                                                <th class="hidden-phone text-center">Category</th>
                                            </tr>                                        
                                        </thead>
                                        <tbody>
                                            <?php
                                            $product_query=mysqli_query($connect,'SELECT * FROM products ORDER BY name ASC');
                                            while($product=mysqli_fetch_assoc($product_query)){
                                            $product_id=$product['id'];
                                            ?>
                                            <tr>
                                                <td class="center">
                                                    <img src="http://www.ricooffice.com/products/default.jpg" class="img-rounded" alt="image" style="height:50px;"/>                  
                                                </td>
                                                <td>
                                                    <span class="sukhumvit-bold"><?php echo $product['name'];?></span>
                                                    <br>
                                                    <small>
                                                    <?php 
                                                    $category=mysqli_fetch_array(mysqli_query($connect,"SELECT product_category.category FROM product_category WHERE product_category.id = '".$product['category_id']."' "));
                                                    echo $category['category'];
                                                    ?>   
                                                    </small>
                                                </td>
                                                <td class="hidden-xs text-center"><?php echo $product['qty'];?></td>
                                                <td class="hidden-xs text-right">
                                                    <?php echo $product['price_member'];?>              
                                                </td>
                                                <td class="hidden-xs text-right"><?php echo $product['point'];?></td>
                                                <td class="center">
                                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                    <a href="#" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="#" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Share"><i class="fa fa-share"></i></a>
                                                    <a href="#" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                                </div>
                                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                    <div class="btn-group" dropdown>
                                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" dropdown-toggle>
                                                            <i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right dropdown-light" role="menu">
                                                            <li>
                                                                <a href="#">
                                                                    Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    Share
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    Remove
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div></td>
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
        <script src="<?php echo $site_dir;?>/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo $site_dir;?>/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo $site_dir;?>/vendor/modernizr/modernizr.js"></script>
        <script src="<?php echo $site_dir;?>/vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="<?php echo $site_dir;?>/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo $site_dir;?>/vendor/switchery/switchery.min.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: CLIP-TWO JAVASCRIPTS -->
        <script src="<?php echo $site_dir;?>/assets/js/main.js"></script>
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
