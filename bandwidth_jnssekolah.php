<?php
include 'inc.chksession.php';
include 'inc.const.php';
include 'inc.db.php';

$menu="4";
 
 $title="Top ".$_GET['jar']." Bandwidth Usage Per Organisasi";
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
  $sql="select * from groups where grpgroup='99' order by grpname";
  $res=exec_qry($conn,$sql);
  while($row=fetch_row($res)){
	$sel="";
	if($row[1]==$vjar) $sel="selected";
	$jar.="<option ".$sel." value='".$row[1]."'>".$row[2]."</option>";
  }


	$arrd = array();
	$arrt=array();

if($vjar==""){
	$data="";
}else{
	$skr=date("Y-m-d",time());
	if($vdf=="" || $vdt=="" || ($vdf==$skr && $vdt==$skr)){
		$vdf=$skr;
		$vdt=$vdf;
		$sql="select hostname,sum(trafficin) from  daily join hosts on host=hostid where $s_ORG group by hostname order by sum(trafficin) desc limit 0,".$vjar;
	}else{
		$sql="select hostname,sum(trafficin) from  daily_h join hosts on host=hostid where $s_ORG and checkdt between '".$vdf." 00:00:00' and '".$vdt." 23:59:59' group by hostname order by sum(trafficin) desc limit 0,".$vjar;
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

<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $c_site_title;?> - Bandwidth Per Organisasi</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
        <link rel="stylesheet" href="uikit/css/uikit.docs.min.css">
		
		<script src="vendor/jquery.js"></script>
        <script src="uikit/js/uikit.min.js"></script>
        <script src="uikit/js/addons/datepicker.js"></script>
		<script src="uikit/js/addons/form-select.js"></script>
		<script src="highchart/js/highcharts.js"></script>
		<script src="highchart/js/exporting.js"></script>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
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
    

$(document).ready(function() {
	var datepicker1 = $.UIkit.datepicker($('#df'), { format:'YYYY-MM-DD' /* options */ });
	var datepicker2 = $.UIkit.datepicker($('#dt'), { format:'YYYY-MM-DD' /* options */ });
} );
		</script>
	
    </head>
 
    <body>
 
        <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
 

 <?php 
 include 'inc.menu.php';
?> 

 <div><h4>Top Bandwidth Usage</h4></div>
 			<hr class="uk-grid-divider">
            
			<form class="uk-form">
				<div class="uk-grid">
				<div class="uk-grid-1-3">
				Top <br />
				<select name="jar">
					<option value="">Please Select</option>
					<?php echo $jar; ?>
				</select>
				</div>
				<div class="uk-grid-1-3">
				From <br />
				<div class="uk-form-icon">
					<i class="uk-icon-calendar"></i>
					<input type="text" name="df" id="df" value="<?php echo $vdf ?>">
				</div>
				</div>
				<div class="uk-grid-1-3">
				To <br />
				<div class="uk-form-icon">
					<i class="uk-icon-calendar"></i>
					<input type="text" name="dt" id="dt" value="<?php echo $vdt ?>">
				</div>
				</div>
				</div>
				<br />
				<button class="uk-button uk-button-primary uk-icon-refresh"> Refresh</button>
				
			</form>
			
			<hr class="uk-grid-divider">
            
			<br />
<div id="container" style="min-width: 310px; height: 350px; margin: 0 auto"></div>
           
				<table class="uk-table">
				<tr>
				<th>Organisasi</th><th>Total</th>
				</tr>
				<?php
				for($i=0;$i<count($arrd);$i++){
				?>
				<tr>
				<td><?php echo $arrd[$i] ?></td><td><?php echo $arrt[$i]; ?></td>
				</tr>
				<?php } ?>
				</table>
				
 			<!--hr class="uk-grid-divider"-->
		
		</div>
		
 	</body>
 
</html>
