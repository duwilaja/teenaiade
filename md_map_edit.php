<?php
include 'inc.chksession.php';
include 'inc.const.php';

$menu="2";
 
 include 'inc.db.php';
 
 $conn = connect() or die ($failed_connection);

$tablename="korem";
$key="rowid";
$columns="rowid,korem,`left`,`top`,kodam";

$sql="select ".$columns." from ".$tablename." where ".$key."=".$_GET["id"]."";
$result = exec_qry($conn,$sql);
$row = fetch_row($result);

disconnect($conn);

?>

<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $c_site_title;?> - Master Data - Map</title>
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

<div><h3>Map<h3></div>			

<hr class="uk-grid-divider">

<form class="uk-form" method="post" action="md_map_save.php">
<input type="hidden" name="sv" value="EDIT">
    <fieldset data-uk-margin>
		<input type="hidden" name="rowid" value="<?php echo $row[0]; ?>">
		Kodam : <input type="text" name="kodam" placeholder="Kodam" value="<?php echo $row[4]; ?>"><br /><br />
        Korem : <input type="text" name="korem" placeholder="Korem" value="<?php echo $row[1]; ?>"><br /><br />
        Left : <input type="text" name="`left`" placeholder="Left ... Pixel" value="<?php echo $row[2]; ?>"><br /><br />
		Top : <input type="text" name="`top`" placeholder="Top ... Pixel" value="<?php echo $row[3]; ?>"><br /><br />
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
