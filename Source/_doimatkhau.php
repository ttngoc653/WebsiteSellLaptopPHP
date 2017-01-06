<?php
    require_once("hamKetNoiCSDL.php");
    if (isset($_POST["btn_submit"])) {
        //lấy thông tin từ các form bằng phương thức POST

        $mk = $_POST["mk"];

        //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
        if ($tendn == "" || $mk == "" ) {
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

                  <legend>Mẫu đổi mật khẩu</legend>

                  <div class="form-group">
                    <label class="col-md-5 control-label" for="textinput">Mật khẩu cũ: </label>  
                    <div class="col-md-4">
                    <input id="tendn" name="tendn" type="text" class="form-control input-md">
                    </div>
                  </div>

                  <!-- Password input-->
                  <div class="form-group">
                    <label class="col-md-5 control-label" for="passwordinput">Mật Khẩu Mới: </label>
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
                     <div class="form-group">
                       <label class="col-md-4 control-label" for="button1id"></label>
                       <div class="col-md-8">
                         <button id="dangki" name="dangki" class="btn btn-success">Hoàn thành</button>
                         
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
                  alert('Xin vui lòng nhập mật khẩu cũ !');      
                  document.forms['mk'].user.focus();
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


               else           
                  return true;  
            }
            </script>