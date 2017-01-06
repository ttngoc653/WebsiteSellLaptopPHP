	<?php

	error_reporting(2); //tắt lỗi không quan trọng
	require_once ('./hamKetNoiCSDL.php');
	if(isset($_SESSION['name'])){
		echo "<div style=\"margin-left: 150px; text-align: right; margin-top: 5px;\">
		  	<a href=\"\" title=\"\"><img src=\"./image/shopping.png\" width=\"35px\" alt=\"\"/> <span class=\"badge\">4</span> sản phẩm</a> <a href=\"index.php?act=dangxuat\" class=\"btn btn-info btn-md\" role=\"button\">Đăng xuất</a>&nbsp;
		</div>";
	}
	else if(isset($_COOKIE['name'])){
		$role= $_COOKIE['quyen'];
		echo "<div style=\"margin-left: 150px; text-align: right; margin-top: 5px;\">
		  	<a href=\"\" title=\"\"><img src=\"./image/shopping.png\" width=\"35px\" alt=\"\"/> <span class=\"badge\">4</span> sản phẩm</a> <a href=\"index.php?act=dangxuat\" class=\"btn btn-info btn-md\" role=\"button\">Đăng xuất</a>&nbsp;
		</div>";
	}
	else if(isset($_POST['dangnhap'])){
		//echo "select * from nguoi_dung where tendn like '".$_POST['us']."' and mk like '".md5($_POST['pw'])."'";
		$nd=ConnectQuery("select * from nguoi_dung where tendn like '".$_POST['us']." and mk like '".md5($_POST['pw'])."'");
		
		if ($nd->num_rows!=1) {
			echo "<script>";
			echo "alert('BẠN ĐÃ NHẬP SAI TÊN ĐĂNG NHẬP HOẶC MẬT KHẨU!');";
			echo "</script>";
			$user="";
			if(isset($_POST['us'])){
				$user=$_POST['us'];
			}
			$mk="";
			if(isset($_POST['pw'])){
				$mk=$_POST['pw'];
			}
			
			echo '<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
			Tên đăng nhập: <input style="color: black;" type="text" name="us" id="us" value="'.$user.'" size="12"> &nbsp; &nbsp; 
			Mật khẩu: <input style="color: black;" type="password" name="pw" id="pw" value="'.$mk.'" size="12"><br/>
<input type="checkbox" name="luu" value="ok"> Ghi nhớ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
			<input style="color: black; font-weight: bold;" type="submit" class="btn btn-default btn-xs" name="dangnhap" value="Đăng nhập">&nbsp; &nbsp;&nbsp; &nbsp;
			<a href="index.php?act=themngdung" class="btn btn-info btn-xs" role="button">Đăng ký</a>&nbsp;
		</form>';
		}
		else {
			$role='2';
			while ($row=$nd->fetch_assoc()) {
				$role=$row['quyen'];
			}
			echo "<div style=\"margin-left: 150px; text-align: right; margin-top: 5px;\">
			  	<a href=\"\" title=\"\"><img src=\"./image/shopping.png\" width=\"35px\" alt=\"\"/> <span class=\"badge\">4</span> sản phẩm</a> <a href=\"index.php?act=dangxuat\" class=\"btn btn-info btn-md\" role=\"button\">Đăng xuất</a>&nbsp;
			  </div>";
			if((isset($_POST['luu'])&&($_POST['luu']=="ok"))){
				setcookie('name',$_POST['us'],time()+3600*3);
				setcookie('quyen',$role,time()+3600*3);
			}
			else{
				$_SESSION['name']=$user;
				$_SESSION['quyen']=$role;
			}
		}
	}
	
	else{
			echo '<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
			Tên đăng nhập: <input style="color: black;" type="text" name="us" id="us" size="12"> &nbsp; &nbsp; 
			Mật khẩu: <input style="color: black;" type="password" name="pw" id="pw" size="12"><br/>
<input type="checkbox" name="luu" value="ok"> Ghi nhớ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
			<input style="color: black; font-weight: bold;" type="submit" class="btn btn-default btn-xs" name="dangnhap" value="Đăng nhập">&nbsp; &nbsp;&nbsp; &nbsp;
			<a href="index.php?act=themngdung" class="btn btn-info btn-xs" role="button">Đăng ký</a>&nbsp;
		</form>'; } ?>

<?php

	//error_reporting(2); //tắt lỗi không quan trọng
	require_once ('./hamKetNoiCSDL.php');
	if(isset($_SESSION['name'])){
			echo "<script>";
			echo "alert('BẠN ĐÃ NHẬP!');";
			echo "</script>";
		$role= $_SESSION['quyen'];
		
		echo "<div style=\"margin-left: 150px; text-align: right; margin-top: 5px;\">
		  	<a href=\"\" title=\"\"><img src=\"./image/shopping.png\" width=\"35px\" alt=\"\"/> <span class=\"badge\">4</span> sản phẩm</a> <a href=\"index.php?act=dangxuat\" class=\"btn btn-info btn-md\" role=\"button\">Đăng xuất</a>&nbsp;
		</div>";
	}
	else if(isset($_COOKIE['name'])){
			echo "<script>";
			echo "alert('BẠN ĐÃ NHẬP SAI!');";
			echo "</script>";
		$role= $_COOKIE['quyen'];
		echo "<div style=\"margin-left: 150px; text-align: right; margin-top: 5px;\">
			  	<a href=\"\" title=\"\"><img src=\"./image/shopping.png\" width=\"35px\" alt=\"\"/> <span class=\"badge\">4</span> sản phẩm</a> <a href=\"index.php?act=dangxuat\" class=\"btn btn-info btn-md\" role=\"button\">Đăng xuất</a>&nbsp;
			  </div>";
			
	}
	else if(isset($_POST['dangnhap'])){
		echo "select * from nguoi_dung where tendn like '".$_POST['us']."' and mk like '".md5($_POST['pw'])."'";
		$rs=ConnectQuery("select * from nguoi_dung where tendn like '".$_POST['us']." and mk like '".md5($_POST['pw'])."'");
		if ($rs->num_rows()==0) {
			echo "<script>";
			echo "alert('BẠN ĐÃ NHẬP SAI TÊN ĐĂNG NHẬP HOẶC MẬT KHẨU!');";
			echo "</script>";
			$user="";
			if(isset($_POST['us'])){
				$user=$_POST['us'];
			}
			$mk="";
			if(isset($_POST['pw'])){
				$mk=$_POST['pw'];
			}
			
			echo '<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
			Tên đăng nhập: <input style="color: black;" type="text" name="us" id="us" value="'.$user.'" size="12"> &nbsp; &nbsp; 
			Mật khẩu: <input style="color: black;" type="password" name="pw" id="pw" value="'.$mk.'" size="12"><br/>
<input type="checkbox" name="luu" value="ok"> Ghi nhớ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
			<input style="color: black; font-weight: bold;" type="submit" class="btn btn-default btn-xs" name="dangnhap" value="Đăng nhập">&nbsp; &nbsp;&nbsp; &nbsp;
			<a href="index.php?act=themngdung" class="btn btn-info btn-xs" role="button">Đăng ký</a>&nbsp;
		</form>';
		}
		else{
			while ($row=$rs->fetch_assoc()) {
				$role=$row['quyen'];
			}
			echo "<div style=\"margin-left: 150px; text-align: right; margin-top: 5px;\">
			  	<a href=\"\" title=\"\"><img src=\"./image/shopping.png\" width=\"35px\" alt=\"\"/> <span class=\"badge\">4</span> sản phẩm</a> <a href=\"index.php?act=dangxuat\" class=\"btn btn-info btn-md\" role=\"button\">Đăng xuất</a>&nbsp;
			  </div>";
			if((isset($_POST['luu'])&&($_POST['luu']=="ok"))){
				setcookie('name',$_POST['us'],time()+3600*3);
				setcookie('quyen',$role,time()+3600*3);

			echo "<script>";
			echo "alert('BẠN ĐÃ vào cookie!');";
			echo "</script>";
			}
			else{
				$_SESSION['name']=$user;
				$_SESSION['quyen']=$role;

			echo "<script>";
			echo "alert('BẠN ĐÃ vào session!');";
			echo "</script>";
			}
		}
	}
	
	else{
			echo '<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
			Tên đăng nhập: <input style="color: black;" type="text" name="us" id="us" size="12"> &nbsp; &nbsp; 
			Mật khẩu: <input style="color: black;" type="password" name="pw" id="pw" size="12"><br/>
<input type="checkbox" name="luu" value="ok"> Ghi nhớ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
			<input style="color: black; font-weight: bold;" type="submit" class="btn btn-default btn-xs" name="dangnhap" value="Đăng nhập">&nbsp; &nbsp;&nbsp; &nbsp;
			<a href="index.php?act=themngdung" class="btn btn-info btn-xs" role="button">Đăng ký</a>
		</form>';
	} ?>