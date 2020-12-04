<?php
  include 'session.php';
  include './db_conn.php';
  error_reporting(0);
?>
<!DOCTYPE html>
<html>
<title>Cheese Market</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="chesse_removebg_preview_8RO_icon.ico">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Montserrat", sans-serif;}
.w3-wide {text-align: center;}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
#info {font-size: small; text-decoration: none;}
#info:hover {color: lightgray;}
.w3-input,#btn {width:300px; margin:0 auto;}
a { text-decoration:none } 
a:hover {color:lightgray;}

</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b><a href="index.php" class="w3-bar-item" style="text-decoration: none;">Cheese Market</a></b></h3>
  </div>
  <!-- 왼쪽 사이드바 메뉴-->
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="new.php" class="w3-bar-item w3-button">NEW</a>
    <a href="#" class="w3-bar-item w3-button">BEST</a>
    <a href="#" class="w3-bar-item w3-button">OUTER</a>
    <a href="#" class="w3-bar-item w3-button">TOP</a>
    <a href="#" class="w3-bar-item w3-button">DRESS</a>
    <a href="#" class="w3-bar-item w3-button">BOTTOM</a>
    <a href="#" class="w3-bar-item w3-button">BAG&SHOES</a>
    <a href="#" class="w3-bar-item w3-button">ACC</a>
  </div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('contact').style.display='block'">Contact</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">Chesse Market</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !메인 화면 시작! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- 헤더 부분 -->
  <?php
  if($login_session){?>
  <header class="w3-container w3-xlarge">
    <p class="w3-right w3-xlarge">
      <a href="login.php" id="info">LOGIN</a> &nbsp; &nbsp;
      <a href="join.php" id="info">JOIN</a> &nbsp; &nbsp;
      <a href="#" id="info">CART(0)</a> &nbsp; &nbsp;
      <a href="#" id="info">ORDER</a> &nbsp; &nbsp;
      <a href="login.php" id="info">MYPAGE</a>
    </p>
  </header>
  <?php }else if($manager){?>
  <header class="w3-container w3-xlarge">
    <p class="w3-right w3-xlarge">
      <a href="logout.php" id="info">LOGOUT</a> &nbsp; &nbsp;
      <a href="modify.php" id="info">MODIFY</a> &nbsp; &nbsp;
      <a href="#" id="info">CART(0)</a> &nbsp; &nbsp;
      <a href="#" id="info">ORDER</a> &nbsp; &nbsp;
      <a href="manager.php" id="info">MYPAGE</a>
  </header>
  <?php }else{?>
    <header class="w3-container w3-xlarge">
    <p class="w3-right">
      <a href="logout.php" id="info">LOGOUT</a> &nbsp; &nbsp;
      <a href="modify.php" id="info">MODIFY</a> &nbsp; &nbsp;
      <a href="#" id="info">CART(0)</a> &nbsp; &nbsp;
      <a href="#" id="info">ORDER</a> &nbsp; &nbsp;
      <a href="mypage.php" id="info">MYPAGE</a>
    </p>
  </header> 
  <?php } ?>

  <!-- 마이페이지 -->
  <div class="w3-container w3-center">
    <h4>MY SHOPPING</h4> 
    <div class="w3-row">
      <div class="w3-col w3-container" style="width:100%; padding-top:5%;">
        <p style="font-size:6pt;"><a href="#" style="margin-right:4%;">ORDER LIST</a>
        <a href="#" style="margin-right:4%;">WISH LIST</a>
        <a href="#" style="margin-right:4%;">MY POINT</a>
        <a href="#" style="margin-right:4%;">COUPON</a>
        <a href="#" style="margin-right:4%;">DEPOSITS</a>
        <a href="#" style="margin-right:4%;">MY BOARD</a>
        <a href="#" style="margin-right:4%;">ADDRESS</a>
        <a href="#">PROFILE</a></P>
      </div>
    </div>
    <div class="w3-row" style="padding-top:7%;">
        <div class="w3-col w3-container w3-center" style="width:50%"> 
        <?php
        $_userid = $_SESSION['userid'];
        $sql = "select * from user where userid='$_userid'";
        $result = mysqli_query($conn, $sql);
        $re = mysqli_fetch_row($result);
        echo '<p style="font-size:10pt;" padding-top:10%;>'.$re[3].'님은 현재 <b>일반회원</b>입니다.</p>';
        ?>
        </div>
      <div class="w3-col w3-container" style="width:50%"> 
      <table class="w3-table w3-small">
      <tr>
        <td width="150px">WISH</td>
        <td>POINT</td>
        <td>COUPON</td>
      </tr>
      <tr>
        <td>0개</td>
        <td>1000원</td>
        <td>0개</td>
      </tr>
      </table>
      </div>
    </div>
    <p style="padding-top:7%; font-size:10pt;"><b>나의 주문처리 현황</b> (최근 3개월 기준)</p> <br>
    <table style="margin-left: auto; margin-right: auto; font-size:10pt; padding-bottom:25%;">
    <tr>
      <td width="200">입금전</td>
      <td width="200">배송준비중</td>
      <td width="200">배송중</td>
      <td width="200">배송완료</td>
    </tr>
    <tr>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
    </tr>
    </table>
<!-- 메인 화면 끝 -->
</div>

<!-- Footer -->
<footer class="w3-padding w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4 w3-justify">
      <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> MirimGirlsInformationScienceHighSchool</p>
        <p><i class="fa fa-fw fa-phone"></i> 01027152230</p>
        <p><i class="fa fa-fw fa-envelope"></i> sonjiu00@gmail.com</p>
      </div>
      <div class="w3-col s4 w3-justify" style="padding-left:12%;">
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
      </div>
      <div class="w3-col s4 w3-justify" style="padding-left:19%; padding-top:12%;">
        <a href="https://www.facebook.com/profile.php?id=100009964290376"><i class="fa fa-facebook-official w3-hover-opacity w3-large" style="cursor:pointer;"></i></a>
        <a href="https://www.instagram.com/_s_jz/?hl=ko"><i class="fa fa-instagram w3-hover-opacity w3-large" style="cursor:pointer;"></i></a>
        <i class="fa fa-snapchat w3-hover-opacity w3-large" style="cursor:pointer;"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large" style="cursor:pointer;"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large" style="cursor:pointer;"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large" style="cursor:pointer;"></i>
      </div>
    </div>
  </footer>

<!-- Contact Modal -->
<div id="contact" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('contact').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Contact</h2>
      <p>문의사항 및 관리자에게 힘나는 말 한마디 해주세요❤<p>
        <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
        <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
        <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
        <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
      <button type="button" class="w3-button w3-padding-large w3-black w3-margin-bottom" onclick="document.getElementById('contact').style.display='none'">Send</button>
    </div>
  </div>
</div>

<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">NEWSLETTER</h2>
      <p>신상품 및 특별 행사에 대한 최신 정보를 받으려면 메일링 목록에 가입하십시오.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>

<script>


// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>