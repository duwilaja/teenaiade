<?php
$failed_conn = "Error Connecting to Database";
$failed_query = "Error On Query";
function connect(){
   $connection_id = mysql_connect('localhost', 'corenms', 'Bismillah3x');
   mysql_select_db("corenms");
   return $connection_id;
}
function disconnect($connection_id){
   return mysql_close($connection_id);
}
function db_error($connection_id){
   return mysql_error($connection_id);
}
function exec_qry($connection_id,$str_query){
   return mysql_query($str_query);
}
function fetch_row($result_set){
   return mysql_fetch_row($result_set);
}
function fetch_assoc($result_set){
   return mysql_fetch_assoc($result_set);
}
function num_row($result_set){
   return mysql_num_rows($result_set);
}
function num_field($result_set){
   return mysql_num_fields($result_set);
}
function field_title($result_set, $field_idx){
	return str_replace('_',' ',mysql_field_name($result_set, $field_idx));
}
function field_name($result_set, $field_idx){
	return mysql_field_name($result_set, $field_idx);
}
function field_type($result_set, $field_idx){
	return mysql_field_type($result_set, $field_idx);
}
function field_len($result_set, $field_idx){
	return mysql_field_len($result_set, $field_idx);
}
function field_flag($result_set, $field_idx){
	return mysql_field_flags($result_set, $field_idx);
}
function affected_row(){
   return mysql_affected_rows();
}
function esc_str($string){
   return mysql_escape_string($string);
}
function bulan($b){
	$r = $b;
	$r=str_replace("Jan","Januari",$r);
	$r=str_replace("Feb","Februari",$r);
	$r=str_replace("Mar","Maret",$r);
	$r=str_replace("Apr","April",$r);
	$r=str_replace("May","Mei",$r);
	$r=str_replace("Jun","Juni",$r);
	$r=str_replace("Jul","Juli",$r);
	$r=str_replace("Aug","Agustus",$r);
	$r=str_replace("Sep","September",$r);
	$r=str_replace("Oct","Oktober",$r);
	$r=str_replace("Nov","November",$r);
	$r=str_replace("Dec","Desember",$r);

	$r=str_replace("Sun","Minggu",$r);
	$r=str_replace("Mon","Senin",$r);
	$r=str_replace("Tue","Selasa",$r);
	$r=str_replace("Wed","Rabu",$r);
	$r=str_replace("Thu","Kamis",$r);
	$r=str_replace("Fri","Jumat",$r);
	$r=str_replace("Sat","Sabtu",$r);
   return $r;
}
function terjemahkan($t){
	return bulan(date('D, d M Y',strtotime($t)));
}
?>