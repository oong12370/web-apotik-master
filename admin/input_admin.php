<?
include "../temp/koneksi.php";
function kd_admin($tabel, $digit, $kolom, $pre) {
		$urut = @mysql_result(@mysql_query("SELECT mid(".$kolom.",-".$digit.")+1 FROM ".$tabel." order by ".$kolom." DESC limit 0,1"),0,0);
		$max  = $digit - strlen($urut);
		$kd_admin = $pre;
		for ($i=1;$i<=$max;$i++) {
			//if($urut=="") {
				$kd_admin .= "0";
			//}
		}
		$kd_admin .= $urut;
		return $kd_admin;
	}
	
	$kd_admin= kd_admin('tbl_admin',5,'kd_admin','AD');
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
</head>

<body>
	<form action="" method="post" id="frm" onReset="resetForm()">
  <h1><strong>Pendaftaran Akun </strong></h1>
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="bordered">
    <tr>
      <td width="174">Kode User </td>
      <td width="326"><label>
        <input name="kd_admin" type="text" id="kd_admin" value="<?=$kd_admin;?>" size="22" maxlength="22" />
      </label></td>
    </tr>
    <tr>
      <td>Nama User  </td>
      <td><label>
        <input name="nm_admin" type="text" id="nm_admin" size="35" maxlength="30" />
      </label></td>
    </tr>
    <tr>
      <td>Jenis Kelamin  </td>
      <td><label>
        <select name="jekel" id="jekel">
          <option>Pilih</option>
          <option value="Pria">Pria</option>
          <option value="Wanita">Wanita</option>
        </select>
      </label></td>
    </tr>
    
    <tr>
      <td>Alamat</td>
      <td><label>
        <textarea name="alamat" id="alamat"></textarea>
      </label></td>
    </tr>
    
    <tr>
      <td>Telp/Hp</td>
      <td><label>
        <input name="telp" type="text" id="telp" />
      </label>
      <input name="level" type="hidden" id="level" value="admin" size="35" maxlength="30" /></td>
    </tr>
    
    <tr>
      <td>Password</td>
      <td><input name="password" type="text" id="password" /></td>
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
<?php
include "../temp/koneksi.php";

if (isset($_POST['Input'])) {
	$kd_admin= addslashes (strip_tags ($_POST['kd_admin']));
	$nm_admin = addslashes (strip_tags ($_POST['nm_admin']));
	$jekel = addslashes (strip_tags ($_POST['jekel']));
	$alamat = addslashes (strip_tags ($_POST['alamat']));
	$telp = addslashes (strip_tags ($_POST['telp']));
	$passEnkrip=md5($_POST['password']);
	$level = addslashes (strip_tags ($_POST['level']));
	
	//simpan data ke tabel pendaftaran admin
	if($nm_admin=="" || $passEnkrip=="") {
	echo"<h2>Maaf, Masih Ada Data yang Kosong.</h2>";
	echo"<a href=\"javascript:history.back()\"> Klik disini </a> Untuk Mengulang Register.";

}else{

$sql=mysql_query("insert into tbl_admin values('$kd_admin','$nm_admin','$passEnkrip','$jekel','$alamat','$telp','$level')");

	if ($sql) {
		echo "<font color=blue>Pendaftaran telah berhasil </h2>";	
	} else {
		echo "<font color=red>Ada Kesalahan</font>";	
	}
}
}
?>     
</p>
<p align="center">================================================&gt;Hasil Data User &lt;==============================================</p>
  <?php include "list_user.php"; ?>
  </p>

</body>
</html>
