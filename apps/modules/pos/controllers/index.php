<?php
isset($_REQUEST['action'] ) ? $action = filter_var ( $_REQUEST['action'], FILTER_SANITIZE_STRING ) : $action = null ;
isset($_SESSION['basket'])?$basket=$_SESSION['basket']:$basket=array();
isset($_REQUEST['member_id'] ) ? $member_id = filter_var ( $_REQUEST['member_id'], FILTER_SANITIZE_STRING ) : $member_id = null ;
//---------------------------------------- Start Call Model class ------------------------------------------------------------//


$posDetail = new posDetail($connectDB);
$arrCategory = $posDetail->categoryAll();
$memberAll = $posDetail->memberAll();



//---------------------------------------- End Call Model class --------------------------------------------------------------//



if($action == "basket_add") : 

	$basket = $_SESSION['basket'];
	isset($_REQUEST['product_id'] ) ? $product_id = filter_var ( $_REQUEST['product_id'], FILTER_SANITIZE_STRING ) : $product_id = null ;
	isset($_REQUEST['member_id'] ) ? $member_id = filter_var ( $_REQUEST['member_id'], FILTER_SANITIZE_STRING ) : $member_id = null ;

	if($_REQUEST['product_qty']!="") : 
		isset($_REQUEST['product_qty'] ) ? $product_qty = filter_var ( $_REQUEST['product_qty'], FILTER_SANITIZE_STRING ) : $product_qty = null;
	else : $product_qty=$basket[$product_id]+1; endif;

	$basket["$product_id"]=$product_qty;
	$_SESSION['basket']=$basket;
	redirect_to("pos?member_id=$member_id");
	// header ("Location: pos?member_id='$member_id'");

elseif($action=="basket_add_barcode") :
	$basket = $_SESSION['basket'];
	isset($_REQUEST['product_barcode'] ) ? $product_barcode = filter_var ( $_REQUEST['product_barcode'], FILTER_SANITIZE_STRING ) : $product_barcode = null;
	
	$basketBarcode = $posDetail->basketBarcode("WHERE barcode='$product_barcode'");
	foreach($basketBarcode AS $product_id);
	$product_id=$product_id['id'];
	
	if( $product_id!="" ) : 
		$product_qty=$basket[$product_id]+1;
		isset($_REQUEST['member_id'] ) ? $member_id = filter_var ( $_REQUEST['member_id'], FILTER_SANITIZE_STRING ) : $member_id = null ;
		$basket["$product_id"]=$product_qty;
		$_SESSION['basket']=$basket;
	endif;
	redirect_to("pos?member_id=$member_id");

elseif($action=="basket_delete") : 
	$basket = $_SESSION['basket'];
	isset($_REQUEST['product_id'] ) ? $product_id = filter_var ( $_REQUEST['product_id'], FILTER_SANITIZE_STRING ) : $product_id = null ;
	isset($_REQUEST['member_id'] ) ? $member_id = filter_var ( $_REQUEST['member_id'], FILTER_SANITIZE_STRING ) : $member_id = null ;
	unset($basket["$product_id"]);
	$_SESSION['basket']=$basket;
	redirect_to("pos?member_id=$member_id");

elseif($action=="order_cancel") :
	unset($_SESSION['basket']);
	redirect_to("pos");
endif













?>