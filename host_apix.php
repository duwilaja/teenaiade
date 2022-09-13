<?php
$host=$_GET['hi'];

include 'inc.db.php';

$ada=false;
$conn=connect();
$ip="x.x.x.x";
$rs=exec_qry($conn,"select ip from hosts where hostid='$host'");
if($row=fetch_row($rs)){
	$ada=true;
	$ip=$row[0];
}
disconnect($conn);
header("Location: host_api.php?ip=".$ip);
?>