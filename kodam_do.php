<?php
include 'inc.chksession.php';
include 'inc.db.php';

$txt="";
$inac=0;
$tot=0;
$act=0;
$tina=0;
$map="";
$id=$_GET['id'];

 $conn=connect();
 
  //$sql="select k.map,h.hostid,h.hostname,h.top,h.left,if(d.ping+d.ping2+log1+log2+log3>0,'ON','OFF') as onoff,h.hostdesc,h.npsn from kodam k join hosts h on kodamid=group2 left join daily d on h.hostid=d.host where $s_ORG and group2='".$id."'";
  //$sql="select distinct k.map,h.group3,h.top,h.left,count(*) as tot,sum(if((d.ping+d.ping2+log1+log2+log3)>0,1,0)) as akt from kodam k join hosts h on kodamid=group2 left join daily d on h.hostid=d.host where $s_ORG and group2='".$id."' group by k.map,h.group3,h.top";
  //$sql="select k.map,group3,kr.top,kr.left,count(*) as tot,sum(if((d.ping+d.ping2+log1+log2+log3)>0,1,0)) as akt from korem kr join kodam k on k.kodamid=kr.kodam join hosts h on k.kodamid=group2 left join daily d on h.hostid=d.host where $s_ORG and kr.kodam='".$id."' group by k.map,kr.korem,kr.top,kr.left";
  $sql="select distinct k.map,h.group3,kr.top,kr.left,count(*) as tot,sum(if((d.ping+d.ping2)>0,1,0)) as akt from kodam k join hosts h on kodamid=group2 join korem kr on kr.korem=group3 and kr.kodam=group2 left join daily d on h.hostid=d.host where $s_ORG and group2='".$id."' group by k.map,h.group3,h.top";
  //echo $sql;
  $res=exec_qry($conn,$sql);
  $i=0;
  while($row=fetch_row($res)){
  $map=$row[0];
  $color='yellow';
  $color2='ffff00';
  $tot+=$row[4];
  $inac=$row[4]-$row[5];
  $act+=$row[5];
  $tina+=$inac;
  if($row[4]==$inac){$color='red';$color2='ff0000';}
  if($row[4]==$row[5]){$color='green';$color2='00ff00';}
  //$txt.='<a href="onoff_hosts.php?oo=-1&jar=&grp4='.$row[0].'"><img src="images/'.$color.'_alert.gif" width="15px" height="15px" style="position:absolute;top:'.$row[3].'px;left:'.$row[2].'px;" title="'.$row[1].'&#10;Total:'.$row[4].'&#10;OK:'.$row[5].'&#10;Inactive:'.$inac.'"></a>';
	//$txt.='<a href="host.php?hostid='.$row[1].'"><img src="images/'.$color.'_alert.gif" width="15px" height="15px" style="position:absolute;top:'.$row[3].'px;left:'.$row[4].'px;" title="'.$row[2].'&#10;'.$row[6].'&#10;PIC:'.$row[7].'"></a>';
	//$txt.='<a href="onoff_hosts.php?oo=-1&grp3='.$row[1].'"><img src="images/'.$color.'_alert.gif" width="15px" height="15px" style="position:absolute;top:'.$row[2].'px;left:'.$row[3].'px;" title="'.$row[1].'&#10;Total:'.$row[4].'&#10;OK:'.$row[5].'"></a>';
	$i++;
	$titel=$row[1].'&#10;Total:'.$row[4].'&#10;OK:'.$row[5];
	$top=$row[2];
	$left=$row[3];
	$coords=($left).','.($top);
	//$coords=($i*10).','.($i*20);
	$txt.='<area id="titik'.$i.'" shape="circle" coords="'.$coords.',8" href="onoff_hosts.php?oo=-1&grp3='.$row[1].'&grp2='.$id.'" title="'.$titel.'" alt="'.$titel.'" data-maphilight=\'{"strokeColor":"000000","strokeWidth":3,"fillColor":"'.$color2.'","fillOpacity":0.6,"alwaysOn":true}\'>';
  }
  
  disconnect($conn);
$t='<center><div style="height:500px;"><img id="petaku" usemap="#features" src="peta/'.$map.'" style="max-width:100%;max-height:100%;"></div></center>
    <br /><br /><div class="uk-width-medium-1-2 uk-container uk-container-center"><table width="50%" class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-small uk-text-center">
	<tr><td style="border:1px black solid;">Active</td><td style="border:1px black solid;"><a href="onoff_hosts.php?oo=1&grp2='.$id.'">'.$act.'</a></td></tr>
	<tr><td style="border:1px black solid;">Inactive</td><td style="border:1px black solid;"><a href="onoff_hosts.php?oo=0&grp2='.$id.'">'.$tina.'</a></td></tr>
	<tr><td style="border:1px black solid;">Total</td><td style="border:1px black solid;"><a href="onoff_hosts.php?oo=-1&grp2='.$id.'">'.$tot.'</a></td></tr></table></div>';
  $txt='<map name="features">'.$txt.'</map>';
  echo $txt.$t;
  
/*echo '<a href="nn"><img src="images/yellow_alert.gif" width="15px" height="15px" style="position:absolute;top:240px;left:230px;" title="aceh&#10;ntotal:0&#10;tt:0"></a>
        <img src="images/yellow_alert.gif" width="15px" height="15px" style="position:absolute;top:500px;left:500px;">
        <img src="images/yellow_alert.gif" width="15px" height="15px" style="position:absolute;top:480px;left:460px;">
        <img src="images/yellow_alert.gif" width="15px" height="15px" style="position:absolute;top:370px;left:1000px;">
        <img src="images/yellow_alert.gif" width="15px" height="15px" style="position:absolute;top:420px;left:1120px;">';
*/
		?>
		<script type="text/javascript" src="vendor/jquery.maphilight.js"></script>
		<script>
		$(function() {
			$('#petaku').maphilight();
		});
		</script>
