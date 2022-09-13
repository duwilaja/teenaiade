<?php 
 include 'inc.db.php';
 
 function walk($host,$community)
{
        $return = snmp2_walk($host,$community,NULL);
        return $return;
}

function walk_o($host, $community, $object) 
{
        $return = snmp2_walk($host,$community,$object);
        return $return;
}

$host="10.2.47.10";
$community="e-militer";
$OID="IF-MIB::ifInOctets";
$OID2="IF-MIB::ifOutOctets";
//$OID=".1.3.6.1.2.1.1.2.0";
//$OID=".1.3.6.1.2.1.1.1.0";

$st=0;
$conn = connect() or die ($failed_connection);
  $result = exec_qry($conn,"select (minute(current_time())+10)*10 as st");
  while($row = fetch_row($result)){
	$st=$row[0];
  }
$st="0";
  $result = exec_qry($conn,"select host,ip,ip2 from daily where ping+ping2>0 limit ".$st.", 500");
  while($row = fetch_row($result)){
	//echo $row[0]." : ".ping($row[1])."\n";
	
	//var_dump(walk($host,$community,NULL));
	$in="0";
	$out="0";
	
	$host=$row[1];
	$wo=walk_o($host,$community,$OID);
	$in=str_replace("Counter32: ","",$wo[1]);
	$wo=walk_o($host,$community,$OID2);
	$out=str_replace("Counter32: ","",$wo[1]);
	
	/*if($in=="0" && $out=="0"){
		$host=$row[2];
		$wo=walk_o($host,$community,$OID);
		$in=str_replace("Counter32: ","",$wo[1]);
		$wo=walk_o($host,$community,$OID2);
		$out=str_replace("Counter32: ","",$wo[1]);
	}*/
	//var_dump($wo);
	//echo $wo[1];
	
	$res=exec_qry($conn,"update daily set trafficin='".$in."',trafficout='".$out."' where host='".$row[0]."'");
	$res=exec_qry($conn,"insert into hourly values('".$row[0]."','".$row[1]."','".$row[2]."',date(now()),hour(current_time()),'".$in."','".$out."','0')");
	
  }

disconnect($conn);

?>
