<?php
    require_once("hamKetNoiCSDL.php");
    if(!isset($_SESSION['name']))
        echo "<script type=\"text/javascript\" charset=\"utf-8\" async defer>window.history.back(); </script>";
    if (isset($_POST["btn_submit"])) {
        //lấy thông tin từ các form bằng phương thức POST

        $mk = $_POST["mk"];

        //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
        if ($tendn != $mk ) {
           echo "2 mật khẩu không trùng nhau. Yêu cầu sửa lại 2 mật khẩu này";
        }else{
            //thực hiện việc lưu trữ dữ liệu vào db
            $sql = "update nguoi_dung set mk=";
            // thực thi câu $sql với biến conn lấy từ file connection.php
          $rs=ConnectQuery($sql);
           echo "chúc mừng bạn đã đăng ký thành công";
      }
    }
?>
  <form action="" method="post" name="nguoi_dung" id="nguoi_dung" onsubmit="return check_submit_nguoi_dung()">
    <fieldset>
      <div class="panel panel-default" style="opacity: 0.9;border-radius: 10px">
        <legend><div class="panel-heading">Mẫu đổi mật khẩu</div></legend>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-md-5 control-label" style="text-align: right;" for="textinput">Mật khẩu cũ: </label>  
            <div class="col-md-4">
            <input id="mkc" name="mkc" type="password" class="form-control input-md">
            </div>
          </div>

          <!-- Password input-->
          <div class="form-group">
            <label class="col-md-5 control-label" style="text-align: right;" for="passwordinput">Mật Khẩu Mới: </label>
            <div class="col-md-4">
              <input id="mkm" name="mkm" type="password" class="form-control input-md">
          
            </div>
          </div>

          <!-- Password input-->
          <div class="form-group">
            <label class="col-md-5 control-label" style="text-align: right;" for="passwordinput">Nhập Lại Mật Khẩu Mới: </label>
            <div class="col-md-4">
              <input id="mkm2" name="mkm2" type="password" class="form-control input-md">
            </div>
          </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="dangki"></label>
              <div class="col-md-8">
                <button id="dangki" name="dangki" class="btn btn-success">Hoàn thành</button>  
              </div>
            </div>
        </div>
      </div>
    </fieldset>
  </form>
  <script language="javascript" type="text/javascript">
            //document.forms['nguoi_dung'].name.focus();
  function check_submit_nguoi_dung()
  {
    var frm = window.document.nguoi_dung;     
       if(frm.mkc.value=='')
       {
          alert('Xin vui lòng nhập mật khẩu cũ !');      
          document.forms['nguoi_dung'].mkc.focus();
          return false;
       }
       else if(frm.mkm.value=='')
       {
          alert('Xin vui lòng nhập mật khẩu mới !');
          document.forms['nguoi_dung'].mkm.focus();      
          return false;
       }

       else if(frm.mkm2.value=='')
       {
          alert('Xin vui lòng nhập dữ liệu vào ô nhập lại mật khẩu mới !');
          document.forms['nguoi_dung'].mkm2.focus();      
          return false;
       }
       else if(frm.mkm.value!=frm.mkm2.value)
       {
          alert('Hai mật khẩu không trùng nhau. Hãy sửa lại sao cho 2 mật khẩu mới phải trùng nhau !');
          document.forms['nguoi_dung'].mkm.focus();      
          return false;
       }
       else           
          return true;  
  }
  </script>