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
		deferRender: true,
		ordering: false,
		searching: false,
		ajax: {
			type: 'GET',
			url: 'bypass_hosts_do.php',
			data: {
				jar: '<?php echo $_GET['jar']; ?>',
				df: '<?php echo $_GET['df']; ?>',
				dt: '<?php echo $_GET['dt']; ?>',
				grp4: '<?php echo $_GET['grp4']; ?>',
				grp3: '<?php echo $_GET['grp3']; ?>',
				grp2: '<?php echo $_GET['grp2']; ?>',
				oo: '<?php echo $_GET['oo']; ?>'
			}
		}
		//ajax: 'onoff_hosts_do.php?jar=<?php $_GET['jar'];?>&df=<?php $_GET['df'];?>&dt=<?php $_GET['dt'];?>'
	} );
} );

//$.fn.dataTableExt.oStdClasses["sLength"] = "uk-form";
//$.fn.dataTableExt.oStdClasses["sFilter"] = "uk-form";

		</script>
		
    </head>
 
    <body>
 
        <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
 

 <?php 
 include 'inc.menu.php';
 
 $oo="On/Off";
 if($_GET['oo']=="1"){$oo="Menggunakan Router";}
 if($_GET['oo']=="0"){$oo="Bypass";}

?> 

<div><h3>Hosts <?php echo $oo; ?> <?php echo $_GET['jar']; ?> <?php echo $_GET['grp4']; ?> <?php echo $_GET['grp2']; ?> <?php echo $_GET['grp3']; ?><h3></div>			

<hr class="uk-grid-divider">

Total Record : <?php echo $_GET['jml']; ?>
<br />
<br />

			<table id="example" class="display uk-text-small" cellspacing="0" width="100%">
				<thead>
					<tr align="left">
						<th>Host</th>
						<th>Name</th>
						<th>IP WAN</th>
						<th>Jaringan</th>
						<th>Instansi</th>
						<th>Sub Instansi</th>
						<th>Propinsi</th>
						<th>On/Off</th>
						<th>PIC</th>
					</tr>
				</thead>
			</table>
            
			<hr class="uk-grid-divider">
			
		</div>
 
 	</body>
 
</html>
