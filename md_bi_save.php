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

<?php
include 'inc.db.php';

$sv=$_POST['sv'];
$data=explode("\r\n",$_POST['data']);

//echo count($data);

$conn = connect() or die ($failed_connection);

$tablename=$_POST['tab'];
$where=$_POST['where'];

if($sv=="DELETE"){
echo "Delete where $where<br>";
if($where==""){$where=" 1=1";}
$sql="delete from ".$tablename." where ".str_replace('\\','',$where);
echo $sql.";<br>";
$result = exec_qry($conn,$sql);
}

$columns=str_replace("	",",",$data[0]);
$acol=explode(",",$columns);

$inserted=0;
$error=0;

for($i=1;$i<count($data)-1;$i++){
//$val=str_replace("'","''",$data[$i]);
$val=str_replace("	","','",$data[$i]);
$sql="insert into ".$tablename."(".$columns.") values ('".$val."')";
//echo $sql.";<br>";
$result = exec_qry($conn,$sql);
//echo $i."<br>";
if(db_error($conn)<>""){
	echo $sql.";<br>";
	echo "ERROR : ".db_error($conn)."<br>";
	$error++;
}else{
	$inserted++;
}
}
$i--;
echo "<br><br> Total : $i <br> Inserted : $inserted <br> Error : $error <br>";

disconnect($conn);

?>

Done.

<hr class="uk-grid-divider">
			
		</div>
 
 	</body>
 
</html>
