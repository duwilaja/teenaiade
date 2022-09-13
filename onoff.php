<?php
include 'inc.chksession.php';
include 'inc.const.php';
include 'inc.db.php';

$vjar=$_GET['jar'];
$vdf=$_GET['df'];
$vdt=$_GET['dt'];


  $conn=connect();
 $sql="select * from groups where grpgroup='1'";
  $res=exec_qry($conn,$sql);
  while($row=fetch_row($res)){
	$sel="";
	if($row[1]==$vjar) $sel="selected";
	$jar.="<option ".$sel." value='".$row[1]."'>".$row[2]."</option>";
  }

disconnect($conn);

$menu="3";

$already="Y";

?>

<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $c_site_title;?> - On/Off</title>
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

 <div><h4>Host On/Off Daily</h4></div>
 			<hr class="uk-grid-divider">
            
			<form class="uk-form">
				<div class="uk-grid">
				<div class="uk-grid-1-3">
				Network <br />
				<select name="jar">
					<option value="">Please Select</option>
					<?php echo $jar; ?>
				</select>
				</div>
				<div class="uk-grid-1-3">
				Date <br />
				<div class="uk-form-icon">
					<i class="uk-icon-calendar"></i>
					<input type="text" name="df" id="df" value="<?php echo $vdf ?>">
				</div>
				</div>
				<!--div class="uk-grid-1-3">
				To <br />
				<div class="uk-form-icon">
					<i class="uk-icon-calendar"></i>
					<input type="text" name="dt" id="dt" value="<?php echo $vdt ?>">
				</div>
				</div-->
				</div>
				<br />
				<button class="uk-button uk-button-primary uk-icon-refresh"> Refresh</button>
				
			</form>
			
			<hr class="uk-grid-divider">
            
			<br />

			<?php
			include 'onoff_do.php';
			?>
 			<!--hr class="uk-grid-divider"-->
		
		</div>
		
 	</body>
 
</html>
