<?php
$Host = "localhost";
$username = "root";
$password = "root";
$database = "db_apotik";
$koneksi = new mysqli( $Host, $username, $password, $database );

	$carikode = mysqli_query($koneksi, "select max(no_transaksi) from tbl_transaksi") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "P0001";
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script language="JavaScript" src="../j'query/jquery.js"></script>
<script type="text/javascript" src="../j'query/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="../j'query/jquery-1.7.2.min.js"></script>
<script src="../j'query/jquery-1.9.1.js"></script>
 <script src="../j'query/jquery-ui.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("#npj").attr("readonly",true);
 $("#kd_obat").change(function(){
    $.ajax({
	 url : 'get_obat.php?date='+new Date(),
	 type : 'post',
	 cache : false,
	 data : 'kd_obat='+$("#kd_obat").val(),
	 success : function(msg){
	   var obj = $.parseJSON(msg);
	   $("#kd_obat").val(obj.kd_obat);
	   $("#nm_obat").val(obj.nm_obat);
	   $("#harga").val(obj.harga);
	   $("#jumlah").val(obj.jumlah);
	
	}
	});
	var kj= $("#kd_obat").val();
	 if (kj == 'PMbl'){
		$("#npj").attr("readonly",false);
	}
	var kj= $("#kd_obat").val();
	 if (kj == 'PMtr'){
		$("#npj").attr("readonly",false);
	}
  });  
});
</script>
<script>

		function addTableRow(jQtable){
		jQtable.each(function(){
			var $table = $(this);
			var n = parseInt(document.getElementById('nomor').value) + 1;
			var kd_obat = document.getElementById('kd_obat').value
			var nm_obat = document.getElementById('nm_obat').value;
			var harga = document.getElementById('harga').value;
			var jumlah = document.getElementById('jumlah').value;
			if (kd_obat<=0) {
				alert('Kode obat Harus Diisi');
			}
			else {
				
				var tds = '<tr>';
				
				tds += '<td>'+kd_obat+'<input type="hidden" name="kd_obat['+n+']" value="'+kd_obat+'" /></td>';
				tds += '<td>'+nm_obat+'</td>';
				tds += '<td>'+harga+'</td>';
				tds += '<td>'+jumlah+'</td>';
				tds += '<td align=center class="delete" onClick="$(this).parent().remove(); "><a href="javascript:void(0)">Hapus</a></td>';
				tds += '</tr>';
				if($('tbody', this).length > 0){
					$('tbody', this).append(tds);
				}else {
					$(this).append(tds);
				}
				document.getElementById('nomor').value =  n;
			}
		});
	}

	function deleteAllRows() {
		$('#myTable tbody').remove();
		document.getElementById('kd_obat').innerHTML = 0;
	}

</script>

<link href="../j'query/jquery-ui.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
</head>

<body>
<form id="forms" method="POST" onSubmit="return submitForm('<?=$_SERVER['PHP_SELF'];?>')">
<table width="50%" align="center">
	<?php
		if ($msg!='') {
			echo "
			<tr>
				<td> </td>
				<td> </td>
				<td> $msg </td>
			</tr>";
		}
	?>
	
    <tr>
      <td colspan="2" bgcolor="#B1C3D9"><div align="center"><strong>Pelanggan</strong></div></td>
    </tr>
	
	 <?php
	 //variabel tanggal
	 include '../temp/koneksi.php';
	 $tgl_ini=date("Y-m-d");
	  $pisah = explode("-",$tgl_ini);
	  $thn = $pisah[0];
	  $bln = $pisah[1];
	  $tgl = $pisah[2];
	  $tjt= $thn +1;
	  $jt= $tjt."-".$bln."-".$tgl;
	  ?>
    <tr>
		<td width="28%"> Tanggal  </td>
	  <td width="72%">: <input type='text'  name='tgl' value='<?=$tgl_ini?>'></td>
	</tr>
	<?php
