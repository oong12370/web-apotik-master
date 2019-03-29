<?php
include "../temp/koneksi.php";

if (isset($_POST['Input'])) {
	$kd_obat 	 = addslashes (strip_tags ($_POST['kd_obat']));
	$nm_obat = addslashes (strip_tags ($_POST['nm_obat']));
	$kd_katagori = addslashes (strip_tags ($_POST['kd_katagori']));
	$kd_admin = addslashes (strip_tags ($_POST['kd_admin']));
	$tgl_ex = addslashes (strip_tags ($_POST['tgl_ex']));
	$harga = addslashes (strip_tags ($_POST['harga']));
	$stok = addslashes (strip_tags ($_POST['stok']));
	$tgl  = $_POST['tgl'];
	
	//insert ke tabel
	$query = "INSERT INTO tbl_obat VALUES('$kd_obat','$nm_obat','$kd_katagori','$kd_admin','$tgl','$tgl_ex','$harga','$stok')";
	$sql = mysql_query ($query) or die (mysql_error());
	if ($sql) {
		header("location:index.php?page=input_obat");	
	} else {
		echo "<font color=red>Data Obat gagal ditambahkan</font>";	
	}
}
?>
