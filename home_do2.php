<?php
include 'inc.chksession.php';
include 'inc.db.php';

$centerLatLng = $_SESSION['s_CENTER'];
$zoom = $_SESSION['s_ZOOM'];
		?>
		<script>
var myCenter=new google.maps.LatLng(<?php echo $centerLatLng; ?>);

function initialize()
{
var mapProp = {
  center: myCenter,
  zoom:<?php echo $zoom; ?>,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

<?php

$txt="";
$inac=0;
$tot-0;
$act=0;
$tina=0;

 $conn=connect();
  $sql="select distinct p.* from propinsi p join hosts on prop=group4 where $s_ORG";
  //echo $sql;
  $res=exec_qry($conn,$sql);
  while($row=fetch_row($res)){

$inac=$row[4]-$row[5];
  $tot+=$row[4];
  $act+=$row[5];
  $tina+=$inac;
  $color='yellow';
  if($row[4]==$row[5]){$color='green';}
  if($row[5]=='0'){$color='red';}
  if($row[4]=='0'){$color='blue';}
	$txt.='<a href="onoff_hosts.php?oo=-1&jar=&grp4='.$row[0].'"><img src="images/'.$color.'_alert.gif" width="15px" height="15px" style="position:absolute;top:'.$row[3].'px;left:'.$row[2].'px;" title="'.$row[1].'&#10;Total:'.$row[4].'&#10;OK:'.$row[5].'&#10;Inactive:'.$inac.'"></a>';
  
  
  $position=$row[6];
  $link='onoff_hosts.php?oo=-1&jar=&grp4='.$row[0];
  $title=$row[6].'\n'.$row[1].'\nTotal:'.$row[4].'\nOK:'.$row[5].'\nInactive:'.$inac;
?>

var marker = new google.maps.Marker({
  position: new google.maps.LatLng(<?php echo $position; ?>),
  icon: 'images/<?php echo $color; ?>.png',
  title:'<?php echo $title; ?>'
  });

marker.setMap(map);

// Zoom to 9 when clicking on marker
google.maps.event.addListener(marker,'click',function() {
  //map.setZoom(9);
  //map.setCenter(marker.getPosition());
  document.location.href="<?php echo $link; ?>";
  });

<?php
} //end while
  disconnect($conn);

$t='<br /><div class="uk-width-medium-1-2 uk-container uk-container-center"><table width="50%" class="uk-table uk-table-hover uk-table-striped uk-table-condensed uk-text-small uk-text-center">
	<tr><td style="border:1px black solid;">Active</td><td style="border:1px black solid;"><a href="onoff_hosts.php?oo=1">'.$act.'</a></td></tr>
	<tr><td style="border:1px black solid;">Inactive</td><td style="border:1px black solid;"><a href="onoff_hosts.php?oo=0">'.$tina.'</a></td></tr>
	<tr><td style="border:1px black solid;">Total</td><td style="border:1px black solid;"><a href="onoff_hosts.php?oo=-1">'.$tot.'</a></td></tr></table></div>';

  ?>
  }

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php echo $t; ?>