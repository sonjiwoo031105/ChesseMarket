<?php
include 'db_conn.php';
$_name = $_POST['name'];
$_price = $_POST['price'];
$_count = $_POST['count'];
$_point1 = $_POST['point1'];
$_point2 = $_POST['point2'];
$_imgurl = $_POST['imgurl'];

echo "<script>alert('상품등록 완료되었습니다.');location.href='manager.php';</script>";
$sql = "insert into clothinfo(name, price, count, point1, point2, imgurl) values('$_name','$_price','$_count','$_point1','$_point2','$_imgurl')";
mysqli_query($conn, $sql); 
?>