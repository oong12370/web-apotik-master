<?php
require_once "../temp/koneksi.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select kd_obat,nm_obat, harga from tbl_obat where nm_obat LIKE '%$q%' or kd_obat LIKE '%$q%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['kd_obat'] . " - " . $rs['nm_obat']. " - " . $rs['harga'];
	echo "$cname\n";
}
?>