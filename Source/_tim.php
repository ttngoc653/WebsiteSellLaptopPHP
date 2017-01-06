	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title" style="font: arial;">SẢN PHẨM TÌM KIẾM ĐƯỢC</h3>
  		</div>
  		<div class="panel-body">
    		<?php 
    		$tensp="";
    		if(isset($_GET[''])){
    			$tensp=$_GET[''];
    		}

    		$hang="";
    		if(isset($_GET['hang'])){
    			$hang=$_GET['hang'];
    		}

    		$giatu=0;
    		$giaden=1000000000;
    		if(isset($_GET['giatu'])){
    			$giatu=$_GET['giatu'];
    		}
    		if(isset($_GET['giaden'])){
    			$giaden=$_GET['giaden'];
    		}

    		$cpu="";
    		if(isset($_GET['cpu'])){
    			$cpu=$_GET['cpu'];
    		}
			
			$dvd="";
    		if(isset($_GET['oquang'])){
    			$dvd=$_GET['oquang'];
    		}

    		$ram="0";
    		if(isset($_GET['ram'])){
    			$ram=$_GET['ram'];
    		}

    		$hdh="";
    		if(isset($_GET['hdh'])){
    			$hdh=$_GET['hdh'];
    		}

    		$rom="0";
    		if(isset($_GET['rom'])){
    			$rom=$_GET['rom'];
    		}
    		$rs=ConnectQuery("select * from san_pham,cpu where tansp like san_pham.tensp like '%".$tensp."%' and san_pham.hangsx like '".$hangsx."' and ");
    		while ($row=$rs->fetch_assoc()) {
    				?><div style="border: outset; margin: 5px;float: left;width: 150px;text-align: center;">
				<a href="index.php?act=chitiet&masp=<?php echo $row['san_pham.masp']; ?>">
					<img width="120px" height="120px" src="./image/<?php echo $row['san_pham.masp']."/".$row['san_pham.icon']; ?>"/>
					<div style="font: bold 14px arial;color: #f39;margin-top: 2px;"><?php echo $row['san_pham.hangsx']."<br/>".$row['san_phamtensp']; ?></div>
					<div style="font:bold 12px arial;color: #f30;">Giá: <?php echo number_format($row["san_pham.gia"]); ?> VNĐ</div>
				</a>
				<div style="font:italic bold 12px arial;margin-right: 30px;	margin-bottom: 10px;color:blue;	text-align: center;">
					<?php if(isset($role)) echo "<input style=\"border-width: 0px;\" type=\"submit\" name=\"them\" value=\"Thêm vào giỏ\">"; ?>
				</div>
						</div>
			<?php 
				}
    		?>
  		</div>
	</div>
	