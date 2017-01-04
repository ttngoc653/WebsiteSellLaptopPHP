<?php require_once './hamKetNoiCSDL.php'; ?>

<div class="list-group">
  <a href="#" class="list-group-item list-group-item-success" onclick="">
    <b>HÃNG</b>
  </a>
  <?php  
  	$rs= ConnectQuery("select distinct hangsx from san_pham order by hangsx");
  	while ($row=$rs->fetch_assoc()) {
  		$a=$row["hangsx"];
  ?>
  	<a href="index.php?hd=xemdssp&hang=<?php echo $a; ?>" class="list-group-item"><?php echo $a; ?></a>
  <?php
  	}
  ?>
</div>

<div class="list-group">
  <a href="#" class="list-group-item list-group-item-success" onclick="">
    <b>CPU</b>
  </a>
  <?php  
  	$rs= ConnectQuery("select distinct congnghe from cpu where loai in (select loaicpu from san_pham) order by congnghe");
  	while ($row=$rs->fetch_assoc()) {
  		$a=$row["congnghe"];
  ?>
  	<a href="index.php?hd=xemdssp&cpu=<?php echo $a; ?>" class="list-group-item"><?php echo $a; ?></a>
  <?php
  	}
  ?>
</div>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-success" onclick="">
    <b>LƯỢNG RAM</b>
  </a>
  <?php  
  	$rs= ConnectQuery("select DISTINCT san_pham.ramdungluong FROM san_pham ORDER BY san_pham.ramdungluong");
  	while ($row=$rs->fetch_assoc()) {
  		$a=$row["ramdungluong"];
  ?>
  	<a href="index.php?hd=xemdssp&ram=<?php echo $a; ?>" class="list-group-item"><?php echo $a; ?> GB</a>
  <?php
  	}
  ?>
</div>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-success" onclick="">
    <b>HỆ ĐIỀU HÀNH</b>
  </a>
  <?php  
  	$rs= ConnectQuery("select distinct hdh from san_pham order by hdh");
  	while ($row=$rs->fetch_assoc()) {
  		$a=$row["hdh"];
  ?>
  	<a href="index.php?hd=xemdssp&hdh=<?php echo $a; ?>" class="list-group-item"><?php echo $a; ?></a>
  <?php
  	}
  ?>
</div>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-success" onclick="">
    <b>BỘ NHỚ MÁY</b>
  </a>
  <?php  
  	$rs= ConnectQuery("select distinct sum(dungluong) rom FROM o_dia_cung GROUP BY masp ORDER BY SUM(dungluong)");
  	while ($row=$rs->fetch_assoc()) {
  		$a=$row["rom"];
  ?>
  	<a href="index.php?hd=xemdssp&hdh=<?php echo $a; ?>" class="list-group-item"><?php echo $a; ?> GB</a>
  <?php
  	}
  ?>
</div>