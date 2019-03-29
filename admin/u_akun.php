<?php
include "../temp/koneksi.php";
mysql_query("UPDATE tbl_admin SET nm_admin =
'$_POST[nm_admin]',alamat ='$_POST[alamat]',telp ='$_POST[telp]' WHERE kd_admin = '$_POST[kd_admin]'")or die ('ada kesalahan penulisan');
?>
<script>
alert('data telah di update');
location.href = 'index.php?page=akun';
</script>
