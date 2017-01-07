<?php require_once './hamKetNoiCSDL.php'; 

$rr=ConnectQuery("select * from san_pham where masp='".$_GET['masp']."'");
	while($row=$rr->fetch_assoc()){
		$view=$row['luotview']+1;
		$rs=ConnectQuery("update san_pham set luotview=$view where masp='".$_GET['masp']."'");
	}
$rr=ConnectQuery("select * from san_pham where masp='".$_GET['masp']."'");
	while($row=$rr->fetch_assoc()){
?>
<div class="col-lg-12" style="background-color: #c9e1e3;opacity: 0.9;border-radius: 16px">
<div style="text-align: center;">
<div style="font-size: 16px;">
	 <p><h1><b>THÔNG TIN SẢN PHẨM</b></h1></p>
   <br>
</div>
  <div class="col-lg-5" style="text-align: center;">
 		<img src="./image/<?php echo $row['masp']."/".$row['icon']; ?>" width="300px" width="300px" />     
  </div>
  <div class="col-lg-7">
   	<form class="form-horizontal" action="index.html" method="POST">
      <div class="form-group">
   			<h1 style="text-align: center;"><?php echo $row['hangsx']." ".$row['tensp']; ?></h1>
      </div>
				<label control-label" style="font-size: 16px;"><i>Giá sản phẩm: <?php echo number_format($row['gia']); ?> VNĐ</i></label><br>
        <label control-label"><i><b><h5><?php echo XuatTenCardDoHoa($row['loaicpu']).", ".$row['loaicpu'].", ".$row['ramdungluong']."GB, ".$row['kichthuocmh']." inch"; ?></h5></b></i></label><br>
        <label control-label">Số lượng bán: <?php echo SoLuongBan($row['masp']); ?></label><br>
		    <label for="SoLuongXem" control-label">Số lượng xem: <?php echo $row['luotview'];?></label>
			  <?php 
        if(isset($role)) 
          echo '<div class="form-group">
        <label for="SoLuongDat" control-label">Số lượng đặt:</label><input type="number" min="0" class="form-control" id="SoLuongDat">
      </div>
        <div class="form-group">
      <button type="submit" class="btn btn-success">         
            <i class="fa fa-check"></i>Thêm vào giỏ hàng
      </button>  
    </div>'; ?>
    </form>     
  </div>
</div>
<br/>
<p>
<div class="col-lg-12" style="margin-bottom: 20px">
<div style="text-align: center;background-color: #c9e1e3;opacity: 0.9;margin-bottom: 450px;">
<h2>Hình ảnh sản phẩm</h2>
	<div class="col-sm-10 image-run">
		<img style="width:680px;height:378px;margin-left: 60px;" src="./image/<?php echo $row['masp']."/".$row['icon']; ?>" id="photo">
  </div>
  
  <div class="col-sm-12">
  <?php 
    $image=ConnectQuery("select * from hinh_anh_sp where masp='".$_GET['masp']."'");
    $dem=0;
    while ($rowimage=$image->fetch_assoc()) {
      $dem=$dem+1;
  ?>
      <img style="width:85px;height:47px" onmousemove="img<?php echo $dem; ?>()" class="img-change" id="<?php echo $dem; ?>" src="./image/<?php echo $rowimage['masp']."/".$rowimage['tenfile']; ?>">
    <script>
    function img<?php echo $dem; ?>()
    {
      var x=document.getElementById("photo")
      if(x)
      {
        x.src="./image/<?php echo $rowimage['masp']."/".$rowimage['tenfile']; ?>"
      }
    }
    </script>
  <?php } ?>
	</div>
</div>
</div>
</p>
<p>
<div class="col-lg-4">
  <div class="panel panel-default" style="opacity: 0.9;">
      <div class="panel-heading">
        <h3 class="panel-title" style="font: arial;text-align: center;"><b>SẢN PHẨM CÙNG HÃNG</b></h3>
      </div>
      <div class="panel-body" >
        <?php $top=ConnectQuery("select * from san_pham where hangsx='".$row['hangsx']."' limit 5");
        while ($rowtop=$top->fetch_assoc()) {
            ?><div style="border: outset; margin: 5px;float: left;width: 200px;text-align: center;">
        <a href="index.php?act=chitiet&masp=<?php echo $rowtop['masp']; ?>">
          <img width="120px" height="120px" src="./image/<?php echo $rowtop['masp']."/".$rowtop['icon']; ?>"/>
          <div style="font: bold 14px arial;color: #f39;margin-top: 2px;"><?php echo $rowtop['hangsx']."<br/>".$rowtop['tensp']; ?></div>
          <div style="font:bold 12px arial;color: #f30;">Giá: <?php echo number_format($rowtop["gia"]); ?> VNĐ</div>
        </a>
        <div style="font:italic bold 12px arial;margin-right: 30px; margin-bottom: 10px;color:blue; text-align: center;">
          <?php if(isset($role)) echo "<input style=\"border-width: 0px;\" type=\"submit\" name=\"them\" value=\"Thêm vào giỏ\">"; ?>
        </div>
            </div>
      <?php 
        }
        ?>
      </div>
  </div>
  <div class="panel panel-default" style="opacity: 0.9;">
      <div class="panel-heading">
        <h3 class="panel-title" style="font: arial;text-align: center;"><b>SẢN PHẨM CÙNG HÃNG</b></h3>
      </div>
      <div class="panel-body" >
        <?php $top=ConnectQuery("select * from san_pham where hangsx='".$row['hangsx']."' limit 5");
        while ($rowtop=$top->fetch_assoc()) {
            ?><div style="border: outset; margin: 5px;float: left;width: 200px;text-align: center;">
        <a href="index.php?act=chitiet&masp=<?php echo $rowtop['masp']; ?>">
          <img width="120px" height="120px" src="./image/<?php echo $rowtop['masp']."/".$rowtop['icon']; ?>"/>
          <div style="font: bold 14px arial;color: #f39;margin-top: 2px;"><?php echo $rowtop['hangsx']."<br/>".$rowtop['tensp']; ?></div>
          <div style="font:bold 12px arial;color: #f30;">Giá: <?php echo number_format($rowtop["gia"]); ?> VNĐ</div>
        </a>
        <div style="font:italic bold 12px arial;margin-right: 30px; margin-bottom: 10px;color:blue; text-align: center;">
          <?php if(isset($role)) echo "<input style=\"border-width: 0px;\" type=\"submit\" name=\"them\" value=\"Thêm vào giỏ\">"; ?>
        </div>
            </div>
      <?php 
        }
        ?>
      </div>
  </div>
</div>
<div style="opacity: 0.9;" class="col-lg-8">
<div style="border-style: groove; background-color: #82a1a6; text-align: center;border-top-right-radius: 8px; border-top-left-radius: 8px;">
  <h3><b>THÔNG SỐ SẢN PHẨM</b></h3>
</div>
<div style="border-style: groove; background-color: #c9e1e3;margin-top: -4px;margin-bottom: -6px; text-align: center;border-bottom-right-radius: 8px; border-bottom-left-radius: 8px;">
           
  <table class="table">
   <thead>
      
      <tr>
        <th colspan="2">Bộ xử lý</th>        
      </tr>

     <?php 
     //echo "select * from cpu where loai = '".$row['loaicpu']."'";
     $as=ConnectQuery("select * from cpu where loai = '".$row['loaicpu']."'");
     while($asrow=$as->fetch_assoc()) { ?>
    </thead>
    <tbody>
      <tr>
        <td width="226px">Hãng CPU</td>
        <td><?php echo $asrow['hangsx']; ?></td>
      </tr>
      <tr>
        <td>Công nghệ CPU</td>
        <td><?php echo $asrow['congnghe']; ?></td>
      </tr>
      <tr>
        <td>Loại CPU</td>
        <td><?php echo $row['loaicpu']; ?></td>
      </tr>
       <tr>
        <td>Tốc độ CPU</td>
        <td><?php echo $asrow['tocdo']; ?> GHz</td>
      </tr>
       <tr>
        <td>Bộ nhớ đệm</td>
        <td><?php echo $asrow['thongtinbodem']; ?></td>
      </tr>
       <tr>
        <td>Tốc độ tối đa</td>
        <td><?php echo $asrow['tocdotoida']; ?> GHz</td>
      </tr>
    </tbody>
    <?php } ?>
    <thead>
      <tr>
        <th colspan="2">Bộ nhớ</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>RAM</td>
        <td><?php echo $row['ramdungluong'];?> GB</td>
      </tr>
      <tr>
        <td>Loại RAM</td>
        <td><?php echo $row['ramloai'];?></td>
      </tr>
      <tr>
        <td>Tốc độ Bus</td>
        <td><?php echo $row['rambus'];?> MHz</td>
      </tr>
    </tbody>
    <thead>
      <tr>
        <th colspan="2">Đĩa cứng</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Loại ổ đĩa</td>
        <td><?php echo XuatLoaiOCung($row['masp']); ?></td>
      </tr>
      <tr>
        <td>Ổ cứng</td>
        <td><?php echo XuatDungLuongTheoLoai($row['masp']); ?> GB</td>
      </tr>
</tbody>
       <thead>
      <tr>
        <th colspan="2">Màn hình</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Kích thước màn hình</td>
        <td><?php echo $row['kichthuocmh'];?> inch</td>
      </tr>
      <tr>
        <td>Độ phân giải (W x H)</td>
        <td><?php echo $row['dophangiai'];?> pixels</td>
      </tr>
      <tr>
        <td>Công nghệ màn hình</td>
        <td><?php echo $row['cnmanhinh'];?></td>
      </tr>
      <tr>
        <td>Màn hình cảm ứng</td>
        <td><?php echo $row['manhinhcamung']==1?"có":"không";?></td>
        <td></td>
      </tr>
    </tbody>

 <thead>
      <tr>
        <th colspan="2">Đồ họa</th>
      </tr>
      <?php 
     //echo "select * from cpu where loai = '".$row['loaicpu']."'";
     $cs=ConnectQuery("select * from cart_man_hinh where tencart = '".$row['tencartmanhinh']."'");
     while($csrow=$cs->fetch_assoc()) { ?>
    </thead>
    <tbody>
      <tr>
        <td>Chipset đồ họa</td>
        <td><?php echo $csrow['tencart']; ?></td>        
      </tr>
      <tr>
        <td>Bộ nhớ đồ họa</td>
        <td><?php echo $csrow['dungluong']; ?> GB</td>
      </tr>
      <tr>
        <td>Thiết kế card</td>
        <td><?php echo $csrow['thietke']; ?></td>
      </tr>
    </tbody>
    <?php } ?>
 <thead>
      <tr>
        <th colspan="2">Âm thanh</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Kênh âm thanh & Thông tin thêm </td>
        <td><?php echo $row['congngheamthanh'];?></td>
      </tr>
    </tbody>  
  <thead>
      <tr>
        <th colspan="2">Đĩa quang</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Loại đĩa quang</td>
        <td><?php echo $row['oquang'];?></td>
      </tr>
    </tbody>
 <thead>
      <tr>
        <th colspan="2">Cổng giao tiếp</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Số lượng cổng USB (2.0 và 3.0)</td>
        <td><?php echo $row['usb']; ?> cổng</td>
      </tr>
      <tr>
        <td>DHMI</td>
        <td><?php echo $row['dhmi']==1?"có":"không"; ?></td>
      </tr>
      <tr>
        <td>Đọc thẻ nhớ (SD)</td>
        <td><?php echo $row['cart']==1?"có":"không"; ?></td>
      </tr>
      <tr>
        <td>Các cổng giao tiếp khác</td>
        <td><?php echo $row['ketnoikhac']; ?></td>
      </tr>
    </tbody>    
 <thead>
      <tr>
        <th colspan="2">Giao tiếp mạng</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>LAN</td>
        <td><?php echo $row['lan'];?> Ethernet LAN</td>
      </tr>
      <tr>
        <td>Chuẩn Wifi</td>
        <td><?php echo $row['wifi'];?></td>
      </tr>
      <tr>
        <td>Kết nối không dây</td>
        <td><?php echo $row['bluetooth']!="không"?"Bluetooth ".$row['bluetooth']:$row['bluetooth'];?></td>
      </tr>
    </tbody>
  <thead>
      <tr>
        <th colspan="2">Webcam</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Độ phân giải WC</td>
        <td><?php echo $row['camera']; ?></td>
      </tr>
    </tbody>  
 <thead>
      <tr>
        <th colspan="2">Thông tin PIN</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Thông tin Pin</td>
        <td><?php echo $row['pin']; ?></td>
      </tr>
    </tbody> 
 <thead>
      <tr>
        <th colspan="2">Hệ điều hành</th>
       </tr>
    </thead>
    <tbody>
      <tr>
        <td>Hệ điều hành</td>
        <td><?php echo $row['hdh']; ?></td>
      </tr>
      <tr>
        <td>Tính năng mở rộng</td>
        <td><?php echo $row['morong'];?></td>
      </tr>
    </tbody>
 <thead>
      <tr>
        <th colspan="2">Kích thước & Trọng lượng</th>        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Kích thước (ngang x dọc x dày)</td>
        <td><?php echo $row['dai']." mm x ".$row['rong']." mm x ".$row['day']; ?> mm</td>
      </tr>
      <tr>
        <td>Trọng lượng (kg)</td>
        <td><?php echo $row['khoiluong']; ?> Kg</td>
      </tr>
      <tr>
        <td>Chất liệu</td>
        <td><?php echo $row['chatlieu']; ?></td>
      </tr>
    </tbody>
</table>
</div>
	<?php } ?>
</div>
</p>
</div>