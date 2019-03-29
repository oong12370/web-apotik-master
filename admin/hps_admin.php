<?php
$kd_admin = $_REQUEST['kd_admin'];
include '.././temp/koneksi.php';
$query = "DELETE FROM tbl_admin WHERE kd_admin='$kd_admin'";
mysql_query($query) or die(mysql_error());
?>
<script>
alert('data telah di hapus');
location.href = 'index1.php?page=input_admin';
</script>