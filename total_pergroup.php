<?php

if($already!="Y"){
include 'inc.chksession.php';
include 'inc.const.php';
include 'inc.db.php';
}

 $title="Jumlah Jaringan Teraktivasi Per Provinsi";
 $name="Propinsi";
 $h="height: 780px;";
 $color="red";
$jar="";
$vjar=$_GET['jar'];
$vdf=$_GET['df'];
$vdt=$_GET['dt'];

if($vjar=="group2") {
$title="Jumlah Jaringan Teraktivasi Per Kelompok";
$name="Kelompok";
$h="";
$color="green";
}
if($vjar=="group1") {
$title="Jumlah Jaringan Teraktivasi Per Layanan";
$name="Layanan";
$h="";
$color="blue";
}
  $conn=connect();
 

	$arrd = array();
	$arrt=array();

/*if($vjar==""){
	$data="";
}else{
	$skr=date("Y-m-d",time());
	if($vdf=="" || $vdt=="" || ($vdf==$skr && $vdt==$skr)){
		$vdf=$skr;
		$vdt=$vdf;
		$sql="select group4,sum(trafficin) from  daily join hosts on host=hostid group by group4 order by sum(trafficin) desc limit 0,".$vjar;
	}else{
		$sql="select group4,sum(trafficin) from  daily_h join hosts on host=hostid where checkdt between '".$vdf." 00:00:00' and '".$vdt." 23:59:59' group by group4 order by sum(trafficin) desc limit 0,".$vjar;
	}*/
	$sql="select ".$vjar.",count(*) from hosts where $s_ORG group by ".$vjar;
	if($vjar=="group2"){
		$sql="select ".$vjar.",count(*) from hosts join urutan_group2 on group2=kodamid where $s_ORG group by ".$vjar." order by urutan";

	}
	//echo $sql;
	$res=exec_qry($conn,$sql);
	$i=0;
	$data="";
	$cat="";
	$i=0;
	while($row=fetch_row($res)){
		$data.="".$row[1].",";
		$cat.="'".$row[0]."',";
		$arrd[$i]=$row[0];
		$arrt[$i]=$row[1];
		$i++;
	}
//}

disconnect($conn);
?>

<script type="text/javascript">
$(function () {
        $('#totgrp<?php echo $vjar?>').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: '<?php echo $title?>'
            },
            /*subtitle: {
                text: 'Source: Wikipedia.org'
            },*/
            xAxis: {
                categories: [<?php echo $cat; ?>],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jaringan Teraktivasi',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            /*tooltip: {
                valueSuffix: ' millions'
            },*/
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    },
				color: '<?php echo $color?>'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },/*
			series: [{
                name: 'Year 1800',
                data: [107, 31, 635, 203, 2]
            }, {
                name: 'Year 1900',
                data: [133, 156, 947, 408, 6]
            }, {
                name: 'Year 2008',
                data: [973, 914, 4054, 732, 34]
            }]*/
            series: [{
                name: '<?php echo $name?>',
                data: [<?php echo $data; ?>]
            }]
        });
    });
</script>

<div id="totgrp<?php echo $vjar?>" style="<?php echo $h?>margin: 0 auto"></div>

