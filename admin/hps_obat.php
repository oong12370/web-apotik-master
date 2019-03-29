<?php
$kd_obat = $_REQUEST['kd_obat'];
include '.././temp/koneksi.php';
$query = "DELETE FROM tbl_obat WHERE kd_obat='$kd_obat'";
mysql_query($query) or die(mysql_error());
?>
<script>
alert('data telah di hapus');
location.href = 'index.php?page=input_obat';
</script>