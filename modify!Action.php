<?php
error_reporting(0);
include 'db_conn.php';

$id = $_GET['id'];

$_name = $_POST['name'];
$_price = $_POST['price'];
$_count = $_POST['count'];
$_point1 = $_POST['point1'];
$_point2 = $_POST['point2'];
$_imgurl = $_POST['imgurl'];

$sql = "update clothinfo set name='$_name', price='$_price', count='$_count', point1='$_point1', point2='$_point2', imgurl='$_imgurl' where id = '$id'";
mysqli_query($conn, $sql);
echo '<script> alert("수정 완료되었습니다."); location.replace("clothlist.php"); </script>';

?>