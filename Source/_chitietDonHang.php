<?php
	if(!isset($_SESSION['name'])){
		echo "<meta http-equiv=\"refresh\" content=\"0;index.php\">";
	}
	else if(!isset($_GET['madh'])){
		echo "<meta http-equiv=\"refresh\" content=\"0;index.php\">";	
	}
	else{
		$dk="";
		if(isset($_SESSION['quyen'])==0)
			$dk=" and taikhoan like ".$_SESSION['name'];
		$rs=ConnectQuery("select * from don_hang where madh like '".$_GET['madh']."'".$dk);
		if($rs->num_rows==0){
			echo "<meta http-equiv=\"refresh\" content=\"0;index.php\">";	
		}
		while($row=$rs->fetch_assoc()){
?>
<div class="panel panel-<?php echo $row['dagiao']==0?"danger":"success"; ?>" style="opacity: 0.9;">
	<div class="panel-heading">
		CHI TIẾT ĐƠN HÀNG
	</div>
	<div class="panel-body">
		<p style="width: 424px;float: left;">Người đặt hóa đơn: <?php echo TenNguoiDung($row['taikhoan']); ?></p>
		<p style="float: right;">Thời gian nhận hóa đơn: <?php echo $row['ngaylap']; ?> </p>
		<p style="float: left;">Địa chỉ nhận hàng: <?php echo $row['diachinhan']; ?> </p>
		<p style="float: right;">Tình trạng hiện tại: <?php echo $row['dagiao']==0?"chưa gửi hàng":"đã gửi hàng"; ?> </p>
		<table style="width: 800px;">
			<caption>CHI TIẾT CÁC SẢN PHẨM: </caption>
			<thead>
				<tr style="text-align: center;">
					<th width="40px;" style="text-align: center;">STT</th>
					<th width="200px" style="text-align: center;">TÊN SẢN PHẨM</th>
					<th width="150px" style="text-align: center;">ĐƠN GIÁ</th>
					<th width="175px" style="text-align: center;">SỐ LƯỢNG SẢN PHẨM</th>
					<th width="130px" style="text-align: center;">THÀNH TIỀN</th>
				</tr>
			</thead>
<?php 
			$rss=ConnectQuery("select * from chi_tiet_don_hang where madh like ".$_GET['madh']);
			$i=0;
			$countSP=0;
			while($roww=$rss->fetch_assoc()){
				$i+=1;
				$countSP+=$roww['soluongsp'];
?>
			<tbody>
				<tr>
					<td style="text-align: center;"><?php echo $i; ?></td>
<?php
				$cq=ConnectQuery("select hangsx,tensp,gia,slkho from san_pham where masp like '".$roww['masp']."'");
				while ($rowww=$cq->fetch_assoc()) {
						echo "<td>&nbsp; &nbsp; ".$rowww['hangsx']." ".$rowww['tensp']."</td>";
						echo "<td style=\"text-align: right;\">".number_format($rowww['gia'])." VNĐ&nbsp; &nbsp;</td>";
						echo "<td style=\"text-align: center;\">".$roww['soluongsp']."</td>";
?>
						<td style="text-align: right;"><?php echo number_format($roww['soluongsp']*$rowww['gia'])." VNĐ ";?> &nbsp; &nbsp; </td>
		  <?php } ?>
				</tr>
			</tbody>              
	  <?php } ?>
			<tbody>
			  	<tr>
			  		<th colspan="3" rowspan="" headers="" scope="" style="text-align: right;">TỔNG CỘNG</th>
			  		<th style="text-align: center;"><?php echo $countSP; ?></th>
			  		<th style="text-align: right;"><?php echo number_format($row['tongtien']); ?>&nbsp;VNĐ &nbsp; &nbsp; </th>
			  	</tr>
			</tbody>
		</table>
	</div>
</div>
<?php
		}
	}
?>