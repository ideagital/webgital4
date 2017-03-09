<?php
$appModels = new Models($connectDB);

class MainController
{

	function link_to($url){
		include SITE_ROOT."apps/config.php";
		return $site_url."/".$url;
	}

}

$app = new MainController();

$count_member = $appModels->findFirst('COUNT(id)','members');
$count_members_unapprove = $appModels->findFirst('COUNT(*)','members',"status <> 'Active'") + 0;
