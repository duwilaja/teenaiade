<?php
$url="http://10.2.47.10/api/v0/";
$token="332bd88f541563b8e864a48aa5178afb";

	$url .= "devices";
	$h=base64_decode($_GET['h']);
	$v=$_GET['v'];
	if($v==""){$v="v2c";}
	$c=$_GET['c'];
	if($c==""){$c="public";}
	$p=$_GET['p'];
	if($p==""){$p="161";}
	
	$data = array("hostname" => $h,"version" => $v,"community" => $c,"port" => $p);
	$postData = json_encode($data);
   
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_HEADER, false);
    curl_setopt($ch,CURLOPT_HTTPHEADER, array('X-Auth-Token: '.$token,'Content-Type:application/json'));
	curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch,CURLOPT_POSTFIELDS, $postData);    
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    
//	echo "horee";
	echo $output;
?>