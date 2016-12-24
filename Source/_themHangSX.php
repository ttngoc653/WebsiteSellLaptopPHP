<?php require_once ('hamKetNoiCSDL.php'); ?>
<div>
	<h1 class="tieude">THÊM HÃNG SẢN XUẤT</h1>
	<p id="thongbaoloi" class="thongbaoloi">
		
	</p>
</div>
<br/>
<i><div class="thongbaoloi" >
<?php 
	if(isset($_POST['guiHangSX'])) {
		$f_ten=$_POST['ten'];
		$rs = ConnectQuery("select * from hang_sx where tenhangsx = '".$f_ten."'");
		if(0 == $rs->num_rows){
			$rs=ConnectQuery("insert INTO hang_sx(tenhangsx, truso, mota, an) VALUES ('".$_POST['ten']."','".$_POST['diachi']."','".$_POST['thongtin']."','0')");
			echo "đã thêm hãng $f_ten thành công";
		}
		else
			echo "đã có hãng $f_ten này nên không thể thêm nữa";
	}
	if (isset($_POST['subxoaHang'])) {
		$f_ten=$_POST['tenxoa'];
		$rs=ConnectQuery("delete FROM hang_sx WHERE tenhangsx like $f_ten");
		echo "đã xóa hãng $f_ten đã nhập.";
	}
?>	
</div></i>
<form class="form-horizontal" name="themHang" method="post" onsubmit="return ktra()">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ten">Nhập tên hãng</label>  
  <div class="col-md-4">
  <input id="ten" name="ten" type="text" placeholder="vd: Dell" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="diachi">Trụ sở chính ở</label>  
  <div class="col-md-5">
  <input id="diachi" name="diachi" type="text" placeholder="vd: California, USA" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="thongtin">Mô tả thêm</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="thongtin" name="thongtin">năm thành lập, chuyên sản xuất về,... quá trình tồn tại,... hiện tại,...</textarea>
  </div>
</div>
<div style="text-align: center;" id="btnSubmit" >
	<input type="submit" name="guiHangSX" class="btn btn-success" value="Thêm hãng sản xuất">
</div>
</fieldset>
</form>
<br><br>
<h1 class="tieude">XÓA HÃNG SẢN XUẤT</h1>
<form class="form-horizontal" action="" name="xoaHang" method="post" accept-charset="utf-8" onsubmit="return ktraXoa()">
<fieldset>
<div class="form-group">
	<label class="col-md-4 control-label" for="ten">Nhập tên hãng</label>  
	<div class="col-md-4">
  		<input id="ten" name="tenxoa" type="text" placeholder="vd: Dell" class="form-control input-md">
  	</div>
</div>
<p><div style="text-align: center;" id="btnSubmit" >
	<input type="submit" name="subxoaHang" class="btn btn-danger" value="xóa hãng sản xuất">
</div></p>
</fieldset>	
</form>

<script language="javascript" type="text/javascript" >
function ktraXoa(){
	var thongbao=document.getElementById('thongbaoloi');
	var frm.window.document.xoaHang;
	if(frm.tenxoa.value==""){
			thongbao.innerHTML="Hãy nhập tên Hãng sản xuất để xóa.";
		    document.forms['xoaHang'].tenxoa.focus();
    		return false;
	}
	return true;
}
	function ktra(){
		var thongbao=document.getElementById('thongbaoloi');
		var frm= window.document.themHang;
		if (frm.ten.value=="") {
			thongbao.innerHTML="Hãy nhập tên Hãng sản xuất.";
		    document.forms['themHang'].ten.focus();
    		return false;
		} else if (frm.diachi.value=="") {
			thongbao.innerHTML="Hãy nhập địa chỉ của hãng";
			document.forms['themHang'].diachi.focus();
			return false;
		} else if (frm.thongtin.value=="") {
			thongbao.innerHTML="Hãy nhập thông tin về hãng này";
			document.forms['themHang'].thongtin.focus();
			return false;
		} else {
			return true;
		}
		return true;
	}
</script>