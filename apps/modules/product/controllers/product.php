<?php
############################################################################
$productDetail = new productDetail($connectDB);
$productMax = $productDetail->findFirst('MAX(id)','products')+1;
$arrCategory = $productDetail->categoryAll();
############################################################################

// Check page;
isset($_REQUEST['action'] ) ? $action = filter_var ( $_REQUEST['action'], FILTER_SANITIZE_STRING ) : $action = null ;

if($uri[1] == 'new') :
	$process_action = "product_add";
	$page_title = '<i class="ti ti-plus"></i> New Product';
	$form_action = $site_url.'/product/new';
	$submit_caption = "Add new";

	$product = null;
	$product_name = null;
	$product_description = null;
	$product_url = null;
	$product_detail = null;
	$product_price = null;
	$product_price_member = null;
	$product_point = null;
	$product_weight = null;
	$product_qty = null;
	$product_barcode = null;
	$product_id = null;
elseif($uri[2]!='') :
	$product_id = $uri[2];
	$product = $productDetail->find("*","products","id = $product_id");
	if($product != false) :
		$product_name = $product['name'];
		$product_description = $product['description'];
		$product_url = $product['url'];
		$product_detail = $product['detail'];
		$product_price = $product['price'];
		$product_price_member = $product['price_member'];
		$product_point = $product['point'];
		$product_weight = $product['weight'];
		$product_qty = $product['qty'];
		$product_barcode = $product['barcode'];

		$process_action = "product_edit";
		$page_title = "<i class='ti ti-pencil'></i> Edit : ".$product['name'];
		$form_action = $site_url.'/product/edit/'.$product_id;
		$submit_caption = '<i class="ti ti-save"></i> Update';
	else : $pagefile = "products.php";
	endif;
else : $pagefile = "products.php";
endif;



// Do action
if($action=="product_add") :

	isset($_REQUEST['product_name']) ? $product_name =  $_REQUEST['product_name']  :  $product_name = null;
	isset($_REQUEST['product_url']) ? $product_url =  $_REQUEST['product_url']  :  $product_url = null;
	$product_description    =$_REQUEST['product_description'];
	$product_detail         =$_REQUEST['product_detail'];
	$product_price          =$_REQUEST['product_price'];
	$product_price_member   =$_REQUEST['product_price_member'];
	$product_point          =$_REQUEST['product_point'];
	$product_weight         =$_REQUEST['product_weight'];
	$product_qty            =$_REQUEST['product_qty'];
	$product_barcode        =$_REQUEST['product_barcode'];
	$product_id             =$pid = $productMax;
	$product_category_new   =$_REQUEST['product_category_new'];

	if($_POST['product_category'] != '') : $product_category_array = $_POST['product_category'];
	else : $product_category_array = array();
	endif;

	if($product_category_new!="") :
		$product_category_id = $productDetail->findFirst('MAX(id)','product_category')+1;
		$productDetail->categoryNew("$product_category_id","$product_category_new");
		array_push($product_category_array,$product_category_id);
	endif;

	if($product_category_array[0]!="") : $product_category="[".$product_category_array[0]."]";
	else : $product_category=0;
	endif;

	for($i=1;$i<count($product_category_array);$i++) :
		$product_category.= ",[".$product_category_array[$i]."]";
	endfor;

	$productAddResult = $productDetail->addProduct("$product_id","$product_name","$product_description","$product_detail","$product_price","$product_price_member","$product_point","$product_weight","$product_qty","$product_barcode","$product_url","$product_category");

	if($productAddResult == true):
		$file_ary = reArrayFiles($_FILES['image']);
		$picture_main = $productDetail->findFirst("COUNT(`index`)","product_pictures","product_id=$product_id AND `index`='#'")+0;

		$i=0;
		if($file_ary[0]['tmp_name']!="") :
			foreach ($file_ary as $file) :
				$picture_id = $productDetail->findFirst("MAX(id)","product_pictures")+1;
				$file_tmp = $file['tmp_name'];
				$file_part=explode('.',$file['name']);
				$file_type = end($file_part);
				$file_name=$picture_id.".".$file_type;

				if($i==0 AND $picture_main==0) : $product_index="#";
				else : $product_index = $productDetail->findFirst("MAX(`index`)","product_pictures","product_id = $product_id")+1;
				endif;

				$productDetail->uploadImages("product_pictures","$picture_id","$file_type","$product_index","$product_id");
				move_uploaded_file($file_tmp,"apps/product/images/".$file_name);
				// image_resize($file,640,480,"apps/product/images/thumbs/".$file_name);
				$i++;
			endforeach;
		endif; // check file array
	endif; // check true
	redirect_to('products/');

