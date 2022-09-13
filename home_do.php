<?php
include 'inc.chksession.php';
include 'inc.db.php';

$txt="";
$inac=0;
$tot=0;
$act=0;
$tina=0;

 $conn=connect();
  $sql="select distinct kodamid,kodamname,k.top,k.left,tot,ok from kodam k join hosts h on kodamid=group2 where $s_ORG ";
  $sql="select distinct kodamid,kodamname,k.top,k.left,count(*) from kodam k join hosts h on kodamid=group2 where $s_ORG group by kodamid,kodamname,k.top,k.left";
  //echo $sql;
  $i=0;
  $res=exec_qry($conn,$sql);
  while($row=fetch_row($res)){
    $actr='0';
  	  $sqld="select count(*) from daily d join hosts on host=hostid where group2='".$row[0]."' and (d.ping+d.ping2)>0";
	  $rss=exec_qry($conn,$sqld);
	  if($rowd=fetch_row($rss)){
		  $actr=$rowd[0];
	  }
  $act+=$actr;
  $inac=$row[4]-$actr;
  $tot+=$row[4];
  $tina+=$inac;
  $color='yellow';
  $color2='ffff00';
  if($row[4]==$actr){$color='green';$color2='00ff00';}
  if($actr==0){$color='red';$color2='ff0000';}
  if($row[4]==0){$color='blue';$color2='0000ff';}
	//$txt.='<a href="onoff_hosts.php?oo=-1&jar=&grp4='.$row[0].'"><img src="images/'.$color.'_alert.gif" width="15px" height="15px" style="position:absolute;top:'.$row[3].'px;left:'.$row[2].'px;" title="'.$row[1].'&#10;Total:'.$row[4].'&#10;OK:'.$row[5].'&#10;Inactive:'.$inac.'"></a>';
	//$txt.='<a href="kodam.php?grp2='.$row[0].'"><img src="images/'.$color.'_alert.gif" width="15px" height="15px" style="position:absolute;top:'.$row[2].'px;left:'.$row[3].'px;" title="'.$row[0].'/'.$row[1].'&#10;Total:'.$row[4].'&#10;OK:'.$row[5].'&#10;Inactive:'.$inac.'"></a>';
  $i++;
	$titel=$row[0].'/'.$row[1].'&#10;Total:'.$row[4].'&#10;OK:'.$actr;
	$top=$row[2]-145;
	$left=$row[3]-100;
	$coords=($left).','.($top);
	//$coords=($i*10).','.($i*20);
	$txt.='<area id="titik'.$i.'" shape="circle" coords="'.$coords.',8" href="kodam.php?grp2='.$row[0].'" title="'.$titel.'" alt="'.$titel.'" data-maphilight=\'{"strokeColor":"000000","strokeWidth":3,"fillColor":"'.$color2.'","fillOpacity":0.6,"alwaysOn":true}\'>';
  
  }
  
  disconnect($conn);
$t='<center><div style="height:500px;"><img id="petaku" usemap="#features" src="peta/Indonesia.png" style="max-width:100%;max-height:100%;"></div></center>
    <br /><div class="uk-width-medium-1-2 uk-container uk-container-center"><table width="50%" class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-small uk-text-center">
	<tr><td style="border:1px black solid;">Active</td><td style="border:1px black solid;"><a href="onoff_hosts.php?oo=1">'.$act.'</a></td></tr>
	<tr><td style="border:1px black solid;">Inactive</td><td style="border:1px black solid;"><a href="onoff_hosts.php?oo=0">'.$tina.'</a></td></tr>
	<tr><td style="border:1px black solid;">Total</td><td style="border:1px black solid;"><a href="onoff_hosts.php?oo=-1">'.$tot.'</a></td></tr></table></div>';
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