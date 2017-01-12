<?php 
if(!isset($_SESSION['name']))
  echo "<script type=\"text/javascript\" charset=\"utf-8\" async defer>window.history.back(); </script>";
else{
  if(isset($_GET['doitt'])){
    doiTinhTrangDonHang($_GET['doitt']);
    echo "<script type=\"text/javascript\" charset=\"utf-8\" async defer>window.history.back(); </script>";
  }
  $sqlstr="";
  if($_SESSION['quyen']==0)
    $sqlstr=" where taikhoan like '".$_SESSION['name']."'";
?>
<div class="panel panel-default" style="opacity: 0.9">
  <div class="panel-heading" style="font-weight: bold;font-size: 18px;"><?php echo $_SESSION['quyen']==0?"LỊCH SỬ MUA HÀNG":"QUẢN LÝ ĐƠN HÀNG"; ?></div>
  <div class="panel-body">
    <div class="table-responsive">
    <table class="table" style="color: black;">
      <thead>
        <tr>
          <th>NGÀY ĐẶT HÀNG</th>
          <th>THÔNG TIN NGƯỜI MUA</th>
          <th>THÔNG TIN ĐƠN HÀNG</th>
          <th>TÌNH TRẠNG</th>
          <?php if($_SESSION['quyen']==1) echo "<th>THAO TÁC</th>"; ?>
        </tr>
      </thead>
    <?php 
      $rs=ConnectQuery("select * from don_hang".$sqlstr." order by ngaylap desc"); 
      while($row=$rs->fetch_assoc()){
    ?>
      <tbody><a href="" title="">
        <tr style="background-color: <?php echo $row['dagiao']==1?"#9f6":"#f99"; ?>;">
          <td><?php echo $row['ngaylap']; ?></td>
          <td>
            <?php echo TenNguoiDung($row['taikhoan']); ?><br/>
            <?php echo $row['diachinhan']; ?>
          </td>
          <td>
            Tiền thanh toán: <?php echo number_format($row['tongtien']); ?> VNĐ<br/>
            Số lượng sản phẩm: <?php echo slSPTrongDonHang($row['madh']); ?>
          </td>
          <td style="text-align: center;"><?php echo $row['dagiao']=="1"?"đã giao":"chưa giao"; ?></td>
          <td>
            <a href="index.php?act=ctdonhang&madh=<?php echo $row['madh']; ?>" style="color: black;" title="">Xem Chi tiết</a><br/>
        <?php
          if($_SESSION['quyen']==1){ ?>
            <a href="index.php?act=qldonhang&doitt=<?php echo $row['madh']; ?>"  style="color: black;" title="">Đổi tình trạng</a>
        <?php } ?>
          </td>
        </tr>
      </a></tbody>
      <?php } ?>
    </table>
    </div>
  </div>
</div>
<?php } ?>