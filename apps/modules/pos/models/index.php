<?php
ob_start();
$session_id=session_id();
error_reporting(E_ALL);


class posDetail extends Models{

	function categoryAll(){
		$category_sql = "SELECT * FROM product_category ORDER BY category ASC";
		$stmt = $this->db->prepare($category_sql);
		$stmt-> execute();
		$arrCategory = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $arrCategory;
	}
	function productAll($conditions){
		$product_sql = "SELECT * FROM products $conditions";
		$stmt = $this->db->prepare($product_sql);
		$stmt-> execute();
		$productAll = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $productAll;
	}
	function countProduct($conditions){
		$count_sql = "SELECT COUNT(id) as countproduct FROM products $conditions";
		$stmt = $this->db->prepare($count_sql);
		$stmt-> execute();
		$countPro = $stmt->fetch(PDO::FETCH_ASSOC);
		return $countPro;
	}
	function productCategory($conditions){
		$products_query = "SELECT * FROM products WHERE category_id LIKE $conditions";
		$stmt = $this->db->prepare($products_query);
		$stmt-> execute();
		$productCategory = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $productCategory;
	}
	function productPicture($conditions){
		$picture_sql = "SELECT * FROM product_pictures WHERE `index`='#' AND $conditions";
		$stmt = $this->db->prepare($picture_sql);
		$stmt-> execute();
		$picture = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $picture; 
	}
	function memberAll(){
		$member_sql = "SELECT id,firstname,lastname,username FROM members ORDER BY firstname";
		$stmt = $this->db->prepare($member_sql);
		$stmt-> execute();
		$memberAll = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $memberAll;
	}
	function members($conditions){
		$members_sql = "SELECT * FROM members $conditions";
		$stmt = $this->db->prepare($members_sql);
		$stmt-> execute();
		$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $members;
		// return $members_sql;

	}
	function memberLogin($conditions){
		$member_sql = "SELECT * FROM members WHERE $conditions";
		$stmt = $this->db->prepare($member_sql);
		$stmt-> execute();
		$memberLogin = $stmt->fetch(PDO::FETCH_ASSOC);
		return $memberLogin;
	}
	function basketBarcode($conditions){
		$bask_sql = "SELECT id FROM products $conditions";
		$stmt = $this->db->prepare($bask_sql);
		$stmt-> execute();
		$basketBarcode = $stmt->fetch(PDO::FETCH_ASSOC);
		return $basketBarcode;
	}
	function memberAddress($conditions){
		$addr_sql = "SELECT * FROM viewaddressmember $conditions";
		$stmt = $this->db->prepare($addr_sql);
		$stmt-> execute();
		$memberAddress = $stmt->fetch(PDO::FETCH_ASSOC);
		return $memberAddress;
	}

}
















 ?>