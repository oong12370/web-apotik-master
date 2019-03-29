<?php
include "../temp/koneksi.php";
mysql_query("UPDATE tbl_katagori SET nm_katagori =
'$_POST[nm_katagori]' WHERE kd_katagori = '$_POST[kd_katagori]'")or die ('ada kesalahan penulisan');
?>
<script>
alert('data telah di update');
location.href = 'index.php?page=input_katagori';
</script>
