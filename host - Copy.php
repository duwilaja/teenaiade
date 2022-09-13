<?php
include 'inc.chksession.php';
include 'inc.const.php';

$menu="1";

include 'inc.db.php';

$conn = connect() or die ($failed_connection);

$skr=date("Y-m-d",time());
$vdf=$_GET['df'];
$vdt=$_GET['dt'];
$vhostid=$_GET['hostid'];

if($vdf=="" || $vdt=="" || ($vdf==$skr && $vdt==$skr)){
$tablename="hosts a join daily b on hostid=host";
$where=" hostid='".$vhostid."'";
$vdf=$skr;
$vdt=$skr;
}else{
$tablename="hosts a join daily_h b on hostid=host";
$where=" hostid='".$vhostid."' and b.checkdt between '".$vdf."' and '".$vdt." 23:59:59'";
}
$columns="hostid,hostname,a.ip,checkdt,if(b.ping+log1+log2+log3>0,'1','0') as onoff,trafficin/1024,hostdesc,bw,a.ip2";
 
 $sql = "select ".$columns." from ". $tablename ." where ".$where." order by hostid,checkdt";
//echo $sql;

$result = exec_qry($conn,$sql);
$data="";
$datat="";
$xaxis="";
$url="";

while($row = fetch_row($result)){
   $data .= $row[4].",";
   $datat .= $row[5].",";
   $xaxis .= "'".$row[3]."',";
}

	$result = exec_qry($conn,"select ".$columns." from hosts a join daily b on hostid=host where hostid='".$vhostid."'");
while($row = fetch_row($result)){
if($vdt==$skr){
   $data .= $row[4].",";
   $datat .= $row[5].",";
   $xaxis .= "'".$row[3]."',";
   }
   $name = $row[1];
   $ip = $row[2];
   $desc = $row[6];
   $bw = $row[7];
   $lan = $row[8];
   if($row[4]=="0"){
	$st="Off";
	$rm="Ping failed.";
   }else{
	$st="On";
	$rm="Ping successful.";
   }
}

disconnect($conn);

