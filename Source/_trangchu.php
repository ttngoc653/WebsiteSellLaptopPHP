<?php include_once ('./hamKetNoiCSDL.php'); ?>
<div style="background-color: #c9e1e3;opacity: 0.9;border-radius: 16px">
	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title" style="font: arial;">TOP 10 SẢN PHẨM MỚI NHẤT</h3>
  		</div>
  		<div class="panel-body">
    		<?php $rs=ConnectQuery("select * from san_pham order by masp desc limit 10");
    		while ($row=$rs->fetch_assoc()) {
    				?><div style="border: outset; margin: 5px;float: left;width: 150px;text-align: center;border-radius: 10px;">
				<a href="index.php?act=chitiet&masp=<?php echo $row['masp']; ?>">
					<img width="120px" height="120px" src="./image/<?php echo $row['masp']."/".$row['icon']; ?>"/>
					<div style="font: bold 14px arial;color: #f39;margin-top: 2px;"><?php echo $row['hangsx']."<br/>".$row['tensp']; ?></div>
					<div style="font:bold 12px arial;color: #f30;">Giá: <?php echo number_format($row["gia"]); ?> VNĐ</div>
				</a>
				<?php 
					if(isset($role)) echo "<a href=\"".$_SERVER["REQUEST_URI"]."?gio=".$row['masp']."\"><button style=\"height: 20px; background-color: #E6E6E6;color: blue;border-radius: 5px;\">Thêm vào giỏ</button></a>"; 
				?>
				</div>
			<?php 
				}
    		?>
  		</div>
	</div>
	<div class="panel panel-default">
  		<div class="panel-heading" style="font:arial;">
    		<h3 class="panel-title">TOP 10 SẢN PHẨM BÁN CHẠY NHẤT</h3>
  		</div>
  		<div class="panel-body">
    		<?php $rs=ConnectQuery("select san_pham.masp,san_pham.tensp,san_pham.hangsx,san_pham.gia,san_pham.icon,sum(chi_tiet_don_hang.soluongsp) FROM san_pham,chi_tiet_don_hang WHERE san_pham.masp=chi_tiet_don_hang.masp GROUP BY san_pham.masp order by sum(soluongsp) desc LIMIT 10");
    		while ($row=$rs->fetch_assoc()) {
    				?><div style="border: outset; margin: 5px;float: left;width: 150px;text-align: center;border-radius: 10px;">
				<a href="index.php?act=chitiet&masp=<?php echo $row['masp']; ?>">
					<img width="120px" height="120px" src="./image/<?php echo $row['masp']."/".$row['icon']; ?>"/>
					<div style="font: bold 14px arial;color: #f39;margin-top: 2px;"><?php echo $row['hangsx']."<br/>".$row['tensp']; ?></div>
					<div style="font:bold 12px arial;color: #f30;">Giá: <?php echo number_format($row["gia"]); ?> VNĐ</div>
				</a>
				<?php 
					if(isset($role)) echo "<a href=\"".$_SERVER["REQUEST_URI"]."?gio=".$row['masp']."\"><button style=\"height: 20px; background-color: #E6E6E6;color: blue;border-radius: 5px;\">Thêm vào giỏ</button></a>"; 
				?>
				</div>
			<?php 
				}
    		?>
  		</div>
	</div>
	<div class="panel panel-default">
  		<div class="panel-heading" style="font:arial;">
    		<h3 class="panel-title">TOP 10 SẢN PHẨM ĐƯỢC XEM NHIỀU NHẤT</h3>
  		</div>
  		<div class="panel-body">
    		<?php $rs=ConnectQuery("select * from san_pham order by luotview desc limit 10");
    			while ($row=$rs->fetch_assoc()) {
    				?><div style="border: outset; margin: 5px;float: left;width: 150px;text-align: center;border-radius: 10px;">
				<a href="index.php?act=chitiet&masp=<?php echo $row['masp']; ?>">
					<img width="120px" height="120px" src="./image/<?php echo $row['masp']."/".$row['icon']; ?>"/>
					<div style="font: bold 14px arial;color: #f39;margin-top: 2px;"><?php echo $row['hangsx']."<br/>".$row['tensp']; ?></div>
					<div style="font:bold 12px arial;color: #f30;">Giá: <?php echo number_format($row["gia"]); ?> VNĐ</div>
					<div>Lượt xem: <?php echo $row['luotview']; ?></div>
				</a>
					<?php 
						if(isset($role)) echo "<a href=\"".$_SERVER["REQUEST_URI"]."?gio=".$row['masp']."\"><button style=\"height: 20px; background-color: #E6E6E6;color: blue;border-radius: 5px;\">Thêm vào giỏ</button></a>"; 
					?>
					</div>
			<?php 
				}
    		?>
  		</div>
	</div>
</div>