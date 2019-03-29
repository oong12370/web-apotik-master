
<title>Untitled Document</title><style type="text/css">
<!--
.style1 {font-size: 24px}
-->
</style></head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="31" colspan="6"><div align="center">
      <table width="1234" border="0">
        <tr>
          <td width="121"><img src="../image/logo_apotik.jpg" width="100" height="100" /></td>
          <td width="1097"><div align="center"><strong>Apotik IP </strong></div> 
			<div>
			  <div align="center">Jalan Raya Serang Km. 10, Kadu Jaya, Curug, Tangerang, Banten 15810</div>
			</div></td>
        </tr>
      </table>
    </div>      </td>
  </tr>
  
  <tr>
    <td colspan="6"><hr /></td>
  </tr>
  <?php
  include '../temp/koneksi.php';
  $cari_data = $_REQUEST['cari'];
  $query = "SELECT  tbl_transaksi.no_transaksi, tbl_transaksi.tgl, tbl_transaksi.subtotal, tbl_konsumen.kd_konsumen, tbl_konsumen.nm_konsumen,tbl_konsumen.keluhan, detail.no_transaksi,  tbl_obat.kd_obat from detail
  inner join tbl_transaksi on  detail.no_transaksi = tbl_transaksi.no_transaksi
  inner join tbl_konsumen on tbl_transaksi.kd_konsumen = tbl_konsumen.kd_konsumen
  inner join tbl_obat on detail.kd_obat = tbl_obat.kd_obat
  WHERE tbl_transaksi.no_transaksi like '%$cari_data%' ";
 
   $rs = mysql_query($query) or die(mysql_error());
  $data = mysql_fetch_array($rs);
 
 
   ?>
  
  <tr>
    <td>&nbsp;</td>
    <td width="9%">&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="17%">&nbsp;</td>
    <td width="17%">&nbsp;</td>
    <td width="22%">&nbsp;</td>
  </tr>
  <tr>
    <td>Nomor Pelanggan </td>
    <td>: <?=$data['kd_konsumen']?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>Nama  </td>
    <td>: <?=$data['nm_konsumen']?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Keluhan</td>
    <td>: <?=$data['keluhan']?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#006600" >
    <td width="17%" height="34" bgcolor="#8E8E8E"> <div align="center">NO</div></td>
    <td bgcolor="#8E8E8E"><div align="left">No Transaksi </div></td>
    <td bgcolor="#8E8E8E">Nama Obat </td>
    <td bgcolor="#8E8E8E">Harga </td>
    <td bgcolor="#8E8E8E">Jumlah beli</td>
    <td bgcolor="#8E8E8E">Total</td>
    <td width="6%" bgcolor="#8E8E8E">&nbsp;</td>
  </tr>
   <?php
 $query = "SELECT  tbl_transaksi.no_transaksi, tbl_transaksi.tgl, tbl_transaksi.subtotal, tbl_konsumen.kd_konsumen, tbl_konsumen.nm_konsumen, detail.no_transaksi,detail.jumlah,  tbl_obat.kd_obat,  tbl_obat.nm_obat ,  tbl_obat.harga  from detail
  inner join tbl_transaksi on  detail.no_transaksi = tbl_transaksi.no_transaksi
  inner join tbl_konsumen on tbl_transaksi.kd_konsumen = tbl_konsumen.kd_konsumen
  inner join tbl_obat on detail.kd_obat = tbl_obat.kd_obat
  WHERE tbl_transaksi.no_transaksi like '%$cari_data%' ";
  
	$rs = mysql_query($query) or die(mysql_error());
   $no=1;
  while($data = mysql_fetch_array($rs)){
  $harga = $data['harga'];
  $jumlah = $data['jumlah'];
  $nm_obat = $data['nm_obat'];
  $subtotal = $data['subtotal'];
  $tgl= date ("d-m-Y");
  $total=$harga*$jumlah
  ?>
  
  
 
  
  <tr>
    <td align="center"><?=$no; ?></td>
    <td><?=$data['no_transaksi']?></td>
    <td><?=$data['nm_obat']?></td>
    <td>Rp.
    <?=number_format($harga,0,'','.')?></td>
    <td><?=$data['jumlah']?></td>
	<td>Rp.
    <?=number_format($total,0,'','.')?></td>
  <td>&nbsp;</td>
    <td width="0%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  	 <?php
 $no++;
 
}
?>
   <?php
 $query = "SELECT  tbl_transaksi.no_transaksi, tbl_transaksi.tgl, tbl_transaksi.subtotal, tbl_konsumen.kd_konsumen, tbl_konsumen.nm_konsumen, detail.no_transaksi,detail.jumlah,  tbl_obat.kd_obat,  tbl_obat.nm_obat ,  tbl_obat.harga  from detail
  inner join tbl_transaksi on  detail.no_transaksi = tbl_transaksi.no_transaksi
  inner join tbl_konsumen on tbl_transaksi.kd_konsumen = tbl_konsumen.kd_konsumen
  inner join tbl_obat on detail.kd_obat = tbl_obat.kd_obat
  WHERE tbl_transaksi.no_transaksi like '%$cari_data%' ";
  
	$rs = mysql_query($query) or die(mysql_error());
   $no=1;
  while($data = mysql_fetch_array($rs)){
  $harga = $data['harga'];
  $jumlah = $data['jumlah'];
  $nm_obat = $data['nm_obat'];
  $subtotal = $data['subtotal'];
  $tgl= date ("d-m-Y");
  $total=$harga*$jumlah
  ?>

  <tr bgcolor="#E4E4E4">
    <td colspan="5"><div align="left">Jumlah </div></td>
    <td>Rp.
    <?=$data['subtotal']?></td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><div align="center">Tangerang ,    
        <?=$tgl?>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">Kasir</div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td><div align="center">
	<?php 
	include '.././temp/session.php';
	include '../temp/koneksi.php';
	$query="select * from tbl_admin where nm_admin='".$_SESSION['user_forum']."'";
		  $result=mysql_query($query);
		  $row=mysql_fetch_array($result);
		  echo ' '.$row['nm_admin'];
		  ?></div></td>
    <td>&nbsp;</td>
    <td><div align="center"><a href="tampil_izin.php" ><img src="../image/printer.png" width="34" height="35" onClick="window.print();return false" /></a></div></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
 	 <?php

 
}
?>