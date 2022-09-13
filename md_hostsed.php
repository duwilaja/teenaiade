<?php
include 'inc.chksession.php';
include 'inc.const.php';

$menu="2";
 
?>

<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $c_site_title;?> - Master Data - hosts</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
        <link rel="stylesheet" href="uikit/css/uikit.docs.min.css">
		<link rel="stylesheet" href="datatables/css/jquery.dataTables.min.css">
		
		<script src="vendor/jquery.js"></script>
        <script src="uikit/js/uikit.min.js"></script>
		<script src="datatables/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" class="init">


$(document).ready(function() {
	$('#example').DataTable( {
		dom: '<"uk-form"lf<t>ip>',
		serverSide: true,
		processing: true,
		ordering: false,
		ajax: 'md_hostsed_do.php'
	} );
} );

//$.fn.dataTableExt.oStdClasses["sLength"] = "uk-form";
//$.fn.dataTableExt.oStdClasses["sFilter"] = "uk-form";

		</script>
		
    </head>
 
    <body>
 
        <div class="uk-container uk-container-center uk-margin-top uk-margin-medium-bottom">
 

 <?php 
 include 'inc.menu.php';
?> 

<div><h3>Hosts<h3></div>			

<hr class="uk-grid-divider">

	
<br />
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Host</th>
						<th>Name</th>
						<th>IP WAN</th>
						<th>IP LAN</th>
						<th>Jaringan</th>
						<th>Instansi</th>
						<th>Sub Instansi</th>
						<th>Propinsi</th>
						<th>PIC</th>
						<th>B/W</th>
					</tr>
				</thead>
			</table>
            
			<hr class="uk-grid-divider">
			
		</div>
 
 	</body>
 
</html>
