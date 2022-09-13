<?php
include 'inc.chksession.php';
include 'inc.const.php';

$menu="1";
$kodam=$_GET['grp2'];
 
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $c_site_title;?> - <?php echo $kodam; ?></title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
        <link rel="stylesheet" href="uikit/css/uikit.docs.min.css">
		<link rel="stylesheet" href="buikit/css/uikit.min.css">
        <script src="vendor/jquery.js"></script>
        <script src="uikit/js/uikit.min.js"></script>
		<script src="highchart/js/highcharts.js"></script>
<!--script src="http://maps.googleapis.com/maps/api/js"></script-->
		<script language="JavaScript">
		$(document).ready(function() {
			//$('#peta').load("kodam_do.php?id=<?php echo $kodam; ?>");
			$('#opo').load('kodam_do.php?id=<?php echo urlencode($kodam); ?>');
			$('#opox').load('kodam_dox.php?id=<?php echo urlencode($kodam); ?>');
			$('#bypasschart').load('bypass_do.php?jar=bypass&grp2=<?php echo urlencode($kodam);?>');
		});
		</script>


		
    </head>
 
    <body>
 
        <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
 
 <?php 
 include 'inc.menu.php';
?> 
			<hr class="uk-grid-divider">
            <div class="uk-grid">
                <div class="uk-width-medium-1-1">
 <!--
                    <div class="uk-vertical-align uk-text-center" style="background: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMTEzMHB4IiBoZWlnaHQ9IjQ1MHB4IiB2aWV3Qm94PSIwIDAgMTEzMCA0NTAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDExMzAgNDUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIxMTMwIiBoZWlnaHQ9IjQ1MCIvPg0KPC9zdmc+DQo=') 50% 0 no-repeat; height: 450px;">
                        <div class="uk-vertical-align-middle uk-width-1-2">
                            <h1 class="uk-heading-large">Sample Heading</h1>
                            <p class="uk-text-large">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo.</p>
                            <p>
                                <a class="uk-button uk-button-primary uk-button-large" href="#">Button</a>
                                <a class="uk-button uk-button-large" href="#">Button</a>
                            </p>
                        </div>
                    </div>
 -->
                    <div id="peta"><h2 align="center"><?php echo $kodam; ?></h3></div>
					<!--div id="googleMap" style="height:460px;"></div-->
                </div>
            </div>
			<div id="opo"></div>			
			<hr class="uk-grid-divider">
			<div id="bypasschart"></div>			
			<hr class="uk-grid-divider">
			<div id="opox"></div>
			<hr class="uk-grid-divider">
			
		</div>
		
		
	</body>
 
</html>