elseif($action=="product_edit") :
	$product_id             =$_REQUEST['product_id'];
	$product_name           =$_REQUEST['product_name'];
	$product_description    =$_REQUEST['product_description'];
	$product_detail         =$_REQUEST['product_detail'];
	$product_price          =$_REQUEST['product_price'];
	$product_price_member   =$_REQUEST['product_price_member'];
	$product_point          =$_REQUEST['product_point'];
	$product_weight         =$_REQUEST['product_weight'];
	$product_qty            =$_REQUEST['product_qty'];
	$product_barcode        =$_REQUEST['product_barcode'];
	$product_url            =$_REQUEST['product_url'];
	$product_category_new   =$_REQUEST['product_category_new'];

	if($_POST['product_category'] != '') : $product_category_array = $_POST['product_category'];
	else : $product_category_array = array();
	endif;

	if($product_category_new!="") :
		$product_category_id = $productDetail->findFirst('MAX(id)','product_category')+1;
		$productDetail->categoryNew("$product_category_id","$product_category_new");
		array_push($product_category_array,$product_category_id);
	endif;

	if($product_category_array[0]!="") : $product_category="[".$product_category_array[0]."]";
	else : $product_category=0;
	endif;

	for($i=1;$i<count($product_category_array);$i++) :
		$product_category.= ",[".$product_category_array[$i]."]";
	endfor;

	$product_edit_result = $productDetail->updateProduct("$product_name","$product_description","$product_detail","$product_price","$product_price_member","$product_point","$product_weight","$product_qty","$product_barcode","$product_url","$product_category","WHERE id=$product_id");

	if($product_edit_result == true):
		$file_ary = reArrayFiles($_FILES['image']);
		$picture_main = $productDetail->findFirst("COUNT(`index`)","product_pictures","product_id=$product_id AND `index`='#'")+0;

		$i=0;
		if($file_ary[0]['tmp_name']!="") :
			foreach ($file_ary as $file) :
				$picture_id = $productDetail->findFirst("MAX(id)","product_pictures")+1;
				$file_tmp = $file['tmp_name'];
				$file_part=explode('.',$file['name']);
				$file_type = end($file_part);
				$file_name=$picture_id.".".$file_type;

				if($i==0 AND $picture_main==0) : $product_index="#";
				else : $product_index = $productDetail->findFirst("MAX(`index`)","product_pictures","product_id = $product_id")+1;
				endif;

				$productDetail->uploadImages("product_pictures","$picture_id","$file_type","$product_index","$product_id");
				move_uploaded_file($file_tmp,"apps/product/images/".$file_name);
				// image_resize($file,640,480,"apps/product/images/thumbs/".$file_name);
				$i++;
			endforeach;
		endif; // check file array
	endif; // check true
	redirect_to('product/edit/'.$product_id);

elseif($action=="product_delete") :
	$product_id=$_REQUEST['product_id'];
	$product_delete = $productDetail->deleteFirst("products","id='$product_id'");
	if($product_delete == true):
		$imageFetch = $productDetail->selectImageProduct("product_id=$product_id");
		foreach ($imageFetch AS $picture) :
			$check_path = unlink("apps/product/images/".$picture['id'].".".$picture['type']);
			if($check_path) : echo "Delete Success";
			else : echo "No";
			endif;
		endforeach;
		$productDetail->deleteFirst("product_pictures","product_id='$product_id'");
	endif;
	redirect_to('products/');


elseif($action=="product_picture_delete") :
	$picture_id = $_REQUEST['id'];
	$product_id = $uri[2];
	if($product_id != ''){
		$picture = $productDetail->findFirst("type","product_pictures","id=$picture_id");
		unlink("apps/product/images/".$picture_id.".".$picture);
		$picture_delete = $picture_delete = $productDetail->deleteFirst("product_pictures","id='$picture_id'");
		$picture_index = $productDetail->findFirst("COUNT(`index`)","product_pictures","product_id=$product_id AND `index`='#'")+0;
		if($picture_index == 0){
			$main_picture = $productDetail->findFirst("`index`","product_pictures","`product_id`=$product_id ORDER BY `index` LIMIT 1")+0;
			$productDetail->updateFirst("product_pictures","`index`='#'","`product_id`=$product_id AND `index`=$main_picture");
		}
	}
	redirect_to('product/edit/'.$product_id);

endif; // endif do action
