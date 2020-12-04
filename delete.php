<?php
include 'db_conn.php';

$id = $_GET['id'];

$sql= "delete from clothinfo where id='$id'";
$result = mysqli_query($conn, $sql);

echo '<script> alert("삭제되었습니다."); location.replace("clothlist.php"); </script>';
?>