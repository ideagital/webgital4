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
    <!-- end: HEAD -->
    <body>
        <div id="app">
            <?php include 'apps/_partials/sidebar.php';?>
            <div class="app-content">
                <?php include 'apps/_partials/header.php';?>
                <div class="main-content" >
                    <div class="wrap-content container" id="container">
                        <!-- start: PAGE TITLE -->
                        <section id="page-title" class="no-border">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="mainTitle">Products</h1>
                                    <span class="mainDescription"><?php echo $count_product;?> Products</span>
                                </div>
                                <ol class="breadcrumb">
                                    <li class="active">
                                        <a href="<?php echo $site_url;?>/product/new">
                                            <button class="btn btn-primary btn-o"><i class="ti ti-plus"></i> Add new</button>
                                        </a>
                                    </li>
                                </ol>                            
                            </div>
                        </section>
                        <!-- end: PAGE TITLE -->
                        <!-- start: YOUR CONTENT HERE -->
                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Images</th>
                                                <th class="">Product</th>
                                                <th class="hidden-xs text-center">Quantity</th>
                                                <th class="hidden-xs text-right">Member Price</th>
                                                <th class="hidden-xs text-right">PV</th>
                                                <th class="hidden-xs text-center">Category</th>
                                            </tr>                                        
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($arrValues AS $product) : $product_id=$product['id'];
                                            ?>
                                            <tr>
                                                <td class="center">
                                                    <img src="<?php echo $site_path."/product/images/".$product['picture'];?>" class="img-rounded" alt="image" style="height:50px;"/>
                                                </td>
                                                <td>
                                                    <span class="text-bold"><?php echo $product['name'];?></span>
                                                    <br>
                                                    <small>
                                                    <?php 
                                                    echo $product['category_name'];
                                                    $data = $productIndex->findFirst("product_category.category","product_category","product_category.id = '".$product['category_id']."' ");
                                                    ?>   
                                                    </small>
                                                </td>
                                                <td class="hidden-xs text-center"><?php echo $product['qty'];?></td>
                                                <td class="hidden-xs text-right"> <?php echo $product['price_member'];?> </td>
                                                <td class="hidden-xs text-right"><?php echo $product['point'];?></td>
                                                <td class="hidden-xs text-center">
                                                    <a href="<?php echo $site_url;?>/product/edit/<?php echo $product['id'];?>" class="btn btn-default btn-o">
                                                    <i class="ti ti-pencil"></i> Edit
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            endforeach; //end loop Product
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
        <script src="<?php echo $site_assets;?>/vendor/select2/select2.min.js"></script>
        <script src="<?php echo $site_assets;?>/vendor/DataTables/jquery.dataTables.min.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: CLIP-TWO JAVASCRIPTS -->
        <script src="<?php echo $site_assets;?>/js/main.js"></script>
        <script src="<?php echo $site_assets;?>/js/table-data.js"></script>
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
