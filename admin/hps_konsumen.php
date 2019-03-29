<?php
$kd_konsumen = $_REQUEST['kd_konsumen'];
include '.././temp/koneksi.php';
$query = "DELETE FROM tbl_konsumen WHERE kd_konsumen='$kd_konsumen'";
mysql_query($query) or die(mysql_error());
?>
<script>
alert('data telah di hapus');
location.href = 'index.php?page=input_konsumen';
</script>