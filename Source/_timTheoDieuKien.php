<form action="" method="get" accept-charset="utf-8">
		  <div class="input-group input-group-sm col-xs-3">
      <input type="hidden" name="act" value="timkiem">
     		<div class="input-group-btn">
        		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
        		<ul class="dropdown-menu">
          			<li><a><b>Hãng:</b> &nbsp; &nbsp; 
          				<label class="radio-inline"><input name="hang" checked="checked" value="" type="radio">Tất cả</label> 
						<?php  
  							$rs= ConnectQuery("select distinct hangsx from san_pham order by hangsx");
  							$i=1;
              while ($row=$rs->fetch_assoc()) {
                if($i%7==0 && $i!=0)
                  echo "</a></li><a><li>";
                $a=$row["hangsx"];
                $i+=1;
  						?>
    					<label class="radio-inline"><input name="hang" value="<?php echo $a; ?>" type="radio"><?php echo $a; ?></label> 
    					<?php
  							}
  						?>
    				</a></li>
          			<li><a><b>Giá cả:</b>&nbsp; &nbsp; 
          				<input type="number" name="tu" value="10" max="1000" min="10" step="5" placeholder="giá từ"> 00,000 VNĐ - <input type="number" name="den" value="1000" max="1000" min="10" step="5"  placeholder="giá đến"> 00,000, VNĐ
          			</a></li>
          			<li><a><b>Thiết kế card đồ họa:</b>&nbsp; &nbsp; 
          				<label class="radio-inline"><input name="dohoa" checked="checked" value="" type="radio">Tất cả</label> 
						<?php
  							$rs= ConnectQuery("select distinct thietke from cart_man_hinh");
                $i=1;
  							while ($row=$rs->fetch_assoc()) {
                  if($i%5==0 && $i!=0)
                    echo "</a></li><a><li>";
  								$a=$row["thietke"];
                  $i+=1;
  						?>
    					<label class="radio-inline"><input name="dohoa" value="<?php echo $a; ?>" type="radio"><?php echo $a; ?></label> 
    					<?php
  							}
  						?>
          			</a></li>
          			<li><a><b>Dung lượng ram:</b>&nbsp; &nbsp; 
						<label class="radio-inline"><input name="ram" checked="checked" value="" type="radio">Tất cả</label> 
					<?php  
					  	$rs= ConnectQuery("select DISTINCT san_pham.ramdungluong FROM san_pham ORDER BY san_pham.ramdungluong");
              $i=1;
					  	while ($row=$rs->fetch_assoc()) {
                if($i%5==0 && $i!=0)
                  echo "</a></li><a><li>";
					  		$a=$row["ramdungluong"];
                $i+=1;
					?>
					  	<label class="radio-inline"><input name="ram" value="<?php echo $a; ?>" type="radio"><?php echo $a; ?> GB</label> 
					<?php
						}
					?>
          			</a></li>
          				<li><a><b>CPU:</b>&nbsp; &nbsp; 
						<label class="radio-inline"><input name="cpu" checked="checked" value="" type="radio">Tất cả</label> 
					<?php  
						$i=1;
					  	$rs= ConnectQuery("select DISTINCT cpu.congnghe FROM cpu");
					  	while ($row=$rs->fetch_assoc()) {
					  		if($i%5==0 && $i!=0)
					  			echo "</a></li><a><li>";
					  		$a=$row["congnghe"];
					?>
					  	<label class="radio-inline"><input name="cpu" value="<?php echo $a; ?>" type="radio"><?php echo $a; ?></label> 
					<?php
								$i+=1;
						}
					?>
          			</a></li>
        	</ul>
      		</div><input type="text" name="key" class="form-control" placeholder="Hãy nhập thông tin muốn tìm" size="20">
     		  <div class="input-group-btn">
        		<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      		</div>
    	</div>
  		</form>