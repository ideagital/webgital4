<?php
class Member extends Models{
	public function MemberAll(){
		try{
			$result = $this->db->prepare("select * from members inner join member_placement on members.id=member_placement.member_id");
			$result -> execute();
			$arr = $result->fetchAll();

			$i=0; foreach($arr AS $key => $value){
				$sponsor_id = $value['sponsor'];
				$sponsor = $this->db->prepare("select * from members  where members.id = :sponsor_id");
				$sponsor->bindParam(':sponsor_id', $sponsor_id, PDO::PARAM_INT);
				$sponsor->execute();
				$sponsor_result 				= $sponsor->fetch(PDO::FETCH_ASSOC);
				$arr[$i]['sponsor_username'] 	= $sponsor_result['username'];
				$arr[$i]['sponsor_firstname'] 	= $sponsor_result['firstname'];
				$arr[$i]['sponsor_lastname'] 	= $sponsor_result['lastname'];
				$i++;

			}
			$i=0; foreach($arr AS $key => $value){
				$upline_id = $value['upline'];
				$upline = $this->db->prepare("select * from members  where members.id = :upline_id");
				$upline ->bindParam(':upline_id', $upline_id, PDO::PARAM_INT);
				$upline ->execute();
				$upline_result 					= $upline->fetch(PDO::FETCH_ASSOC);
				$arr[$i]['upline_username'] 	= $upline_result['username'];
				$arr[$i]['upline_firstname'] 	= $upline_result['firstname'];
				$arr[$i]['upline_lastname'] 	= $upline_result['lastname'];
				$i++;

			}
			return $arr;

		}catch(PDOException $e){
			echo $e->getMessage();
		   	return false;
		}
	}
}
