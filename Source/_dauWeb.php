<?php 	
	//error_reporting(2); //tắt lỗi không quan trọng
	require_once ('./hamKetNoiCSDL.php');
	require_once ('./hamLienQuan.php');
	if(isset($_GET['gio']) && !empty($_GET['gio'])){
		$id=$_GET['gio'];
		setCart($id,1);
	echo "<meta http-equiv=\"refresh\" content=\"0;".$_SERVER['HTTP_REFERER']."\">";
	}
?>
<p class="heading"><img src="image/Back.jpg" width="1024px" height="56px"><!--
	--><div style="margin-top: -59px;margin-left: 40px; text-align: right; margin-right: 0px;position: absolute; color: white;font-weight: bold;font-size: 40px;">
		<a class="" href="index.php"><img src="./image/home.png" width="45px" alt=""/></a>
	</div>
	<div  style="margin-top: -42px;margin-left: 182px; margin-right: 500px; text-align: right; margin-right: 0px;position: absolute; color: white;font-weight: bold;font-size: 12px;">
		<form action="" method="get" accept-charset="utf-8">
		<input type="hidden" name="act" value="timkiem">
		<div class="input-group input-group-sm col-xs-3">
     		<div class="input-group-btn">
        		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
        		<ul class="dropdown-menu">
          			<li><a><b>Hãng:</b> &nbsp; &nbsp; 
          				<label class="radio-inline"><input name="hang" checked="checked" value="" type="radio">Tất cả</label> 
						<?php  
  							$rs= ConnectQuery("select distinct hangsx from san_pham order by hangsx");
  							while ($row=$rs->fetch_assoc()) {
  								$a=$row["hangsx"];
  						?>
    					<label class="radio-inline"><input name="hang" value="<?php echo $a; ?>" type="radio"><?php echo $a; ?></label> 
    					<?php
  							}
  						?>
    				</a></li>
          			<li><a><b>Giá cả:</b>&nbsp; &nbsp; 
          				<input type="number" name="tu" value="500000" max="100000000" min="1000000" step="500000" placeholder="giá từ"> VNĐ - <input type="number" name="den" value="100000000" max="100000000" min="1000000" step="500000"  placeholder="giá đến"> VNĐ
          			</a></li>
          			<li><a><b>Thiết kế card đồ họa:</b>&nbsp; &nbsp; 
          				<label class="radio-inline"><input name="dohoa" checked="checked" value="" type="radio">Tất cả</label> 
						<?php  
  							$rs= ConnectQuery("select distinct thietke from cart_man_hinh");
  							while ($row=$rs->fetch_assoc()) {
  								$a=$row["thietke"];
  						?>
    					<label class="radio-inline"><input name="dohoa" value="<?php echo $a; ?>" type="radio"><?php echo $a; ?></label> 
    					<?php
  							}
  						?>
          			</a></li>
          			<li><a><b>Dung lượng ram:</b>&nbsp; &nbsp; 
						<label class="radio-inline"><input name="ram" checked="checked" value="" type="radio">Tất cả</label> 
					<?php  
					  	$rs= ConnectQuery("select DISTINCT san_pham.ramdungluong FROM san_pham ORDER BY san_pham.ramdungluong");
					  	while ($row=$rs->fetch_assoc()) {
					  		$a=$row["ramdungluong"];
					?>
					  	<label class="radio-inline"><input name="ram" value="<?php echo $a; ?>" type="radio"><?php echo $a; ?> GB</label> 
					<?php
						}
					?>
          			</a></li>
          				<li><a><b>CPU:</b>&nbsp; &nbsp; 
						<label class="radio-inline"><input name="cpu" checked="checked" value="" type="radio">Tất cả</label> 
					<?php  
						$i=1;
					  	$rs= ConnectQuery("select DISTINCT cpu.congnghe FROM cpu");
					  	while ($row=$rs->fetch_assoc()) {
					  		if($i%5==0 && $i!=0)
					  			echo "</a></li><a><li>";
					  		$a=$row["congnghe"];
					?>
					  	<label class="radio-inline"><input name="cpu" value="<?php echo $a; ?>" type="radio"><?php echo $a; ?></label> 
					<?php
								$i+=1;
						}
					?>
          			</a></li>
        	</ul>
      		</div>
      		<input type="text" name="key" class="form-control" placeholder="Hãy nhập thông tin muốn tìm" size="20">
     		<div class="input-group-btn">
        		<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      		</div>
    	</div>
  		</form>
	</div>
	<div style="margin-top: -52px;margin-left: 624px; text-align: right; margin-right: 0px;position: absolute; color: white;font-weight: bold;font-size: 12px;">
		<?php

	if(isset($_SESSION['name'])){
		$role=$_SESSION['quyen'];
		echo "<div style=\"margin-left: 100px; text-align: right; margin-top: 5px;\">
		  	<a href=\"index.php?act=giohang\" title=\"\"><img src=\"./image/shopping.png\" width=\"35px\" alt=\"\"/> <span class=\"badge\">"; ?><?php echo cart_sum_items(); ?><?php echo "</span> sản phẩm</a> <a href=\"index.php?act=dangxuat\" class=\"btn btn-info btn-md\" role=\"button\">Đăng xuất</a>&nbsp;
		</div>";
	}
	else if(isset($_COOKIE['name'])){
		$role= $_COOKIE['quyen'];
		echo "<div style=\"margin-left: 100px; text-align: right; margin-top: 5px;\">
		  	<a href=\"index.php?act=giohang\" title=\"\"><img src=\"./image/shopping.png\" width=\"35px\" alt=\"\"/> <span class=\"badge\">"; ?><?php echo cart_sum_items(); ?><?php echo "</span> sản phẩm</a> <a href=\"index.php?act=dangxuat\" class=\"btn btn-info btn-md\" role=\"button\">Đăng xuất</a>&nbsp;
		</div>";
	}
	else if(isset($_POST['dangnhap'])){
		//echo "select * from nguoi_dung where tendn like '".$_POST['us']."' and mk like '".md5($_POST['pw'])."'";
		$nd=ConnectQuery("select * from nguoi_dung where tendn like '".$_POST['us']."' and mk like '".md5($_POST['pw'])."'");
		$user=$_POST['us'];
		if ($nd->num_rows>0) {
			$role='2';
			while ($row=$nd->fetch_assoc()) {
				$role=$row['quyen'];
			}
			echo "<div style=\"margin-left: 100px; text-align: right; margin-top: 5px;\">
			  	<a href=\"index.php?act=giohang\" title=\"\"><img src=\"./image/shopping.png\" width=\"35px\" alt=\"\"/> <span class=\"badge\"></span> sản phẩm</a> <a href=\"index.php?act=dangxuat\" class=\"btn btn-info btn-md\" role=\"button\">Đăng xuất</a>&nbsp;
			  </div>";
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

	</div>
	<?php 
	if(isset($role)){
		echo "<a href=\"index.php\"><button style=\"width: 123px\">TRANG CHỦ</button></a><?php
	 ?><a href=\"\"><button style=\"width: 123px\">OVERVIEW</button></a><?php 
	  ?><a href=\"\"><button style=\"width: 109px;\">MODELS</button></a><?php 
	   ?><a href=\"\"><button style=\"width: 92px;\">FAQ</button></a><?php 
	    ?><a href=\"\"><button style=\"width: 143px;\">LIÊN HỆ</button></a><?php 
	     ?><a><button style=\"width: ";
	    echo 1024-123-123-109-92-143;
	    echo "px\">&nbsp;</button></a></p>";
	}
	ob_end_flush(); 
	?>