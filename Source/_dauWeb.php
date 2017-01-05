<p class="heading"><img src="image/Back.jpg" width="1024px" height="56px"><!--
	--><div style="margin-top: -59px;margin-left: 40px; text-align: right; margin-right: 0px;position: absolute; color: white;font-weight: bold;font-size: 40px;">
		<a class="" href=""><img src="./image/home.png" width="45px" alt=""/></a>
	</div>
	<div  style="margin-top: -42px;margin-left: 182px; margin-right: 500px; text-align: right; margin-right: 0px;position: absolute; color: white;font-weight: bold;font-size: 12px;">
		<form action="" method="port" accept-charset="utf-8">
		<input type="hidden" name="act" value="timkiem">
		<div class="input-group input-group-sm col-xs-3">
     		<input type="text" name="kaka" class="form-control" placeholder="Search" size="20">
     	<div class="input-group-btn">
        	<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      	</div>
    	</div>
  		</form>
		
	</div>
	<div style="margin-top: -52px;margin-left: 624px; text-align: right; margin-right: 0px;position: absolute; color: white;font-weight: bold;font-size: 12px;">
	<?php

	error_reporting(2); //tắt lỗi không quan trọng
	require_once ('./hamKetNoiCSDL.php');
	if(isset($_POST['dangnhap'])){
		//echo "select * from nguoi_dung where tendn like '".$_POST['us']."' and mk like '".md5($_POST['pw'])."'";
		$nd=ConnectQuery("select * from nguoi_dung where tendn like '".$_POST['us']." and mk like '".md5($_POST['pw'])."'");
		
		if ($nd->num_rows!=0) {
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
			  echo "<div style=\"margin-left: 150px; text-align: right; margin-top: 5px;\">
			  	<a href=\"\" title=\"\"><img src=\"./image/shopping.png\" width=\"35px\" alt=\"\"/> <span class=\"badge\">4</span> sản phẩm</a> <a href=\"index.php?act=dangxuat\" class=\"btn btn-info btn-md\" role=\"button\">Đăng xuất</a>&nbsp;
			  </div>";
		}
	}
	
	else{
			echo '<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
			Tên đăng nhập: <input style="color: black;" type="text" name="us" id="us" value="'.$user.'" size="12"> &nbsp; &nbsp; 
			Mật khẩu: <input style="color: black;" type="password" name="pw" id="pw" value="'.$mk.'" size="12"><br/>
<input type="checkbox" name="luu" value="ok"> Ghi nhớ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
			<input style="color: black; font-weight: bold;" type="submit" class="btn btn-default btn-xs" name="dangnhap" value="Đăng nhập">&nbsp; &nbsp;&nbsp; &nbsp;
			<a href="index.php?act=themngdung" class="btn btn-info btn-xs" role="button">Đăng ký</a>&nbsp;
		</form>'; } ?>
	</div><?php  
	?><a href="#"><button style="width: 123px">TRANG CHỦ</button></a><?php
	 ?><a href="#"><button style="width: 123px">OVERVIEW</button></a><?php 
	  ?><a href="#"><button style="width: 109px;">MODELS</button></a><?php 
	   ?><a href="#"><button style="width: 92px;">FAQ</button></a><?php 
	    ?><a href="#"><button style="width: 143px;">LIÊN HỆ</button></a><?php 
	     ?><a href="#"></a><button style="width: <?php echo 1024-123-123-109-92-143; ?>px">...</button></a>	</p>