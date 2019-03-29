<?php
$id = $_REQUEST['id'];
include '.././temp/koneksi.php';
$query = "DELETE FROM tmp WHERE id='$id'";
mysql_query($query) or die(mysql_error());
?>
<script>
alert('data telah di hapus');
location.href = 'index.php?page=coba';
</script>