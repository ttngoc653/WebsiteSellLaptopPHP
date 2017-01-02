<?php 
  require_once ('hamKetNoiCSDL.php'); 
?>
<div>
  <h1 class="tieude">THÊM SẢN PHẨM</h1><br/>
</div>
<form class="form-horizontal" name="themSanPham" enctype="multipart/form-data" action="" method="post" onsubmit="return ktradieukien();">
<p>
<div class="form-group">
<i><div class="col-sm-8" style="color: red;font-size: 16px;text-align: center;" >
<?php 
  if(isset($_POST['guiSP'])) {
    
    $f_ten=$_POST['ten'];
    $rs = ConnectQuery("select * from san_pham where tensp = '".$f_ten."'");
    if(0 == $rs->num_rows){
      $f_dophangiai=$_POST['pgngang']."x".$_POST['pgdoc'];
      $f_hdmi=0;
      $f_docthe=0;
      if(isset($_POST['congother'])){
        $cong =$_POST['congother'];
        $CountarrCong =count($cong);
        for ($i =0; $i < $CountarrCong; $i++) { 
          if($cong[$i] == 1){
            $f_hdmi =1;
          }
          if($cong[$i] == 2){
            $f_docthe=1;
          }
        }
      }
      $f_dacbiet="";
      if(isset($_POST['tinhnangbosung'])){
        $f_dacbiet=$_POST['tinhnangbosung'];
      }
      //echo "insert INTO san_pham(masp, tensp, hangsx, gia, icon, mau, loaicpu, ramdungluong, ramloai, rambus, kichthuocmh, dophangiai, cnmanhinh, manhinhcamung, tencartmanhinh, congngheamthanh, oquang, usb, dhmi, cart, ketnoikhac, morong, wifi, lan, bluetooth, camera, pin, hdh, khoiluong, dai, rong, day, chatlieu, slkho, luotview, an) values (null,'".$f_ten."','".$_POST['hangsx']."','".$_POST['gia']."','".basename($_FILES["file0"]["name"])."','".$_POST['mausac']."','".$_POST['cpu']."','".$_POST['ramdl']."','".$_POST['ramloai']."','".$_POST['rambus']."','".$_POST['kichthuoc']."','".$f_dophangiai."','".$_POST['congnghemh']."','".$_POST['camung']."','".$_POST['carddh']."','".$_POST['congngheat']."','".$_POST['oquang']."','".$_POST['usb']."','$f_hdmi','$f_docthe','".$_POST['cother']."','$f_dacbiet','".$_POST['wifi']."','".$_POST['lan']."','".$_POST['bluetooth']."','".$_POST['camera']."','".$_POST['pin']."','".$_POST['hdh']."','".$_POST['nang']."','".$_POST['dai']."','".$_POST['rong']."','".$_POST['day']."','".$_POST['chlieu']."','".$_POST['slhienco']."','0','0')";

      $rs=ConnectQuery("insert INTO san_pham(masp, tensp, hangsx, gia, icon, mau, loaicpu, ramdungluong, ramloai, rambus, kichthuocmh, dophangiai, cnmanhinh, manhinhcamung, tencartmanhinh, congngheamthanh, oquang, usb, dhmi, cart, ketnoikhac, morong, wifi, lan, bluetooth, camera, pin, hdh, khoiluong, dai, rong, day, chatlieu, slkho, luotview, an) values (null,'".$f_ten."','".$_POST['hangsx']."','".$_POST['gia']."','".basename($_FILES["file0"]["name"])."','".$_POST['mausac']."','".$_POST['cpu']."','".$_POST['ramdl']."','".$_POST['ramloai']."','".$_POST['rambus']."','".$_POST['kichthuoc']."','".$f_dophangiai."','".$_POST['congnghemh']."','".$_POST['camung']."','".$_POST['carddh']."','".$_POST['congngheat']."','".$_POST['oquang']."','".$_POST['usb']."','$f_hdmi','$f_docthe','".$_POST['cother']."','$f_dacbiet','".$_POST['wifi']."','".$_POST['lan']."','".$_POST['bluetooth']."','".$_POST['camera']."','".$_POST['pin']."','".$_POST['hdh']."','".$_POST['nang']."','".$_POST['dai']."','".$_POST['rong']."','".$_POST['day']."','".$_POST['chlieu']."','".$_POST['slhienco']."','0','0')");

      $id =SearchIDLap($f_ten);
      $rs=ConnectQuery("insert into o_dia_cung values ('$id','".$_POST['odia1']."','".$_POST['odia1dl']."','0')");
      if(isset($_POST['odia2'])){
        if(strlen($_POST['odia2'])){
          $rs=ConnectQuery("insert into o_dia_cung values ('$id','".$_POST['odia2']."','".$_POST['odia2dl']."','0')");
        }
      }

      echo "<p>id của máy là: $id</p>";
      $thumuc="image/".$id;
      if (!is_dir($thumuc))
      {
        mkdir($thumuc,0777);
      }
      //}

      $thumuc="image/".$id."/";
      $duongdanfile = $thumuc."/".basename($_FILES["file0"]["name"]);
      if (move_uploaded_file($_FILES['file0']['tmp_name'], $duongdanfile)) {
      } else {
          echo "<p>tải ảnh đại diện sản phẩm lên thất bại </p>";
      }

      $rs=ConnectQuery("insert into hinh_anh_sp values ('".$id."','".basename($_FILES['file1']['name'])."')");
      $duongdanfile=$thumuc.basename($_FILES["file1"]["name"]);
      if (move_uploaded_file($_FILES['file1']['tmp_name'], $duongdanfile)) {
      } else {
          echo "<p>tải ảnh lớn lên lên thất bại </p>";
      }
      

      $rs=ConnectQuery("insert into hinh_anh_sp values ('".$id."','".basename($_FILES['file2']['name'])."')");
      $duongdanfile=$thumuc.basename($_FILES["file2"]["name"]);
      if (move_uploaded_file($_FILES['file2']['tmp_name'], $duongdanfile)) {
      } else {
          echo "<p>tải ảnh chi tiết 1 lên thất bại </p>";
      }


      $rs=ConnectQuery("insert into hinh_anh_sp values ('".$id."','".basename($_FILES['file3']['name'])."')");
      $duongdanfile=$thumuc.basename($_FILES["file3"]["name"]);
      if (move_uploaded_file($_FILES['file3']['tmp_name'], $duongdanfile)) {
      } else {
          echo "<p>tải ảnh chi tiết 2 lên thất bại </p>";
      }


      $rs=ConnectQuery("insert into hinh_anh_sp values ('".$id."','".basename($_FILES['file4']['name'])."')");
      $duongdanfile=$thumuc.basename($_FILES["file4"]["name"]);
      if (move_uploaded_file($_FILES['file4']['tmp_name'], $duongdanfile)) {
      } else {
          echo "<p>tải ảnh chi tiết 3 lên thất bại </p>";
      }
    }
    else{
      echo "đã có laptop $f_ten trong dữ liệu";
    }
  }
