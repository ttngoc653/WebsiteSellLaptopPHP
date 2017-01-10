<?php
	ob_start();
	if(isset($_SESSION['name'])){
		session_destroy();
	}
	if(isset($_COOKIE['name'])){
		setcookie('name',"",time()-3600*3,"/");
		setcookie('quyen',"",time()-3600*3,"/");
		session_destroy();
	}
	unset($role);
	echo "<meta http-equiv=\"refresh\" content=\"0;index.php\">";
?>