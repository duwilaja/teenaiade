<?php 
include "inc.db.php";

$u=$_POST["u"];
$p=$_POST["p"];

$sql="select * from users where uid='$u' and upwd='$p'";

	$conn = connect() or die($failed_conn);
	$rs = exec_qry($conn,$sql) or die($failed_query);
	if ($row = fetch_row($rs)) {
		session_start();
		if (!isset($_SESSION['s_ID'])) {
    		$_SESSION['s_ID'] = $u;
		}
		if (!isset($_SESSION['s_NAME'])) {
    		$_SESSION['s_NAME'] = $row[1];
		}
		if (!isset($_SESSION['s_UGRP'])) {
    		$_SESSION['s_UGRP'] = $row[3];
		}
		if (!isset($_SESSION['s_CENTER'])) {
    		$_SESSION['s_CENTER'] = $row[5];
		}
		if (!isset($_SESSION['s_ORG'])) {
			if($row[4]==""){
				$_SESSION['s_ORG'] = " 1=1 ";
				$_SESSION['s_ZOOM'] = "5";
				$header="home.php";
			}else{
				$_SESSION['s_ORG'] = " group2='".$row[4]."' ";
				$_SESSION['s_ZOOM'] = "6";
				$header="kodam.php?grp2=".$row[4];
			}
			$_SESSION['s_HOME']=$header;
		}
		/*if (!isset($_SESSION['s_ISADMIN'])) {
    		$_SESSION['s_ISADMIN'] = $row[4];
		}
		$msg = "Welcome to Site Manager.<br>";
		$title = "Welcome ".$_SESSION['s_NAME'];*/
		header("Location: ".$header);
	}else{
		$msg="Invalid userID or password.";
		header("Location: index.php?m=$msg");
	}

	disconnect($conn);
 ?>
