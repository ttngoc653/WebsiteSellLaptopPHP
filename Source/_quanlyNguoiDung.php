<?php if (!isset($_SESSION['quyen'])) {
			echo "<script type=\"text/javascript\" charset=\"utf-8\" async defer>window.history.back(); </script>";
		}
		if ($_SESSION['quyen']==0) {
			echo "<script type=\"text/javascript\" charset=\"utf-8\" async defer>window.history.back(); </script>";
		}
		if(isset($_GET['doiquyen'])){
			doiQuyenNgdung($_GET['doiquyen']);
			echo "<script type=\"text/javascript\" charset=\"utf-8\" async defer>window.history.back(); </script>";
		}
?>

<div class="panel panel-default" style="opacity: 0.9">
	<div class="panel-heading" style="font-size: 20px;font-weight: bold;color: brown;text-align: center;">
		QUẢN LÝ NGƯỜI DÙNG
	</div>
	<div class="panel-body">
		<p style="color: red"><i>ghi chú: có màu là quyền quản lý</i></p>
		<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th width="200px" style="text-align: center;">TÊN ĐĂNG NHẬP <br/>HỌ TÊN NGƯỜI DÙNG</th>
					<th width="200px" style="text-align: center;">NGÀY SINH <br/>GIỚI TÍNH</th>
					<th width="200px" style="text-align: center;">EMAIL<br/>ĐIỆN THOẠI</th>
					<th width="200px" style="text-align: center;">ĐỔI QUYỀN</th>
				</tr>
			</thead>
<?php
	$rs=ConnectQuery("select * from nguoi_dung");
	while($row=$rs->fetch_assoc()){
?>
			<tbody>
				<tr style="background-color: <?php echo $row['quyen']==1?"#9f6":""; ?>;">
					<td style="text-align: center;"><?php echo $row['tendn']."<br/>".$row['hoten']; ?></td>
					<td style="text-align: center;"><?php echo $row['ngsinh']."<br/>".$row['gioitinh']; ?></td>
					<td style="text-align: center;"><?php echo $row['email']."<br/>".$row['sdt']; ?></td>
					<td style="text-align: center;"><a href="index.php?act=qlngdung&doiquyen=<?php echo $row['tendn']; ?>" title="">ĐỔI QUYỀN</a></td>
				</tr>
			</tbody>
<?php } ?>
		</table>
		</div>
	</div>
</div>