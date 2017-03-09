<?php ob_start();
$session_id=session_id();
error_reporting(E_ALL);
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">';

$process=$_REQUEST['process'];
$goto=$_REQUEST['goto'];

if($process=="product_add"){
	$product_name=$_REQUEST['product_name'];
	$product_des=$_REQUEST['product_description'];
	$product_detail=$_REQUEST['product_detail'];
	$product_price=$_REQUEST['product_price'];
	$product_price_member=$_REQUEST['product_price_member'];
	$product_pv=$_REQUEST['product_pv'];
	$product_weight=$_REQUEST['product_weight'];
	$product_qty=$_REQUEST['product_qty'];
	$product_barcode=$_REQUEST['product_barcode'];
	$product_url=$_REQUEST['product_url'];
	$product_id = $pid = select_data('products','MAX(product_id)')+1;
	$product_category_new=$_REQUEST['product_category_new'];
	$product_category_array=$_POST['product_category'];
	
	if($product_category_new!=""){
		$product_category_id =  $pcatid = mysqli_fetch_assoc(mysqli_query($connect,"SELECT MAX(product_category_id) as maxcatid FROM product_category;")); echo $pcatid['maxcatid']+1; 
		mysqli_query($connect,"INSERT INTO product_category VALUES($product_category_id,'$product_category_new');");
		array_push($product_category_array,"$product_category_id");
	}
	if($product_category_array[0]!=""){
		$product_category="[".$product_category_array[0]."]";
	}else{
		$product_category=0;
	}
	for($i=1;$i<count($product_category_array);$i++){
		$product_category.= ",[".$product_category_array[$i]."]";
	}
	
	$product_add=mysqli_query($connect,"INSERT INTO products (product_id,product_name,product_description,product_detail,product_price,product_price_member,product_point,product_weight,product_qty,product_barcode,product_url,product_category_id)
										VALUES ($product_id,'$product_name','$product_des','$product_detail','$product_price','$product_price_member','$product_pv','$product_weight','$product_qty','$product_barcode','$product_url','$product_category')");
	
	if($product_add){
		$i = 0;
		$file_ary = reArrayFiles($_FILES['image']);
		foreach ($file_ary as $file) {
			$picture_id=select_data('product_pictures','MAX(picture_id)')+1;
			$file_tmp = $file['tmp_name'];
			$file_part=explode('.',$file['name']);
			$file_type = end($file_part);
			$file_name=$picture_id.".".$file_type;  
			
			if($i==0){ 
				$product_index="#";
			}else{ 
				$product_index=$i; 
			}
			mysqli_query($connect,"INSERT INTO product_pictures VALUES($picture_id,'$file_type','$product_index','$product_id')");
			copy($file_tmp,"../gallery/products/".$file_name);
			image_resize($file,270,405,"../gallery/products/thumb/$file_name");
			$i++;
		}
		
	}
}elseif($process=="product_edit"){
	$product_id=$_REQUEST['product_id'];
	$product_name=$_REQUEST['product_name'];
	$product_description=$_REQUEST['product_description'];
	$product_detail=$_REQUEST['product_detail'];
	$product_price=$_REQUEST['product_price'];
	$product_price_member=$_REQUEST['product_price_member'];
	$product_pv=$_REQUEST['product_pv'];
	$product_weight=$_REQUEST['product_weight'];
	$product_qty=$_REQUEST['product_qty'];
	$product_barcode=$_REQUEST['product_barcode'];
	$product_url=$_REQUEST['product_url'];
	$product_category_new=$_REQUEST['product_category_new'];
	$product_category_array=$_POST['product_category'];
	
	if($product_category_new!=""){
		$product_category_id=  $procatid = mysqli_fetch_assoc(mysqli_query("SELECT MAX(product_category_id) as maxprocatid FROM product_category;")); echo $procatid['maxprocatid']+1;
		mysqli_query($connect,"INSERT INTO product_category VALUES($product_category_id,'$product_category_new');");
		array_push($product_category_array,"$product_category_id");
	}
	if($product_category_array[0]!=""){
		$product_category="[".$product_category_array[0]."]";
	}else{
		$product_category=0;
	}
	for($i=1;$i<count($product_category_array);$i++){
		$product_category.= ",[".$product_category_array[$i]."]";
	}
	
	$product_edit=mysqli_query($connect,"UPDATE products SET
	product_name='$product_name',
	product_description='$product_description',
	product_detail='$product_detail',
	product_price='$product_price',
	product_price_member='$product_price_member',
	product_point='$product_pv',
	product_weight='$product_weight',
	product_qty='$product_qty',
	product_barcode='$product_barcode',
	product_url='$product_url',
	product_category_id='$product_category'
	WHERE product_id=$product_id");
	
	if($product_edit){
		$file_ary = reArrayFiles($_FILES['image']);
		$picture_main=select_data('product_pictures','COUNT(picture_index)',"product_id=$product_id AND picture_index='#'")+0;
		
		$i=0;
		if($file_ary[0]['tmp_name']!=""){
			foreach ($file_ary as $file) {
				$picture_id=select_data('product_pictures','MAX(picture_id)')+1;
				$file_tmp = $file['tmp_name'];
				$file_part=explode('.',$file['name']);
				$file_type = end($file_part);
				$file_name=$picture_id.".".$file_type; 

				if($i==0 AND $picture_main==0){ 
					$product_index="#";
				}else{ 
					$product_index=select_data('product_pictures','MAX(picture_index)',"product_id=$product_id")+1;
				}
				mysqli_query($connect,"INSERT INTO product_pictures VALUES($picture_id,'$file_type','$product_index','$product_id')");
				copy($file_tmp,"../gallery/products/".$file_name);
				image_resize($file,270,405,"../gallery/products/thumb/$file_name");
				$i++;
			}
		}		
	}
}elseif($process=="product_delete"){
	$product_id=$_REQUEST['product_id'];
	$product_delete=mysqli_query($connect,"DELETE FROM products WHERE product_id='$product_id'");
	if($product_delete){
		$picture_query=mysqli_query($connect,"SELECT * FROM product_pictures WHERE product_id=$product_id");
		while($picture=mysqli_fetch_array($picture_query)){
			unlink("../gallery/product/".$picture['picture_id'].".".$picture['picture_type']);
		}
		mysqli_query($connect,"DELETE FROM product_pictures WHERE product_id='$product_id'");
	}
	$goto=$site_url."/products";
	
	
}elseif($process=="product_picture_delete"){
	$picture_id=$_REQUEST['picture_id'];
	$picture=$picture_id.".".selectname('product_pictures','picture_type','picture_id',$picture_id);
	unlink("../gallery/products/".$picture);
	unlink("../gallery/products/thumb/".$picture);
	$goto=$site_url."/product?action=edit&id=".selectname('product_pictures','product_id','picture_id'," $picture_id LIMIT 1");
	$picture_delete=mysqli_query($connect,"DELETE FROM product_pictures WHERE picture_id='$picture_id'");
	
}elseif($process=="order_sent"){
	$order_id=$_REQUEST['order_id'];
	$order_send=mysqli_query($connect,"UPDATE orders SET order_status='sent',date_sended=NOW() WHERE order_id=$order_id");
}elseif($process=="withdraw_approve"){
	$withdraw_id=$_REQUEST['withdraw_id'];
	
	$withdraw_amount=mysqli_fetch_assoc(mysqli_query($connect,"SELECT withdraw_amount FROM withdraw WHERE withdraw_id=$withdraw_id"));
	$withdraw_amount=$withdraw_amount['withdraw_amount'];
	
	$member_id=mysqli_fetch_assoc(mysqli_query($connect,"SELECT member_id FROM withdraw WHERE withdraw_id=$withdraw_id"));
	$member_id=$member_id['member_id'];
	
	$member_jWallet=mysqli_fetch_assoc(mysqli_query($connect,"SELECT jWallet FROM members WHERE member_id=$member_id"));
	$member_jWallet=$member_jWallet['jWallet'];
	
	if($member_jWallet>=$withdraw_amount){
		$jWallet_update=$member_jWallet-$withdraw_amount;
		$withdraw_approved=mysqli_query($connect,"UPDATE members SET jWallet='$jWallet_update' WHERE member_id=$member_id");
		if($withdraw_approved){
			mysqli_query($connect,"INSERT INTO transactions(member_id,member_refer,transaction_date,transaction,transaction_description,bonus_id,income,expend,notification_status) VALUES($member_id,'',NOW(),'withdraw','withdraw_money_jwallet','','0','$withdraw_amount','unread') ");
			
			mysqli_query($connect,"UPDATE withdraw SET withdraw_status='approved' WHERE withdraw_id=$withdraw_id;");
		}
	}
}elseif($process=="basket_add"){
	$basket = $_SESSION['basket'];
	$product_id=$_REQUEST['product_id'];
	if($_REQUEST['product_qty']!=""){
		$product_qty=$_REQUEST['product_qty'];
	}else{
		$product_qty=$basket[$product_id]+1;
	}
	$member_id=$_REQUEST['member_id'];
	$basket["$product_id"]=$product_qty;
	$_SESSION['basket']=$basket;
	$goto=$site_url."/pos?member_id=$member_id";
}elseif($process=="basket_add_barcode"){
	$basket = $_SESSION['basket'];
	$product_barcode=$_REQUEST['product_barcode'];
	
	$product_id=mysqli_fetch_assoc(mysqli_query($connect,"SELECT product_id FROM products WHERE product_barcode=$product_barcode"));
	$product_id=$product_id['product_id'];
	
	if($product_id!=""){
	$product_qty=$basket[$product_id]+1;
	$member_id=$_REQUEST['member_id'];
	$basket["$product_id"]=$product_qty;
	$_SESSION['basket']=$basket;
	}
	$goto=$site_url."/pos?member_id=$member_id";
}elseif($process=="basket_delete"){
	$basket = $_SESSION['basket'];
	$product_id=$_REQUEST['product_id'];
	unset($basket["$product_id"]);
	$_SESSION['basket']=$basket;
	$member_id=$_REQUEST['member_id'];
	$goto=$site_url."/pos?member_id=$member_id";
}elseif($process=="order_cancel"){
	unset($_SESSION['basket']);
}

if(isset($goto)){
	header('LOCATION: '.$goto);
	die();
}
//echo "<meta http-equiv='refresh' content='0;url=$goto'>";
ob_end_flush();
?>