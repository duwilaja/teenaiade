<?php
include 'inc.chksession.php';
include 'inc.const.php';
include 'inc.db.php';

$menu="6";
 
 $title="Ping Latency (ms)";
				
$vhi=$_GET['hi'];
$vdf=$_GET['df'];
$vdt=$_GET['dt'];
$skr=date("Y-m-d",time());
	$th=substr($skr,0,4);
	$bl=substr($skr,5,2);
	$tg=substr($skr,8,2);
	
	
  $conn=connect();
/*   $sql="select * from groups where grpgroup='99'";
  $res=exec_qry($conn,$sql);
  while($row=fetch_row($res)){
	$sel="";
	if($row[1]==$vjar) $sel="selected";
	$jar.="<option ".$sel." value='".$row[1]."'>".$row[2]."</option>";
  }
 */

	$arrd = array();
	$arrt=array();

if($vhi==""){
	$data="";
}else{
	if($vdf=="" || $vdt==""){
		$vdf=$skr;
		$vdt=$vdf;
	}
	$th=substr($vdf,0,4);
	$bl=substr($vdf,5,2);
	$tg=substr($vdf,8,2);
	
	$sql="select concat(checkdt,' ',checkhr,':00:00'),ping_result/1000 from hourly_h where (host='".$vhi."') and  ping_resultis not null and 
	(checkdt between '".$vdf." 00:00:00' and '".$vdt." 23:59:59') order by checkdt,checkhr";
	
	//echo $sql;
	$res=exec_qry($conn,$sql);
	$i=0;
	$data="";
	$xaxis="";
	$i=0;
	while($row=fetch_row($res)){
		//$data.="['".$row[0]."',".$row[1]."],";
		$data.="".$row[1].",";
		$xaxis.="'".$row[0]."',";
		$arrd[$i]=$row[0];
		$arrt[$i]=$row[1];
		$i++;
	}
	
		$sql="select concat(checkdt,' ',checkhr,':00:00'),ping_result/1000 from hourly where (host='".$vhi."') and ping_resultis not null and 
		(checkdt between '".$vdf." 00:00:00' and '".$vdt." 23:59:59') order by checkdt,checkhr";
	
	//echo $sql;
		$res=exec_qry($conn,$sql);
		while($row=fetch_row($res)){
			//$data.="['".$row[0]."',".$row[1]."],";
			$data.="".$row[1].",";
			$xaxis.="'".$row[0]."',";
			$arrd[$i]=$row[0];
			$arrt[$i]=$row[1];
			$i++;
		}
	
}
disconnect($conn);
?>

		<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'areaspline'
            },
            title: {
                text: '<?php echo $title ?>'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF'
            },
            xAxis: {
                categories: [
					<?php echo $xaxis; ?>
                ]/*,
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]*/
            },
            yAxis: {
                title: {
                    text: 'ms'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' ms'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [
			{
				name: 'Ping',
				data: [<?php echo $data; ?>]
			}
			/*{
                name: 'John',
                data: [3, 4, 3, 5, 4, 10, 12]
            }, {
                name: 'Jane',
                data: [1, 3, 4, 3, 3, 5, 4]
            }*/]
        });
    });
        		</script>
<div id="container" style="min-width: 310px; height: 350px; margin: 0 auto"></div>