?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $c_site_title;?> - Host</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
        <link rel="stylesheet" href="uikit/css/uikit.docs.min.css">
		<link rel="stylesheet" href="datatables/css/jquery.dataTables.min.css">

        <script src="vendor/jquery.js"></script>
        <script src="uikit/js/uikit.min.js"></script>
		<script src="uikit/js/addons/datepicker.js"></script>
		<script src="uikit/js/addons/form-select.js"></script>
		<script src="datatables/js/jquery.dataTables.min.js"></script>
		<script src="highchart/js/highcharts.js"></script>
		<script src="highchart/js/exporting.js"></script>

		<script type="text/javascript">
	$(function () {
        $('#opox').highcharts({
            chart: {
                type: 'area'
            },
			/*exporting: {
				enabled: false
			},*/
            title: {
                text: 'Host Activity'
            },
            subtitle: {
                text: '<?php echo $vdf." / ".$vdt; ?>'
            },
            xAxis: {
				categories: [<?php echo $xaxis; ?>],
                labels: {
                    formatter: function() {
                        return this.value; // clean, unformatted number for year
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'On/Off'
                },
                labels: {
                    formatter: function() {
						if(this.value-Math.round(this.value,0)==0){
						return this.value;
						}else{
						return null;
						}
                    }
                }
            },
            tooltip: {
				enabled: true,
                formatter: function() {
					if(this.y==0){
						return this.x + '<br>' + this.series.name +' : Off<br>Ping Failed.';
					}else{
						return this.x + '<br>' + this.series.name +' : On.<br>Ping Successful.';
					}
                }
            },
            plotOptions: {
                area: {
                    //pointStart: <?php echo $vdf; ?>,//1940,
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [/* {
                name: 'USA',
                data: [null, null, null, null, null, 6 , 11, 32, 110, 235, 369, 640,
                    1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468, 20434, 24126,
                    27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342, 26662,
                    26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
                    24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586,
                    22380, 21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950,
                    10871, 10824, 10577, 10527, 10475, 10421, 10358, 10295, 10104 ]
            }, {
                name: 'USSR/Russia',
                data: [null, null, null, null, null, null, null , null , null ,null,
                5, 25, 50, 120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,
                4238, 5221, 6129, 7089, 8339, 9399, 10538, 11643, 13092, 14478,
                15915, 17385, 19055, 21205, 23044, 25393, 27935, 30062, 32049,
                33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000, 37000,
                35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                21000, 20000, 19000, 18000, 18000, 17000, 16000]
            }, */{
				name: 'Status',
				data: [<?php echo $data; ?>]
			}]
        });
    });
	
	$(function () {
        $('#opo').highcharts({
            title: {
                text: 'Usage',
                x: -20 //center
            },
            subtitle: {
                text: '<?php echo $vdf." / ".$vdt; ?>',
                x: -20
            },
            xAxis: {
                /*categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']*/
				categories: [<?php echo $xaxis; ?>]
            },
            yAxis: {
                title: {
                    text: 'Usage (MB)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'KB'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [/*{
                name: 'Tokyo',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'New York',
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
                name: 'Berlin',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }, {
                name: 'London',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }*/
			{
				name: 'Usage',
				data: [<?php echo $datat; ?>]
			}]
        });
    });
    
$(document).ready(function() {
	var datepicker1 = $.UIkit.datepicker($('#df'), { format:'YYYY-MM-DD' /* options */ });
	var datepicker2 = $.UIkit.datepicker($('#dt'), { format:'YYYY-MM-DD' /* options */ });
	$('#xopo').load('host_mrtg.php?hi=<?php echo $vhostid; ?>&df=<?php echo $vdf; ?>&dt=<?php echo $vdt; ?>');
} );
		</script>
		

    </head>
 
    <body>
 
        <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
 
 <?php 
 include 'inc.menu.php';
?> 

			<form class="uk-form" method="get">
				<input type="hidden" name="hostid" id="hostid" value="<?php echo $vhostid; ?>">
				<div class="uk-width-medium-1-2 uk-container uk-container-center">
				<div class="uk-form-icon">
					<i class="uk-icon-calendar"></i>
					<input type="text" placeholder="From" name="df" id="df" value="<?php echo $vdf; ?>">
				</div>
				<div class="uk-form-icon">
					<i class="uk-icon-calendar"></i>
					<input type="text" placeholder="To" name="dt" id="dt" value="<?php echo $vdt; ?>">
				</div>
				<button class="uk-button uk-button-primary uk-icon-refresh"> Refresh</button>
				</div>

			</form>
			<br />
					<div class="uk-width-medium-1-2 uk-container uk-container-center">
						<div  class="uk-panel uk-panel-box">
						<table class="uk-table">
						<tr><td>Host</td><td><?php echo $vhostid; ?></td></tr>
						<tr><td>Name</td><td><?php echo $name; ?></td></tr>
						<tr><td>IP WAN</td><td><?php echo $ip; ?></td></tr>
						<tr><td>IP LAN</td><td><?php echo $lan; ?></td></tr>
						<tr><td>Bandwidth</td><td><?php echo $bw; ?></td></tr>
						<tr><td>Desc.</td><td><?php echo $desc; ?></td></tr>
						<tr><td>Today Status</td><td><?php echo $st; ?></td></tr>
						<tr><td>Remark</td><td><?php echo $rm; ?></td></tr>
						</table>
						</div>
					</div>
					<div class="uk-width-medium-3-4 uk-container uk-container-center">
						<div  class="uk-panel uk-panel-box">
						<div id="opox"></div>
						</div>
					</div>
					<div class="uk-width-medium-3-4 uk-container uk-container-center">
						<div  class="uk-panel uk-panel-box">
						<div id="opo"></div>
						</div>
					</div>
					<div style="min-width: 310px; height: 350px; margin: 0 auto">
						<div  class="uk-panel uk-panel-box">
						<div id="xopo"></div>
						</div>
					</div>
					
			<hr class="uk-grid-divider">

		</div>
	</body>
 
</html>
