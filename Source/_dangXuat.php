<?php
	if(isset($_SESSION['name'])){
		session_destroy();
	}
	else if(isset($_COOKIE['name'])){
		setcookie('name',"",time()-3600*3,"/");
		setcookie('quyen',"",time()-3600*3,"/");
		session_destroy();
	}
	echo "<meta http-equiv=\"refresh\" content=\"0;index.php\">";
?>