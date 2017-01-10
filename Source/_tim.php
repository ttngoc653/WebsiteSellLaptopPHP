<div class="panel panel-default" style="opacity: 0.9">
	<div class="panel-heading">
    	<h3 class="panel-title" style="font: arial;">SẢN PHẨM TÌM KIẾM ĐƯỢC</h3>
  	</div>
  	<div class="panel-body">
    	<?php 
		$tensp="";
		if(isset($_GET['key'])){
			$tensp=$_GET['key'];
		}

		$hang="";
		if(isset($_GET['hang'])){
			$hang=$_GET['hang'];
		}

		$giatu=0;
		$giaden=1000000000;
		if(isset($_GET['tu'])){
			$giatu=$_GET['tu'];
		}
		if(isset($_GET['den'])){
			$giaden=$_GET['den'];
		}

		$cpu="";
		if(isset($_GET['cpu'])){
			$cpu=$_GET['cpu'];
		}
			
			$dohoa="";
		if(isset($_GET['dohoa'])){
			$dohoa=$_GET['dohoa'];
		}

		$ram="";
		if(isset($_GET['ram'])){
			$ram=$_GET['ram'];
		}

		$hdh="";
		if(isset($_GET['hdh'])){
			$hdh=$_GET['hdh'];
		}

		$rom="";
		if(isset($_GET['rom'])){
			$rom=$_GET['rom'];
		}

        //echo "select * from cpu,san_pham where san_pham.loaicpu like cpu.loai and san_pham.tensp like '%".$tensp."%' and san_pham.hangsx like '%".$hang."%' and hdh like '%".$hdh."%' and san_pham.gia BETWEEN '".$giatu."' AND '".$giaden."' and ramdungluong like '%".$ram."%' and san_pham.masp in(SELECT o_dia_cung.masp from o_dia_cung GROUP BY o_dia_cung.masp HAVING sum(o_dia_cung.dungluong) like '%".$rom."%') AND san_pham.loaicpu in (SELECT cpu.loai FROM cpu WHERE cpu.congnghe like '%".$cpu."%') and san_pham.tencartmanhinh in (SELECT cart_man_hinh.tencart FROM cart_man_hinh WHERE cart_man_hinh.thietke like '%".$dohoa."%')";
		$rs=ConnectQuery("select * from cpu,san_pham where san_pham.loaicpu like cpu.loai and san_pham.tensp like '%".$tensp."%' and san_pham.hangsx like '%".$hang."%' and hdh like '%".$hdh."%' and san_pham.gia BETWEEN '".$giatu."' AND '".$giaden."' and ramdungluong like '%".$ram."%' and san_pham.masp in(SELECT o_dia_cung.masp from o_dia_cung GROUP BY o_dia_cung.masp HAVING sum(o_dia_cung.dungluong) like '%".$rom."%') AND san_pham.loaicpu in (SELECT cpu.loai FROM cpu WHERE cpu.congnghe like '%".$cpu."%') and san_pham.tencartmanhinh in (SELECT cart_man_hinh.tencart FROM cart_man_hinh WHERE cart_man_hinh.thietke like '%".$dohoa."%')");
		if($rs->num_rows==0)
			echo "<p>CHÉ ƠI LOẠI NÀY KHÔNG CÓ TRONG DỮ LIỆU CỦA TUI ÒI!</p><p>CHÉ THÔNG CẢM NHÉ!!!</p>";
		while ($row=$rs->fetch_assoc()) {
				?><div style="border: outset; margin: 5px;float: left;width: 150px;height: 200px; text-align: center;border-radius: 10px;">
				<a href="index.php?act=chitiet&masp=<?php echo $row['masp']; ?>">
					<img width="120px" height="120px" src="./image/<?php echo $row['masp']."/".$row['icon']; ?>"/>
					<div style="font: bold 14px arial;color: #f39;margin-top: 2px;"><?php echo $row['hangsx']."<br/>".$row['tensp']; ?></div>
					<div style="font:bold 12px arial;color: #f30;">Giá: <?php echo number_format($row["gia"]); ?> VNĐ</div>
				</a>
				<?php 
					if(isset($role)&&laySoLuongHienTai($row['masp'])>0) echo "<a href=\"".$_SERVER["REQUEST_URI"]."&gio=".$row['masp']."\"><button style=\"height: 20px; background-color: #E6E6E6;color: blue;border-radius: 5px;\">Thêm vào giỏ</button></a>"; 
				?>
                </div>
			<?php 
				}
		?>
  		</div>
	</div>
	