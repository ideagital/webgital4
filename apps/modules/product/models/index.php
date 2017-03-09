<?php

class productIndex extends Models{
	
	public function productAll(){
		$strSQL = "	SELECT 
					products.id,
					products.name,
					products.category_id,
					products.price_member,
					products.point,
					products.qty,
					CONCAT(product_pictures.id,'.',product_pictures.type) AS picture
					FROM products
					LEFT JOIN product_pictures ON products.id=product_pictures.product_id AND product_pictures.index='#'
					ORDER BY name ASC";
		$stmt = $this->db->prepare($strSQL);
		$stmt->execute();
		$arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$category_arr = array();
	
		$i=0;
		foreach($arrValues AS $key => $value):
			$category_name = '';
			$category_id = $value['category_id'];
			$category_id = str_replace("[", "", $category_id);
			$category_id = str_replace("]", "", $category_id);
			$category_id = explode(",", $category_id);
			
			$x=0;
			foreach ($category_id as $id) {
				$stmt = $this->db->prepare("SELECT category FROM product_category WHERE id = $id");
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				if($x != 0) $category_name.= ', ';
				$category_name.= $result['category'];
				$x++;
			}
						
			$arrValues[$i]['category_name'] = $category_name;
			$i++;
		endforeach;

		return $arrValues;
	}
	
}

?>