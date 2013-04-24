<?php 
    include('../connect_mysql.php');
/*
Structure of connect_mysql.php is something like this:
///////


$link = @mysqli_connect('localhost','mysql_username','mysql_password'); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysqli_error($link)); 
} else{session_start();}

include('../central_lib.php'); //This is optional if using a library of codes - in this case we are using Open Library of LoudCurtain

$app_id = "FB_appid";
$app_secret = "FB_appsecret";


////////

For security reasons we can't share the file itself as it contains some information that should remain private.
*/

   $my_url = lc_request(array("next_url","my_url"),"http://loudcurtain.com/extra/blendernation/fb/login.php"); //This function can be found in lclib.php


if(!isset($_SESSION['access_tok_bnation'])){
	  $code = $_REQUEST["code"];

   if(empty($code)) {
     $_SESSION['bnation_state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
     $dialog_url = "https://www.facebook.com/dialog/oauth?client_id=" 
       . $app_id . "&redirect_uri=" . urlencode("http://loudcurtain.com/extra/blendernation/fb/login.php") . "&state="
       . $_SESSION['bnation_state'] . "&scope=user_birthday,read_stream,email,read_requests,user_photos";

     header("Location: " . $dialog_url);
   }

	
  
   if($_SESSION['bnation_state'] && ($_SESSION['bnation_state'] === $_REQUEST['state'])) {

     $token_url = "https://graph.facebook.com/oauth/access_token?"
       . "client_id=" . $app_id . "&redirect_uri=" . urlencode("http://loudcurtain.com/extra/blendernation/fb/login.php")
       . "&client_secret=" . $app_secret . "&code=" . $code ."&my_url=".$my_url;

     $response = viacurl($token_url,0);
     $params = null;echo $response;
     parse_str($response, $params);
	
	 $_SESSION['access_tok_bnation'] = $params['access_token'];

		if(!isset($_SESSION['bnation_uid'])){
	$graph_url = "https://graph.facebook.com/me?access_token=" . $params['access_token'];
    $graph_url.= "&fields=id,name,email,first_name,last_name,username,hometown,location,gender,birthday";
	
	$userinfo = viacurl($graph_url,0);
     $user = json_decode($userinfo);
	 $email = @$user->email; $fbid = @$user->id; $fname=$user->first_name; $lname=$user->last_name; $uname = @$user->username; $city=@$user->hometown.';'.@$user->location; $gender=@$user->$gender; $bday=strtotime(@$user->birthday);
            
            if($gender=='male'){$gender=1;}else if($gender=='female'){$gender=0;}
	 $q=mysqli_query($link,"SELECT `uid`,`fbid`,`username`,`firstname`,`lastname` FROM `bnation`.`users` WHERE `email`= '$email' OR `fbid` = '$fbid';");
	 $searchcount=mysqli_num_rows($q);
		if($searchcount==1){
			while($r=mysqli_fetch_array($q,MYSQL_NUM)){
				$_SESSION['bnation_uid']=$r[0];$uname=$r[2];$fname=$r[3];$lname=$r[4];
				if($r[1]!=$fbid){mysqli_query($link,"UPDATE `bnation`.`users` SET `fbid`='$fbid' WHERE `uid` = '$r[0]' ;");}}
		}else if($searchcount==0){
			if(mysqli_query($link,"INSERT INTO `bnation`.`users` (`uid`,`email`,`firstname`, `lastname`,`fbid`,`setup`,`username`,`city`) VALUES (NULL,'$email','$fname', '$lname', '$fbid','0','$uname','$city') ;")){
			$qq=mysqli_query($link,"SELECT `uid` FROM `bnation`.`users` WHERE `email`= '$email' OR `fbid` = '$fbid';");
			while($rr=mysqli_fetch_array($qq,MYSQL_NUM)){
				$_SESSION['bnation_uid']=$rr[0];}}
		}
	$_SESSION['bnation_ufname']=$fname;$_SESSION['bnation_ulname']=$lname;$_SESSION['bnation_uname']=$uname;shell_exec("say New user on LoudCurtain");
		}
	header("Location: http://loudcurtain.com/extra/blendernation/");
	}	
}else{echo "Please Logout First!!! Access_token already exists"; unset($_SESSION['access_tok_bnation']); header("Location: http://loudcurtain.com/extra/blendernation/fb/login.php?next_url=$my_url");}
 ?>

