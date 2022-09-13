<?php
$host=$_GET['ip'];

include 'inc.dbcore.php';

$ada=false;
$conn=connect();
$rs=exec_qry($conn,"select hostname from devices d join ports p on p.device_id=d.device_id where hostname='$host'");
if(num_row($rs)>0){
	$ada=true;
}
disconnect($conn);

if($ada){
$lnk=base64_encode("devices/".$host."/ports?columns=ifName,ifDescr");
?>
<center><h3>Traffic</h3></center>
											<select name="gtype" id="gtype">
												<option value="">1 Day</option>
												<option value="<?php echo strtotime("-1 week"); ?>">1 Week</option>
												<option value="<?php echo strtotime("-1 month"); ?>">1 Month</option>
												<option value="<?php echo strtotime("-1 year"); ?>">1 Year</option>
											</select>
<div id="aku"></div>
<div id="buttons"></div>
<div id="graphtitle"></div>
<div id="trafficout" style="height: 275px"></div>
<script>
//$('#aku').load('rrd.php?lnk=devices/<?php echo $host; ?>/ports');
    $.get( 'rrd.php?lnk=<?php echo $lnk; ?>', function( data ) {
      //alert( "Data Loaded: " + data );
	  var jsonku = JSON.parse(data);
	  var graps="";
	  var host="<?php echo $host; ?>";
	  //alert(jsonku['graphs'][1].desc);
	  for(var i=0;i<jsonku['ports'].length;i++){
		  var grap=jsonku['ports'][i].ifName;
		  var titl=jsonku['ports'][i].ifDescr;
		  graps+='<button onclick="JavaScript:loadDeviceGraph(\''+host+'\',\''+titl+'\',\''+grap+'\');">'+titl+'</button>';
	  }
	  $('#buttons').html(graps);
	  loadDeviceGraph(host,titl,grap);
    });
	
	function loadDeviceGraph(h,d,n){
		$('#graphtitle').html(d);
		var isdescr="";
		if(n==""){n=d;isdescr="?ifDescr=true";}
		var thelnk='devices/'+h+'/ports/'+encodeURIComponent(n)+'/port_bits'+isdescr;
		if($('#gtype').val()!=""){
			if(isdescr==""){
				thelnk+='?from='+$('#gtype').val();
			}else{
				thelnk+='&from='+$('#gtype').val();
			}
		}
		var lnk=window.btoa(thelnk);
		$('#trafficout').html('<a target="_blank" href="graph.php?lnk='+lnk+'"><img width="100%" height="100%" src="rrd.php?lnk='+lnk+'"></a>');
	}
</script>
<?php
}
?>
