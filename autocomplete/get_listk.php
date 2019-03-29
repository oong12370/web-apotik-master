<?php
require_once "../temp/koneksi.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select kd_konsumen,nm_konsumen from tbl_konsumen where nm_konsumen LIKE '%$q%' or kd_konsumen LIKE '%$q%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['kd_konsumen'] . " - " . $rs['nm_konsumen'];
	echo "$cname\n";
}
?>