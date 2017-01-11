<?php

	if(isset($_COOKIE['name'])){
		$_SESSION['role']= $_COOKIE['quyen'];
		$_SESSION['name']=$_COOKIE['name'];
	}
	if(isset($_SESSION['name'])){
		$role=$_SESSION['quyen'];
		?> <div style="margin-left: 100px; text-align: right; margin-top: 5px;"><a href="index.php?act=xemthongtin"><img src="./image/user/<?php echo $_SESSION['name']; ?>.png" height="35px" alt="nhấp để xem thông tin"/></a>
		  	<a href="index.php?act=giohang" title=""><img src="./image/shopping.png" width="35px" alt=""/> <span class="badge"><?php echo cart_sum_items(); ?></span> sản phẩm</a> <a href="index.php?act=dangxuat" class="btn btn-info btn-md" role="button">Đăng xuất</a>&nbsp;
		</div>
		<?php
	}
	else if(isset($_POST['dangnhap'])){
		//echo "select * from nguoi_dung where tendn like '".$_POST['us']."' and mk like '".md5($_POST['pw'])."'";
		$nd=ConnectQuery("select * from nguoi_dung where tendn like '".$_POST['us']."' and mk like '".md5($_POST['pw'])."'");
		$user=$_POST['us'];
		if ($nd->num_rows>0) {
			$role='2';
			while ($row=$nd->fetch_assoc()) {
				$role=$row['quyen'];
				$_SESSION['name']=$user;
			}
			?> <div style="margin-left: 100px; text-align: right; margin-top: 5px;"><a href="index.php?act=xemthongtin"><img src="./image/user/<?php echo $_SESSION['name']; ?>.png" height="35px" alt=""/></a>
		  	<a href="index.php?act=giohang" title=""><img src="./image/shopping.png" width="35px" alt=""/> <span class="badge"><?php echo cart_sum_items(); ?></span> sản phẩm</a> <a href="index.php?act=dangxuat" class="btn btn-info btn-md" role="button">Đăng xuất</a>&nbsp;
		</div>
		<?php
			if((isset($_POST['luu'])&&($_POST['luu']=="ok"))){
				setcookie('name',$_POST['us'],time()+3600*3,"/");
				setcookie('quyen',$role,time()+3600*3,"/");
				$_SESSION['name']=$user;
				$_SESSION['quyen']=$role;
			}
			else{
				$_SESSION['name']=$user;
				$_SESSION['quyen']=$role;
			}
		}
		else {
			echo "<script>";
			echo "alert(\"BẠN ĐÃ NHẬP SAI TÊN ĐĂNG NHẬP HOẶC MẬT KHẨU!\");";
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
	}
	
	else{
			echo '<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
			Tên đăng nhập: <input style="color: black;" type="text" name="us" id="us" size="12"> &nbsp; &nbsp; 
			Mật khẩu: <input style="color: black;" type="password" name="pw" id="pw" size="12"><br/>
<input type="checkbox" name="luu" value="ok"> Ghi nhớ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
			<input style="color: black; font-weight: bold;" type="submit" class="btn btn-default btn-xs" name="dangnhap" value="Đăng nhập">&nbsp; &nbsp;&nbsp; &nbsp;
			<a href="index.php?act=themngdung" class="btn btn-info btn-xs" role="button">Đăng ký</a>&nbsp;
		</form>'; } ?>
