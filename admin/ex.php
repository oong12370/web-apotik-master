<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php

include "../temp/koneksi.php";
$cari = mysql_query("SELECT * FROM tbl_obat WHERE kd_obat = '$_GET[kd_obat]'");
$data = mysql_fetch_array($cari);
?>
<form id="form1" name="form1" method="post" action="uex.php">
  <table width="363" border="1">
    <tr>
      <td>Kode Obat</td>
      <td><input name="kd_obat" type="text" id="kd_obat" value="<?=$data[kd_obat]?>" size="15" maxlength="22" /></td>
    </tr>
    <tr>
      <td>Nama Obat</td>
      <td><input name="nm_obat" type="text" id="nm_obat" value="<?=$data[nm_obat]?>" size="20" maxlength="30" /></td>
    </tr>
    <tr>
      <td>Stastus</td>
      <td><select name="stok" id="stok">
          <option value="0">Pilih</option>
          <option value="0">Verifikasi</option>
            </select></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="Submit" value="Ok" />
      </label></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
