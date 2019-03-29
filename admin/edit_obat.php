<?php

include "../temp/koneksi.php";
$cari = mysql_query("SELECT * FROM tbl_obat WHERE kd_obat = '$_GET[kd_obat]'");
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
-->
</style>
</head>

<body>
	<form action="u_obat.php" method="post" id="frm" >
  <h1><strong>Edit Data Obat</strong>
  </h1>
  <table class="bordered" width="500" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="174">Kode Obat </td>
      <td width="326"><label>
        <input name="kd_obat" type="text" id="kd_obat" value="<?=$data[kd_obat]?>" size="22" maxlength="22" />
      </label></td>
    </tr>
    <tr>
      <td>Nama Obat </td>
      <td><label>
        <input name="nm_obat" type="text" id="nm_obat" value="<?=$data[nm_obat]?>" size="35" maxlength="30" />
      </label></td>
    </tr>
    <tr>
      <td>Jenis</td>
      <td><label>
      <select name="kd_katagori" id="kd_katagori">
        <option>Pilih</option>
        <?php
		 include '../temp/koneksi.php';
					$q = mysql_query("SELECT * FROM tbl_katagori ");
						
					while($obat = mysql_fetch_array($q)) {
						echo "<option value='$obat[kd_katagori]'>$obat[nm_katagori]</option>";
						//echo"<option value='".$d[0]."-".$d[1]."-".$d[2]."-".$d[3]."-".$d[4]."'>".$d[1]."</option>";
					}
				
				?>
      </select>
      </label></td>
    </tr>
    
    <tr>
      <td>Harga</td>
      <td><label>
        <input name="harga" type="text" id="harga" value="<?=$data[harga]?>" />
      </label></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input name="Input" type="submit" id="Input" value="Simpan" />
      </label></td>
    </tr>
  </table>
</form>

  
</body>
</html>
