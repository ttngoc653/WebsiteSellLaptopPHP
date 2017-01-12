<?php 	
	//error_reporting(2); //tắt lỗi không quan trọng
	require_once ('./hamKetNoiCSDL.php');
	require_once ('./hamLienQuan.php');
	if(isset($_GET['gio']) && !empty($_GET['gio'])){
		$id=$_GET['gio'];
		if (isset($_GET['sl'])&&$_GET['sl']>0)
			setCart($id,$_GET['sl']);
		else if(!isset($_GET['sl']))
			setCart($id,1);
	echo "<meta http-equiv=\"refresh\" content=\"0;".$_SERVER['HTTP_REFERER']."\">";
	}
?>
<p class="heading"><img src="image/Back.jpg" width="1024px" height="56px"><!--
	--><div style="margin-top: -59px;margin-left: 40px; text-align: right; margin-right: 0px;position: absolute; color: white;font-weight: bold;font-size: 40px;">
		<a class="" href="index.php"><img src="./image/home.png" width="45px" alt=""/></a>
	</div>
	<div  style="margin-top: -42px;margin-left: 182px; margin-right: 500px; text-align: right; margin-right: 0px;position: absolute; color: white;font-weight: bold;font-size: 12px;">
		<?php include_once "./_timTheoDieuKien.php"; ?>
	</div>
	<div style="margin-top: -52px;margin-left: 624px; text-align: right; position: absolute; color: white;font-weight: bold;font-size: 12px;">
		<?php include_once "./_dangNhap.php"; ?>
	</div>
	<?php 
	if(isset($role)&&$role=="1"){
		include_once "./_menuQuanTri.php";
	}
	else{
		include_once "./_menuNgDung.php";
	}
	echo "</p>";
	ob_end_flush(); 
	?>