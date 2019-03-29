<?php
include "../temp/koneksi.php";
mysql_query("UPDATE tbl_obat SET nm_obat =
'$_POST[nm_obat]', kd_katagori = '$_POST[kd_katagori]', harga = '$_POST[harga]' WHERE kd_obat = '$_POST[kd_obat]'")or die ('ada kesalahan penulisan');
?>
<script>
alert('data telah di update');
location.href = 'index.php?page=input_obat';
</script>
