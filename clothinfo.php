<?php 
  include 'session.php';
  include 'db_conn.php';
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
body,h1,h2,h3,h4,h5,h6,.w3-wide, #money {font-family: "Montserrat", sans-serif;}
.w3-container img {cursor: pointer;}
#info {font-size: small; text-decoration: none;}
#info:hover {color: lightgray;}

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

<!-- !메인 화면! -->
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

  <?php
  $id = $_GET['id'];
  $sql= "select * from clothinfo where id='$id'";
  $result = mysqli_query($conn, $sql);
  $re = mysqli_fetch_row($result);
  ?>

  <div class="w3-row">
    <div class="w3-col w3-container" style="width:50%"> <br>
      <img src="<?php echo $re[6]?>" style="width:100%">     
    </div>
    <div class="w3-col w3-containerl w3-padding" style="width:50%">
      <p><?php echo $re[1]?></p>
    <table class="w3-table w3-small">
    <tr>
      <td width="150px">Price</td>
      <td>KRW <?php echo $re[2]?></td>
    </tr>
    <tr>
      <td>Point</td>
      <td>
        <span class="w3-tag w3-tiny">무</span> <?php echo $re[4]?>원 <br>
        <span class="w3-tag w3-tiny w3-gray">카</span> <?php echo $re[5]?>원
      </td>
    </tr>
    <tr>
      <td>Delivery fee</td>
      <td>무료</td>
    </tr>
    <tr>
      <td>색상</td>
      <td>
        <select name="color">
          <option value="">- [필수] 옵션을 선택해 주세요 -</option>
          <option value="네이비">네이비</option>
          <option value="아이보리">아이보리</option>         
        </select>
      </td>
    </tr>
    </table>
    <button class="w3-button w3-grey" style="margin-right:1%; width: 120px;height:45px; font-size:9pt;">BUY IT NOW</button>
    <button class="w3-button w3-light-grey" style="margin-right:1%; width: 120px;height:45px; font-size:9pt;">ADD TO CART</button>
    <button class="w3-button w3-light-grey" style="margin-right:1%; width: 120px;height:45px; font-size:9pt;">WISH LIST</button>
    </div>
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

  <!-- End page content -->
</div>

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