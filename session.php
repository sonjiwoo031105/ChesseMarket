<?php
session_start();
error_reporting(0);

$uid= $_SESSION['userid'];

if($uid=='ziu'){
    $manager = TRUE;
}
else if(!isset($uid) || !isset($_SESSION['passwd'])){
    $login_session = TRUE;
}


?>