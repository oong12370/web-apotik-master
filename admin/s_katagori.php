<?php
include "../temp/koneksi.php";

if (isset($_POST['Input'])) {
	$kd_katagori 	 = addslashes (strip_tags ($_POST['kd_katagori']));
	$nm_katagori = addslashes (strip_tags ($_POST['nm_katagori']));
	$kd_admin = addslashes (strip_tags ($_POST['kd_admin']));
		
	//insert ke tabel
	$query = "INSERT INTO tbl_katagori VALUES('$kd_katagori','$nm_katagori','$kd_admin')";
	$sql = mysql_query ($query) or die (mysql_error());
	if ($sql) {
		header("location:index.php?page=input_katagori");	
	} else {
		echo "<font color=red>Data Obat gagal ditambahkan</font>";	
	}
}
?>