<?php

if($already!="Y"){
include 'inc.chksession.php';
include 'inc.const.php';
include 'inc.db.php';
}

 $title="Top ".$_GET['jar']." Bandwidth Usage Per KODAM";
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

  $conn=connect();
 

	$arrd = array();
	$arrt=array();

if($vjar==""){
	$data="";
}else{
	$skr=date("Y-m-d",time());
	if($vdf=="" || $vdt=="" || ($vdf==$skr && $vdt==$skr)){
		$vdf=$skr;
		$vdt=$vdf;
		$sql="select group2,sum(trafficin) from  daily join hosts on host=hostid join urutan_group2 on group2=kodamid where $s_ORG group by group2 order by sum(trafficin) desc,urutan asc limit 0,".$vjar;
	}else{
		$sql="select group2,sum(trafficin) from  daily_h join hosts on host=hostid join urutan_group2 on group2=kodamid where $s_ORG and checkdt between '".$vdf." 00:00:00' and '".$vdt." 23:59:59' group by group2 order by sum(trafficin) desc,urutan asc limit 0,".$vjar;
	}
	//echo $sql;
	$res=exec_qry($conn,$sql);
	$i=0;
	$data="";
	$i=0;
	while($row=fetch_row($res)){
		$data.="['".$row[0]."',".$row[1]."],";
		$arrd[$i]=$row[0];
		$arrt[$i]=$row[1];
		$i++;
	}
}

disconnect($conn);
?>

<script type="text/javascript">
$(function () {
    $('#proptop<?php echo $vjar ?>').highcharts({
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

<div id="proptop<?php echo $vjar; ?>" style="margin: 0 auto"></div>
           
				<table class="uk-table uk-text-small">
				<tr>
				<th>KODAM</th><th>Total</th>
				</tr>
				<?php
				for($i=0;$i<count($arrd);$i++){
				?>
				<tr>
				<td><?php echo $arrd[$i] ?></td><td><?php echo $arrt[$i]; ?></td>
				</tr>
				<?php } ?>
				</table>
