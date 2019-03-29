<?php
include '../temp/session.php';
if($_POST['action']=='edit'){
include '../temp/koneksi.php';
if($_POST['tfname']!='' && $_POST['tpass1']!='' && $_POST['tpass2']!='' && $_POST['tpass1']==$_POST['tpass2']){
$sql="update tbl_admin set nm_admin='".$_POST['nm_admin']."', password='".$_POST['tpass1']."' where nm_admin='".$_POST['nm_admin']."'";
$result=mysql_query($sql)or die(mysql_error());
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Profile</title>
<link rel="shortcut icon" type="image/x-icon" href="../../../../axioo/AppServ/www/toko_exo/images/icon.gif" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style></head>

<body>
<table width="800px" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td><span class="style2">
      <?php 
	include '../temp/koneksi.php';
	$sql="select * from tbl_admin where nm_admin='".$_SESSION['user_forum']."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	?>
    </span></td>
  </tr>
  <tr>
    <td bgcolor=""><form id="form1" name="form1" method="post" action="akun_edit.php">
      <table width="800" border="0" cellpadding="0">
        <tr>
          <td width="150" align="right"><div align="left"><strong>Nama</strong></div></td>
          <td width="10" bgcolor="">&nbsp;</td>
          <td bgcolor=""><input name="nm_admin" type="text" class="login-inp " id="nm_admin" value="<?php echo $row['nm_admin'];?>" readonly="true" /></td>
        </tr>
        
        <tr>
          <td align="right"><div align="left"><strong>Password</strong></div></td>
          <td>&nbsp;</td>
          <td><input name="tpass1" type="password" class="login-inp " id="tpass1" value="<?php echo $row['password'];?>" /></td>
        </tr>
        <tr>
          <td align="right"><div align="left"><strong>Retype Password </strong></div></td>
          <td >&nbsp;</td>
          <td>
            <input class="login-inp" name="tpass2" type="password" id="tpass2" value="<?php echo $row['password'];?>" />            <input name="action" type="hidden" id="action" value="edit" />          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td bgcolor="#FFFFFF"><input class="art-button" type="submit" name="Submit" value="Ubah" /></td>
        </tr>
      </table>
        </form>    </td>
  </tr>
</table>
</body>
</html>
