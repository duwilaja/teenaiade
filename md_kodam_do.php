<?php
include 'inc.db.php';

$conn = connect() or die ($failed_connection);

$tablename="kodam";
$columns="kodamid,kodamname,`left`,`top`,concat('<a href=\"md_kodam_edit.php?id=',kodamid,'\">Edit</a>') as edit";

$result = exec_qry($conn,"select ".$columns." from ".$tablename);
$iTotal = num_row($result);
$iFilteredTotal = $iTotal;

$draw = $_GET["draw"];
$limit="";
if ( isset($_GET['start']) && $_GET['length'] != -1 ) {
			$limit = "LIMIT ".intval($_GET['start']).", ".intval($_GET['length']);
		}


$str = $_GET["search"]["value"];
$search = "";
if($str!=""){
	$search=" where kodamid like '%".$str."%' or kodam like '%".$str."%' ";
}

if($search!=""){
$sql = "select ".$columns." from ". $tablename ." ".$search;
$result = exec_qry($conn,$sql);
$iFilteredTotal = num_row($result);
}

$sql = "select ".$columns." from ". $tablename ." ".$search." order by kodamid,kodamname ".$limit;
//echo $sql;

$result = exec_qry($conn,$sql);

$output = array(
          "draw"=>$draw,
          "recordsTotal"=>$iTotal, // total number of records 
          "recordsFiltered"=>$iFilteredTotal, // if filtered data used then tot after filter
          "data"=>array()
        );


//$output = array();	

while($row = fetch_row($result)){
  $output["data"][] = $row ;
}

disconnect($conn);

echo json_encode( $output );
