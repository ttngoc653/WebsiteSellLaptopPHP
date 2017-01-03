<?php require_once ('hamKetNoiCSDL.php'); ?>
<div>
	<h1 class="tieude">THÊM CART MÀN HÌNH</h1>
	<p id="thongbaoloi" class="thongbaoloi">
		
	</p>
</div>
<br/>
<i><div class="thongbaoloi" >
<?php 
	if(isset($_POST['subMHthem'])) {
		$f_ten=$_POST['loai'];
		$rs = ConnectQuery("select * from cart_man_hinh where tencart = '".$f_ten."'");
		if(0 == $rs->num_rows){
			//echo "insert INTO cpu(hangsx, congnghe, loai, tocdo, thongtinbodem, tocdotoida, an) VALUES ('".$_POST['hangsx']."','".$_POST['congnghe']."','".$f_ten."','".$_POST['tocdo']."','".$_POST['thongtinbodem']."','".$_POST['tocdotoida']."','0')";
			$rs=ConnectQuery("insert INTO cart_man_hinh(tencart, dungluong, thietke, an) VALUES ('".$f_ten."','".$_POST['tocdo']."','".$_POST['thongtinbodem']."','0')");
			echo "đã thêm Card Đồ họa $f_ten thành công";
		}
		else
			echo "đã có loại card Đồ họa $f_ten này nên không thể thêm nữa";
	}
	if (isset($_POST['subMHxoa'])) {
		$f_ten=$_POST['loaixoa'];
		$rs=ConnectQuery("delete FROM cart_man_hinh WHERE tencart like '$f_ten'");
		echo "đã xóa card man hinh $f_ten đã nhập.";
	}
?>	
</div></i>
<form class="form-horizontal" name="frmMHthem" method="post" onsubmit="return ktra()">
<fieldset>

<!-- Form Name -->
<legend><h2>THÊM LOẠI CARD MÀN HÌNH</h2></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="loai">Tên card Đồ họa </label>  
  <div class="col-md-4">
  <input id="loai" name="loai" type="text" placeholder="vd: AMD Radeon R5 M420" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tocdo">Bộ nhớ đồ họa (getElementById)</label>  
  <div class="col-md-2">
  <input id="tocdo" name="tocdo" type="text" placeholder="vd: 2" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="thongtin">Thiết kế card</label>  
  <div class="col-md-4">
  <input id="thongtinbodem" name="thongtinbodem" type="text" placeholder="vd: Card đồ họa rời" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div style="text-align: center;" id="subMHthem" >
	<input type="submit" name="subMHthem" class="btn btn-success" value="thêm card Đồ họa">
</div>
</fieldset>
</form>
	<br><br>
<form class="form-horizontal" action="" name="frmMHxoa" method="post" accept-charset="utf-8" >
<fieldset>
<legend><h2>XÓA CART ĐỒ HỌA</h2></legend>
<div class="form-group">
  <label class="col-md-4 control-label" for="loaixoa">Chọn cart đồ họa cần xóa</label>
  <div class="col-md-4">
    <select id="loaixoa" name="loaixoa" class="form-control">
    <?php $rs=ConnectQuery("select * from cart_man_hinh");
    		while ($row = $rs->fetch_assoc()) {
    		 	echo "<option value=\"".$row['tencart']."\">".$row['tencart']."</option>";
   	} ?>
    </select>
  </div>
</div>
<div style="text-align: center;" id="subMHxoa" >
	<input type="submit" name="subMHxoa" class="btn btn-danger" value="xóa cart đồ họa">
</div>
</fieldset>	
</form>

<script language="javascript" type="text/javascript" >
	function ktra(){
		var thongbao=document.getElementById('thongbaoloi');
		var frm= window.document.frmMHthem;
		if (frm.loai.value=="") {
			thongbao.innerHTML="Hãy nhập tên card đồ họa.";
			document.forms['frmMHthem'].loai.focus();
			return false;
		} else if ((frm.tocdo.value=="")||(isNaN(frm.tocdo.value)==true)) {
			thongbao.innerHTML="Hãy nhập hay nhập lại bộ nhớ đồ họa.";
			document.forms['frmMHthem'].tocdo.focus();
			return false;
		} else if (frm.thongtinbodem.value=="") {
			thongbao.innerHTML="Hãy nhập thiết kế card.";
			document.forms['frmMHthem'].thongtinbodem.focus();
			return false;
		} else {
			//alert("dax towsi ddaay");
			//return true;
		}

			//alert("dax towsi ddaay cuoosi");
		return true;
	}
</script>