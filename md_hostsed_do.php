<?php
include 'inc.chksession.php';
include 'inc.db.php';

$conn = connect() or die ($failed_connection);

$tablename="hosts";
$columns="concat('<a href=\"md_hostsed_edit.php?id=',hostid,'\">',hostid,'</a>') as edit,hostname,ip,ip2,group1,group2,group3,group4,npsn,bw";
$colsearch="hostid,hostname,ip,ip2,group1,group2,group3,group4";

$result = exec_qry($conn,"select ".$columns." from ".$tablename." where $s_ORG");
$iTotal = num_row($result);
$iFilteredTotal = $iTotal;

$draw = $_GET["draw"];
$limit="";
if ( isset($_GET['start']) && $_GET['length'] != -1 ) {
			$limit = "LIMIT ".intval($_GET['start']).", ".intval($_GET['length']);
		}


$str = $_GET["search"]["value"];
$search = " where $s_ORG ";
if($str!=""){
	$acs=explode(",",$colsearch);
	$search.=" and (1=0 ";
	for($j=0;$j<count($acs);$j++){
		$search.=" or ".$acs[$j]." like '%".$str."%'";
	}
	$search.=")";
}

if($search!=""){
$sql = "select ".$columns." from ". $tablename ." ".$search;
$result = exec_qry($conn,$sql);
$iFilteredTotal = num_row($result);
}

$sql = "select ".$columns." from ". $tablename ." ".$search." order by hostid ".$limit;
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
