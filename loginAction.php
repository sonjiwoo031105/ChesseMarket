<?php
include 'session.php';
include './db_conn.php';
error_reporting(0);

$_userid = $_POST['userid'];
$_passwd = $_POST['passwd'];

$query = "select * from user where userid = '$_userid' and passwd = '$_passwd'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);

if($_userid==$row[1] && $_passwd==$row[2]){ 
    $_SESSION['userid'] = $row[1];
    $_SESSION['passwd'] = $row[2];
    echo "<script>location.href='index.php';</script>";
}else{ 
    echo "<script>alert('잘못된 아이디 또는 비밀번호 입니다'); location.href='login.php';</script>";
}
?>