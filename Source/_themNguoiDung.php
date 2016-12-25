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
		<table>
			<tr>
				<td colspan="2">Form dang ky</td>
			</tr>	
			<tr>
				<td>Username :</td>
				<td><input type="text" id="tendn" name="tendn"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="text" id="mk" name="mk"></td>
			</tr>
                        <tr>
				<td>Ho Ten :</td>
				<td><input type="text" id="hoten" name="hoten"></td>
			</tr>
                        <tr>
				<td>Ngay Sinh :</td>
				<td><input type="text" id="ngsinh" name="ngsinh"></td>
			</tr>
			<tr>
				<td>So Dien Thoai :</td>
				<td><input type="text" id="sdt" name="sdt"></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><input type="text" id="email" name="email"></td>
			</tr>
                        <tr>
				<td>Quyen :</td>
				<td><input type="text" id="quyen" name="quyen"></td>
			</tr>
                        <tr>
				<td>GioiTinh :</td>
				<td><input type="text" id="gioitinh" name="gioitinh"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Dang ky"></td>
			</tr>

		</table>
                
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