<?php

if($already!="Y"){
include 'inc.chksession.php';
include 'inc.const.php';
include 'inc.db.php';
}

 $title="Router/Bypass";
 $data = "['Firefox',   45.0],
                ['IE',       26.8],
                ['Chrome', 12.8],
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]";
				
$jar="";
$vjar=$_GET['jar'];
$vdf=$_GET['df'];
$vdt=$_GET['dt'];
$tot=0;
$on=0;
$dil=0;

  $conn=connect();
 
$kodam=urldecode($_GET['grp2']);
if($kodam!=""){$s_ORG=" group2='$kodam' ";}

if($vjar==""){
	$data="";
}else{
	$skr=date("Y-m-d",time());
	/*if($vdf=="" || $vdt=="" || ($vdf==$skr && $vdt==$skr)){
		$vdf=$skr;
		$vdt=$vdf;*/
		//$sqlt="select count(*) from hosts where $s_ORG and group1='".$vjar."'";
		$sqlt="select count(*) from hosts a join daily b on a.hostid=b.host where $s_ORG and b.ping='0' and b.ping2='0'";
		//$sqlo="select count(*) from hosts a join daily b on a.hostid=b.host where $s_ORG and group1='".$vjar."' and b.ping+b.ping2+b.log1+b.log2+b.log3>0";
		$sqlo="select count(*) from hosts a join daily b on a.hostid=b.host where $s_ORG and b.ping='1'";
		//$sqldil="select count(distinct ip) from dailyinlog where group1='".$vjar."'";
		$sqldil="select count(*) from hosts a join daily b on a.hostid=b.host where $s_ORG and b.ping='0' and b.ping2='1'";
	/*}else{
		$sqlt="select count(distinct host) from hosts a right join daily_h b on a.hostid=b.host where $s_ORG and (group1='".$vjar."') and 
		checkdt between '".$vdf."' and '".$vdt." 23:59:59'";
		$sqlo="select count(distinct host) from hosts a right join daily_h b on a.hostid=b.host where $s_ORG and (group1='".$vjar."') and 
		b.ping+b.ping2+b.log1+b.log2+b.log3>0 and checkdt between '".$vdf."' and '".$vdt." 23:59:59'";
		$sqldil="select count(distinct ip) from dailyinlog_h where group1='".$vjar."' and checkdt between '".$vdf."' and '".$vdt." 23:59:59'";
	}*/
	$res=exec_qry($conn,$sqlt);
	while($rowx=fetch_row($res)){
		$tot=$rowx[0];
	}
	$res=exec_qry($conn,$sqlo);
	while($rowx=fetch_row($res)){
		$on=$rowx[0];
	}
	$res=exec_qry($conn,$sqldil);
	while($rowx=fetch_row($res)){
		$dil=$rowx[0];
	}
	//$act=$on+$dil;
	//$non=$tot-$act;
	$data="['OFF',".$tot."],['Menggunakan Router',".$on."],['Bypass',".$dil."]";
}

$jml=$tot+$on+$dil;
disconnect($conn);
?>

<script type="text/javascript">
$(function () {
    $('#<?php echo $vjar; ?>').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '<?php echo $title; ?>'
        },
		exporting: {
			enabled: false
		},
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Sum',
            data: [
                <?php echo $data; ?>
            ]
        }]
    });
});
</script>

<div id="<?php echo $vjar; ?>" style="margin: 0 auto"></div>

<?php
$vjar="";
?>           
			
				<table class="uk-table uk-text-small">
				<tr>
				<th>Desc.</th><th>Total</th>
				</tr>
				<tr>
				<td>Menggunakan Router</td><td><a href='bypass_hosts.php?oo=1&jml=<?php echo $on; ?>&jar=<?php echo $vjar; ?>&df=<?php echo $vdf; ?>&dt=<?php echo $vdt; ?>&grp2=<?php echo $kodam; ?>'><?php echo $on; ?></a></td>
				</tr>
				<tr>
				<td>Bypass</td><td><a href='bypass_hosts.php?oo=0&jml=<?php echo $dil; ?>&jar=<?php echo $vjar; ?>&df=<?php echo $vdf; ?>&dt=<?php echo $vdt; ?>&grp2=<?php echo $kodam; ?>'><?php echo $dil; ?></a></td>
				</tr>
				<tr>
				<td>OFF</td><td><a href='onoff_hosts.php?oo=0&jml=<?php echo $tot; ?>&jar=<?php echo $vjar; ?>&df=<?php echo $vdf; ?>&dt=<?php echo $vdt; ?>&grp2=<?php echo $kodam; ?>'><?php echo $tot; ?></a></td>
				</tr>
				<tr>
				<td>Total</td><td><a href='onoff_hosts.php?oo=-1&jml=<?php echo $jml; ?>&jar=<?php echo $vjar; ?>&df=<?php echo $vdf; ?>&dt=<?php echo $vdt; ?>&grp2=<?php echo $kodam; ?>'><?php echo $jml; ?></a></td>
				</tr>
				</table>
			
				
				
