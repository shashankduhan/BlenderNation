<?php
function viacurl($location,$filetype){
if($filetype!=0){header("Content-Type: $filetype");}
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $location);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

	$out = curl_exec($ch);

	curl_close($ch);

	return rtrim($out,1);
}
function fetchPageId($x){
	include('link.php');
	$q=mysqli_query($link,"SELECT `pageid` FROM `loudcurt_hh`.`page` WHERE `compq_name`='$x' OR `pageid` = '$x';");
	$r=mysqli_fetch_array($q,MYSQL_NUM);
	return $r[0];
}

function trim_value(&$value) 
{ 
    $value = trim($value); /*To make whole array trimmed use array_walk($thearray,'trim_value')*/
}

function lc_request($values,$default){
	$value = @$_REQUEST[$values[0]];
	for($i=1;$i<count($values);$i++){
		if(empty($value)){$value = @$_REQUEST[$values[$i]];}
	}
	if(empty($value)){$value=$default;}
	return $value;
}
?>