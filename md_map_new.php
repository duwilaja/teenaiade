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
<input type="hidden" name="sv" value="NEW">
    <fieldset data-uk-margin>
		<input type="text" name="kodam" placeholder="Kodam" value=""><br /><br />
		<input type="text" name="korem" placeholder="Korem" value=""><br /><br />
        <input type="text" name="`left`" placeholder="Left ... Pixel" value=""><br /><br />
		<input type="text" name="`top`" placeholder="Top ... Pixel" value=""><br /><br />
        <!--input type="text" name="maps" placeholder="Google Map Coordinate" value=""><br /><br /-->
        <button class="uk-button uk-button-primary uk-icon-check"> Save</button>
		<button class="uk-button uk-icon-undo" type="button" onclick="history.go(-1);"> Cancel</button>
		
    </fieldset>
</form>		
<br />
            
			<hr class="uk-grid-divider">
			
		</div>
 
 	</body>
 
</html>
