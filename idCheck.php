<?php
include 'db_conn.php';
$uid = $_GET["userid"];
$sql = "select * from user where userid='$uid'";
$result= mysqli_query($conn,$sql);
$re=mysqli_fetch_row($result);
$member=mysqli_num_rows($result);
if($member==0){
    echo $uid.'는 사용가능한 아이디입니다.';
}else{
    echo $uid.'는 중복된 아이디입니다.';
}
?>
<title>아이디 중복확인</title>
<button value="닫기" onclick="window.close()">닫기</button>
<script>
</script>