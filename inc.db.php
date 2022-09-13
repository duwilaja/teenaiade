<?php
function connect(){
   $connection_id = mysqli_connect('p:localhost', 'root', '', 'tniad');
   //$connection_id = mysqli_connect('p:localhost', 'corenms', 'Bismillah3x', 'corenms');

   if (!$connection_id) {
      die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
   }
   return $connection_id;
}
function disconnect($connection_id){
   return mysqli_close($connection_id);
}
function db_error($connection_id){
   return mysqli_error($connection_id);
}
function exec_qry($connection_id,$str_query){
   return mysqli_query($connection_id,$str_query);
}
function release_qry($result_set){
   return mysqli_free_result($result_set);
}
function fetch_all($result_set){
	$return=array();
	while($row=fetch_row($result_set)){
		$return[]=$row;
	}
   return $return;
}
function fetch_row($result_set){
   return mysqli_fetch_row($result_set);
}
function fetch_assoc($result_set){
   return mysqli_fetch_assoc($result_set);
}
function num_row($result_set){
   return mysqli_num_rows($result_set);
}
function num_field($result_set){
   return mysqli_field_count($result_set);
}
function affected_row($connection_id){
   return mysqli_affected_rows($connection_id);
}
function esc_str($database,$string){
   return mysqli_escape_string($database,$string);
}

function kata($sec){
	//$sec=3477;
$day=floor($sec/(3600*24));
$sec-=($day*3600*24);
$hour=floor($sec/3600);
$sec-=($hour*3600);
$min=floor($sec/60);
$sec-=($min*60);

$ada=false;
$return="";

if($day>0){
	$return.=$day." day ";
}
if($hour>0){
	$return.=$hour." hour ";
}
if($min>=0){
	$return.=$min." min ";
}
if($sec>0){
	$return.=$sec." sec";
}
return $return;
}

function jmd($sec){
	//$sec=3477;
$hour=floor($sec/3600);
$sec-=($hour*3600);
$min=floor($sec/60);
$sec-=($min*60);

$ada=false;
$return="";
if($hour>0){
	$return.=$hour.":";
	$ada=true;
}
if($min>0||$ada){
	$return.=$min.":";
}
$return.=$sec;
return $return;
}
?>
