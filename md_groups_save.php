<?php
include 'inc.db.php';

$sv=$_POST['sv'];

$conn = connect() or die ($failed_connection);

$tablename="groups";
$key="rowid";
$columns="grpid,grpname,grpgroup";
$acol=explode(",",$columns);

$sqli="";
$sqlu="";
$sqld="delete from ".$tablename." where ".$key."='".$_POST[$key]."'";

for($i=0;$i<count($acol);$i++){
	if($sqli!=""){$sqli.=",";}
	if($sqlu!=""){$sqlu.=",";}
	$sqli.="'".$_POST[$acol[$i]]."'";
	if($acol[$i]!=$key){
		$sqlu.=$acol[$i]."='".$_POST[$acol[$i]]."'";
	}
}
$sqli="insert into ".$tablename."(".$columns.") values (".$sqli.")";
$sqlu="update ".$tablename." set ".$sqlu." where ".$key." = '".$_POST[$key]."'";

if($sv=="NEW"){
	$sql=$sqli;
}
if($sv=="EDIT"){
	$sql=$sqlu;
}
if($sv=="DELETE"){
	$sql=$sqld;
}
//echo $sql;

$result = exec_qry($conn,$sql);

disconnect($conn);

header('Location: md_groups.php');

