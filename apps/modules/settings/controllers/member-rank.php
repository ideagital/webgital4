<?php
/**
 * Controller
 */
$appDB = new appModel($connectDB);


if($uri[2] != '') $position_id = $uri[2];
// $position_id = select_data('positions','id');

$positions = $appDB->findAll("*","positions");
if(isset($position_id) && $position_id != "new")
$position = $appDB->find("*","positions","id=$position_id");
// echo "<pre>";print_r($position);exit();
// 
$action = $_REQUEST['action'];
if($action == "settings_positions_new"){
	$max_id = $appDB->findFirst('MAX(id)','positions');
	$new_id = $max_id+1;
	$insert = $appDB->insertRank("
	INSERT INTO positions(id,`name`,`point`,pool_percent,pool_share) 
	VALUES (
	'".$id."',
	'".$_REQUEST['name']."', 
	'".$_REQUEST['point']."', 
	'".$_REQUEST['pool_percent']."', 
	'".$_REQUEST['pool_share']."' 
	)");

	redirect_to($site_url.'/settings/rank/'.$new_id);
}elseif($action == "settings_positions_edit"){
	$edit = $appDB->editRank("
	UPDATE positions SET 
	name         = '".$_REQUEST['name']."', 
	point        = '".$_REQUEST['point']."', 
	pool_percent = '".$_REQUEST['pool_percent']."', 
	pool_share   = '".$_REQUEST['pool_share']."' 
	WHERE id     = $position_id;
	");
	
	redirect_to($site_url.'/settings/rank/'.$position_id);
}elseif($action == "settings_positions_delete"){
	$edit = $appDB->editRank("
	DELETE FROM positions WHERE id = $position_id;
	");
	redirect_to($site_url.'/settings/rank');
}
