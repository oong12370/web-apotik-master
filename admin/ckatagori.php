<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script language="JavaScript" src="jquery.js"></script>
</head>
<body>
<table width="600" border="0" align="center">
  <tr>
    <td><form id="form1" name="form1" method="post" action="aksi_katagori.php" target="_blank">
      <fieldset>
      <legend align="center">CETAK DATA </legend>
        <table width="482" align="center">
        <tr>
          <td colspan="4"></td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">Cetak Data  Berdasarkan </div>
              <label></label></td>
          <td width="3">&nbsp;</td>
        </tr>
        <tr>
          <td width="22">&nbsp;</td>
          <td width="223"><label></label>
            Pilih katagori </td>
          <td width="249"><select name="nm_katagori" id="nm_katagori">
              <option>- Pilih Katagori-</option>
              <?php
			   include "../tmp/koneksi.php";
        $pil=mysql_query("select distinct nm_katagori from detail order by nm_katagori desc");
			while($p=mysql_fetch_array($pil)){
				?>
				<option><?php echo $p['nm_katagori'] ?></option>
				<?php
			}
			?>			
          </select></td>
          <td colspan="2" align="center">
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><label>
            <input type="submit" name="Submit" value="OK" />
          </label></td>
          <td>&nbsp;</td>
        </tr>
      </table>
   
      <label> </label>
    </form></td>
  </tr>
</table>
     </fieldset>
</body>
</html>
