<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TRANG WEB ĐỒ ÁN LẬP TRÌNH WEB1 CỦA 1460510 VÀ 1460653</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="JsCssCapcha/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="JsCssCapcha/doan_css.css"/>
  <link rel="stylesheet" href="JsCssCapcha/bootstrap-theme.min.css"/>
  <script src="JsCssCapcha/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  <style type="text/css">
    body{
      width: 1024px;
      margin: 0 auto; 
    }
  </style>
</head>
<body background="./image/resized-116.jpg" style="background-attachment :fixed; background-repeat: repeat;">
<?php 
  ob_start();
  session_start();
  include_once "./_dauWeb.php";
  include_once "./hamLienQuan.php";
?>
  <br/>
  <div class="row">
    <div style="width: 848px;float: left;margin-left: 15px;">
    <?php
      if (isset($_GET["act"])) {
        switch ($_GET["act"]) {          
          case "themsp":
            include_once "./_themSP.php";
            break;
          case "themcpu":
            include_once "./_themCPU.php";
            break;
          case "themnsx":
            include_once "./_themHangSX.php";
            break;
          case "themcartmh":
            include_once "./_themCartMH.php";
            break;
          case "chitiet":
            include_once "./_ChitietSP.php";
            break;
          case "themngdung":
            include_once "./_themNguoiDung.php";
            break;
          case "dangxuat":
            include_once "./_dangXuat.php";
            break;
          case "timkiem":
            include_once "./_tim.php";
            break;
          case "doimk":
            include_once "./_doimatkhau.php";
            break;
          case "giohang":
            include_once "./_quanlyGioHang.php";
            break;
          case "xemthongtin":
            include_once "./_thongtinNgDung.php";
            break;
          case "qldonhang":
            include_once "./_quanlydonhang.php";
            break;
          default:
            echo "<div style=\"margin-top: 256px; color:red; font-size: 20px;\"><b>
              CHỨC NĂNG ĐANG TRONG QUÁ TRÌNH XÂY DỰNG. MONG MẤY CHẾ THÔNG CẢM.
            </b></div>";
            break;
        }
      } else {
        include_once "./_trangchu.php";
      }
      ?>
    </div>
    <div class="text-right" style="float: right;width: 165px;margin-right: 15px;">
      <?php include_once "./_phaiWeb.php"; ?>
    </div>
  </div>
  <div>
    <?php include_once "./_chanWeb.php"; ?>
  </div>
  <script src="JsCssCapcha/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="JsCssCapcha/jquery-1.11.2.min.js"><\/script>');</script>
  <script src="JsCssCapcha/bootstrap.min.js"></script>
</body>
</html>
