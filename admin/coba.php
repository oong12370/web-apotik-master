<link type="text/css" href="../css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.8.24.custom.min.js"></script>
		
		<script type="text/javascript">
		$(function() {
		$( "#tgl" ).datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: "2012:2013",
				dateFormat: "yy-mm-dd"
			});
		});
		function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
function hitung() {
        var dp = document.getElementById("uang_muka").value-0;
        var jml = document.getElementById("jml").value-0;
		var sisa = jml - dp;
		if (isNaN(sisa)) 
			 document.getElementById("sisa").value = 0;
		else
		{
		if(sisa < 0){
			document.getElementById("sisa").value = 0;
		}else{
			document.getElementById("sisa").value = sisa;
		}
		}
    }

		</script>
		

<script type="text/javascript">
$().ready(function() {
	$("#kd_obat").autocomplete("../autocomplete/get_list.php", {
		width: 260,
		matchContains: true,
		selectFirst: false
	});
});
</script>
<script type="text/javascript">
$().ready(function() {
	$("#kd_konsumen").autocomplete("../autocomplete/get_listk.php", {
		width: 260,
		matchContains: true,
		selectFirst: false
	});
});
</script>

<?php

$aksi="../admin/aksi_transaksi.php";
  include "../tmp/koneksi.php";
$cari = mysql_query("select tbl_obat.kd_obat,nm_obat,nm_katagori,harga,tgl,stok from tbl_obat inner join tbl_katagori on tbl_obat.kd_katagori=tbl_katagori.kd_katagori WHERE kd_obat = '$_GET[kd_obat]'");
$data = mysql_fetch_array($cari);
   $ceknomor=mysql_fetch_array(mysql_query("SELECT no_transaksi FROM tbl_transaksi ORDER BY no_transaksi DESC LIMIT 1"));
	$cekQ=$ceknomor[no_transaksi];
	$awalQ=substr($cekQ,2-7);
	$next=$awalQ+1;
	$jnim=strlen($next);

	if($jnim==1)
	{ $no='TR00000'; }
	elseif($jnim==2)
	{ $no='TR0000'; }
	elseif($jnim==3)
	{ $no='TR000'; }
	elseif($jnim==4)
	{ $no='TR00'; }
	elseif($jnim==5)
	{ $no='TR0'; }
	elseif($jnim==6)
	{ $no='TR'; }
	$idpr=$no.$next;
  $tgl = date('Y-m-d');
echo "<h2>Transaksi</h2>";



if(isset($_GET['pesan'])){
		echo "
		
		<div class=\"ui-widget\">
			<div class=\"ui-state-highlight ui-corner-all\" style=\"margin-top: 20px; padding: 0 .7em;\">
				<span class=\"ui-icon ui-icon-info\" style=\"float: left; margin-right: .3em;\"></span>
				<strong>".$_GET['pesan']."</strong>
			</div>
		</div>";
	}
echo "

          <form method=POST action='?page=coba' name=text_form>
		   
		    <p>
		    Kode Obat : 
		      <input type=text name='kd_obat' value='$data[kd_obat]' id='kd_obat'> 
		      <a href='?page=pilih_obat'>cari</a></p>
		    <p>
		  Nama Obat : 
		    <input type=text name='nm_obat' value='$data[nm_obat]' id='nm_obat'>
			<p>
		  Harga Obat : 
		    <input type=text name='harga' value='$data[harga]' id='harga'>
&nbsp; <input type=hidden name='nm_katagori' value='$data[nm_katagori]' id='nm_katagori'>
		  
		Jumlah :
        <input type=text name='qty' id='qty' size=2 onkeypress=\"return isNumberKey(event)\">
        &nbsp;
		<input type=submit value='  Tambah  ' name='btnTambah' >
		<br>
