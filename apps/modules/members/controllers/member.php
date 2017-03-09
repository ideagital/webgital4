<?php
################################################
$memberprofile = new memberprofile($connectDB);
$arr_country = $memberprofile->select_country();
$arr_sponsor = $memberprofile->select_sponsor();
################################################

$action=!empty($_POST['action'])?$_POST['action']:null;

if($action=='add'){
  if(!empty($_POST['firstname']) && !empty($_POST['lastname'])){
    $add_member = array(
      'username'        =>$_POST['username'],
      'firstname'       =>$_POST['firstname'],
      'lastname'        =>$_POST['lastname'],
      'password'        =>md5(substr($_POST['national_id'],9,4)),
      'national_id'     =>$_POST['national_id'],
      'email'           =>$_POST['email'],
      'phone'           =>$_POST['phone'],
      'country_code'    =>$_POST['country_code'],
      'address'         =>$_POST['address'],
      'subdistrict_id'  =>$_POST['subdistrict_id'],
      'sub_district'    =>$_POST['sub_district'],
      'district'        =>$_POST['district'],
      'province'        =>$_POST['province'],
      'zipcode'         =>$_POST['zipcode'],
      'gender'          =>$_POST['gender'],
      'date_of_birth'   =>$_POST['date_of_birth'],
      'sponsor'         =>$_POST['sponsor'],
    );
    $memberprofile->addmember($add_member);
  }
}
