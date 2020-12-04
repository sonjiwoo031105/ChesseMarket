<?php
session_start();
error_reporting(0);
include 'db_conn.php';

$_userid = $_SESSION['userid'];
$_passwd = $_POST['passwd'];
$_passChk = $_POST['passChk'];
$_name = $_POST['name'];
$_address = $_POST['address'];
$_tel = $_POST['tel'];
$_email = $_POST['email'];
$_account = $_POST['account'];

if($_passwd == $_passChk){
    $sql = "update user set passwd='$_passwd', name='$_name', address='$_address', tel='$_tel', email='$_email', account='$_account' where userid = '$_userid'";
    mysqli_query($conn, $sql);
    echo '<script> alert("수정 완료되었습니다."); location.replace("index.php"); </script>';

}else{
    echo '<script> alert("비밀번호가 일치하지 않습니다."); history.back(); </script>';
}

?>