";
echo" </p>
		    <table>
          <tr>
		  <th>No</th>
		  <th width=75>Kode Obat</th>
		  <th width=200>Nama Obat</th>
		  <th width=200>Jenis</th>
		  <th width=50>Harga</th>
		  <th width=50>Jumlah</th>
		  <th width=50>Total</th>
		  <th width=70>Hapus</th>
		  </tr>"; 
    $tampil=mysql_query("SELECT * FROM tmp");
	$no=1;
	//$total= $rs[harga] * $r[jumlah];
	$counter = 1;
    while ($r=mysql_fetch_array($tampil)){
	if ($counter % 2 == 0) $warna = $warnaGenap;
	else $warna = $warnaGanjil;
       echo "<tr bgcolor='".$warna."'>
			 <td align=center>$no</td>
			 <td align=center>$r[kd_obat]</td>";
			 
				$sql=mysql_query("SELECT * FROM tbl_obat where kd_obat='$r[kd_obat]'");
				$rs=mysql_fetch_array($sql);
				$total= $rs[harga] * $r[jumlah];
				echo "<td>$rs[nm_obat]</td>";
				echo "<td>$r[nm_katagori]</td>";
				echo "<td>$rs[harga]</td>";
				
			
       echo "  <td align=center>$r[jumlah]</td>";
			 echo "  <td align=center>$total</td>";
			 
		echo "
			
			 <td align=center>
	               <a href='?page=aksi_transaksi&id=$r[id]'><img src='gambar/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
				   
             </td></tr>";
      $no++;
	  $counter++;
    }
	
	$sql2=mysql_query("SELECT sum(harga*jumlah) as jml FROM tmp");
	$rs2=mysql_fetch_array($sql2);

    echo "
	<tr>
    <td colspan='3' align='right'><b>Total bayar: </b></td>
    <td align='center'></td>
    <td align='center'></td>
	<td align='center'></td>
    <td align='center'><b>$rs2[jml]</b><input type=hidden name=subtotal id=subtotal value=$rs2[jml]></td>
	</tr>
	</table>
          <table>
		  <tr><td>No Transaksi</td>   <td> : <input type=text name='no_transaksi' id='no_transaksi' value='$idpr' readonly></td></tr>
		   <tr><td>Konsumen </td>   <td> : <input type=text name='kd_konsumen' id='kd_konsumen'><input type=hidden name=kd_admin id=kd_admin value=$row[kd_admin]></td></tr>
          <tr><td>Tanggal keluar</td>   <td> : <input type=text id='tgl' name='tgl' value='$tgl'></td></tr>
		  

          </table>
		
		<input type=submit value='  Simpan  ' name='btnSimpan' ></form><br>
		";

		if($_POST) {
			if(isset($_POST['btnTambah'])){
			if(trim($_POST[kd_obat])==""){
				echo"<script>alert('Isi Dulu Obat nya !!!',document.location.href='?page=coba')</script>";
			}else if(trim($_POST[qty])==""){
				echo"<script>alert('Jumlah Pembelian Kosong !!!',document.location.href='?page=coba')</script>";
			}else{
			
				mysql_query("INSERT INTO tmp(
								  kd_obat,
								  nm_katagori,
								  harga,
								  jumlah) 
							VALUES(
								'$obt',
								'$_POST[nm_katagori]',
								'$harga',
								'$_POST[qty]')");
				echo "<meta http-equiv='refresh' content='0; url='>";
			
			}
			}
			$konsumen=substr($_POST[kd_konsumen],0,5);
			if(isset($_POST['btnSimpan'])){
			$sqlcek=mysql_query("SELECT * FROM tmp");
			$rscek=mysql_num_rows($sqlcek);
			if($rscek > 0){
				mysql_query("INSERT INTO tbl_transaksi(
								  no_transaksi,
								  kd_konsumen,
								  kd_admin,
								  tgl,
								  subtotal) 
							VALUES(
								'$_POST[no_transaksi]',
								'$konsumen',
								'$row[kd_admin]',
								'$_POST[tgl]',
								'$_POST[subtotal]')");
				$sql=mysql_query("SELECT * FROM tmp");
				while($rs=mysql_fetch_array($sql)){
					mysql_query("INSERT INTO detail(
								  no_transaksi,
								  kd_obat,
								  nm_katagori,
								  harga,
								  jumlah) 
							VALUES(
								'$_POST[no_transaksi]',
								'$rs[kd_obat]',
								'$rs[nm_katagori]',
								'$rs[harga]',
								'$rs[jumlah]')");
					
				}
				
				mysql_query("truncate table tmp");
				
				echo"<script>alert('Data berhasil disimpan',document.location.href='?page=lap_transaksi')</script>";
				
				}
				else{
					echo"<script>alert('Data Kosong !!!!',document.location.href='?page=coba')</script>";
				
				}
			}
		} 
?>
