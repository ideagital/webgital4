<?php
function Database(){
	include(SITE_ROOT."apps/database.php");
	return $connectDB;
}

function encode($string,$key) {
	$j=null;
	$hash=null;
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string,$i,1));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
    }
    return $hash;
}

function decode($string,$key) {
	$j=null;
	$hash=null;
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i+=2) {
        $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= chr($ordStr - $ordKey);
    }
    return $hash;
}
function link_to($url){
	return $url;
}
function redirect_to($url){
	header("Location: $url");
}
function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
function image_resize(array $file, $width, $height ,$path){
	/* Get original image x y*/
	list($w, $h) = getimagesize($file['tmp_name']);
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
	//$path = '../gallery/products/thumb/'.$_FILES['image']['name'];
	/* read binary data from image file */
	$imgString = file_get_contents($file['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagealphablending($tmp, false);
	$transparency = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
	imagefill($tmp, 0, 0, $transparency);
	imagesavealpha($tmp, true);
	imagecopyresampled($tmp, $image,
    0, 0,
    $x, 0,
    $width, $height,
    $w, $h);
	/* Save image */
	switch ($file['type']) {
	case 'image/jpeg':
		imagejpeg($tmp, $path, 100);
		break;
	case 'image/png':
		imagepng($tmp, $path, 0);
		break;
	case 'image/gif':
		imagegif($tmp, $path);
		break;
    default:
		exit;
		break;
	}
	return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}


function me($setting){ 
	$connect=Database();
	isset($_SESSION['me_login'])?$me_login=$_SESSION['me_login'] : $me_login=null;
	if(!empty($me_login)){
		$query=mysqli_query($connect,"SELECT value FROM members_settings WHERE setting='$setting' AND member_id='$me_login';");
		$result=mysqli_fetch_assoc($query);
		$value=$result['value'];
	}else{
		$value=null;
	}
	return $value;
}
function country($attribute){
	if($_SESSION['currency_code']!=""){
		$currency_code=$_SESSION['currency_code'];
	}else{
		$currency_code=me('currency_code');
	}
	if($currency_code==""){
		$currency_code="usd";
	}
	$value=mysql_result(mysql_query("SELECT $attribute FROM country WHERE currency_code='$currency_code'"),0);
	return $value;
}
function currency($amount=0,$decimal=0){
	$connect=Database();
	isset($_SESSION['currency_code'])?$currency_code=$_SESSION['currency_code'] : $currency_code=me('currency_code');
	if(empty($currency_code)){
		$currency_code="usd";
	}
	if(empty($decimal)){
		if($currency_code=="usd"){
			$decimal=2;
		}else{
			$decimal=0;
		}
	}
	$query=mysqli_query($connect,"SELECT currency_symbol,currency_rate FROM country WHERE currency_code='$currency_code'");
	$result=mysqli_fetch_assoc($query);
	$symbol=$result['currency_symbol'];
	$value=$result['currency_rate']*$amount;
	return $symbol.number_format($value,$decimal);
}
function wordvar($wordvar){
	$connect=Database();
	isset($_SESSION['language_code'])?$language_code=$_SESSION['language_code'] : $language_code=me('language_code');
	if(empty($language_code)) $language_code="en";
	
	$query=mysqli_query($connect,"SELECT word FROM wordvars WHERE wordvar='$wordvar' AND language_code='$language_code'");
	if(mysqli_num_rows($query)>0){
		$result=mysqli_fetch_assoc($query);
		$word=$result['word'];
		return $word;
	}else{
		return $wordvar;
	}
}




//check user login check member from database  success 
function doLogin()
{
	$connect=Database();
	include("setting-jinuemall.php");
	// if we found an error save the error message in this variable
	$errorMessage = '';
	
	//$userName = $_POST['txtUserName'];
	//$password = $_POST['txtPassword'];
    isset($_REQUEST['txtUserName'])?$username = $_REQUEST['txtUserName'] : $username=null;
	isset($_REQUEST['txtPassword'])?$password = encode($_REQUEST['txtPassword'],$private_key) : $password=null;
	isset($_REQUEST['remember'])?$remember = $_REQUEST['remember'] : $remember=null;
	
    //$mdpass = encode($password,$private_key);
	
	// first, make sure the username & password are not empty
	if ($username == '') {
		$errorMessage = 'Please To Check Username';
	} else if ($password == '') {
		$errorMessage = 'Please To Check Password';
	} else {
		// check the database and see if the username and password combo do match
		
		$sql = "SELECT member_id,member_username 
				FROM members
				WHERE member_username = '$username' AND member_password = '$password'  ";
		$query = mysqli_query($connect,$sql);
		$numrow = mysqli_num_rows($query);
		if($numrow == 1){
			$row = mysqli_fetch_object($query);
			$_SESSION['me_login'] = $row->member_id;
			
			// log the time when the user last login
			$sqlupdate = mysqli_query("UPDATE member
			        SET last_login = NOW() 
					WHERE member_id = '{$row->member_id}'");
			
			if ($remember==true){
				setcookie('login_username',$username,time()+60);
				setcookie('login_password',$password,time()+60);
			}else{
				setcookie('login_username',$username);
				setcookie('login_password',$password);
			}	
			// now that the user is verified we move on to the next page
            // if the user had been in the admin pages before we move to
			// the last page visited
			if (isset($_SESSION['login_return_url'])) {
				header('Location: ' . $_SESSION['login_return_url']);
				exit;
			} else {
				//print $_SESSION['member_id'];
				header("Location: $site_url");
				exit;
			}
		}else{
			$errorMessage = 'Wrong Username and Password';
		}		
			
	}
	return $errorMessage;
	
}

/*
	Logout a user
*/
function doLogout()
{
	include("setting-jinuemall.php");
	if (isset($_SESSION['me_login'])) {
		unset($_SESSION['me_login']);
		session_unset('me_login');
	}
		
	header("Location: $site_url");
	exit;
}
//end set function checkuser


//function get country new by pu 18/01/59
function getcountry($ipaddress){
	$connect=Database();
	
	$query = mysqli_query($connect,"select country_code from geoIP where '$ipaddress' between  ip_long_from and ip_long_to limit 0,1");
	$result = mysqli_fetch_object($query);
	
	return $result->country_code;
}

function truncateStr($str, $maxChars, $holder="...."){

    // ตรวจสอบความยาวของประโยค
    if (strlen($str) > $maxChars ){
        return strip_tags(trim(mb_substr($str, 0, $maxChars,'UTF-8'))) . $holder;
    }   else {
        return strip_tags($str);
    }
    
    //by puwanath baibua kapongidea.com
}
?>