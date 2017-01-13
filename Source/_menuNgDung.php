<div class="main_menu">
	<dl>
 		<dt><a href="" title=""><button style="width: 150px;">HÃNG SẢN XUẤT</button></a>
 			<dl style="width: 150px;">
 			<?php  
			  	$rs= ConnectQuery("select distinct hangsx from san_pham order by hangsx");
			  	while ($row=$rs->fetch_assoc()) {
			  		$a=$row["hangsx"];
			?>
					<dt><a href="index.php?act=timkiem&hang=<?php echo $a; ?>"><?php echo $a; ?></a></dt>
			<?php } ?>
 			</dl>
 		</dt>
 		<dt><a href="" title=""><button style="width: 200px;">GIÁ SẢN PHẨM</button></a>
 			<dl>
 				<dt><a href="index.php?act=timkiem&tu=0&den=50" title="">nhỏ hơn 5 triệu đồng</a></dt>
 				<dt><a href="index.php?act=timkiem&tu=50&den=80" title="">từ hơn 5 đến 8 triệu đồng</a></dt>
 				<dt><a href="index.php?act=timkiem&tu=80&den=110" title="">từ hơn 8 - 11 triệu đồng</a></dt>
 				<dt><a href="index.php?act=timkiem&tu=110&den=140" title="">từ hơn 11 - 14 triệu đồng</a></dt>
 				<dt><a href="index.php?act=timkiem&tu=140&den=170" title="">từ hơn 14 - 17 triệu đồng</a></dt>
 				<dt><a href="index.php?act=timkiem&tu=170&den=200" title="">từ hơn 17 - 20 triệu đồng</a></dt>
 				<dt><a href="index.php?act=timkiem&tu=200&den=230" title="">từ hơn 20 - 23 triệu đồng</a></dt>
 				<dt><a href="index.php?act=timkiem&tu=230&den=260" title="">từ hơn 23 - 26 triệu đồng</a></dt><dt><a href="index.php?act=timkiem&tu=26&den=1000" title="">hơn 26 triệu đồng</a></dt>
 			</dl>
 		</dt>
 		<dt><a href="" title=""><button style="width: 150px;">LOẠI CPU</button></a>
 			<dl style="width: 150px;">
	  <?php  
	  	$rs= ConnectQuery("select distinct congnghe from cpu where loai in (select loaicpu from san_pham) order by congnghe");
	  	while ($row=$rs->fetch_assoc()) {
	  		$a=$row["congnghe"];
	  ?>
	  	<dt><a href="index.php?act=timkiem&cpu=<?php echo $a; ?>"><?php echo $a; ?></a></dt>
	  <?php } ?>
 				
 			</dl>
 		</dt>
 		<dt><a href="" title=""><button style="width: 220px;">BỘ NHỚ TRONG CỦA MÁY</button></a>
 			<dl style="margin-left: 60px;width: 100px;">		
	  <?php  
	  	$rs= ConnectQuery("select distinct sum(dungluong) rom FROM o_dia_cung GROUP BY masp ORDER BY SUM(dungluong)");
	  	while ($row=$rs->fetch_assoc()) {
	  		$a=$row["rom"];
	  ?>
	  	<dt><a href="index.php?act=timkiem&rom=<?php echo $a; ?>"><?php echo $a; ?> GB</a></dt>
	  <?php
	  	}
	  ?>
 			</dl>
 		</dt>
 		<?php if(!isset($_SESSION['name'])){ ?>
 		<dt><a><button style="width: 304px;"></button></a></dt><?php }
 		else{ ?>
 		<dt><a href="index.php?act=giohang"><button style="width: 152px;">GIỎ HÀNG</button></a></dt>
 		<dt>
 		<a href="index.php?act=qldonhang"><button style="width: 152px;">LỊCH SỬ MUA</button></a></dt><?php } ?>
 	</dl>
</div>