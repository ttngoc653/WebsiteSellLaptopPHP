<?php
    require_once("hamKetNoiCSDL.php");
?>
  <form action="" method="post" name="frm_doiMK" id="frm_doiMK" onsubmit="return check_submit_frm_doiMK()">
    <fieldset>
      <div class="panel panel-default" style="opacity: 0.9;border-radius: 10px">
        <legend><div class="panel-heading" style="background-color: yellow;">Mẫu đổi mật khẩu</div></legend>
        <div class="panel-body">
        <p style="font-stretch: bold;color: red;">
        <?php 
    if(!isset($_SESSION['name']))
        echo "<script type=\"text/javascript\" charset=\"utf-8\" async defer>window.history.back(); </script>";
    if (isset($_POST["subDoiMK"])) {
      //lấy thông tin từ các form bằng phương thức POST
      $mkc = md5($_POST["mkc"]);
      $mkm = md5($_POST['mkm']);
      $mkm1 = md5($_POST['mkm2']);
      //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
      if ($mkm1 != $mkm ) {
         echo "2 mật khẩu không trùng nhau. Yêu cầu sửa/ nhập lại mật khẩu mới";
      }else{
        //thực hiện việc lưu trữ dữ liệu vào db
        $sql = "select * from nguoi_dung where mk like '".$mkc."' and tendn like '".$_SESSION['name']."'";
        // thực thi câu $sql với biến conn lấy từ file connection.php
        $rs=ConnectQuery($sql);
        if($rs->num_rows==0)
          echo "bạn đã nhập sai mật khẩu cũ nên không thể thay đổi mật khẩu của mình";
        else{
          $sql = "update nguoi_dung set mk like '".$mkm."' where tendn like '".$_SESSION['name']."'";
          ConnectQuery($sql);
        echo "chúc mừng bạn đã đổi mật khẩu thành công";
        }
      }
    } ?>  
        </p>  
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
          
        </div>
      </div>
    </fieldset>
  </form>
  <script language="javascript" type="text/javascript">
            //document.forms['frm_doiMK'].name.focus();
  function check_submit_frm_doiMK()
  {
    var frm = window.document.frm_doiMK;     
       if(frm.mkc.value=='')
       {
          alert('Xin vui lòng nhập mật khẩu cũ !');      
          document.forms['frm_doiMK'].mkc.focus();
          return false;
       }
       else if(frm.mkm.value=='')
       {
          alert('Xin vui lòng nhập mật khẩu mới !');
          document.forms['frm_doiMK'].mkm.focus();      
          return false;
       }

       else if(frm.mkm2.value=='')
       {
          alert('Xin vui lòng nhập dữ liệu vào ô nhập lại mật khẩu mới !');
          document.forms['frm_doiMK'].mkm2.focus();      
          return false;
       }
       else if(frm.mkm.value!=frm.mkm2.value)
       {
          alert('Hai mật khẩu không trùng nhau. Hãy sửa lại sao cho 2 mật khẩu mới phải trùng nhau !');
          document.forms['frm_doiMK'].mkm.focus();      
          return false;
       }
       else           
          return true;  
  }
  </script>