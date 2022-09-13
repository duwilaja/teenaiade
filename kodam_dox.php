<?php
include 'inc.chksession.php';
include 'inc.db.php';

$txt="";
$id=$_GET['id'];
$grp3="";
$grpcolor="black";
$tot=0;
$inac=0;
$act=0;

 $conn=connect();
 
  $sql="select h.group3,h.hostid,h.hostname,hostdesc,h.group1,h.bw,h.npsn,if(d.ping+d.ping2>0,'ON','OFF') as onoff,h.ip,h.ip2 from kodam k join hosts h on kodamid=group2 left join daily d on h.hostid=d.host where $s_ORG and group2='".$id."' order by group3,urutanh";
  //echo $sql;
  $res=exec_qry($conn,$sql);
  echo '<table width="100%" class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-small uk-text-left">';
  echo '<tr style="font-size:11px;font-weight:bold;"><td>Host</td><td>IP WAN</td><td>IP LAN</td><td>Nama</td><td>Alamat</td><td>Layanan</td><td>Bandwidth</td><td>PIC</td><td>ON/OFF</td></tr>';
  while($row=fetch_row($res)){
  if($grp3!=$row[0]){
	  $grp3=$row[0];
	  $baru=true;
	  echo '<tr><td colspan="10" bgcolor="#ffcc00">'.$grp3.'</td></tr>';
  }
  if($row[7]=="OFF"){
	  $inac++;
	  $color='red';
  }else{
	  $act++;
	  $color='green';
  }
  $tot++;
  echo '<tr><td>'.$row[1].'</td><td>'.$row[8].'</td><td>'.$row[9].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td><td style="color:'.$color.';">'.$row[7].'</td></tr>';
  //$txt.='<a href="onoff_hosts.php?oo=-1&jar=&grp4='.$row[0].'"><img src="images/'.$color.'_alert.gif" width="15px" height="15px" style="position:absolute;top:'.$row[3].'px;left:'.$row[2].'px;" title="'.$row[1].'&#10;Total:'.$row[4].'&#10;OK:'.$row[5].'&#10;Inactive:'.$inac.'"></a>';
	//$txt.='<a href="host.php?hostid='.$row[1].'"><img src="images/'.$color.'_alert.gif" width="15px" height="15px" style="position:absolute;top:'.$row[3].'px;left:'.$row[4].'px;" title="'.$row[2].'&#10;'.$row[6].'&#10;PIC:'.$row[7].'"></a>';
  }
  
  echo '</table>';
  
  disconnect($conn);
/*$t='<center><div style="height:500px;"><img src="peta/'.$map.'" style="max-width:100%;max-height:100%;"></div></center>
    <br /><br /><div class="uk-width-medium-1-2 uk-container uk-container-center"><table width="50%" class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-small uk-text-center">
	<tr><td style="border:1px black solid;">Active</td><td style="border:1px black solid;"><a href="onoff_hosts.php?oo=1&grp2='.$id.'">'.$act.'</a></td></tr>
	<tr><td style="border:1px black solid;">Inactive</td><td style="border:1px black solid;"><a href="onoff_hosts.php?oo=0&grp2='.$id.'">'.$inac.'</a></td></tr>
	<tr><td style="border:1px black solid;">Total</td><td style="border:1px black solid;"><a href="onoff_hosts.php?oo=-1&grp2='.$id.'">'.$tot.'</a></td></tr></table></div>';
  echo $txt.$t;
  */
/*echo '<a href="nn"><img src="images/yellow_alert.gif" width="15px" height="15px" style="position:absolute;top:240px;left:230px;" title="aceh&#10;ntotal:0&#10;tt:0"></a>
        <img src="images/yellow_alert.gif" width="15px" height="15px" style="position:absolute;top:500px;left:500px;">
        <img src="images/yellow_alert.gif" width="15px" height="15px" style="position:absolute;top:480px;left:460px;">
        <img src="images/yellow_alert.gif" width="15px" height="15px" style="position:absolute;top:370px;left:1000px;">
        <img src="images/yellow_alert.gif" width="15px" height="15px" style="position:absolute;top:420px;left:1120px;">';
*/
		?>
