<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <p align="center">Daftar Obat Expired </p>
  <table width="864" border="1" align="center" cellpadding="0" cellspacing="0">
    
    <tr align="center">
      <td width="133" bgcolor="#FFFFFF"><strong>Kode Obat </strong></td>
      <td width="169" bgcolor="#FFFFFF"><strong>Tanggal masuk </strong></td>
      <td width="137" bgcolor="#FFFFFF">Tanggal Berlaku </td>
      <td width="137" bgcolor="#FFFFFF"><strong>Nama obat </strong></td>
      <td width="137" bgcolor="#FFFFFF"><strong>Status</strong></td>
      <td width="137" bgcolor="#FFFFFF"><strong>Action</strong></td>
    </tr>
    <?php
   include '../temp/koneksi.php';
  $pilih =mysql_query("SELECT * FROM tbl_obat where tgl_ex &&  DATEDIFF( `tgl_ex` , NOW( ) ) <7");
  while ($data = mysql_fetch_array($pilih)){
  ?>
  
    <tr>
	  <td align="center"><?= $data['kd_obat'] ?></td>
      <td align="center"><?= $data['tgl'] ?></td>
      <td align="center"><?= $data['tgl_ex'] ?></td>
      <td align="center"><?= $data['nm_obat'] ?></td>
      <td align="center"><span class="style1">Habis Masa Berlaku</span></td>
      <td align="center"><label>
        <div align="center"><a href="?page=ex&kd_obat=<?= $data['kd_obat'] ?>"><img src="../image/ico_active_16.png" width="16" height="16" border="0" /></a> 
        </label></td>
    </tr>
    <?php
  }
  ?>
  </table>
  <div align="center"><br /> 
    <a href="ex_pdf.php" target="_blank">Cetak</a>   </div>
</form>
  <p align="center">
    <label></label>
<form method="post" action="../web_TA_tina/admin/tanda_terima2.php">
	<input type="hidden" name="cari" value="<?= $_POST['cari_data'] ?>" />
	
</form>
  
  <p>&nbsp;</p>
</form>
</fieldset>

</body>
</html>
