<?php
include '.././temp/session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Apotik IP</title>
<script type="text/javascript" src="../j'query/script.js"></script>
<script type="text/javascript" src="../j'query/superfish.js"></script>
<script type="text/javascript" src="../j'query/jquery-1.4.js"></script>
<script type="text/javascript" src="../j'query/jquery.autocomplete.js"></script>
<script type="text/javascript" src="../j'query/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>

<style type="text/css">
<!--
body {
	background-image: url();
	margin-top: 0px;
	margin-bottom: 0px;
	background-color: #999999;
}
-->
</style>
<link href="../css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #336699;
}

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
border-left: 0px solid #ccc;
border-top: 0px solid #ccc;
padding: 5px;
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

</style>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body onload="MM_preloadImages('../Image/img7.jpg','../Image/img3.jpg','../Image/img2.jpg','../Image/img4.jpg','../Image/img1.jpg','../Image/img8.jpg')">
<table class="bordered" bgcolor="#FFFFFF" width="769" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="43" valign="top"><img src="../image/desain.jpg" width="900" height="40" /></td>
  </tr>
  
  <tr>
    <td height="177" valign="top"><img src="../image/admin1.jpg" width="900" height="167" border="0" usemap="#Map2" /></td>
  </tr>
  <tr>
    <td height="29" valign="top">
	<ul class="menu">
            <li><a href="index.php">Home</a></li>
      <li><a href="?page=profil">about</a>        </li>
            <li><a href="#">Input Data</a>
			<ul>
				  <li><a href="?page=input_admin" >Data Admin</a></li>
				 
			  </ul>
			<li><a href="#">Cetak Data </a>
			<ul>

				<li><a href="?page=ckatagori" >Katagori</a></li>
				<li><a href="?page=laporan_tgl" >Periode</a></li>
       		  </ul>
            <li><a href="#">Lihat Data</a>
			<ul>
                  <li><a href="?page=list_konsumen" >->Pelanggan</a></li>
				  <li><a href="?page=list_obat" >-->Obat</a></li>
				  <li><a href="?page=list_katagori" >-->Katagori</a></li>
				  <li><a href="?page=lap_transaksi" >-->Transaksi </a></li>
	</td>
  </tr>
    <td><strong>User By</strong> :  
		<?php 
		  
		  include '../temp/koneksi.php';
		  $query="select * from tbl_admin where nm_admin='".$_SESSION['user_forum']."'";
		  $result=mysql_query($query);
		  $row=mysql_fetch_array($result);
		  echo ' '.$row['nm_admin'];
		  ?> </td>
  
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><span class="style2">
       <a href="?page=profile_peserta"  ></a>
       <?php include "../temp/pageadmin.php" ?>
    <a href="?page=profile_peserta"  ></a></span></td>
  </tr>
  

  
  

  
  
  
  
  <tr>
    <td height="68" valign="top" bgcolor="#FFFFFF"><img src="../image/image7.jpg" width="900" height="68" /></td>
  </tr>
</table>





<map name="Map" id="Map"><area shape="rect" coords="16,10,138,42" href="?page=temp/halaman" />
<area shape="rect" coords="159,14,291,39" href="?page=input_perusahaan" />
  <area shape="rect" coords="310,13,434,36" href="?page=input_trayek" />
<area shape="rect" coords="462,13,587,39" href="?page=proses_izin" />
<area shape="rect" coords="616,14,739,37" href="#" /><area shape="rect" coords="762,12,892,35" href="?page=../temp/logout" />
</map>
<map name="Map2" id="Map2"><area shape="rect" coords="780,4,892,24" href="?page=../temp/logout" />
</map></body>
</html>