?>
<div class="col-sm-8" style="color: red;font-size: 16px;text-align: center;" id="thongbaoloi">
</div>
</div></i>
</p>
</div>
<fieldset>

<!-- Form Name -->
<legend><h2>Thông tin cơ bản</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="ten">Nhập tên máy</label>  
  <div class="col-sm-4">
  <input id="ten" name="ten" type="text" placeholder="Inpiron 15" class="form-control input-md">
  <span class="help-block" style="color: red; font-size: 12px;">ví dụ: Inspiron 3542 74514G50G</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-sm-4 control-label" for="hangsx">Hãng Sản xuất</label>
  <div class="col-sm-4">
    <select id="hangsx" name="hangsx" class="form-control">
    	<option value="0">chọn tên hãng</option>
     <?php 
        $rs= ConnectQuery("select * from hang_sx order by tenhangsx");
                    
        while ($row= $rs->fetch_assoc()){
            $a=$row["tenhangsx"];
            ?>
                <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
            <?php
               }
            ?>
    </select>
  <span class="help-block" style="color: red; font-size: 12px;">nếu không có trong sự lựa chọn này thì hãy thêm hãng sản xuất <a href="index.php?act=themnsx" target="_blank">tại đây</a></span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="gia">Giá tiền (VNĐ)</label>  
  <div class="col-sm-4">
  <input id="gia" name="gia" type="text" placeholder="18590000" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="mausac">Màu</label>  
  <div class="col-sm-4">
  <input id="mausac" name="mausac" type="text" placeholder="xám, đen, bạc,..." class="form-control input-md">
  <span class="help-block" style="color: red; font-size: 12px;" >có thể nhập nhiều màu</span>  
  </div>