include "../temp/koneksi.php";
$cari = mysql_query("SELECT * FROM tbl_konsumen WHERE kd_konsumen = '$_GET[kd_konsumen]'");
$data = mysql_fetch_array($cari);
?>	
	<tr>
	  <td>No Faktur </td>
	  <td>:
	    <input name='no_transaksi'  id="no_transaksi" value='<?=$kode_otomatis;?>' t="no_transaksi" /></td>
    </tr>
	<tr>
		<td> Kode Pelanggan </td>
	  <td>:
		  <input name="kd_konsumen" type="text" id="kd_konsumen" value="<?=$data[kd_konsumen]?>" size="20" maxlength="10" />
      <a href="?page=pilih_obat">Pilih</a></td>
	</tr>
	<tr class="bordered1">
	  <td bgcolor="#FFFFFF">Nama Pelanggan </td>
	  <td bgcolor="#FFFFFF">:
	    <input name="nm_konsumen" type="text" id="nm_konsumen" value="<?=$data[nm_konsumen]?>" size="30" maxlength="10" /></td>
    </tr>
	<tr class="bordered1">
      <td bgcolor="#FFFFFF"><div align="right">No Telp </div></td>
	  <td bgcolor="#FFFFFF"><label> :
	      <input name="telp" type="text" id="telp" value="<?=$data[telp]?>" />
      </label></td>
    </tr>
	<tr class="bordered1">
      <td bgcolor="#FFFFFF"><div align="right">Keluhan</div></td>
	  <td bgcolor="#FFFFFF"><span class="style1">
        <label> :
        <textarea name="keluhan" id="keluhan"><?=$data[keluhan]?>
          </textarea>
        </label>
      </span></td>
    </tr>
	<tr>
	  <td colspan="2" bgcolor="#B1C3D9"><div align="center"><strong>Obat</strong></div></td>
    </tr>
	<tr>
		<td> Kode Obat </td>
		<td>:
		  <select name="kd_obat" id="kd_obat">
          <option value="">[Pilih]</option>
          <?php
					$q = mysql_query("SELECT * FROM tbl_obat ");
						
					while($obat = mysql_fetch_array($q)) {
						echo "<option value='$obat[kd_obat]'>$obat[nm_obat]</option>";
						//echo"<option value='".$d[0]."-".$d[1]."-".$d[2]."-".$d[3]."-".$d[4]."'>".$d[1]."</option>";
					}
				
				?>
        </select></td>
	</tr>
	<tr>
	  <td>Nama obat </td>
	  <td><label>:
	      <input name="nm_obat" type="text" id="nm_obat" />
	  </label></td>
    </tr>
	<tr>
	  <td>Harga</td>
	  <td><label>:
	      <input name="harga" type="text" id="harga" />
	      <input name="kd_admin" type="hidden" value="<?php 
		  
		  include '../temp/koneksi.php';
		  $query="select * from tbl_admin where nm_admin='".$_SESSION['user_forum']."'";
		  $result=mysql_query($query);
		  $row=mysql_fetch_array($result);
		  echo ' '.$row['kd_admin'];
		  ?>"="kd_admin />
	  </label></td>
    </tr>
	<tr>
	  <td>Jumlah</td>
	  <td>:
	    <label>
	    <input name="jumlah" type="text" id="jumlah" size="10" />
      </label></td>
    </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="button" name="tambah" value="+" id="tambah" onclick="addTableRow($('#myTable')); hitTotal()" />
        <input type='hidden' name='nomor' id='nomor' value='0' /></td>
	</tr>
	<tr>
		<td colspan="2"><table width="100%" border="1" style="border-collapse:collapse" id="myTable">
		  <thead>
		    <tr align="center">
		      <td>Kode Obat </td>
              <td>Nama Obat </td>
              <td>Harga</td>
			  <td>Jumlah</td>
              <td>Act</td>
            </tr>
	      </thead>
		  <tfoot>
	      </tfoot>
	      </table></td>
    </tr>
	<tr>
		<td> </td>
		<td> 
			<input type='Submit' name='simpan' value='Simpan ' id="simpan"/>  
			<input type='Reset' name='reset' value=' Reset ' onClick='deleteAllRows()' />		</td>
	</tr>
</table>
</form>

<?php
include '../temp/koneksi.php';

	//if(isset($_POST['simpan'])) {
		$no_transaksi = $_POST['no_transaksi'];
		$tgl  = $_POST['tgl'];
		$kd_konsumen  = $_POST['kd_konsumen'];
		$kd_obat  = $_POST['kd_obat'];
		$harga  = $_POST['harga'];
		$kd_admin  = $_POST['kd_admin'];
		$jumlah  = $_POST['jumlah'];
		$subtotal  = $_POST['subtotal'];
		

		if ($no_transaksi!='' && $kd_konsumen!='' && $kd_admin!='' && $tgl!='' && $subtotal!='') {
			$q1 = "INSERT INTO tbl_transaksi VALUES ('".$no_transaksi."', '".$kd_konsumen."', '".$kd_admin."','".$tgl."','".$subtotal."')";
			$r1 = mysql_query($q1) or die ($q1);;
			  if($r1) {
				$trxID = mysql_result(mysql_query("SELECT no_transaksi FROM tbl_transaksi WHERE no_transaksi = '".$no_transaksi."'"),0,0);
				if($_POST['kd_obat']) {
					$js = $_POST['kd_obat']; 
					foreach($_POST['kd_obat'] as $key => $val) {
						$q2 = "INSERT INTO detail VALUES ('".$val."' , '".$trxID."')";
						$r2 = mysql_query($q2);
						echo"<script>alert('Data berhasil disimpan',document.location.href='index.php?page=lap_transaksi')</script>";
					}
				}
			}

			
		}
   //}
?>
</body>
</html>
