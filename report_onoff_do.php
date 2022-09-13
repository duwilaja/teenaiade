<?php

date_default_timezone_set('Asia/Jakarta');

if($already!="Y"){
include 'inc.chksession.php';
include 'inc.const.php';
include 'inc.db.php';
}

 $title=$_GET['jar']." Host On/Off";
 $data = "['Firefox',   45.0],
                ['IE',       26.8],
                ['Chrome', 12.8],
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]";
				
$jar="";
$vjar=$_GET['jar'];
$vdf=$_GET['dt'];
$vdt=$_GET['dt'];
$tot=0;
$on=0;
$dil=0;
$non=0;

  $conn=connect();
 

if($vdt==""){
	$data="";
}else{
	$skr=date("Y-m-d",time());
	if($vdt==$skr){
		$vdf=$skr;
		$vdt=$vdf;
		$sqlt="select count(*) from daily join hosts on host=hostid where $s_ORG and checkdt='".$vdt."'";
		$sqlo="select count(*) from daily b join hosts on host=hostid where $s_ORG and checkdt='".$vdt."' and b.log1+b.log2+b.log3>0";
		$sqldil="select count(distinct ip) from dailyinlog where checkdt='".$vjar."'";
	}else{
		$sqlt="select count(*) from daily_h join hosts on host=hostid where $s_ORG and checkdt='".$vdt."'";
		$sqlo="select count(*) from daily_h b join hosts on host=hostid where $s_ORG and checkdt='".$vdt."' and b.log1+b.log2+b.log3>0";
		$sqldil="select count(distinct ip) from dailyinlog_h where checkdt='".$vjar."'";
	}
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
	$act=$on+$dil;
	$non=$tot-$act;
	$data="['Active',".$act."],['Not Active',".$non."]";
}

disconnect($conn);
?>

<script type="text/javascript">
$(function () {
    $('#<?php echo $vdt; ?>').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '<?php echo $title; ?>'
        },
		exporting: {
			enabled: true
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

<div id="<?php echo $vdt; ?>" style="margin: 0 auto"></div>
           
			
				<table class="uk-table uk-text-small">
				<tr>
				<th>Desc.</th><th>Total</th>
				</tr>
				<tr>
				<td>Active</td><td><a href='onoff_hosts.php?r=y&oo=1&jar=<?php echo $vjar; ?>&df=<?php echo $vdf; ?>&dt=<?php echo $vdt; ?>'><?php echo $on; ?></a></td>
				</tr>
				<tr>
				<td>Inactive</td><td><a href='onoff_hosts.php?r=y&oo=0&jar=<?php echo $vjar; ?>&df=<?php echo $vdf; ?>&dt=<?php echo $vdt; ?>'><?php echo $non; ?></a></td>
				</tr>
				<tr>
				<td>Total</td><td><a href='onoff_hosts.php?r=y&oo=-1&jar=<?php echo $vjar; ?>&df=<?php echo $vdf; ?>&dt=<?php echo $vdt; ?>'><?php echo ($on+$non); ?></a></td>
				</tr>
				</table>
			
				
				