</div>
</fieldset>
<fieldset>

<!-- Form Name -->
<legend><h2>Phần cứng</h2></legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-sm-4 control-label" for="cpu">Mã CPU</label>
  <div class="col-sm-4">
    <select id="cpu" name="cpu" class="form-control">
      <option value="0"></option>
      <?php 
      	$rs=ConnectQuery("select loai from cpu");
        while ($row= $rs->fetch_assoc()){
      		$a =$row["loai"];
      ?>
      	<option value="<?php echo $a; ?>"><?php echo $a; ?></option>}
      <?php
      	}
      ?>
    </select>
    <span class="help-block" style="color: red; font-size: 12px;" >nếu không có thì hãy thêm cpu <a href="index.php?act=themcpu" target="_blank">tại đây</a></span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-sm-4 control-label" for="ramdl">Dung lượng RAM (GB)</label>
  <div class="col-sm-2">
    <select id="ramdl" name="ramdl" class="form-control">
		<option value="2">2</option>
      <option value="4">4</option>
      <option value="8">8</option>
      <option value="16">16</option>
      <option value="32">32</option>
      <option value="64">64</option>
      <option value="128">128</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="ramloai">Loại RAM</label>  
  <div class="col-sm-4">
  <input id="ramloai" name="ramloai" type="text" placeholder="vd: DDR3L" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="rambus">Tốc độ bus (MHz)</label>  
  <div class="col-sm-2">
  <input id="rambus" name="rambus" type="text" placeholder="vd: 1600" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-sm-4 control-label" for="carddh">Card đồ họa</label>
  <div class="col-sm-5">
    <select id="carddh" name="carddh" class="form-control">
       <?php 
      	$rs=ConnectQuery("select tencart from cart_man_hinh");
        while ($row= $rs->fetch_assoc()){
      		$a =$row["tencart"];
      ?>
      	<option value="<?php echo $a; ?>"><?php echo $a; ?></option>}
      <?php
      	}
      ?>
    </select>
     <span class="help-block" style="color: red; font-size: 12px;">nếu không có trong sự lựa chọn trong này thì hãy thêm card Màn hình <a href="index.php?act=themcartmh" target="_blank">tại đây</a></span>  
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label" for="congngheat">Công nghệ âm thanh</label>  
    <div class="col-sm-4">
      <input id="congngheat" name="congngheat" type="text" placeholder="vd: 2.0, Microspeak..." class="form-control input-md">
    </div>
  </div>

</div>
</fieldset>
<legend><h2>Bộ nhớ máy (ROM)</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="odia" style="text-align: right;">Loại  ổ cứng</label>
  <label class="col-sm-4 control-label" for="dungluong" style="text-align: left;">Dung lượng tương ứng (GB)</label>  
</div>
<div class="form-group">
  <div class="col-sm-4" style="text-align: right;">
    <input id="odia1" name="odia1" type="text" placeholder="vd: HDD (loại thứ 1)" class="form-control input-md">
  </div>
  <div class="col-sm-4" style="text-align: left;">
    <input id="odia1dl" name="odia1dl" type="text" placeholder="vd: 500 (dung lượng ổ cứng loại thứ 1)" class="form-control input-md">
  </div>
