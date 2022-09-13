<?php

include 'inc.db.php';

function ping($host)
{
        exec(sprintf('ping -c 1 -W 5 %s', escapeshellarg($host)), $res, $rval);
        return $rval === 0;
}

function pingx($host, $timeout = 5)
{
    $output = array();
    $com = 'ping -n -c 1 -W 5 ' . escapeshellarg($host);
    $exitcode = 0;
    exec($com, $output, $exitcode);
    if ($exitcode == 0 || $exitcode == 1)
    {
        foreach($output as $cline)
        {
            if (strpos($cline, ' bytes from ') !== FALSE)
            {
                $out = (int)ceil(floatval(substr($cline, strpos($cline, 'time=') + 5))*1000);
                return $out;
            }
        }
    }

    return FALSE;
}


$conn = connect() or die ($failed_connection);
  //$result = exec_qry($conn,"select host,ip,ip2 from daily where ping+ping2=0 order by host limit ".$argv[1].", ".$argv[2]);
  $result = exec_qry($conn,"select hostid,ip,ip2 from hosts");
  while($row = fetch_row($result)){
	//echo $row[0]." : ".ping($row[1])."\n";
	
	$pr=pingx($row[1]);
	if($pr){
		$res=exec_qry($conn,"update daily set ping='1' where host='".$row[0]."'");
		$res=exec_qry($conn,"update daily set log1='1',last_on=now(),ping_result='$pr' where host='".$row[0]."'");
		$res=exec_qry($conn,"update hourly set ping_result='$pr' where host='".$row[0]."' and checkhr=hour(now())");
	}else{
		$res=exec_qry($conn,"update daily set ping='0' where host='".$row[0]."'");
		$pr=pingx($row[2]);
		if($pr){
			$res=exec_qry($conn,"update daily set ping2='1' where host='".$row[0]."'");
			$res=exec_qry($conn,"update daily set log2='1',last_on=now(),ping_result='$pr' where host='".$row[0]."'");
			$res=exec_qry($conn,"update hourly set ping_result='$pr' where host='".$row[0]."' and checkhr=hour(now())");
		}else{
			$res=exec_qry($conn,"update daily set ping2='0',last_off=now() where host='".$row[0]."'");
		}
	}
  }

disconnect($conn);

?>
