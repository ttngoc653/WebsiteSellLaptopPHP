<div class="panel panel-default" style="opacity: 0.9">
	<div class="panel-heading">
  	<h3 class="panel-title" style="font: arial;">GIỎ HÀNG HIỆN TẠI CỦA 
    <?php if (isset($_SESSION['name'])) {
  			echo $_SESSION['name'];
  		} else if (isset($_COOKIE['name'])) {
  			echo $_COOKIE['name'];
  		} else{
  			echo "<meta http-equiv=\"refresh\" content=\"0;index.php\">";
  		}
    ?></h3>
	</div>
  <div class="panel-body">
<div class="alert alert-info alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>THÔNG BÁO!</strong>
  <?php
  if (isset($_GET['xoa'])) {
    if($_GET['xoa']!=0){
      $id=$_GET['xoa'];
      unset($_SESSION["cart"][$id]);
      echo "<meta http-equiv=\"refresh\" content=\"0;".$_SERVER['HTTP_REFERER']."\">";
    }
    else{
      unset($_SESSION['cart']);
      echo "<meta http-equiv=\"refresh\" content=\"0;".$_SERVER['HTTP_REFERER']."\">";
    }
  } else if (isset($_POST['btnCapNhat'])) {
    foreach ($_POST['lID'] as $key => $value) {
      if ($value==0) {
        unset($_SESSION['cart'][$key]);
      } else if($value>0) {
        $_SESSION['cart'][$key]=$value;
      }
      
    }
  } else if (isset($_POST['btnGhi'])) {
    if (!isset($_POST['diachi']) || (isset($_POST['diachi']) && $_POST['diachi']=="")) {
      echo "<script type=\"text/javascript\" charset=\"utf-8\">alert(\"HÃY NHẬP ĐỊA CHỈ GIAO HÀNG\");</script>";
    } else {
      $ten="";
      if (isset($_SESSION['name'])) {
        $ten=$_SESSION['name'];
      } else {
        $ten=$_COOKIE['name'];
      }
      //echo "insert INTO don_hang(madh, taikhoan, ngaylap, diachinhan, tongtien, dagiao) VALUES (null,'".$ten."','".date("Y-m-d")."','".$_POST['diachi']."',".$_POST['total'].",'0')";
      ConnectQuery("insert INTO don_hang(madh, taikhoan, ngaylap, diachinhan, tongtien, dagiao) VALUES (null,'".$ten."','".date("Y-m-d H:i:s")."','".$_POST['diachi']."','".$_POST['total']."','0')");
      $id=mahdGanNhatCuaNguoiDung($ten);
      //echo $id;
      foreach ($_POST['lID'] as $key => $value) {
        ConnectQuery("insert INTO chi_tiet_don_hang(madh, masp, soluongsp) VALUES ('".$id."','".$key."','".$value."')");
        capnhatLaiSoLuong($key,$value);
      }
      unset($_SESSION['cart']);
    }
  }
?>
</div>
  <?php 
    if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
      echo "<p>GIỎ HÀNG ĐANG TRỐNG. HÃY THÊM SẢN PHẨM VÀO GIỎ</p>";
    }
    else{
      $i=0;
      ?>
      <form action="" method="post" accept-charset="utf-8">
        <table border="1px;">
          <!--<caption><?php //print_r(getCart()); ?></caption>-->
          <thead>
            <tr>
              <th style="width: 50px;text-align: center;">STT</th>
              <th style="width: 250px;text-align: center;">Tên sản phẩm</th>
              <th style="width: 150px;text-align: center;">Đơn giá</th>
              <th style="width: 100px;text-align: center;">Số lượng</th>
              <th style="width: 150px;text-align: center;">Thành tiền</th>
              <th style="width: 110px; text-align: center;">Bỏ lại hàng</th>
            </tr>
          </thead>
          <?php 
            $sum=0;
            foreach ($_SESSION['cart'] as $masp => $value) {
              $i+=1;
          ?>
              <tbody>
              <tr>
                <td style="text-align: center;"><?php echo $i; ?></td>
          <?php 
                  //echo "<td>select tensp,gia from san_pham where masp like '".$masp."'</td>";
                  $cq=ConnectQuery("select hangsx,tensp,gia,slkho from san_pham where masp like '".$masp."'");
                  while ($row=$cq->fetch_assoc()) {
                    echo "<td>&nbsp; &nbsp; ".$row['hangsx']." ".$row['tensp']."</td>";
                    echo "<td style=\"text-align: right;\">".number_format($row['gia'])." VNĐ&nbsp; &nbsp;</td>";
          ?><td style="text-align: center;"><input type="number" min=0 max=<?php echo $row['slkho']; ?> name="lID[<?php echo $masp; ?>]" value="<?php echo $value; ?>" placeholder="" /></td>
                    <td style="text-align: right;"><?php $sum+=$value*$row['gia']; 
                              echo number_format($value*$row['gia'])." VNĐ ";
                        ?>&nbsp; &nbsp; </td>
                    <td style="text-align: center;" colspan="" rowspan="" headers=""><a href="index.php?act=giohang&xoa=<?php echo $masp; ?>" title="">Bỏ lại</a></td>
                <?php 
                  }
                ?>
              </tr>
            </tbody>
          <?php  
            }
          ?>
          <tr>
            <th colspan="5" style="text-align: right;">Tổng tiền:&nbsp; <?php echo number_format($sum); ?>&nbsp;VNĐ &nbsp; &nbsp; </th>
            <th style="text-align: center;"><a href="index.php?act=giohang&xoa=0" title="">Bỏ lại tất cả</th>
            </tr>
        </table>
        <div style="text-align: center;">
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput" style="text-align: right;">Địa chỉ nhận hàng: </label>  
            <div class="col-md-7">
              <input id="diachi" name="diachi" type="text" class="form-control input-md" value=""/>
            </div>
          </div>
          <div>
            <input style="text-align: right;" type="hidden" size="8px" name="total" value="<?php echo $sum; ?>">
            <input style="font: 16px bold;margin-top: 15px;" class="col-md-6" type="submit" name="btnCapNhat" value="CẬP NHẬT LẠI SỐ LƯỢNG">
            <input style="font: 16px bold;margin-top: 15px;" class="col-md-6" type="submit" name="btnGhi" value="ĐẶT HÀNG">
          </div>
        </div>
      </form>        
      <?php 
      }
     ?>
    </div>
</div>