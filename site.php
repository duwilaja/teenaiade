<?php
include 'inc.chksession.php';
include 'inc.const.php';
include 'inc.db.php';

$menu="5";

$vjar=$_GET['jar'];
$vdf=$_GET['df'];
$vdt=$_GET['dt'];
 
 $title="Top ".$vjar." Visited Sites";
 $xaxis="'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec',";
					
 $data = "49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4,";
				
$jar="";

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
	$xaxis="";
}else{
	$skr=date("Y-m-d",time());
	if($vdf=="" || $vdt=="" || ($vdf==$skr && $vdt==$skr)){
		$vdf=$skr;
		$vdt=$vdf;
	}
	$sql="select domain,count(*) from destination where dtm between '".$vdf." 00:00:00' and '".$vdt." 23:59:59' group by domain order by count(*) desc limit 0,".$vjar;
	//echo $sql;
	$res=exec_qry($conn,$sql);
	$i=0;
	$data="";
	$xaxis="";
	$i=0;
	while($row=fetch_row($res)){
		$xaxis.="'".$row[0]."',";
		$data.=$row[1].",";
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
        <title><?php echo $c_site_title;?> - Top Sites</title>
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
                type: 'column'
            },
            title: {
                text: '<?php echo $title; ?>'
            },
            subtitle: {
                text: ''
            },
			exporting: {
				enabled: false
			},
            xAxis: {
                categories: [<?php echo $xaxis; ?>]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Count'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Site',
                data: [<?php echo $data; ?>]
    
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

 <div><h4>Top Web Sites Visited</h4></div>
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
				<th>Domain</th><th>Total</th>
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
