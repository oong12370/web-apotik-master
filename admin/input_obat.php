<?php
$Host = "localhost";
$username = "root";
$password = "root";
$database = "db_apotik";
$koneksi = new mysqli( $Host, $username, $password, $database );

	$carikode = mysqli_query($koneksi, "select max(kd_obat) from tbl_obat") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis2 = "O".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis2 = "O0001";
  }
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
-->
</style>
<link type="text/css" href="../css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
		$(function() {
		$( "#tgl_ex" ).datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: "2012:2020",
				dateFormat: "yy-mm-dd"
			});
		$( "#periode2" ).datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: "2012:2013",
				dateFormat: "yy-mm-dd"
			});
		});
		</script>
</head>

<body>
	<form action="s_obat.php" method="post" id="frm" onReset="resetForm()">
  <h1><strong>Input Data Obat</strong></h1>
  <p><strong><a href="?page=lap_ex">Lihat Data Expired </a></strong></p>
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="bordered">
    <tr>
      <td width="174">Kode Obat </td>
      <td width="326"><label>
        <input name="kd_obat" type="text" id="kd_obat" value="<?=$kode_otomatis2;?>" size="22" maxlength="22" />
      </label></td>
    </tr>
    <tr>
      <td>Nama Obat </td>
      <td><label>
        <input name="nm_obat" type="text" id="nm_obat" size="35" maxlength="30" />
        <input type='hidden' readonly="readonly" name='tgl' value='<?=date('Y-m-d');?>' />
        <input name="kd_admin" type="" value="<?php 
		  
		  include '../temp/koneksi.php';
		  $query="select * from tbl_admin where nm_admin='".$_SESSION['user_forum']."'";
		  $result=mysql_query($query);
		  $row=mysql_fetch_array($result);
		  $row['kd_admin'];
		  ?>"="kd_admin />
      </label></td>
    </tr>
    <tr>
      <td>Katagori</td>
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
      <td>Tgl Expired </td>
      <td><input type=text name="tgl_ex" id="tgl_ex" ></td>
    </tr>
    <tr>
      <td>Harga</td>
      <td><label>
        <input name="harga" type="text" id="harga" />
      </label></td>
    </tr>
    
    <tr>
      <td>Stock      </td>
      <td><input name="stok" type="text" id="stok" size="8" /></td>
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
<p align="center">
 ================================================&gt;Hasil Data Obat&lt;==============================================</p>
 <?php include "list_obat.php"; ?> 
     
</p>
  
</body>
</html>
