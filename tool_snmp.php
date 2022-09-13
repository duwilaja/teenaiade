<?php
include 'inc.chksession.php';
include 'inc.const.php';

$menu="6";

$iphost="";
$community="";
$object="";

if(isset($_POST["iphost"])){$iphost=$_POST["iphost"];}
if(isset($_POST["community"])){$community=$_POST["community"];}
if(isset($_POST["object"])){$object=$_POST["object"];} 
?>

<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $c_site_title;?> - Tools - SNMP</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
        <link rel="stylesheet" href="uikit/css/uikit.docs.min.css">
		
		<script src="vendor/jquery.js"></script>
        <script src="uikit/js/uikit.min.js"></script>
		
 
 <script language="JavaScript">
		function addd(tf){
			var h=btoa(tf.iphost.value);
			var v="v2c";
			var c=tf.community.value;
			var p="";
			if(h!=""){
				$.get( 'apidevc.php?h='+h+'&v='+v+'&c='+c+'&p='+p, function( data ) {
				  //alert( "Data Loaded: " + data );
				  //var jsonku = JSON.parse(data);
				  $("#pesan").html(data);
				});
			}else{
				alert("Host can not blank");
			}
		}
 </script>
 
    </head>
 
    <body>
 
        <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
 

 <?php 
 include 'inc.menu.php';
 
 function walk($host,$community)
{
        $return = snmpwalk($host,$community,"system");
		if($return===FALSE){return "Failed.";}
        return $return;
}

function walk_o($host, $community, $object) 
{
        $return = snmpwalk($host,$community,$object);
		if($return===FALSE){return "Failed.";}
        return $return;
}

?> 

			
                <form class="uk-form" method="post">
    <fieldset>
        <legend>SNMP Walk</legend>
        <input type="text" name="iphost" value="<?php echo $iphost; ?>" placeholder="IP WAN"><br /><br />
        <input type="text" name="community" value="<?php echo $community; ?>" placeholder="Community"><br /><br />
		<input type="text" name="object" value="<?php echo $object; ?>" placeholder="Object"><br /><br />
		<button type="submit" class="uk-button" name="b">SNMP Test</button>
 		<button type="button" onclick="addd(this.form);" class="uk-button uk-button-primary" name="b2">Add To SNMP Check</button>
    </fieldset>
				</form>
 			<hr class="uk-grid-divider">

<div id="pesan"></div>
  
			<hr class="uk-grid-divider">

 			
			<?php
			if($iphost!=""&&$community!=""){
				echo "Result<br>";
				if($object!=""){
					var_dump(walk_o($_POST["iphost"],$_POST["community"],$_POST["object"]));
				}else{
					var_dump(walk($_POST["iphost"],$_POST["community"]));
				}
			}else{
				echo "Please enter IP WAN and Community.";
			}
			?>
			
		</div>
 	</body>
 
</html>
