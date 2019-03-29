<?php
$kd_obat = $_POST['kd_obat'];
include '../temp/koneksi.php';
//ambil data di tabel daftar nis tersebut
$query = "SELECT * FROM tbl_obat WHERE kd_obat='$kd_obat' ";
$rs = mysql_query($query) or die (mysql_error());
$data = mysql_fetch_array($rs);
//ubah array data menjadi JSON
echo json_encode($data);
?>
