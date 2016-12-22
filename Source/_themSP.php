<?php 
require_once ('hamKetNoiCSDL.php'); 
?>
<div>
  <h1 style="color: blue; text-align: center;">THÊM SẢN PHẨM</h1>
</div>
<br/>
<div style="color: red;"><i>
<?php 
  if(isset($_POST["guiSP"])) {
    $a = $_POST["ten"];
    if (strlen($a) != 0) {
      $rs = ConnectQuery("select * from san_pham where tensp like $a");
      if($rs -> num_rows == "0"){
        $b = $_POST["hangsx"];
        if($b == "0"){

        }
        else{
          echo "chưa chọn hãng sản xuất";
        }
      }
      else{
        echo "đã có dữ liệu của laptop $a";
      }
    }
    else{
      echo "chưa nhập tên LAPTOP";
    }
  }
  /*$dinhdangimage=array("jpeg","jpg","png","gif","tiff","bmp");
  $uploaddir = '/var/www/uploads/';
  $uploadfile = $uploaddir . $_FILES['file1']['name'];
  
  print "<pre>";
  if (move_uploaded_file($_FILES['file1']['tmp_name'], $uploadfile)) {
      print "File is valid, and was successfully uploaded. ";
      print "Here's some more debugging info:\n";
      //print_r($_FILES);
  } else {
      print "Possible file upload attack!  Here's some debugging info:\n";
      print_r($_FILES);
  }
  print "</pre>";  */
?>
</i></div>
<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" id="themSanPham">
<fieldset>

<!-- Form Name -->
<legend><h2>Thông tin cơ bản</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ten">Nhập tên máy</label>  
  <div class="col-md-4">
  <input id="ten" name="ten" type="text" placeholder="Inpiron 15" class="form-control input-md">
  <span class="help-block" style="color: red; font-size: 12px;">ví dụ: Inspiron 3542 74514G50G</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="hangsx">Hãng Sản xuất</label>
  <div class="col-md-4">
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
  <span class="help-block" style="color: red; font-size: 12px;">nếu không có trong sự lựa chọn này thì hãy thêm hãng sản xuất <a href="themHangSanXuat.php" target="_blank">tại đây</a></span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="gia">Giá tiền (VNĐ)</label>  
  <div class="col-md-4">
  <input id="gia" name="gia" type="text" placeholder="18590000" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mausac">Màu</label>  
  <div class="col-md-4">
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
  <label class="col-md-4 control-label" for="cpu">Mã CPU</label>
  <div class="col-md-4">
    <select id="cpu" name="cpu" class="form-control">
      <option value=""></option>
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
    <span class="help-block" style="color: red; font-size: 12px;" >nếu không có thì hãy thêm cpu <a href="themCPU.php" target="_blank">tại đây</a></span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ramdungluong">Dung lượng RAM (GB)</label>
  <div class="col-md-2">
    <select id="ramdungluong" name="ramdungluong" class="form-control">
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
  <label class="col-md-4 control-label" for="ramloai">Loại RAM</label>  
  <div class="col-md-4">
  <input id="ramloai" name="ramloai" type="text" placeholder="vd: DDR3L" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="rambus">Tốc độ bus (MHz)</label>  
  <div class="col-md-2">
  <input id="rambus" name="rambus" type="text" placeholder="vd: 1600" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="carddh">Card đồ họa</label>
  <div class="col-md-5">
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
     <span class="help-block" style="color: red; font-size: 12px;">nếu không có trong sự lựa chọn trong này thì hãy thêm card Màn hình <a href="themCardManHinh.php" target="_blank">tại đây</a></span>  
  </div>
</div>
</fieldset>
<legend><h2>Bộ nhớ máy (RAM)</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="odialoai" style="text-align: right;">Loại  ổ cứng</label>
  <label class="col-md-4 control-label" for="dungluong" style="text-align: left;">Dung lượng tương ứng (GB)</label>  
</div>
<div class="form-group">
  <div class="col-md-4" style="text-align: right;">
    <input id="hdh" name="hdh" type="text" placeholder="vd: Windows 10" class="form-control input-md">
  </div>
  <div class="col-md-4" style="text-align: left;">
    <input id="hdh" name="hdh" type="text" placeholder="vd: Windows 10" class="form-control input-md">
  </div>
</div>

</fieldset>
<fieldset>

