<?php 
require_once ('hamKetNoiCSDL.php'); 
if (!isset($role)) {
  echo "<script type=\"text/javascript\" charset=\"utf-8\" async defer>window.history.back(); </script>";
}
?>
<form  class="form-horizontal" action="" name="themNgDung" method="post" enctype="multipart/form-data" onsubmit="return check_submit_nguoi_dung()">
  <fieldset>
  <div class="panel panel-default" style="opacity: 0.9;border-radius: 10px;">
    <legend class="panel-heading" style="color:blue; border-radius: 10px;text-align: center;">THÔNG TIN NGƯỜI DÙNG</legend>
    <div style="text-align: center;">
      <?php
        require_once("hamKetNoiCSDL.php");
        if (isset($_POST["btn_submit"])) {
          echo "<div class=\"alert alert-warning\" role=\"alert\">";
          //lấy thông tin từ các form bằng phương thức POST
          $tendn = $_POST["tendn"];
          $hoten = $_POST["hoten"];
          $ngsinh = $_POST["ngsinh"];
          $sdt = $_POST["sdt"];
          $email = $_POST["email"];
          $gioitinh = $_POST['gioitinh'];
          //echo "<p>".$_POST['gioitinh']."</p>";
          //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
          
          //thực hiện việc lưu trữ dữ liệu vào db
          //$sql = "insert INTO nguoi_dung(tendn,mk,hoten,ngsinh,sdt,email,quyen,gioitinh) VALUES ('".$tendn."','".md5($mk)."','".$hoten."','".$ngsinh."','".$sdt."','".$email."','0','".$_POST['gioitinh']."')";
          $sql="update nguoi_dung set hoten='".$hoten."', ngsinh='".$ngsinh."', sdt='".$sdt."', email='".$email."', gioitinh='".$_POST['gioitinh']."' where tendn like '".$_SESSION['name']."'";
          echo "<p>$sql</p>";
          // thực thi câu $sql với biến conn lấy từ file hamKetNoiCSDL.php
          ConnectQuery($sql);
          echo $hoten." đã cập nhật thông tin thành công";
          if((isset($_POST['filebutton']))&&(getimagesize($_FILES["fileToUpload"]["tmp_name"])!==false)){
            $thumuc="image/user/";
            $duongdanfile = $thumuc."/".$tendn.".png";
            if (move_uploaded_file($_FILES['filebutton']['tmp_name'], $duongdanfile)) {
            } else {
              echo "<p>up ảnh đại diện thất bại </p>";
            }
          }
          echo "</div>";
        }
      ?></div>
    <?php 
        $rs=ConnectQuery("select hoten,ngsinh,sdt,email,gioitinh from nguoi_dung where tendn like '".$_SESSION['name']."'");
        while($row=$rs->fetch_assoc()){
    ?>
    <div class="form-group">
      <label class="col-md-5 control-label" for="textinput">Tên Đăng Nhập: </label>  
      <div class="col-md-4">
      <input id="tendn" readonly name="tendn" type="text" class="form-control input-md" value="<?php echo $_SESSION['name']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-5 control-label" for="textinput">Ảnh đại diện hiện tại: </label>  
      <div class="col-md-4">
      <img src="./image/user/<?php echo $_SESSION['name']; ?>.png" height="200px;" alt=""/>
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-5 control-label" for="textinput">Họ Tên: </label>  
      <div class="col-md-4">
        <input id="hoten" name="hoten" type="text" class="form-control input-md" value="<?php echo $row['hoten']; ?>">
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-5 control-label" for="textinput">Ngày Sinh: </label>  
      <div class="col-md-4">
        <input id="ngsinh" name="ngsinh" type="date" class="form-control input-md" value="<?php echo $row['ngsinh']; ?>">
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-5 control-label" for="textinput">Số Điện Thoại: </label>  
      <div class="col-md-4">
        <input id="sdt" name="sdt" type="number" maxlength="11" minlength="9" min="900000000" max="1990000000" class="form-control input-md" value="<?php echo $row['sdt']; ?>">
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-5 control-label" for="textinput">Email: </label>  
      <div class="col-md-4">
        <input id="email" name="email" type="email"  class="form-control input-md" value="<?php echo $row['email']; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-5 control-label" for="gioitinh">Giới tính</label>
      <div class="col-md-4"> 
        <label class="radio-inline" for="gt-2">
          <input type="radio" name="gioitinh" id="gt-2" value="Khác" checked="checked">
          khác
        </label>
        <label class="radio-inline" for="gt-0">
          <input type="radio" name="gioitinh" id="gt-0" value="Nam" <?php if($row['gioitinh']=="Nam") echo "checked=\"checked\""; ?>/>
          nam
        </label> 
        <label class="radio-inline" for="gt-1">
          <input type="radio" name="gioitinh" id="gt-1" value="Nữ" <?php if(($row['gioitinh']=="Nữ")) echo "checked=\"checked\""; ?>/>
          nữ
        </label> 
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-5 control-label" style="margin-top: -5px;" for="filebutton">Ảnh đại diện</label>
      <div class="col-md-4">
        <input id="filebutton" name="filebutton" class="input-file" accept="image/*" type="file">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-5 control-label" style="margin-top: -7px;" for="filebutton">Đổi mặt khẩu: </label>
      <div class="col-md-4">
        <a href="index.php?act=doimk">ĐỔI MẬT KHẨU TẠI ĐÂY</a>
      </div>
    </div>
    <div class="form-group">
      <div style="text-align: center;"> 
      <div id="doi" style="color: red;font-weight: bold;">nhấp vào để cập nhật lại thông tin (nếu muốn)<div style="margin-left: 300px;" id="example3">
      </div></div>
      </div>
    </div>
    <?php } ?>
  </div>
  </fieldset>
</form>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>
<script language="javascript" type="text/javascript">
var verifyCallback = function(response) {
  var Ydoi=document.getElementById('doi');
  Ydoi.innerHTML='<button id="dangki" name="btn_submit" class="btn btn-success">Cập nhật</button>';
};
var onloadCallback = function() {
  grecaptcha.render('example3', {
    'sitekey' : '6LebdA8UAAAAALG_LswuFDQ7gwtpYBP6Ldqx5pyM',
    'callback' : verifyCallback,
    'theme' : 'dark'
  });
};
//document.forms['nguoi_dung'].name.focus();
function check_submit_nguoi_dung(){
  var frm = window.document.themNgDung;     
  if(frm.tendn.value=='') {
    alert('Xin vui lòng nhập Username !');      
    document.forms['themNgDung'].tendn.focus();
    return false;
  }
  
  else if(frm.email.value=='') {
    alert('Xin vui lòng nhập email !');
    document.forms['themNgDung'].email.focus();     
    return false;
  }
  else if(frm.gioitinh.value=='') {
    alert('Xin vui lòng nhập Giới tính !');
    document.forms['themNgDung'].gioitinh.focus();      
    return false;
  }
  else  
    //alert(frm.gioitinh.value);
  return true;  
}
</script>