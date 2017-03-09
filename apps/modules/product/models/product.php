<?php

class productDetail extends models{



	function categoryAll(){

		$category_sql = "SELECT * FROM product_category ORDER BY category ASC";
		$stmt = $this->db->prepare($category_sql);
		$stmt->execute();
		$arrCategory = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $arrCategory;
	}

	function imagesAll($conditions){

		$image_sql = "SELECT CONCAT(product_pictures.id,'.',product_pictures.type) AS picture , `index` , id 
					  FROM product_pictures WHERE $conditions";

		$stmt = $this->db->prepare($image_sql);
		$stmt->execute();
		$arrImages = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $arrImages;
	}

	function selectImageProduct($conditions){
		$stmt_sql = "SELECT * FROM product_pictures WHERE $conditions";
		$stmt = $this->db->prepare($stmt_sql);
		$stmt->execute();
		$imageFetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $imageFetch;
	}

	function categoryNew($val1,$val2){
		$category_sql = "INSERT INTO product_category VALUES($val1,'$val2')";
		$stmt = $this->db->prepare($category_sql);
		$stmt->execute();
	}

	function updateProduct($product_name,$product_description,$product_detail,$product_price,$product_price_member,$product_point,$product_weight,$product_qty,$product_barcode,$product_url,$product_category,$conditions){
		$product_sql = "UPDATE products SET
			name         ='$product_name',
			description  ='$product_description',
			detail       ='$product_detail',
			price        ='$product_price',
			price_member ='$product_price_member',
			point        ='$product_point',
			weight       ='$product_weight',
			qty          ='$product_qty',
			barcode      ='$product_barcode',
			url          ='$product_url',
			category_id  ='$product_category' 
			$conditions";

		$stmt = $this->db->prepare($product_sql);
		return ($stmt->execute()) ?  true :  false;
	}

	function addProduct($product_id,$product_name,$product_description,$product_detail,$product_price,$product_price_member,$product_point,$product_weight,$product_qty,$product_barcode,$product_url,$product_category){
		$product_new_sql = "INSERT INTO products (id,name,description,detail,price,price_member,point,weight,qty,barcode,url,category_id)
							VALUES ($product_id,'$product_name','$product_description','$product_detail','$product_price','$product_price_member','$product_point','$product_weight','$product_qty','$product_barcode','$product_url','$product_category')";
		$stmt = $this->db->prepare($product_new_sql);
		return ($stmt->execute()) ?  true : false;
	}

	function uploadImages($tables,$picture_id,$file_type,$product_index,$product_id){
		$upload_sql = "INSERT INTO $tables VALUES($picture_id,'$file_type','$product_index','$product_id')";
		$stmt = $this->db->prepare($upload_sql);
		$stmt->execute();
	}

}
