<?php

include 'inc.db.php';

function ping($host)
{
        exec(sprintf('ping -c 1 -W 5 %s', escapeshellarg($host)), $res, $rval);
        return $rval === 0;
}


$conn = connect() or die ($failed_connection);
  //$result = exec_qry($conn,"select host,ip,ip2 from daily where ping+ping2=0 order by host limit ".$argv[1].", ".$argv[2]);
  $result = exec_qry($conn,"select host,ip,ip2 from daily where ping+ping2=0");
  while($row = fetch_row($result)){
	//echo $row[0]." : ".ping($row[1])."\n";
	
	if(ping($row[1])){
		$res=exec_qry($conn,"update daily set ping='1' where host='".$row[0]."'");
	}else{
		//$res=exec_qry($conn,"update daily set ping='0' where host='".$row[0]."'");
	}
	if(ping($row[2])){
		$res=exec_qry($conn,"update daily set ping2='1' where host='".$row[0]."'");
	}else{
		//$res=exec_qry($conn,"update daily set ping2='0' where host='".$row[0]."'");
	}
  }

disconnect($conn);

?>
