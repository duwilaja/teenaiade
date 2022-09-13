<?php

include 'inc.db.php';

$conn = connect() or die ($failed_connection);

$totr=0;
$maxcon=0;

//concurrent
$result=exec_qry($conn,"select count(*) from daily where (ping+ping2)>0");
if($row=fetch_row($result)){
	$maxcon=$row[0];
}

//current total report
$result=exec_qry($conn,"select count(*) from daily where (log1+log2)>0");
if($row=fetch_row($result)){
	$totr=$row[0];
}

//echo $maxcon." maxcon.".$totr." totr";
//reset the log
if($maxcon>$totr){
	$delta=$maxcon-$totr;
	$res=exec_qry($conn,"update daily set log1=ping,log2=ping2  where log1='0' and log2='0' limit $delta");
}
  
disconnect($conn);

?>

