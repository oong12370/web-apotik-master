<?php
$kd_katagori = $_REQUEST['kd_katagori'];
include '.././temp/koneksi.php';
$query = "DELETE FROM tbl_katagori WHERE kd_katagori='$kd_katagori'";
mysql_query($query) or die(mysql_error());
?>
<script>
alert('data telah di hapus');
location.href = 'index.php?page=input_katagori';
</script>