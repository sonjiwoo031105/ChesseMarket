<?php
include './db_conn.php';
$_userid = $_POST['userid'];
$_passwd = $_POST['passwd'];
$_passChk = $_POST['passChk'];
$_name = $_POST['name'];
$_address = $_POST['address'];
$_tel = $_POST['tel'];
$_email = $_POST['email'];
$_account = $_POST['account'];
if($_passwd == $_passChk){
    echo "<script>alert('회원가입 완료되었습니다.');location.href='login.php';</script>";
    $sql = "insert into user(userid, passwd, name, address, tel, email, account) values('$_userid', '$_passwd', '$_name', '$_address', '$_tel', '$_email', '$_account')";
    mysqli_query($conn, $sql);
}else{
    echo '<script> alert("비밀번호가 일치하지 않습니다."); history.back(); </script>';
}

?>