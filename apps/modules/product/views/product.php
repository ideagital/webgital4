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
        <link rel="stylesheet" href="<?php echo $site_assets;?>/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" media="screen">
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
                        <!-- start: YOUR CONTENT HERE -->
                        <form action="<?php echo $form_action;?>" enctype="multipart/form-data" method="post" role="form">
                        <div class="container-fluid container-fullw bg-white">        
                        <div class="row">
                            <div class="col-sm-8">
                                <h2><?php echo $page_title;?></h2>
                            </div>
                        </div>
                        </div>

                        <div class="container-fluid container-fullw bg-white"> 
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" name="product_name" placeholder="Product Name" id="form-field-12" class="form-control input-lg underline" value="<?php echo $product_name;?>" style="font-size:24px;" autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="product_url">
                                        Product URL
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon btn-default bg-light-grey">
                                            <i class="ti ti-world"></i> <?php echo $site_url;?>/product/
                                        </div>
                                        <input type="text" name="product_url" id="product_url" placeholder="Product URL" class="form-control" value="<?php echo $product_url;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_description">
                                        Sort Description
                                    </label>
                                    <textarea name="product_description" id="product_description" class="form-control autosize" data-autosize-on="true" style="overflow: hidden; resize: horizontal; word-wrap: break-word; height: 71px;"><?php echo $product_description;?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="product_detail">
                                        Product Detail
                                    </label>
                                    <textarea name="product_detail" id="product_detail" class="ckeditor form-control" cols="10" rows="10"><?php echo $product_detail;?></textarea>
                                </div>
                                
                                <div>
                                    <label for="product_pictures">
                                        Product Pictures
                                    </label>
                                    <p>
                                    <input type="file" class="default btn btn-default btn-block btn-lg"  id="product_pictures" name="image[]" multiple accept="image/*" />
                                    </p>
                                    <!--li class="text-center">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                       <span class="btn btn-white btn-file">
                                                       <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                       <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                       <input type="file" class="default"  name="img[]" multiple>
                                                       </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                            </div>
                                        </div>
                                    </li-->
                                    <div class="row">
                                    <?php
                                    if($product_id!=null) : 
                                        $arrImages = $productDetail->imagesAll("product_id=$product_id ORDER BY `index` ASC");
                                        foreach($arrImages AS $pictures) : 
                                        $pictures_id = $pictures["id"];
                                    ?>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="thumbnail">
                                                <img src="<?php echo $site_path;?>/product/images/<?php echo $pictures['picture'];?>">
                                                <div class="caption">
                                                    <?php
                                                    if($pictures['index']=="#") : echo "Main Picture"; else : echo $pictures['index']; endif;
                                                    ?>
                                                    <a class="btn-link pull-right" href="<?php echo $site_url;?>/product/edit/<?php echo $product_id;?>?action=product_picture_delete&id=<?php echo $pictures_id;?>"><i class="fa fa-trash-o"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        endforeach; // end loop pictures
                                    endif; //end check product not null
                                    ?>
                                    </div>  
                                </div> 
                            </div>
                            <div class="col-sm-4">

                                <p class="text-right hidden-xs"><a href="<?php echo $site_url;?>/products" class="text-light" style="font-size:24px;"><i class="ti ti-close"></i> Close</a></p>
                                <div class="panel panel-white" id="panel1">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Options</h4>
                                        <div class="panel-tools">
                                            <a data-original-title="Collapse" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-collapse text-dark" href="#">
                                                <i class="ti-minus collapse-off"></i>
                                                <i class="ti-plus collapse-on"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="product_price">
                                                Regular Price
                                            </label>
                                            <input class="number-ts"  id="product_price" type="text" value="<?php echo $product_price;?>" name="product_price" touchspin data-verticalbuttons="true" data-verticalupclass="ti-angle-up" data-verticaldownclass="ti-angle-down">
                                        </div>


                                        <div class="form-group">
                                            <label for="product_price_member">
                                                Member Price
                                            </label>
                                            <input class="number-ts"  id="product_price_member" type="text" value="<?php echo $product_price_member;?>" name="product_price_member" touchspin data-verticalbuttons="true" data-verticalupclass="ti-angle-up" data-verticaldownclass="ti-angle-down">
                                        </div>


                                        <div class="form-group">
                                            <label for="product_point">
                                                PV
                                            </label>
                                            <input class="number-ts" id="product_point" type="text" value="<?php echo $product_point;?>" name="product_point" touchspin data-verticalbuttons="true" data-verticalupclass="ti-angle-up" data-verticaldownclass="ti-angle-down">
                                        </div>                

                                        <hr>

                                        <div class="form-group">
                                            <label for="product_weight">
                                                Weight
                                            </label>
                                            <input id="product_weight" type="text" value="<?php echo $product_weight;?>" name="product_weight" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <label for="product_qty">
                                                Quantity
                                            </label>
                                            <input class="number-ts"  id="product_qty" type="text" value="<?php echo $product_qty;?>" name="product_qty" touchspin data-verticalbuttons="true" data-verticalupclass="ti-angle-up" data-verticaldownclass="ti-angle-down">
                                        </div>


                                        <div class="form-group">
                                            <label for="product_barcode">
                                                Barcode
                                            </label>
                                            <input id="product_barcode" type="text" value="<?php echo $product_barcode;?>" name="product_barcode" class="form-control">
                                        </div>                                    
                                    </div>
                                </div>
                                
                                    
                                <div class="panel panel-white collapses" id="panel1">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Categories</h4>
                                        <div class="panel-tools">
                                            <a data-original-title="Collapse" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-collapse text-dark" href="#">
                                                <i class="ti-minus collapse-off"></i>
                                                <i class="ti-plus collapse-on"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php 
                                        $i=0; foreach($arrCategory AS $category): $i++;
                                        ?>
                                            <div class="checkbox clip-check check-primary">
                                                <input type="checkbox" id="category_<?php echo $category['id'];?>" value="<?php echo $category['id'];?>"  name="product_category[]"
                                                    <?php 
                                                    if($product['category_id']!="" AND $product['category_id']!="0"){
                                                        
                                                        $product_category=$product['category_id'];
                                                        $product_category=str_replace("[","",$product_category);
                                                        $product_category=str_replace("]","",$product_category);
                                                        $product_category=explode(',',$product_category);
                                                        
                                                        if(in_array($category['id'],$product_category)){
                                                            echo "checked";
                                                        }
                                                    }
                                                    ?>
                                                >
                                                <label for="category_<?php echo $category['id'];?>">
                                                    <?php echo $category['category'];?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>                          
                                        <input type="text" class="form-control" id="product_category_new" placeholder="Add New Category"  name="product_category_new">
                                    </div>
                                </div>

                                <div class="panel panel-transparent">
                                    <div class="panel-body no-padding">
                                        <p>
                                        <div class="btn-group btn-group-justified">
                                            <a href="http://www.ricooffice.com/product/<?php echo $product['url'];?>" class="btn btn-default btn-sm" href="javascript:;">
                                                <i class="ti ti-new-window"></i> View 
                                            </a>
                                            <a class="btn btn-default btn-sm" href="javascript:;">
                                                <i class="ti ti-eye"></i> Visible
                                            </a>
                                            <a class="btn btn-default btn-sm" href="<?php echo $site_url;?>/product/edit/<?php echo $product_id;?>?action=product_delete&product_id=<?php echo $product_id;?>">
                                                <i class="ti ti-trash"></i> Delete
                                            </a>
                                        </div>
                                        </p>
                                        <p>
                                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                                <?php echo $submit_caption;?>
                                            </button>
                                        </p>
                                        <p>
                                            <a href="<?php echo $site_url;?>/products" class="btn btn-default btn-o btn-block no-border">
                                                Cancel
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="<?php echo $process_action;?>">
                        <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                        <input type="hidden" name="goto" value="<?php echo $process_goto;?>">
                        </form>                
    
                
        




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
        <script src="<?php echo $site_assets;?>/vendor/maskedinput/jquery.maskedinput.min.js"></script>
        <script src="<?php echo $site_assets;?>/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="<?php echo $site_assets;?>/vendor/autosize/autosize.min.js"></script>
        <script src="<?php echo $site_assets;?>/vendor/selectFx/classie.js"></script>
        <script src="<?php echo $site_assets;?>/vendor/selectFx/selectFx.js"></script>
        <script src="<?php echo $site_assets;?>/vendor/select2/select2.min.js"></script>
        <script src="<?php echo $site_assets;?>/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo $site_assets;?>/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

        <script src="<?php echo $site_assets;?>/vendor/ckeditor/ckeditor.js"></script>
        <script src="<?php echo $site_assets;?>/vendor/ckeditor/adapters/jquery.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->



        <!-- start: CLIP-TWO JAVASCRIPTS -->
        <script src="<?php echo $site_assets;?>/js/main.js"></script>



        <!-- start: JavaScript Event Handlers for this page -->
        <script src="<?php echo $site_assets;?>/js/form-elements.js"></script>
        <script src="<?php echo $site_assets;?>/js/form-text-editor.js"></script>

        <script>
            jQuery(document).ready(function() {
                Main.init();
                FormElements.init();
                TextEditor.init();
            });
        </script>
        <!-- end: JavaScript Event Handlers for this page -->
        <!-- end: CLIP-TWO JAVASCRIPTS -->
    </body>
</html>
