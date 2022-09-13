<?php
include 'inc.chksession.php';

$skr=date("Y-m-d",time());
$vjar=$_GET['jar'];
$vdf=$_GET['df'];
$vdt=$_GET['dt'];
$voo='>='.$_GET['oo'];
$vgrp4=$_GET['grp4'];
$vgrp3=$_GET['grp3'];
$vgrp2=$_GET['grp2'];
$vr=$_GET['r'];

$onoff="ALL";
if ($_GET['oo']=="0"){
$onoff="OFF";
}
if ($_GET['oo']=="1"){
$onoff="ON";
}

$filename = $onoff.'_'.$vjar.'_'.date('dmY').'.xls';
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");

include 'inc.db.php';

$conn = connect() or die ($failed_connection);

if ($_GET['oo']=="0"){
$voo='='.$_GET['oo'];
}

$header="Host,Name,IP WAN,IP LAN,Jaringan,Instansi,Sub Instansi,Propinsi,ON/OFF,PIC,Last On,Last Off";

if ($_GET['oo']=="0"){
$voo='='.$_GET['oo'];
}

$link="distinct concat('<a href=\"host.php?hostid=',hostid,'\">',hostid,'</a>') as chkdt";
// $columns="hostid,hostname,a.ip,group1,group2,group3,group4,if(b.ping+b.ping2+log1+log2+log3>0,'ON','OFF') as onoff";
$columns="hostid,hostname,a.ip,a.ip2,group1,group2,group3,group4,if(b.ping+b.ping2+log1+log2+log3>0,'ON','OFF') as onoff,npsn,checkdt";
$columns="hostid,hostname,a.ip,a.ip2,group1,group2,group3,group4,if(log1+log2+log3>0,'ON','OFF') as onoff,npsn,last_on,last_off";

if($vdf=="" || $vdt=="" || ($vdf==$skr && $vdt==$skr)){
	$tablename="hosts a join daily b on hostid=host";
	$where="$s_ORG and b.ping+b.ping2+log1+log2+log3".$voo." and group1 like '%".$vjar."%'";
	$where="$s_ORG and b.ping+b.ping2".$voo." and group1 like '%".$vjar."%'";
	$columns="hostid,hostname,a.ip,a.ip2,group1,group2,group3,group4,if(b.ping+b.ping2>0,'ON','OFF') as onoff,npsn,last_on,last_off";

	if($vr=="y"){
		$where="$s_ORG and log1+log2+log3".$voo." and group1 like '%".$vjar."%'";
		$columns="hostid,hostname,a.ip,a.ip2,group1,group2,group3,group4,if(log1+log2+log3>0,'ON','OFF') as onoff,npsn,last_on,last_off";
	}
}else{
$tablename="hosts a join daily_h b on hostid=host";
//$where="$s_ORG and group3 like '%".$vgrp3."%' and group2 like '%".$vgrp2."%' and group1 like '%".$vjar."%' and b.ping+b.ping2+log1+log2+log3".$voo." and activedt <= '".$vdt." 23:59:59' and b.checkdt between '".$vdf."' and '".$vdt." 23:59:59'";
$where="$s_ORG and group1 like '%".$vjar."%' and log1+log2+log3".$voo." and b.checkdt between '".$vdf."' and '".$vdt." 23:59:59'";
//if ($_GET['oo']=="0"){$where.=" and hostid not in (select hostid from daily_h where ping+ping2+log1+log2+log3>0 and checkdt between '".$vdf."' and '".$vdt." 23:59:59')";}
}

if ($vgrp2<>"") {
	$where.="  and group2='".$vgrp2."'";
}
if ($vgrp3<>"") {
	$where.="  and group3='".$vgrp3."'";
}
if ($vgrp4<>"") {
	$where.="  and group4='".$vgrp4."'";
}

// $result = exec_qry($conn,"select ".$columns." from ".$tablename);
// $iTotal = num_row($result);
// $iFilteredTotal = $iTotal;

$draw = $_GET["draw"];
$limit="";
if ( isset($_GET['start']) && $_GET['length'] != -1 ) {
			$limit = "LIMIT ".intval($_GET['start']).", ".intval($_GET['length']);
		}


// $str = $_GET["search"]["value"];
// $search = "";
// if($str!=""){
	// $search=$where." group1='".$vjar."' and hostname like '%".$str."%' or a.ip like '%".$str."%' or hostdesc like '%".$str."%' ";
// }


$search = $where;
/*if($search!=""){
$sql = "select ".$columns." from ". $tablename ." where ".$search;
$result = exec_qry($conn,$sql);
$iTotal = num_row($result);
$iFilteredTotal = num_row($result);
}*/

$sql = "select ".$columns." from ". $tablename ." where ".$search." ".$groupby." order by group2,group3,hostname,checkdt ".$limit;
//echo $sql;

$result = exec_qry($conn,$sql);

/*
$output = array(
          "draw"=>$draw,
          "recordsTotal"=>$iTotal, // total number of records 
          "recordsFiltered"=>$iFilteredTotal, // if filtered data used then tot after filter
          "data"=>array()
        );
*/

//$output = array();	


echo "<table>";
$h=explode(",",$header);
echo "<tr>";
for($x=0;$x<count($h);$x++){
		echo "<td>".$h[$x]."</td>";
	}
//echo "<td>ON/OFF</td></tr>";
echo "</tr>";

while($row = fetch_row($result)){
	echo "<tr>";
  for($x=0;$x<count($row);$x++){
		if($x==0){$y="'";}else{$y="";}
		echo "<td>".$y.$row[$x]."</td>";
	}
	echo "</tr>";
}

echo "</table>";

//while($row = fetch_row($result)){
  //$output["data"][] = $row ;
//}

disconnect($conn);

//echo json_encode( $output );
