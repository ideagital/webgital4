<?php
class memberprofile extends models{
   function addmember($add_member){
     $result = $this->db->prepare("insert into members(username,firstname,lastname,password,national_id,email,phone,country_code,address,subdistrict_id,sub_district,district,province,zipcode,gender,date_of_birth,sponsor,created_at) "
     . "values(:username,:firstname,:lastname,:password,:national_id,:email,:phone,:country_code,:address,:subdistrict_id,:sub_district,:district,:province,:zipcode,:gender,:date_of_birth,:sponsor,'".date("Y-m-d H:i:s")."')");
     $result->execute($add_member);
       if($result!==FALSE){
          $_SESSION['flash']['msg']="บันทึกข้อมูลเรียบร้อย";
          $_SESSION['flash']['type']='success';
          redirect_to('member/add');
        }else{
          $_SESSION['flash']['msg']="ไม่สามารถบันทึกข้อมูลได้";
          $_SESSION['flash']['type']='danger';
          redirect_to('member/add');
        }
   }
  function select_country(){
 		try{
 			$result = $this->db->prepare("select country,country_code from country");
 			$result -> execute();
 			$arr_country = $result->fetchAll();

 			return $arr_country;

 		}catch(PDOException $e){
 			echo $e->getMessage();
 		  return false;
 		}
 	}
  function select_sponsor(){
 		try{
 			$result = $this->db->prepare("select id,username,firstname,lastname,sponsor from members");
 			$result -> execute();
 			$arr_sponsor = $result->fetchAll();

 			return $arr_sponsor;

 		}catch(PDOException $e){
 			echo $e->getMessage();
 		  return false;
 		}
 	}
}