</div>
<div class="form-group">
  <div class="col-sm-4" style="text-align: right;">
    <input id="odia2" name="odia2" type="text" placeholder="vd: SSD (loại thứ 2)" class="form-control input-md">
  </div>
  <div class="col-sm-4" style="text-align: left;">
    <input id="odia2dl" name="odia2dl" type="text" placeholder="vd: vd: 220 (dung lượng ổ cứng loại thứ 2)" class="form-control input-md">
  </div>
</div>
</fieldset>
<fieldset>

<!-- Form Name -->
<legend><h2>Màn hình Desktop</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="kichthuoc">Kích thước màn hình (inch)</label>  
  <div class="col-sm-2">
  <input id="kichthuoc" name="kichthuoc" type="text" placeholder="vd: 15.6" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="pgngang">Độ phân giải (pixels)</label>  
  <div class="col-sm-2">
  <input id="pgngang" name="pgngang" type="text" placeholder="vd: 1366" class="form-control input-md">
    </div>

   <div class="col-sm-2">
  <input id="pgdoc" name="pgdoc" type="text" placeholder="vd: 768" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-sm-4 control-label" for="congnghemh">Công nghệ màn hình</label>
  <div class="col-sm-4">                     
    <textarea class="form-control" id="congnghemh" name="congnghemh">HD</textarea>
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-sm-4 control-label" for="camung">Màn hình cảm ứng</label>
  <div class="col-sm-4"> 
    <label class="radio-inline" for="camung-0">
      <input type="radio" name="camung" id="camung-0" value="1">
      Có
    </label> 
    <label class="radio-inline" for="camung-1">
      <input type="radio" name="camung" id="camung-1" value="0" checked="checked">
      Không
    </label>
  </div>
</div>
</fieldset>
<fieldset>

<!-- Form Name -->
<legend><h2>Kết nối</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="oquang">Ổ đĩa quang</label>  
  <div class="col-sm-4">
  <input id="oquang" name="oquang" type="text" placeholder="vd: đọc/ghi DVD" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="usb">Số lượng cổng USB (cổng)</label>  
  <div class="col-sm-2">
  <input id="usb" name="usb" type="text" placeholder="vd: 3" class="form-control input-md">
  <span class="help-block">USB 3.0 + USB 2.0</span>  
  </div>
</div>

<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-sm-4 control-label" for="congother">Có cổng hổ trợ</label>
  <div class="col-sm-4">
    <label class="checkbox-inline" for="congother-0">
      <input type="checkbox" name="congother" id="congother" value="1">
      HDMI
    </label>
    <label class="checkbox-inline" for="congother-1">
      <input type="checkbox" name="congother" id="congother" value="2">
      Đọc thẻ nhớ (SD)
    </label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="cother">Các cổng khác hỗ trợ</label>  
  <div class="col-sm-4">
  <input id="cother" name="cother" type="text" placeholder="vd: LAN (RJ45)" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="wifi">Chuẩn WiFi</label>  
  <div class="col-sm-4">
  <input id="wifi" name="wifi" type="text" placeholder="vd: 802.11b/g/n" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="lan">Chuẩn LAN (Mbps Ethernet)</label>  
  <div class="col-sm-4">
  <input id="lan" name="lan" type="text" placeholder="vd: 10/100 Mbps" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="bluetooth">Phiên bản bluetooth</label>  
  <div class="col-sm-2">
  <input id="bluetooth" name="bluetooth" type="text" placeholder="vd: v4.0" class="form-control input-md">
    
  </div>
</div>

</fieldset>
<fieldset>

<!-- Form Name -->
<legend><h2>Thông tin thêm</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="camera">Độ phân giải Webcam (MP)</label>  
  <div class="col-sm-2">
  <input id="camera" name="camera" type="text" placeholder="vd: 1.3" class="form-control input-md">
    
  </div>
</div>
<div class="form-group">
  <label class="col-sm-4 control-label" for="hdh">Hệ điều hành</label>  
  <div class="col-sm-4">
  <input id="hdh" name="hdh" type="text" placeholder="vd: Windows 10" class="form-control input-md">
    
  </div>
