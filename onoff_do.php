<?php

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
$vdf=$_GET['df'];
$vdt=$_GET['dt'];
$tot=0;
$on=0;
$dil=0;
$non=0;

  $conn=connect();
 

if($vjar==""){
	$data="";
}else{
if($vjar=="All"){
	$group1=" 0=0 ";
	$vjar="";
}else{
	$group1=" group1='".$vjar."' ";
}
	$skr=date("Y-m-d",time());
$vdt=$vdf;
	if($vdf=="" || $vdt=="" || ($vdf==$skr && $vdt==$skr)){
		$vdf=$skr;
		$vdt=$vdf;
		$sqlt="select count(*) from hosts where $s_ORG and $group1";
		$sqlo="select count(*) from hosts a join daily b on a.hostid=b.host where $s_ORG and $group1 and b.ping+b.ping2>0";
		$sqldil="select count(distinct ip) from dailyinlog where $group1";
	}else{
		$sqlt="select count(distinct host) from hosts a right join daily_h b on a.hostid=b.host where $s_ORG and ($group1) and 
		checkdt between '".$vdf."' and '".$vdt." 23:59:59'";
		$sqlo="select count(distinct host) from hosts a right join daily_h b on a.hostid=b.host where $s_ORG and ($group1) and 
		b.log1+b.log2+b.log3>0 and checkdt between '".$vdf."' and '".$vdt." 23:59:59'";
//echo $sqlo;
		$sqldil="select count(distinct ip) from dailyinlog_h where $group1 and checkdt between '".$vdf."' and '".$vdt." 23:59:59'";
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
	$data="['Active',".$act."],['Inactive',".$non."]";
}

disconnect($conn);
?>

<script type="text/javascript">
$(function () {
    $('#onoff<?php echo $vjar; ?>').highcharts({
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

<div id="onoff<?php echo $vjar; ?>" style="margin: 0 auto"></div>
           
			
				<table class="uk-table uk-text-small">
				<tr>
				<th>Desc.</th><th>Total</th>
				</tr>
				<tr>
				<td>Active</td><td><a href='onoff_hosts.php?oo=1&jar=<?php echo $vjar; ?>&df=<?php echo $vdf; ?>&dt=<?php echo $vdt; ?>'><?php echo $on; ?></a></td>
				</tr>
				<tr>
				<td>Inactive</td><td><a href='onoff_hosts.php?oo=0&jar=<?php echo $vjar; ?>&df=<?php echo $vdf; ?>&dt=<?php echo $vdt; ?>'><?php echo $non; ?></a></td>
				</tr>
				<tr>
				<td>Total</td><td><a href='onoff_hosts.php?oo=-1&jar=<?php echo $vjar; ?>&df=<?php echo $vdf; ?>&dt=<?php echo $vdt; ?>'><?php echo ($on+$non); ?></a></td>
				</tr>
				</table>
			
				
				
