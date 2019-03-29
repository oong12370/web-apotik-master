<?php
include "../temp/koneksi.php";

if (isset($_POST['Input'])) {
	$kd_konsumen 	 = addslashes (strip_tags ($_POST['kd_konsumen']));
	$nm_konsumen = addslashes (strip_tags ($_POST['nm_konsumen']));
	$kd_admin = addslashes (strip_tags ($_POST['kd_admin']));
	$tgl_k = addslashes (strip_tags ($_POST['tgl_k']));
	$jekel = addslashes (strip_tags ($_POST['jekel']));
	$alamat = addslashes (strip_tags ($_POST['alamat']));
	$telp = addslashes (strip_tags ($_POST['telp']));
	$keluhan = addslashes (strip_tags ($_POST['keluhan']));
	
	//simpan data ke tabel konsumen
	$query = "INSERT INTO tbl_konsumen VALUES('$kd_konsumen','$nm_konsumen','$kd_admin','$tgl_k','$jekel','$alamat','$telp','$keluhan')";
	$sql = mysql_query ($query) or die (mysql_error());
	if ($sql) {
			header("location:index.php?page=input_konsumen");	
	} else {
		echo "<font color=red>Data Konsumen gagal ditambahkan</font>";	
	}
}
?>