<?php
include "../temp/koneksi.php";
$cari = mysql_query("SELECT * FROM tbl_konsumen WHERE kd_konsumen = '$_GET[kd_konsumen]'");
$data = mysql_fetch_array($cari);
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.bordered {
border: solid #ccc 1px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
border-radius: 6px;
-webkit-box-shadow: 0 1px 1px #ccc;
-moz-box-shadow: 0 1px 1px #ccc;
box-shadow: 0 1px 1px #ccc;
}
 
.bordered tr:hover {
background: #fbf8e9;
-o-transition: all 0.1s ease-in-out;
-webkit-transition: all 0.1s ease-in-out;
-moz-transition: all 0.1s ease-in-out;
-ms-transition: all 0.1s ease-in-out;
transition: all 0.1s ease-in-out;
}
 
.bordered td, .bordered th {
border-left: 1px solid #ccc;
border-top: 1px solid #ccc;
padding: 10px;
text-align: left;
}
 
.bordered th {
background-color: #dce9f9;
background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
background-image: -moz-linear-gradient(top, #ebf3fc, #dce9f9);
background-image: -ms-linear-gradient(top, #ebf3fc, #dce9f9);
background-image: -o-linear-gradient(top, #ebf3fc, #dce9f9);
background-image: linear-gradient(top, #ebf3fc, #dce9f9);
-webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
-moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;
box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
border-top: none;
text-shadow: 0 1px 0 rgba(255,255,255,.5);
}
 
.bordered td:first-child, .bordered th:first-child {
border-left: none;
}
 
.bordered th:first-child {
-moz-border-radius: 6px 0 0 0;
-webkit-border-radius: 6px 0 0 0;
border-radius: 6px 0 0 0;
}
 
.bordered th:last-child {
-moz-border-radius: 0 6px 0 0;
-webkit-border-radius: 0 6px 0 0;
border-radius: 0 6px 0 0;
}
 
.bordered th:only-child{
-moz-border-radius: 6px 6px 0 0;
-webkit-border-radius: 6px 6px 0 0;
border-radius: 6px 6px 0 0;
}
 
.bordered tr:last-child td:first-child {
-moz-border-radius: 0 0 0 6px;
-webkit-border-radius: 0 0 0 6px;
border-radius: 0 0 0 6px;
}
 
.bordered tr:last-child td:last-child {
-moz-border-radius: 0 0 6px 0;
-webkit-border-radius: 0 0 6px 0;
border-radius: 0 0 6px 0;
}
.style7 {	color: #000000;
	font-style: italic;
}
.style9 {color: #000000}
.bordered1 {border: solid #ccc 1px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
border-radius: 6px;
-webkit-box-shadow: 0 1px 1px #ccc;
-moz-box-shadow: 0 1px 1px #ccc;
box-shadow: 0 1px 1px #ccc;
}
-->
</style>
</head>

<body>
	<form action="u_konsumen.php" method="post" name="frm" id="frm" >
  <h1><strong>Edit Data Obat</strong>
  </h1>
    <table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="bordered1">
      <tr>
        <td width="174">Kode Konsumen </td>
        <td width="326"><label>
          <input name="kd_konsumen" type="text" id="kd_konsumen" value="<?=$data[kd_konsumen]?>" size="22" maxlength="22" />
        </label></td>
      </tr>
      <tr>
        <td>Nama Konsumen </td>
        <td><label>
          <input name="nm_konsumen" type="text" id="nm_konsumen" value="<?=$data[nm_konsumen]?>" size="35" maxlength="30" />
        </label></td>
      </tr>
      <tr>
        <td>Jenis Kelamin </td>
        <td><label>
          <select name="jekel" id="jekel">
            <option><?=$data[jekel]?></option>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
          </select>
        </label></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><label>
          <textarea name="alamat" id="alamat"><?=$data[alamat]?>
          </textarea>
        </label></td>
      </tr>
      <tr>
        <td>Telp/Hp</td>
        <td><label>
          <input name="telp" type="text" id="telp" value="<?=$data[telp]?>" />
        </label></td>
      </tr>
      <tr>
        <td>Keluhan</td>
        <td><label>
          <textarea name="keluhan" id="keluhan"><?=$data[keluhan]?>
          </textarea>
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input name="Input" type="submit" id="Input" value="Simpan" />
          <input type="submit" name="Submit2" value="Reset" />
        </label></td>
      </tr>
    </table>
</form>

  
</body>
</html>