</div>
<div class="form-group">
  <label class="col-sm-4 control-label" for="tinhnangbosung">Các tính năng đặc biệt khác</label>  
  <div class="col-sm-4">
  <input id="tinhnangbosung" name="tinhnangbosung" type="text" placeholder="vd: One Key Recovery, AccuType Keyboard" class="form-control input-md">
    
  </div>
</div>

</fieldset>
<legend><h2>Thông tin vật lý</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="pin">Thông tin pin</label>  
  <div class="col-sm-4">
  <input id="pin" name="pin" placeholder="vd: 2 cell 8.400 mAh" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="nang">Khối lượng (kg)</label>  
  <div class="col-sm-2">
  <input id="nang" name="nang" placeholder="vd: 1.92" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="dai">Chiều dài (mm)</label>  
  <div class="col-sm-2">
  <input id="dai" name="dai" placeholder="vd: 292" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="rong">Chiều rộng (mm)</label>  
  <div class="col-sm-2">
  <input id="rong" name="rong" placeholder="vd: 202" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="day">Độ dày (mm)</label>  
  <div class="col-sm-2">
  <input id="day" name="day" placeholder="vd: 17" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="chlieu">Chất liệu</label>  
  <div class="col-sm-4">
  <input id="chlieu" name="chlieu" placeholder="vd: nhôm nguyên khối" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="slhienco">Số lượng LAPTOP hiện tại (máy)</label>  
  <div class="col-sm-4">
  <input id="slhienco" name="slhienco" placeholder="vd: 50" class="form-control input-md" type="text">
    
  </div>
</div>

</fieldset>

<!-- Form Name -->
<legend><h2>Hình LAPTOP</h2></legend>

<!-- File Button --> 
<div class="form-group">
  <label class="col-sm-4 control-label" for="file0">Ảnh đại diện</label>
  <div class="col-sm-4">
    <input id="file0" name="file0" class="input-file" type="file" onchange="testFile0();" >
    <p><div id="tbfile0" style="color: red;font-size: 12px;"></div></p>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-sm-4 control-label" for="file1">Ảnh lớn</label>
  <div class="col-sm-4">
    <input id="file1" name="file1" class="input-file" type="file" onchange="testFile1();" >
    <p><div id="tbfile1" style="color: red;font-size: 12px;"></div></p>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-sm-4 control-label" for="file2">Ảnh chi tiết 1</label>
  <div class="col-sm-4">
    <input id="file2" name="file2" class="input-file" type="file" onchange="testFile2();" >
    <p><div id="tbfile2" style="color: red;font-size: 12px;"></div></p>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-sm-4 control-label" for="file3">Ảnh chi tiết 2</label>
  <div class="col-sm-4">
    <input id="file3" name="file3" class="input-file" type="file" onchange="testFile3();" >
    <p><div id="tbfile3" style="color: red;font-size: 12px;"></div></p>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-sm-4 control-label" for="file4">Ảnh chi tiết 3</label>
  <div class="col-sm-4">
    <input id="file4" name="file4" class="input-file" type="file" onchange="testFile4();" >
    <p><div id="tbfile4" style="color: red;font-size: 12px;"></div></p>
  </div>
</div>
<p id="demo"></p>
</fieldset>
<div style="text-align: center;" id="btnSubmit" >
	<input type="submit" name="guiSP" class="btn btn-success" value="Đăng sản phẩm">
</div>
</form>
<script language="javascript" type="text/javascript">

