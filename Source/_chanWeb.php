<div>
	<?php 
		echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; 
		if(isset($role)) echo "<a href=\"".$_SERVER["REQUEST_URI"]."&gio="."\"><button style=\"height: 20px; background-color: #E6E6E6;color: blue;border-radius: 5px;\">Thêm vào giỏ</button></a>";
	?>
</div>