<?php
//default URL and token API to .190 (neo.matrik.co.id) change this to the correct link and token
$url="http://192.168.100.109/api/v0/";
$token="332bd88f541563b8e864a48aa5178afb";

//"devices/localhost/device_poller_perf"
$lnk=base64_decode($_GET['lnk']);
$url.=$lnk;

    $curl = curl_init();
    curl_setopt ($curl, CURLOPT_URL, $url);
	curl_setopt ($curl, CURLOPT_HEADER, false);
	curl_setopt ($curl, CURLOPT_HTTPHEADER, array('X-Auth-Token: '.$token));
    curl_exec ($curl);
    curl_close ($curl);
?>
