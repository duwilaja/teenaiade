<?php
session_start();
$s_ID = $_SESSION['s_ID'];
if($s_ID==""){
header("Location: index.php?m=Invalid Session.<br>Please Login.");
}//end if
$s_ORG = $_SESSION['s_ORG'];
?>