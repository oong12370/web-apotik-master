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
		<script type='text/javascript' src='../autocomplete/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../autocomplete/jquery.autocomplete.css" />

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
include "../admin/fungsi_alert.php";
$aksi="../admin/aksitransaksi.php";
  include "../tmp/koneksi.php";

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
          <form method=POST action='?page=transaksilagi' name=text_form>
		   
		  <br>Barang : <input type=text name='kd_obat' id='kd_obat'> <input type=text value='' name='harga' id='harga'>
		  &nbsp;
		  
		Jumlah : <input type=text name='qty' id='qty' size=2 onkeypress=\"return isNumberKey(event)\">&nbsp;
		<input type=submit value='  Tambah  ' name='btnTambah' ><br>";
echo" <table>
          <tr>
		  <th>No</th>
		  <th width=75>Kode Obat</th>
		  <th width=200>Nama Obat</th>
		  <th width=50>Harga</th>
		  <th width=50>Jumlah</th
		  
		  ><th width=70>Hapus</th>
		  </tr>"; 
    $tampil=mysql_query("SELECT * FROM tmp");
	$no=1;

	$counter = 1;
    while ($r=mysql_fetch_array($tampil)){
	if ($counter % 2 == 0) $warna = $warnaGenap;
	else $warna = $warnaGanjil;
       echo "<tr bgcolor='".$warna."'>
			 <td align=center>$no</td>
			 <td align=center>$r[kd_obat]</td>";
			 
				$sql=mysql_query("SELECT * FROM tbl_obat where kd_obat='$r[kd_obat]'");
				$rs=mysql_fetch_array($sql);
				echo "<td>$rs[nm_obat]</td>";
				echo "<td>$rs[harga]</td>";
				
			
       echo "  <td align=center>$r[jumlah]</td>";
			 
			 
		echo "
			
			 <td align=center>
	               <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=barangkeluar&act=hapus&id=$r[id]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='gambar/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
				   
             </td></tr>";
      $no++;
	  $counter++;
    }
	$sql2=mysql_query("SELECT sum(jumlah) as jml FROM tmp");
	$rs2=mysql_fetch_array($sql2);

    echo "
	<tr>
    <td colspan='3' align='right'><b>Jumlah Barang : </b></td>
    <td align='center'><b>$rs2[jml]</b><input type=hidden name=jml id=jml value=$rs2[jml]></td>
    <td align='center'>&nbsp;</td>
	</tr>
	</table>
          <table>
		  <tr><td>No Barang keluar</td>   <td> : <input type=text name='no_transaksi' id='no_transaksi' value='$idpr' readonly></td></tr>
		   <tr><td>Konsumen </td>   <td> : <input type=text name='kd_konsumen' id='kd_konsumen'></td></tr>
          <tr><td>Tanggal keluar</td>   <td> : <input type=text id='tgl' name='tgl' value='$tgl'></td></tr>
		  

          </table>
		
		<input type=submit value='  Simpan  ' name='btnSimpan' ></form><br>
		";

		if($_POST) {
			if(isset($_POST['btnTambah'])){
			if(trim($_POST[kd_obat])==""){
				header('location:admin/?page=transaksilagi&pesan=Isi dulu Barang !');
			}else if(trim($_POST[qty])==""){
				header('location:admin/?page=transaksilagi&pesan=Isi dulu Jumlah Barang !');
			}else{
			$obt=substr($_POST[kd_obat],0,5);
			$harga=substr($_POST[harga],0,5);
			$sqlcek1=mysql_query("SELECT * FROM tbl_obat where kd_obat='$obt'");
			$rscek1=mysql_fetch_array($sqlcek1);
			if($_POST[qty] > $rscek1[stok]){
				header('location:admin/?page=transaksilagi&pesan=Stok Obat ('.$_POST[kd_obat].') Kurang !');
			}else{
				mysql_query("INSERT INTO tmp(
								  kd_obat,
								  harga,
								  jumlah) 
							VALUES(
								'$obt',
								'$harga',
								'$_POST[qty]')");
				echo "<meta http-equiv='refresh' content='0; url=?page=transaksilagi'>";
			}
			}
			}
			
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
								'$_POST[kd_konsumen]',
								'$_SESSION[kd_admin]',
								'$_POST[tgl]',
								'$_POST[subtotal]')");
				$sql=mysql_query("SELECT * FROM tmp");
				while($rs=mysql_fetch_array($sql)){
					mysql_query("INSERT INTO detail(
								  no_transaksi,
								  kd_obat,
								  harga,
								  jumlah) 
							VALUES(
								'$_POST[no_transaksi]',
								'$rs[kd_obat]',
								'$rs[harga]',
								'$rs[jumlah]')");
					$sql2=mysql_query("SELECT * FROM tbl_obat where kd_obat='$rs[kd_obat]'");
					$rs2=mysql_fetch_array($sql2);
					$sisastok = $rs2[stok] - $rs[jumlah];
					mysql_query("update tbl_obat set
								  tbl_obat=$sisastok where
								  kd_obat='$rs[kd_obat]'");
				}
				
				mysql_query("truncate table tmp");
				
				echo "<meta http-equiv='refresh' content='0; url=?page=transaksilagi'>";
				header('location:admin/?page=transaksilagi&pesan=Data barang keluar berhasil disimpan ! ');
				
				}
				else{
					header('location:admin/?page=transaksilagi&pesan=Data Kosong !');
				}
			}
		} 
?>


<input name="kd_admin" type="hidden" value="<?php 
		  
		  include '../temp/koneksi.php';
		  $query="select * from tbl_admin where nm_admin='".$_SESSION['user_forum']."'";
		  $result=mysql_query($query);
		  $row=mysql_fetch_array($result);
		  echo ' '.$row['kd_admin'];
		  ?>"="kd_admin />