<!-- Form Name -->
<legend><h2>Màn hình Desktop</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="kichthuoc">Kích thước màn hình (inch)</label>  
  <div class="col-md-2">
  <input id="kichthuoc" name="kichthuoc" type="text" placeholder="vd: 15.6" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pgngang">Độ phân giải (pixels)</label>  
  <div class="col-md-2">
  <input id="pgngang" name="pgngang" type="text" placeholder="vd: 1366" class="form-control input-md">
    </div>

   <div class="col-md-2">
  <input id="pgdoc" name="pgdoc" type="text" placeholder="vd: 768" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="congnghemh">Công nghệ màn hình</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="congnghemh" name="congnghemh">HD</textarea>
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="camung">Màn hình cảm ứng</label>
  <div class="col-md-4"> 
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
  <label class="col-md-4 control-label" for="oquang">Ổ đĩa quang</label>  
  <div class="col-md-4">
  <input id="oquang" name="oquang" type="text" placeholder="vd: đọc/ghi DVD" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="usb">Số lượng cổng USB (cổng)</label>  
  <div class="col-md-2">
  <input id="usb" name="usb" type="text" placeholder="vd: 3" class="form-control input-md">
  <span class="help-block">USB 3.0 + USB 2.0</span>  
  </div>
</div>

<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="congother">Có cổng hổ trợ</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="congother-0">
      <input type="checkbox" name="congother" id="congother-0" value="1">
      HDMI
    </label>
    <label class="checkbox-inline" for="congother-1">
      <input type="checkbox" name="congother" id="congother-1" value="2">
      Đọc thẻ nhớ (SD)
    </label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cother">Cổng khác hỗ trợ</label>  
  <div class="col-md-4">
  <input id="cother" name="cother" type="text" placeholder="vd: LAN (RJ45)" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="wifi">Chuẩn WiFi</label>  
  <div class="col-md-4">
  <input id="wifi" name="wifi" type="text" placeholder="vd: 802.11b/g/n" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lan">Chuẩn LAN (Mbps Ethernet)</label>  
  <div class="col-md-4">
  <input id="lan" name="lan" type="text" placeholder="vd: 10/100 Mbps" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="bluetooth">Phiên bản bluetooth</label>  
  <div class="col-md-2">
  <input id="bluetooth" name="bluetooth" type="text" placeholder="vd: v4.0" class="form-control input-md">
    
  </div>
</div>

</fieldset>
<fieldset>

<!-- Form Name -->
<legend><h2>Thông tin thêm</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="camera">Độ phân giải Webcam (MP)</label>  
  <div class="col-md-2">
  <input id="camera" name="camera" type="text" placeholder="vd: 1.3" class="form-control input-md">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="hdh">Hệ điều hành</label>  
  <div class="col-md-4">
  <input id="hdh" name="hdh" type="text" placeholder="vd: Windows 10" class="form-control input-md">
    
  </div>
</div>

</fieldset>
<legend><h2>Thông tin vật lý</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pin">Thông tin pin</label>  
  <div class="col-md-4">
  <input id="pin" name="pin" placeholder="vd: 2 cell 8.400 mAh" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nang">Khối lượng (kg)</label>  
  <div class="col-md-2">
  <input id="nang" name="nang" placeholder="vd: 1.92" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dai">Chiều dài (mm)</label>  
  <div class="col-md-2">
  <input id="dai" name="dai" placeholder="vd: 292" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="rong">Chiều rộng (mm)</label>  
  <div class="col-md-2">
  <input id="rong" name="rong" placeholder="vd: 202" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="day">Độ dày (mm)</label>  
  <div class="col-md-2">
  <input id="day" name="day" placeholder="vd: 17" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="chlieu">Chất liệu</label>  
  <div class="col-md-4">
  <input id="chlieu" name="chlieu" placeholder="vd: nhôm nguyên khối" class="form-control input-md" type="text">
    
  </div>
</div>

</fieldset>

<!-- Form Name -->
<legend><h2>Hình LAPTOP</h2></legend>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file0">Ảnh đại diện</label>
  <div class="col-md-4">
    <input id="file0" name="file0" class="input-file" type="file">
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file1">Ảnh lớn</label>
  <div class="col-md-4">
    <input id="file1" name="file1" class="input-file" type="file">
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file2">Ảnh chi tiết 1</label>
  <div class="col-md-4">
    <input id="file2" name="file2" class="input-file" type="file">
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file3">Ảnh chi tiết 2</label>
  <div class="col-md-4">
    <input id="file3" name="file3" class="input-file" type="file">
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file4">Ảnh chi tiết 3</label>
  <div class="col-md-4">
    <input id="file4" name="file4" class="input-file" type="file">
  </div>
</div>

</fieldset>
<div style="text-align: center;" id="btnSubmit" >
	<input type="submit" name="guiSP" class="btn btn-success" value="Đăng sản phẩm">
</div>
</form>
<script type="text/javascript">
</script>