function testFile0(){
  document.getElementById("tbfile0").innerHTML = "";
  var x = document.getElementById("file0");
  var dayDinhDangAnh=["image/jpeg","image/jpg","image/png","image/gif","image/tiff","image/bmp"];
  if (x.files.length == 0) {
    document.getElementById("tbfile0").innerHTML = "hãy chọn tập tin";
    document.forms['themSanPham'].file0.focus();    
    return false;
  } 
  else {
    for (var i = 0; i < x.files.length; i++) {

      if(dayDinhDangAnh.indexOf(x.files[i].type) === -1) {     
        document.getElementById("tbfile0").innerHTML = " không phải tập tin hình ảnh ";
        document.forms['themSanPham'].file0.focus();
        return false;
      }
    }
  }
  return true;
}
function testFile1(){
  document.getElementById("tbfile1").innerHTML = "";
  var x = document.getElementById("file1");
  var dayDinhDangAnh=["image/jpeg","image/jpg","image/png","image/gif","image/tiff","image/bmp"];
  if (x.files.length == 0) {
    document.getElementById("tbfile1").innerHTML = "hãy chọn tập tin";
    document.forms['themSanPham'].file1.focus();    
    return false;
  } 
  else {
    for (var i = 0; i < x.files.length; i++) {
      if(dayDinhDangAnh.indexOf(x.files[i].type) == -1){        
        document.getElementById("tbfile1").innerHTML = " không phải tập tin hình ảnh ";
        document.forms['themSanPham'].file1.focus();
        return false;
      }
    }
  }
  return true;
}
function testFile2(){

  document.getElementById("tbfile2").innerHTML = "";
  var x = document.getElementById("file2");
  var dayDinhDangAnh=["image/jpeg","image/jpg","image/png","image/gif","image/tiff","image/bmp"];
  if (x.files.length == 0) {
    document.getElementById("tbfile2").innerHTML = "hãy chọn tập tin";
    document.forms['themSanPham'].file2.focus();    
    return false;
  } 
  else {
    for (var i = 0; i < x.files.length; i++) {
      if(dayDinhDangAnh.indexOf(x.files[i].type) == -1){        
        document.getElementById("tbfile2").innerHTML = " không phải tập tin hình ảnh ";
        document.forms['themSanPham'].file2.focus();
        return false;
      }
    }
  }
  return true;
}
function testFile3(){
  document.getElementById("tbfile2").innerHTML = "";
  var x = document.getElementById("file3");
  var dayDinhDangAnh=["image/jpeg","image/jpg","image/png","image/gif","image/tiff","image/bmp"];
  if (x.files.length == 0) {
    document.getElementById("tbfile3").innerHTML = "hãy chọn tập tin";
    document.forms['themSanPham'].file3.focus();    
    return false;
  } 
  else {
    for (var i = 0; i < x.files.length; i++) {
      if(dayDinhDangAnh.indexOf(x.files[i].type) == -1){        
        document.getElementById("tbfile3").innerHTML = " không phải tập tin hình ảnh ";
        document.forms['themSanPham'].file3.focus();
        return false;
      }
    }
  }
  return true;
}
function testFile4(){
  document.getElementById("tbfile4").innerHTML = "";
  var x = document.getElementById("file4");
  var dayDinhDangAnh=["image/jpeg","image/jpg","image/png","image/gif","image/tiff","image/bmp"];
  if (x.files.length == 0) {
    document.getElementById("tbfile4").innerHTML = "hãy chọn tập tin";
    document.forms['themSanPham'].file4.focus();    
    return false;
  } 
  else {
    for (var i = 0; i < x.files.length; i++) {
      if(dayDinhDangAnh.indexOf(x.files[i].type) === -1){        
        document.getElementById("tbfile4").innerHTML = " không phải tập tin hình ảnh ";
        document.forms['themSanPham'].file4.focus();
        return false;
      }
    }
  }
  return true;
}
function ktradieukien(){
  var frm = window.document.themSanPham;
  var tam="0";

  var thongbao=document.getElementById('thongbaoloi');
  thongbao.innerHTML="LỖI: ";
  if (frm.ten.value==='') {
    thongbao.innerHTML+="Hãy nhập tên LAPTOP.";
    document.forms['themSanPham'].ten.focus();
    return false;
  }
  else if (frm.hangsx.value==="0")   {
    thongbao.innerHTML+='hãy chọn Hãng Sản xuất của máy.';
    document.forms['themSanPham'].hangsx.focus();
    return false; 
  }
  else if ((frm.gia.value.length===0) || (isNaN(frm.gia.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại Giá của LAPTOP.';
    document.forms['themSanPham'].gia.focus();
    return false;  
  }
  else if ((frm.mausac.value==='')||(isNaN(frm.mausac.value)===false)) {
    thongbao.innerHTML+='hãy nhập lại Màu sắc của LAPTOP.';
    document.forms['themSanPham'].mausac.focus();
    return false;   
  } 
  else if (frm.cpu.value===0) {
    thongbao.innerHTML+='hãy chọn mã CPU của LAPTOP.';
    document.forms['themSanPham'].cpu.focus();
    return false;  
  } 
  else if ((frm.ramloai.value==="")||(isNaN(frm.ramloai.value)===false)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại Loại RAM hỗ trợ của LAPTOP.';
    document.forms['themSanPham'].ramloai.focus();
    return false;  
  } 
  else if ((frm.rambus.value==="")||(isNaN(frm.rambus.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại tốc độ bus trong ram của LAPTOP.';
    document.forms['themSanPham'].rambus.focus();
    return false;
  }
  else if ((frm.congngheat.value==="")||(isNaN(frm.congngheat.value)===false)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại công nghệ âm thanh của LAPTOP.';
    document.forms['themSanPham'].congngheat.focus();
    return false;  
  }
  else if ((frm.odia1.value==="")||(isNaN(frm.odia1.value)===false)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại Loại ổ đĩa hỗ trợ của LAPTOP.';
    document.forms['themSanPham'].odia1.focus();
    return false;  
  }
  else if ((frm.odia1dl.value==="")||(isNaN(frm.odia1dl.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại Dung lượng của ổ đĩa hổ trợ thứ 1 của LAPTOP.';
    document.forms['themSanPham'].odia1dl.focus();
    return false;  
  }
  else if (frm.odia2.value.length>0) {
    if (isNaN(frm.odia2.value)===false){
      thongbao.innerHTML+='hãy nhập lại Ổ đĩa hổ trợ thứ 2 của LAPTOP.';
      document.forms['themSanPham'].odia2.focus();
      return false;  
    }
    else if ((frm.odia2dl.value==="")||(isNaN(frm.odia2dl.value)===true)) {
      thongbao.innerHTML+='hãy nhập hoặc nhập lại Dung lượng của ổ đĩa hổ trợ thứ 2 của LAPTOP.';
      document.forms['themSanPham'].odia2dl.focus();
      return false;  
    } 
    else {}
  }
  else if ((frm.kichthuoc.value==="")||(isNaN(frm.kichthuoc.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại Kích thước màn hình của LAPTOP.';
    document.forms['themSanPham'].kichthuoc.focus();
    return false;  
  }
  else if ((frm.pgngang.value==="")||(isNaN(frm.pgngang.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại chiều ngang của độ phân giải của LAPTOP.';
    document.forms['themSanPham'].pgngang.focus();
    return false;  
  }
  else if ((frm.pgdoc.value==="")||(isNaN(frm.pgdoc.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại chiều dọc của độ phân giải của LAPTOP.';
    document.forms['themSanPham'].pgdoc.focus();
    return false;  
  }
  else if ((frm.oquang.value==="")||(isNaN(frm.oquang.value)===false)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại loại Ổ CD/DVD của LAPTOP (không - không có ổ CD/DVD).';
    document.forms['themSanPham'].oquang.focus();
    return false;  
  }
  else if ((frm.usb.value==="")||(isNaN(frm.usb.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại số cổng USB của LAPTOP.';
    document.forms['themSanPham'].usb.focus();
    return false;  
  }
  else if ((frm.cother.value==="")||(isNaN(frm.cother.value)===false)) {
    thongbao.innerHTML+='hãy nhập lại các cổng kết nối có hổ trợ khác của LAPTOP.';
    document.forms['themSanPham'].cother.focus();
    return false;  
  }
  else if ((frm.wifi.value==="")||(isNaN(frm.wifi.value)===false)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại Chuẩn wifi (mạng không dây) của LAPTOP.';
    document.forms['themSanPham'].wifi.focus();
    return false;  
  }
  else if ((frm.lan.value==="")||(isNaN(frm.lan.value)===false)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại Chuẩn LAN (mạng cáp) của LAPTOP.';
    document.forms['themSanPham'].lan.focus();
    return false;  
  }
  else if ((frm.bluetooth.value==="")||(isNaN(frm.bluetooth.value)===false)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại phiên bản BLUETOOTH hỗ trợ của LAPTOP.';
    document.forms['themSanPham'].bluetooth.focus();
    return false;  
  }
  else if ((frm.camera.value==="")||(isNaN(frm.camera.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại Độ phân giải Webcam camera của LAPTOP.';
    document.forms['themSanPham'].camera.focus();
    return false;  
  }
  else if ((frm.hdh.value==="")||(isNaN(frm.hdh.value)===false)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại Hệ điều hành có sẵn của LAPTOP.';
    document.forms['themSanPham'].hdh.focus();
    return false;  
  }
  else if ((frm.pin.value==="")||(isNaN(frm.pin.value)===false)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại Thông tin PIN của LAPTOP.';
    document.forms['themSanPham'].pin.focus();
    return false;  
  }
  else if ((frm.nang.value==="")||(isNaN(frm.nang.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại Cân nặng của LAPTOP.';
    document.forms['themSanPham'].nang.focus();
    return false;  
  }
  else if ((frm.dai.value==="")||(isNaN(frm.dai.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại CHIỀU DÀI của LAPTOP.';
    document.forms['themSanPham'].dai.focus();
    return false;  
  }
  else if ((frm.rong.value==="")||(isNaN(frm.rong.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại CHIỀU RỘNG của LAPTOP.';
    document.forms['themSanPham'].rong.focus();
    return false;  
  }
  else if ((frm.day.value==="")||(isNaN(frm.day.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại ĐỘ DÀY của LAPTOP.';
    document.forms['themSanPham'].day.focus();
    return false;  
  }
  else if ((frm.chlieu.value==="")||(isNaN(frm.chlieu.value)===false)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại chất liệu của LAPTOP.';
    document.forms['themSanPham'].chlieu.focus();
    return false;  
  }
  else if ((frm.slhienco.value==="")||(isNaN(frm.slhienco.value)===true)) {
    thongbao.innerHTML+='hãy nhập hoặc nhập lại SỐ LƯỢNG LAPTOP HIỆN TẠI.';
    document.forms['themSanPham'].slhienco.focus();
    return false;  
  }
  else {
    }
    if(document.getElementById("file0").value.length==0){
      thongbao.innerHTML+='chưa chọn file ảnh đại diện cho LAPTOP.';
      document.forms['themSanPham'].file0.focus();
      return false;
    }
    if(document.getElementById("file1").files.length==0){
      thongbao.innerHTML+='chưa chọn file ảnh lớn cho LAPTOP.';
      document.forms['themSanPham'].file1.focus();
      return false;
    }
    if(document.getElementById("file2").files.length==0){
      thongbao.innerHTML+='chưa chọn file ảnh thêm 1 cho LAPTOP.';
      document.forms['themSanPham'].file2.focus();
      return false;
    }
    if(document.getElementById("file3").files.length==0){
      thongbao.innerHTML+='chưa chọn file ảnh thêm 2 cho LAPTOP.';
      document.forms['themSanPham'].file3.focus();
      return false;
    }
    if(document.getElementById("file4").files.length==0){
      thongbao.innerHTML+='chưa chọn file ảnh thêm 3 cho LAPTOP.';
      document.forms['themSanPham'].file4.focus();
      return false;
    }
    thongbao.innerHTML+='lalala true1';
    return true;
  }
  thongbao.innerHTML+='lala true2';
  return true;
}
</script>