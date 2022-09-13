<?php
$check_su='Y';
include 'inc.chksession.php';
include 'inc.const.php';

$menu="2";
 
 include 'inc.db.php';
 
 $conn = connect() or die ($failed_connection);

$sql="select * from groups where grpgroup='88'";
  $res=exec_qry($conn,$sql);
  while($row=fetch_row($res)){
	$sel="";
	if($row[1]==$vjar) $sel="selected";
	$jar.="<option ".$sel." value='".$row[1]."'>".$row[2]."</option>";
  }

disconnect($conn);

?>

<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $c_site_title;?> - Master Data - Batch Input</title>
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

<div><h3>Batch Input<h3></div>			

<hr class="uk-grid-divider">

<form class="uk-form" method="post" action="md_bi_save.php">
<input type="hidden" name="sv" value="NEW">
    <fieldset data-uk-margin>
		Table <br />
				<select name="tab">
					<option value="">Please Select</option>
					<?php echo $jar; ?>
				</select><br />
		Data<br />
		<textarea name="data" rows="10" cols="150"></textarea><br />
		Replace Criteria<br />
		<textarea name="where" rows="2" cols="150"></textarea><br />
        <button class="uk-button uk-button-primary uk-icon-plus"> Add</button>
		<button class="uk-button uk-icon-minus" type="button" onclick="this.form.sv.value='DELETE';this.form.submit();"> Replace</button>
    </fieldset>
</form>		
<br />
            
			<hr class="uk-grid-divider">
			
		</div>
 
 	</body>
 
</html>
