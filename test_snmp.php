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

$host="118.98.142.202";
//$host="180.250.110.57";
$community="diknas";
//$community="idv90we3rnov90wer";
$OID="IF-MIB::ifInOctets";
$OID2="IF-MIB::ifOutOctets";
//$OID=".1.3.6.1.2.1.1.2.0";
//$OID=".1.3.6.1.2.1.1.1.0";

$wo=walk_o($host,$community,$OID);	
	var_dump($wo);
echo "WO[1]=".str_replace("Counter32: ","",$wo[1]);
	

?> 
