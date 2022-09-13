<?php
include 'inc.chksession.php';
include 'inc.const.php';

$menu="2";
 
 include 'inc.db.php';
 
 $conn = connect() or die ($failed_connection);

$tablename="hosts";
$key="hostid";
$columns="hostid,hostname,ip,hostdesc,group1,group2,group3,group4,npsn,ip2,bw,community";

$sql="select ".$columns." from ".$tablename." where ".$key."='".$_GET["id"]."'";
$result = exec_qry($conn,$sql);
$row = fetch_row($result);

disconnect($conn);

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
		
    </head>
 
    <body>
 
        <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
 

 <?php 
 include 'inc.menu.php';
?> 

<div><h3>Hosts<h3></div>			

<hr class="uk-grid-divider">

<form class="uk-form" method="post" action="md_hosts_save.php">
<input type="hidden" name="sv" value="EDIT">
    <fieldset data-uk-margin>
		<input type="hidden" name="hostid" value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?><br /><br />
		<input type="text" name="hostname" placeholder="host Name" value="<?php echo $row[1]; ?>"><br /><br />
		<input type="text" name="ip" placeholder="IP WAN" value="<?php echo $row[2]; ?>"><br /><br />
		<input type="text" name="ip2" placeholder="IP LAN" value="<?php echo $row[9]; ?>"><br /><br />
		<textarea name="hostdesc" placeholder="host description/address" rows="3" cols="50"><?php echo $row[3]; ?></textarea><br /><br />
		<input type="text" name="group1" placeholder="Jaringan" value="<?php echo $row[4]; ?>"><br /><br />
		<input type="text" name="group2" placeholder="Instansi" value="<?php echo $row[5]; ?>"><br /><br />
		<input type="text" name="group3" placeholder="Sub Instansi" value="<?php echo $row[6]; ?>"><br /><br />
		<input type="text" name="group4" placeholder="Propinsi" value="<?php echo $row[7]; ?>"><br /><br />
		<input type="text" name="npsn" placeholder="PIC" value="<?php echo $row[8]; ?>" size="30"><br /><br />
		<input type="text" name="bw" placeholder="Bandwidth" value="<?php echo $row[10]; ?>" size="30"><br /><br />
		<input type="text" name="community" placeholder="Community" value="<?php echo $row[11]; ?>" size="30"><br /><br />
		
        <button class="uk-button uk-button-primary uk-icon-check"> Save</button>
		<button class="uk-button uk-icon-undo" type="button" onclick="history.go(-1);"> Cancel</button>
		<button class="uk-button uk-icon-minus" type="button" onclick="this.form.sv.value='DELETE';this.form.submit();"> Delete</button>
    </fieldset>
</form>		
<br />
            
			<hr class="uk-grid-divider">
			
		</div>
 
 	</body>
 
</html>
