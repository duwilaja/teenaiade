<?php
include 'inc.chksession.php';
include 'inc.const.php';

$menu="6";
 
?>

<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $c_site_title;?> - Tools - Ping</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
        <link rel="stylesheet" href="uikit/css/uikit.docs.min.css">
		
		<script src="vendor/jquery.js"></script>
        <script src="uikit/js/uikit.min.js"></script>
		
    </head>
 
    <body>
 
        <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
 

 <?php 
 include 'inc.menu.php';
 
 $host="";
 if(isset($_POST["iphost"])){$host=$_POST["iphost"];}
 
 function ping($host)
{
$repeat=" -c 5 ";
$timeout=" -w 5 ";
$format="";

        $return = exec("/bin/ping -n ".$repeat.$timeout.$format.$host);
		//if($return==""){return "Failed.";}
        return $return;
}

?> 

			
                <form class="uk-form" method="post">
    <fieldset>
        <legend>PING</legend>
        <input type="text" name="iphost" value="<?php echo $host; ?>" placeholder="IP"><br /><br />
		<button type="submit" class="uk-button uk-button-primary" name="b">PING</button>
    </fieldset>
				</form>
            
			<hr class="uk-grid-divider">
			 
			<?php
			if($host!=""){
				echo "Result : ".ping($host);
			}
			?>
			
		</div>
 
 	</body>
 
</html>
