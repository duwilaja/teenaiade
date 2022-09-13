<?php
$url="http://10.2.47.10/api/v0/";
$token="332bd88f541563b8e864a48aa5178afb";

	$url .= "devices/".base64_decode($_GET['h']);
	
	$ch = curl_init();
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_HEADER, false);
    curl_setopt($ch,CURLOPT_HTTPHEADER, array('X-Auth-Token: '.$token));
	curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "DELETE");
    
    $output=curl_exec($ch);
 
    curl_close($ch);
    
	echo $output;
?>