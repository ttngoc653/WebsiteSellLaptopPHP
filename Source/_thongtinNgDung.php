<?php
		require_once("hamKetNoiCSDL.php");
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$tendn = $_POST["tendn"];
  			$mk = $_POST["mk"];
 			$hoten = $_POST["hoten"];
  			$ngsinh = $_POST["ngsinh"];
            $sdt = $_POST["sdt"];
            $email = $_POST["email"];
            $quyen = $_POST["quyen"];
            $gioitinh = $_POST["gioitinh"];
                       
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($tendn == "" || $mk == "" || $hoten == "" || $ngsinh == ""|| $sdt == "" || $email == "" || $quyen == "" || $gioitinh ="") {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			}else{
				    //thực hiện việc lưu trữ dữ liệu vào db
    				$sql = "INSERT INTO nguoi_dung(tendn,mk,hoten,ngsinh,sdt,email,quyen,gioitinh) VALUES ('$tendn','$mk','$hoten','$ngsinh','$email','$quyen','$gioitinh')";
				    // thực thi câu $sql với biến conn lấy từ file connection.php
   				$rs=ConnectQuery($sql);
				   echo "chúc mừng bạn đã đăng ký thành công";
			}
		}
?>
	<form action="" method="post" onsubmit="return check_submit_nguoi_dung()">
		<div class="form-group">
         
			 
            <form class="form-horizontal">
                  <fieldset>

                  <legend>Thông tin người dùng</legend>

                  <div class="form-group">
                    <label class="col-md-5 control-label" for="textinput">Tên Đăng Nhập: </label>  
                    <div class="col-md-4">
                    <input id="tendn" name="tendn" type="text" class="form-control input-md">
                    </div>
                  </div>

                  <!-- Password input-->
                  <div class="form-group">
                    <label class="col-md-5 control-label" for="passwordinput">Mật Khẩu: </label>
                    <div class="col-md-4">
                      <input id="mk" name="mk" type="password" class="form-control input-md">
                  
                    </div>
                  </div>

                  <!-- Password input-->
                  <div class="form-group">
                    <label class="col-md-5 control-label" for="passwordinput">Nhập Lại Mật Khẩu: </label>
                    <div class="col-md-4">
                      <input id="mk" name="mk" type="password" class="form-control input-md">
                  
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-5 control-label" for="textinput">Họ Tên: </label>  
                    <div class="col-md-4">
                    <input id="hoten" name="hoten" type="text" class="form-control input-md">
                    
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-5 control-label" for="textinput">Ngày Sinh: </label>  
                    <div class="col-md-4">
                    <input id="ngsinh" name="ngsinh" type="text" class="form-control input-md">
                     
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-5 control-label" for="textinput">Số Điện Thoại: </label>  
                    <div class="col-md-4">
                    <input id="sdt" name="sdt" type="text" class="form-control input-md">
                     
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-5 control-label" for="textinput">Email: </label>  
                    <div class="col-md-4">
                    <input id="email" name="email" type="text"  class="form-control input-md">
                    
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-5 control-label" for="textinput">Quyền: </label>  
                    <div class="col-md-4">
                    <input id="quyen" name="quyen" type="text"  class="form-control input-md">
                  
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-5 control-label" for="textinput">Giới Tính: </label>  
                    <div class="col-md-4">
                    <input id="gioitinh" name="gioitinh" type="text" class="form-control input-md">
                    
                    </div>
                  </div>

                     <div class="form-group">
                       <label class="col-md-4 control-label" for="button1id"></label>
                       <div class="col-md-8">
                         <button id="dangki" name="dangki" class="btn btn-success">Đăng Kí</button>
                         <button id="" name="reset" class="btn btn-danger">Reset</button>
                       </div>
                     </div>

                  </fieldset>
                  </form>
	</form>
	
            <script language="javascript" type="text/javascript">
            //document.forms['nguoi_dung'].name.focus();


            function check_submit_nguoi_dung()
            {
               var frm = window.document.adduser; 		
               if(frm.tendn.value=='')
               {
                  alert('Xin vui lòng nh?p Username !');			
                  document.forms['nguoi_dung'].user.focus();
                  return false;
               }

               else if(frm.mk.value=='')
               {
                  alert('Xin vui lòng nh?p Password !');
                  document.forms['nguoi_dung'].pass.focus();			
                  return false;
               }

               else if(frm.hoten.value=='')
               {
                  alert('Xin vui lòng nh?p H? tên !');
                  document.forms['nguoi_dung'].pass.focus();			
                  return false;
               }

               else if(frm.ngsinh.value=='')
               {
                  alert('Xin vui lòng nh?p Ngày Sinh !');
                  document.forms['nguoi_dung'].pass.focus();			
                  return false;
               }

               else if(frm.sdt.value=='')
               {
                  alert('Xin vui lòng nh?p S? di?n tho?i !');
                  document.forms['nguoi_dung'].pass.focus();			
                  return false;
               }

               else if(frm.email.value=='')
               {
                  alert('Xin vui lòng nh?p email !');
                  document.forms['nguoi_dung'].pass.focus();			
                  return false;
               }

               else if(frm.quyen.value=='')
               {
                  alert('Xin vui lòng nh?p Quy?n !');
                  document.forms['nguoi_dung'].pass.focus();			
                  return false;
               }

               else if(frm.gioitinh.value=='')
               {
                  alert('Xin vui lòng nh?p Gi?i tính !');
                  document.forms['nguoi_dung'].pass.focus();			
                  return false;
               }

               else						
                  return true;	
            }
            </script>