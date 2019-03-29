<?php
if(isset($_GET['page'])){
	$page=$_GET['page'];	
	$file="$page.php";
	
	if (!file_exists($file)){
		include ("temp/halaman.php");
	}else{
		include ("$page.php");
	}
}else{
	include ("temp/halaman.php");
}


?>
