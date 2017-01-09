
<form  class="form-horizontal" action="" name="themNgDung" method="post" enctype="multipart/form-data" onsubmit="return check_submit_nguoi_dung()">
  <fieldset>
  <div class="panel panel-default" style="opacity: 0.9;border-radius: 10px">
      
    <legend style="background-color: #339999;color:yellow; border-radius: 10px;text-align: center;"><div class="panel-heading">ĐĂNG KÍ NGƯỜI DÙNG</div></legend>
    <div style="text-align: center;">
      <?php
        require_once("hamKetNoiCSDL.php");
        if (isset($_POST["btn_submit"])) {
          echo "<div class=\"alert alert-warning\" role=\"alert\">";
          //lấy thông tin từ các form bằng phương thức POST
          $tendn = $_POST["tendn"];
          $mk = $_POST["mk"];
          $hoten = $_POST["hoten"];
          $ngsinh = $_POST["ngsinh"];
          $sdt = $_POST["sdt"];
          $email = $_POST["email"];
          $gioitinh = $_POST["gioitinh"];
          //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
          if ($tendn == "" || $mk == "" || $hoten == "" || $ngsinh == ""|| $sdt == "" || $email == "" || $gioitinh ="") {
            echo "Vui lòng nhập đầy đủ thông tin";
          }else{
            $ktratrung=ConnectQuery("select * from nguoi_dung where tendn like '".$tendn."'");
            if($ktratrung->num_rows>0){
              echo "TRÙNG TÊN ĐĂNG NHẬP HÃY NHẬP LẠI TÊN ĐĂNG NHẬP";  
            }
            else{
              //thực hiện việc lưu trữ dữ liệu vào db
              $sql = "insert INTO nguoi_dung(tendn,mk,hoten,ngsinh,sdt,email,quyen,gioitinh) VALUES ('".$tendn."','".md5($mk)."','".$hoten."','".$ngsinh."','".$sdt."','".$email."','0','".$gioitinh."','";
              //echo "<p>$sql</p>";
              // thực thi câu $sql với biến conn lấy từ file hamKetNoiCSDL.php
              $rs=ConnectQuery($sql);
              echo "chúc mừng ".$hoten." đã đăng ký thành công";
              $thumuc="image/user/";
              $duongdanfile = $thumuc."/".$tendn.".png";
              if (move_uploaded_file($_FILES['filebutton']['tmp_name'], $duongdanfile)) {
              } else {
                  echo "<p>up ảnh đại diện thất bại </p>";
              }
            }
          }
          echo "</div>";
        }
      ?></div>
    <div class="form-group">
      <label class="col-md-5 control-label" for="textinput">Tên Đăng Nhập: </label>  
      <div class="col-md-4">
      <input id="tendn" name="tendn" type="text" class="form-control input-md" value="<?php if(isset($_POST['tendn'])) echo $_POST['tendn']; ?>">
      </div>
    </div>
    <!-- Password input-->
    <div class="form-group">
      <label class="col-md-5 control-label" for="passwordinput">Mật Khẩu: </label>
      <div class="col-md-4">
        <input id="mk" name="mk" type="password" class="form-control input-md" value="<?php if(isset($_POST['mk'])) echo $_POST['mk']; ?>">
      </div>
    </div>
    <!-- Password input-->
    <div class="form-group">
      <label class="col-md-5 control-label" for="passwordinput">Nhập Lại Mật Khẩu: </label>
      <div class="col-md-4">
        <input id="mk2" name="mk2" type="password" class="form-control input-md" value="<?php if(isset($_POST['mk'])) echo $_POST['mk']; ?>">
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-5 control-label" for="textinput">Họ Tên: </label>  
      <div class="col-md-4">
        <input id="hoten" name="hoten" type="text" class="form-control input-md" value="<?php if(isset($_POST['hoten'])) echo $_POST['hoten']; ?>">
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-5 control-label" for="textinput">Ngày Sinh: </label>  
      <div class="col-md-4">
        <input id="ngsinh" name="ngsinh" type="date" class="form-control input-md" value="<?php if(isset($_POST['ngsinh'])) echo $_POST['ngsinh']; ?>">
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-5 control-label" for="textinput">Số Điện Thoại: </label>  
      <div class="col-md-4">
        <input id="sdt" name="sdt" type="number" maxlength="11" minlength="9" min="900000000" max="1290000000" class="form-control input-md" value="<?php if(isset($_POST['sdt'])) echo $_POST['sdt']; ?>">
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-5 control-label" for="textinput">Email: </label>  
      <div class="col-md-4">
        <input id="email" name="email" type="email"  class="form-control input-md" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
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
          <input type="radio" name="gioitinh" id="gt-0" value="Nam" value="<?php if(isset($_POST['gioitinh']) && ($_POST['gioitinh']=="Nam")) echo "checked=\"checked\""; ?>">
          nam
        </label> 
        <label class="radio-inline" for="gt-1">
          <input type="radio" name="gioitinh" id="gt-1" value="Nữ" value="<?php if(isset($_POST['gioitinh']) && ($_POST['gioitinh']=="Nữ")) echo "checked=\"checked\""; ?>">
          nữ
        </label> 
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-5 control-label" for="filebutton">Ảnh đại diện</label>
      <div class="col-md-4">
        <input id="filebutton" name="filebutton" class="input-file" accept="image/*" type="file">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="button1id"></label>
      <div class="col-md-8">
        <button id="" name="reset" class="col-md-2 btn btn-danger">Reset</button>
      <div class="col-md-2" id="doi"><div id="example3">
      </div></div>
      </div>
    </div>
  </fieldset>
</form>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>
<script language="javascript" type="text/javascript">
var verifyCallback = function(response) {
  var Ydoi=document.getElementById('doi');
  Ydoi.innerHTML='<button id="dangki" name="btn_submit" class="btn btn-success">Đăng Kí</button>';
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
  else if(frm.mk.value=='') {
    alert('Xin vui lòng nhập mật khẩu !');
    document.forms['themNgDung'].mk.focus();      
    return false;
  }
  else if(frm.mk2.value=='') {
    alert('Xin vui lòng nhập vào o nhập lại mật khẩu !');
    document.forms['themNgDung'].mk2.focus();      
    return false;
  }
  else if(frm.mk2.value!=frm.mk2.value) {
    alert(' Hai mật khẩu không khớp nhau\nVui lòng kiểm tra lại !');
    document.forms['themNgDung'].mk.focus();      
    return false;
  }
  else if(frm.hoten.value=='') {
    alert('Xin vui lòng nhập Họ tên !');
    document.forms['themNgDung'].hoten.focus();			
    return false;
  }
  else if(frm.ngsinh.value=='') {
    alert('Xin vui lòng nhập Ngày Sinh !');
    document.forms['themNgDung'].ngsinh.focus();			
    return false;
  }
  else if(frm.sdt.value=='') {
    alert('Xin vui lòng nhập Số điện thoại !');
    document.forms['themNgDung'].sdt.focus();			
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
  else if(frm.filebutton.value=='') {
    alert('Xin vui lòng chọn file ảnh đại diện !');
    document.forms['themNgDung'].filebutton.focus();      
    return false;
  }
  else	
    alert(frm.gioitinh.value);
    return true;	
}
</script>