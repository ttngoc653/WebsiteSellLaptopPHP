<?php require_once './hamKetNoiCSDL.php'; 

$rr=ConnectQuery("select * from san_pham where masp=29");
	while($row=$rr->fetch_assoc()){
		$view=$row['luotview']+1;
		$rs=ConnectQuery("update san_pham set luotview=$view where masp=29");
	}
$rr=ConnectQuery("select * from san_pham where masp=29");
	while($row=$rr->fetch_assoc()){
?>

<div class="container">
	                  
	<H1>Thông tin sản phẩm:</H1>                     

 		  <div class="col-md-4">
          		<img src="https://cdn.tgdd.vn/Products/Images/44/76031/acer-es1-431-n3060-4gb-500gb-win10-400x400.png" width="100%" />     
          </div>
		  <div class="col-md-1"></div>
		  
          <div class="col-md-3">
    	<form class="form-horizontal" action="index.html" method="POST">
        <div class="form-group">
          			<label for="DGSP" class="control-label"><?php echo $row['hangsx']." ".$row['tensp']; ?></label>
                    
							<div class="form-group">
							<label for="SoLuongBan" class="col-sm-6 control-label">Số lượng bán:</label>
									
							</div>
							<div class="form-group">
							<label for="SoLuongXem" class="col-sm-6 control-label">Số lượng xem: <?php echo $row['luotview'];?></label>
									
							</div>
							<div class="form-group">
							<label for="SoLuongDat" class="col-sm-6 control-label">Số lượng đặt:</label>
									<input type="text" class="form-control" id="SoLuongDat">
							</div>

							
						</div>
                    <div class="form-group">
							<button type="submit" class="btn btn-success">
								<i class="fa fa-check"></i>Thêm vào giỏ hàng                              
							</button>
					
					</div>
                    
                </div> 
          </form>
          </div>
        
	<h2>Hình ảnh sản phẩm</h2>	
		
		    <div class="col-sm-0"> </div>
			<div class="col-sm-12 body">
		<div class="col-sm-12 image-run" style="text-align:left">
			<img style="width:250px;height:250px;" src="imgs/1.jpg" id="photo">
		</div>
			
		<div class="col-sm-12">
			<img style="width:100px;height:100px" onclick="img1()" class="img-change" id="1" src="imgs/1.jpg">
			<img style="width:100px;height:100px" onclick="img2()" class="img-change" id="2" src="imgs/2.jpg">
			<img style="width:100px;height:100px" onclick="img3()" class="img-change" id="3" src="imgs/3.jpg">
			<img style="width:100px;height:100px" onclick="img4()" class="img-change" id="4" src="imgs/4.jpg">
		</div>
    </div>
		<script>
			var temp=1;

			var flag=1;
				function img1()
				{
					var x=document.getElementById("photo")
					if(x)
					{
						x.src="imgs/1.jpg"
					}
				}
				function img2()
				{
					var x=document.getElementById("photo") 
					if(x)
					{
						x.src="imgs/2.jpg"
					}
				}
				function img3()
				{
					var x=document.getElementById("photo") 
					if(x)
					{
						x.src="imgs/3.jpg"
					}
				}
				function img4()
				{
					var x=document.getElementById("photo") 
					if(x)
					{
						x.src="imgs/4.jpg"
					}
				}
				function img5()
				{
					var x=document.getElementById("photo") 
					if(x)
					{
						x.src="imgs/5.jpg"
					}
				}
				function img6()
				{
					var x=document.getElementById("photo") 
					if(x)
					{
						x.src="imgs/6.jpg"
					}
				}
				function run()
				{
					var x=document.getElementById("photo");
					inter=setInterval(function()
								{
									x.src="imgs/"+temp+".jpg";
									temp=temp+1;
									if(temp>6)
									{
										temp=1;
									}
								},1000)
				}
				function runimg()
				{
					if(flag!==0)
					{
						flag=0;
						var y=document.getElementById("play");
						if(y)
						{
							y.src="imgs/Stop-Pressed-Blue-icon.png"
						}
						run();
					}
					else if(flag==0)
					{
						flag=1;
						var y=document.getElementById("play");
						if(y)
						{
							y.src="imgs/Play-Pressed-icon.png"
						}
						stop();
					}
				}
				function stop()
				{
					clearInterval(inter);
				}
</script>
      
		
		
		
		
<div class="col-md-12">
  <h2>Thông số sản phẩm</h2>
           
  <table class="table">
   <thead>
   		
      <tr>
        <th>Bộ xử lý</th>
        <th></th>
      </tr>

	   <?php 
	   //echo "select * from cpu where loai = '".$row['loaicpu']."'";
	   $as=ConnectQuery("select * from cpu where loai = '".$row['loaicpu']."'");
	   while($asrow=$as->fetch_assoc()) { ?>
    </thead>
    <tbody>
      <tr>
        <td>Hãng CPU</td>
        <td><?php echo $asrow['hangsx']; ?></td>
      </tr>
      <tr>
        <td>Công nghệ CPU</td>
        <td><?php echo $asrow['congnghe']; ?></td>
      </tr>
      <tr>
        <td>Loại CPU</td>
        <td><?php echo $row['loaicpu']; ?></td>
      </tr>
       <tr>
        <td>Tốc độ CPU</td>
        <td><?php echo $asrow['tocdo']; ?> GHz</td>
      </tr>
       <tr>
        <td>Bộ nhớ đệm</td>
        <td><?php echo $asrow['thongtinbodem']; ?></td>
      </tr>
       <tr>
        <td>Tốc độ tối đa</td>
        <td><?php echo $asrow['tocdotoida']; ?> GHz</td>
      </tr>
    </tbody>
    <?php } ?>
    <thead>
      <tr>
        <th>Bộ nhớ</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>RAM</td>
        <td><?php echo $row['ramdungluong'];?></td>
      </tr>
      <tr>
        <td>Loại RAM</td>
        <td><?php echo $row['ramloai'];?></td>
      </tr>
      <tr>
        <td>Tốc độ Bus</td>
        <td><?php echo $row['rambus'];?></td>
      </tr>
    </tbody>
    <thead>
      <tr>
        <th>Đĩa cứng</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Loại ổ đĩa</td>
        <td> odia...</td>
      </tr>
      <tr>
        <td>Ổ cứng</td>
        <td>...</td>
      </tr>

       <thead>
      <tr>
        <th>Màn hình</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Kích thước màn hình</td>
        <td><?php echo $row['kichthuocmh'];?> inch</td>
      </tr>
      <tr>
        <td>Độ phân giải (W x H)</td>
        <td><?php echo $row['dophangiai'];?></td>
      </tr>
      <tr>
        <td>Công nghệ màn hình</td>
        <td><?php echo $row['cnmanhinh'];?></td>
      </tr>
      <tr>
        <td>Màn hình cảm ứng</td>
        <td><?php echo $row['manhinhcamung'];?></td>
        <td></td>
      </tr>
    </tbody>

 <thead>
      <tr>
        <th>Đồ họa</th>
        <th></th>
      </tr>

      <?php 
     //echo "select * from cpu where loai = '".$row['loaicpu']."'";
     $cs=ConnectQuery("select * from cart_man_hinh where tencart = '".$row['tencartmanhinh']."'");
     while($csrow=$cs->fetch_assoc()) { ?>
    </thead>
    <tbody>
      <tr>
        <td>Chipset đồ họa</td>
        <td><?php echo $csrow['tencart']; ?></td>
        
      </tr>
      <tr>
        <td>Bộ nhớ đồ họa</td>
        <td><?php echo $csrow['dungluong']; ?></td>
      </tr>
      <tr>
        <td>Thiết kế card</td>
        <td><?php echo $csrow['thietke']; ?></td>
      </tr>
    </tbody>
    <?php } ?>

 <thead>
      <tr>
        <th>Âm thanh</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Kênh âm thanh & Thông tin thêm </td>
        <td><?php echo $row['congngheamthanh'];?></td>
      </tr>
    </tbody>    

 	<thead>
      <tr>
        <th>Đĩa quang</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Có sẳn đĩa quang</td>
        <td><?php echo $row['oquang'];?></td>
      </tr>
      <tr>
        <td>Loại đĩa quang</td>
        <td><?php echo $row['oquang'];?></td>
      
      </tr>
    </tbody>

 <thead>
      <tr>
        <th>Tính năng mở rộng & Cổng giao tiếp</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Cổng giao tiếp</td>
        <td><?php echo $row['dhmi']." ".$row['ketnoikhac']; ?></td>
      </tr>
      <tr>
        <td>Tính năng mở rộng</td>
        <td><?php echo $row['morong'];?></td>
      </tr>
    </tbody>
    
 <thead>
      <tr>
        <th>Giao tiếp mạng</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>LAN</td>
        <td><?php echo $row['lan'];?></td>
      </tr>
      <tr>
        <td>Chuẩn Wifi</td>
        <td><?php echo $row['wifi'];?></td>
      </tr>
      <tr>
        <td>Kết nối không dây</td>
        <td><?php echo $row['bluetooth'];?></td>
      </tr>
    </tbody>
    
 	<thead>
      <tr>
        <th>Card Reader</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Đọc thẻ nhớ</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Khe đọc thẻ nhớ</td>
        <td>...</td>
      </tr>
    </tbody>
    
 <thead>
      <tr>
        <th>Webcam</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Độ phân giải WC</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Thông tin thêm</td>
        <td>...</td>
      </tr>
    </tbody>
    
 <thead>
      <tr>
        <th>PIN/Battery</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Thông tin Pin</td>
        <td><?php echo $row['pin']; ?></td>
      </tr>
    </tbody> 
    
    
 <thead>
      <tr>
        <th>Hệ điều hành, phần mềm sẵn có/OS</th>
        <th></th>
       </tr>
    </thead>
    <tbody>
      <tr>
        <td>Hệ điều hành</td>
        <td><?php echo $row['hdh']; ?></td>
      </tr>
      <tr>
        <td>Phần mềm có sẳn</td>
        <td><?php echo $row['an']; ?></td>
      </tr>
    </tbody>
    
    
 <thead>
      <tr>
        <th>Kích thước & Trọng lượng</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Kích thước</td>
        <td><?php echo $row['dai']." x ".$row['rong']." x ".$row['day']; ?></td>
      </tr>
      <tr>
        <td>Trọng lượng (kg)</td>
        <td><?php echo $row['khoiluong']; ?> Kg</td>
      </tr>
      <tr>
        <td>Chất liệu</td>
        <td><?php echo $row['chatlieu']; ?></td>
      </tr>
    </tbody>    
</table>
</div>
	<?php } ?>