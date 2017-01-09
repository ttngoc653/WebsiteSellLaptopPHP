<?php require_once ('hamKetNoiCSDL.php'); ?>
<div>
	<h1 class="tieude" style="background-color: #f6f;height: 50px;opacity: 0.9;border-radius: 10px">THÊM CPU</h1>
	<p id="thongbaoloi" class="thongbaoloi">
		
	</p>
</div>
<br/>
<i><div class="thongbaoloi" >
<?php 
	if(isset($_POST['subCPUthem'])) {
		$f_ten=$_POST['loai'];
		$rs = ConnectQuery("select * from cpu where loai = '".$f_ten."'");
		if(0 == $rs->num_rows){
			//echo "insert INTO cpu(hangsx, congnghe, loai, tocdo, thongtinbodem, tocdotoida, an) VALUES ('".$_POST['hangsx']."','".$_POST['congnghe']."','".$f_ten."','".$_POST['tocdo']."','".$_POST['thongtinbodem']."','".$_POST['tocdotoida']."','0')";
			$rs=ConnectQuery("insert INTO cpu(hangsx, congnghe, loai, tocdo, thongtinbodem, tocdotoida, an) VALUES ('".$_POST['hangsx']."','".$_POST['congnghe']."','".$f_ten."','".$_POST['tocdo']."','".$_POST['thongtinbodem']."','".$_POST['tocdotoida']."','0')");
			echo "đã thêm CPU $f_ten thành công";
		}
		else
			echo "đã có loại CPU $f_ten này nên không thể thêm nữa";
	}
	if (isset($_POST['subCPUxoa'])) {
		$f_ten=$_POST['loaixoa'];
		$rs=ConnectQuery("delete FROM cpu WHERE loai like '$f_ten'");
		echo "đã xóa CPU đã nhập.";
	}
?>	
</div></i>
<form class="form-horizontal" name="frmCPUthem" method="post" onsubmit="return ktra()">
<fieldset>
<div class="panel panel-default" style="opacity: 0.9;border-radius: 10px;">
<!-- Form Name -->
<legend style="background-color: gray;border-radius: 10px"><h2>THÊM LOẠI CPU</h2></legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="hangsx">Hãng sản xuất</label>
  <div class="col-md-4">
    <select id="hangsx" name="hangsx" class="form-control">
    <?php $rs=ConnectQuery("select * from hang_sx");
    		while ($row = $rs->fetch_assoc()) {
    		 	echo "<option value=\"".$row['tenhangsx']."\">".$row['tenhangsx']."</option>";
   	} ?>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="congnghe">Công nghệ CPU</label>  
  <div class="col-md-4">
  <input id="congnghe" name="congnghe" type="text" placeholder="vd: Core i7 Skylake" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="loai">Mã (loại) CPU</label>  
  <div class="col-md-4">
  <input id="loai" name="loai" type="text" placeholder="vd: CB369" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tocdo">Tốc độ (bình thường) (GHz)</label>  
  <div class="col-md-2">
  <input id="tocdo" name="tocdo" type="text" placeholder="vd: 3.5" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="thongtin">Thông tin bộ đệm</label>  
  <div class="col-md-4">
  <input id="thongtinbodem" name="thongtinbodem" type="text" placeholder="vd: L2 6MB cache" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tocdotoida">Tốc độ tối đa</label>  
  <div class="col-md-2">
  <input id="tocdotoida" name="tocdotoida" type="text" placeholder="vd: 4.0" class="form-control input-md">
    
  </div>
</div>
<div style="text-align: center;" id="subCPUthem" >
	<input type="submit" name="subCPUthem" class="btn btn-success" value="thêm loại CPU">
</div>
</div>
</fieldset>
</form>

	<br><br>

<form class="form-horizontal" action="" name="frmCPUxoa" method="post" accept-charset="utf-8" onsubmit="return ktraXoa()">
<fieldset>

<div class="panel panel-default" style="opacity: 0.9;border-radius: 10px;">
<legend><h2>XÓA LOẠI CPU</h2></legend>
<div class="form-group">
  <label class="col-md-4 control-label" for="loaixoa">Chọn loại CPU cần xóa</label>
  <div class="col-md-4">
    <select id="loaixoa" name="loaixoa" class="form-control">
    <?php $rs=ConnectQuery("select * from cpu");
    		while ($row = $rs->fetch_assoc()) {
    		 	echo "<option value=\"".$row['loai']."\">".$row['loai']."</option>";
   	} ?>
    </select>
  </div>
</div>
<div style="text-align: center;" id="subCPUxoa" >
	<input type="submit" name="subCPUxoa" class="btn btn-danger" value="xóa CPU">
</div>
</div>
</fieldset>	
</form>

<script language="javascript" type="text/javascript" >
	function ktra(){
		var thongbao=document.getElementById('thongbaoloi');
		var frm= window.document.frmCPUthem;
		if ((frm.congnghe.value=="")||(isNaN(frm.congnghe.value)==false)) {
			thongbao.innerHTML="Hãy nhập công nghệ CPU.";
			document.forms['frmCPUthem'].congnghe.focus();
			return false;
		} else if (frm.loai.value=="") {
			thongbao.innerHTML="Hãy nhập loại CPU.";
			document.forms['frmCPUthem'].loai.focus();
			return false;
		} else if ((frm.tocdo.value=="")||(isNaN(frm.tocdo.value)==true)) {
			thongbao.innerHTML="Hãy nhập hay nhập lại tốc độ tối đa của CPU.";
			document.forms['frmCPUthem'].tocdo.focus();
			return false;
		} else if (frm.thongtinbodem.value=="") {
			thongbao.innerHTML="Hãy nhập thông tin bộ nhớ đệm của CPU.";
			document.forms['frmCPUthem'].thongtinbodem.focus();
			return false;
		} else if ((frm.tocdotoida.value=="")||(isNaN(frm.tocdotoida.value)==true)) {
			thongbao.innerHTML="Hãy nhập hoặc nhập lại số tốc độ tối đa của CPU.";
			document.forms['frmCPUthem'].tocdotoida.focus();
			return false;
		} else {
			//alert("dax towsi ddaay");
			//return true;
		}

			//alert("dax towsi ddaay cuoosi");
		return true;
	}
</script>