<?php
/**
 * Models
 */
class appModel extends Models
{
	public function InvoicesTotal()
	{
		$sql = "SELECT
			orders.id AS 'invoice_id',
			CONCAT(firstname,' ',lastname) AS fullname,
			orders.total_price , orders.created_at ,orders.status
			FROM orders
			LEFT JOIN members ON orders.member_id = members.id
			";
		try
  		{
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
			 return $data;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
		   	return false;
		}
	}


	public function ViewInvoice($id = null)
	{
		$sql   = "
			SELECT 
			orders.id AS 'invoice_id',
			CONCAT(members.firstname,' ',members.lastname) AS 'member_fullname',
			members.phone AS 'member_phone',
			members.email AS 'member_email',
			CONCAT(members.address,' ',address_subdistrict.name,' ',address_district.name,' ',address_province.name,' ',address_district.postcode) AS 'member_address',
			orders.created_at AS 'invoice_date',
			total_price,
			discount 
			FROM orders 
			LEFT JOIN members ON orders.member_id = members.id
			LEFT JOIN address_subdistrict ON members.subdistrict_id = address_subdistrict.id
			LEFT JOIN address_district ON address_subdistrict.district_id = address_district.id
			LEFT JOIN address_province ON address_district.province_id = address_province.id
			WHERE orders.id = :id
			;";

		try
  		{
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			$invoice=$stmt->fetch(PDO::FETCH_ASSOC);


			// Set Discount And Vat
			$vat = $invoice['total_price'] * 0.07 + 0;
			$discount = $invoice['discount'] + 0;



			// Set Discount And Vat
			$invoice['vat'] = $invoice['total_price'] * 0.07 + 0;
			// $discount = $invoice['discount'] + 0;



			// Select Product in Invoice 
			$items_sql = "
				SELECT *,
				(products.price_member * order_items.amount) AS 'total_price'
				FROM order_items
				LEFT JOIN products ON order_items.products_id = products.id
				WHERE order_items.orders_id = :invoice_id
				";

			$stmt2 = $this->db->prepare($items_sql);
			$stmt2->bindParam(':invoice_id', $invoice['invoice_id'], PDO::PARAM_INT);
			$stmt2->execute();
			$items=$stmt2->fetchAll(PDO::FETCH_ASSOC);

			$invoice['items'] = $items;			 
			return $invoice;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
		   	return false;
		}
	}
}