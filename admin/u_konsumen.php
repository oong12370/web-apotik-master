<?php
include "../temp/koneksi.php";
mysql_query("UPDATE tbl_konsumen SET nm_konsumen =
'$_POST[nm_konsumen]', jekel = '$_POST[jekel]', alamat = '$_POST[alamat]', telp='$_POST[telp]',keluhan='$_POST[keluhan]' WHERE kd_konsumen = '$_POST[kd_konsumen]'")or die ('ada kesalahan penulisan');
?>
<script>
alert('data telah di update');
location.href = 'index.php?page=input_konsumen';
</script>
