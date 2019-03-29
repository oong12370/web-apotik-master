
<body>
<table bgcolor="" width="804" border="0" align="center" cellpadding="1" cellspacing="1">
  <!--DWLayoutTable-->
  
  <tr>
    <td height="217" valign="top">
	<FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
      <table width="491" border="0" align="center">
        <tr>
          <td colspan="3"><div align="center" class="style11">Gallery Apotik IP </div></td>
        </tr>
        
        <tr>
          <td width="62" valign="top" class="style8"><div align="left">Judul</div></td>
          <td width="4" valign="top" class="style8">:</td>
          <td width="411" class="style8"><div align="justify">
              <textarea name="judul" cols="40" rows="7" id="judul"></textarea>
          </div></td>
        </tr>
        <tr>
          <td class="style8">Image</td>
          <td class="style8">&nbsp;</td>
          <td class="style8"><span class="text-info">
            <input name="foto" type="file" id="foto" />
          </span></td>
        </tr>
        <tr>
          <td class="style8"><div align="left"></div></td>
          <td class="style8">&nbsp;</td>
          <td class="style8"><div align="justify">
              <input name="Input" type="submit" id="Input" value="Simpan" />
              <input type="reset" name="Submit" value="Reset" />
          </div></td>
        </tr>
      </table>
      </form></td>
  </tr>
</table>

</body>
</html>

<?php
include "../temp/koneksi.php";

//proses input berita
if (isset($_POST['Input'])) {
	$no_info = addslashes (strip_tags ($_POST['no_info']));
	$judul = addslashes (strip_tags ($_POST['judul']));
	$namafoto = $_FILES['foto']['name'];
	
	
	if (strlen($namafoto)>0) {
		//upload
		if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
			move_uploaded_file ($_FILES['foto']['tmp_name'], "../Image/".$namafoto);
		}
	}
	//insert ke tabel
	$kop = "$isi_berita";
	$query = "INSERT INTO gallery VALUES('', '$namafoto','$judul')";
	$sql = mysql_query ($query) or die (mysql_error());
	if ($sql) {
		echo "<font color=blue>Berhasil Terkirim</font>";	
	} else {
		echo "<h2><font color=red>gagal Terkirim</font></h2>";	
	}
}
?>