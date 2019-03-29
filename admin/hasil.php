<script type="text/javascript">
$(document).ready(function() {
    $(function() {
        $("#theList tr:even").addClass("stripe1");
        $("#theList tr:odd").addClass("stripe2");

        $("#theList tr").hover(
            function() {
                $(this).toggleClass("highlight");
            },
            function() {
                $(this).toggleClass("highlight");
            }
        );
    });	
});
function hapus_data(ID){
		var pilih = confirm('Data yang akan dihapus kode = '+ID+ '?');
		if (pilih==true) {
		var kode = ID;
		$.ajax({
			type	: "POST",
			url		: "../admin/h_hasil.php",
			data	: "kode="+kode,
			success	: function(data){
				$("#info").html(data);
				$("#tampil_data").load('../admin/tampil_data.php');
				$("#akses").val('');
			}
		});
		}
	}

</script>
<style>
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
</style>
<?php
include "../temp/connection.php";
$keterampilan	= $_GET['keterampilan'];
$jekel	= $_GET['jekel'];
$cari	= $_GET['cari'];
$hal	= $_GET['hal'] ? $_GET['hal'] : 0;
$lim	= 3;
	if(!empty($keterampilan)){
		if($keterampilan=='all'){
			$query2	= "SELECT H.id_hasil, P.no_peserta, P.nm_peserta, P.jekel, P.keterampilan, S.nip, S.nm_staf, 
G.no_lembaga , G.nm_lembaga, R.nm_perusahaan , R.alamat, H.nilai, H.hasil, H.ket, H.tgl 
FROM tbl_pemagang P, tbl_staf S, tbl_lembaga G ,tbl_perusahaan R, tbl_hasil H 
WHERE P.no_peserta = H.no_peserta  And S.nip = H.nip And 
G.no_lembaga = H.no_lembaga And R.no_perusahaan = H.no_perusahaan";
		}else{
			$query2	= "SELECT H.id_hasil, P.no_peserta, P.nm_peserta, P.jekel, P.keterampilan, S.nip, S.nm_staf, 
G.no_lembaga , G.nm_lembaga, R.nm_perusahaan , R.alamat, H.nilai, H.hasil, H.ket, H.tgl 
FROM tbl_pemagang P, tbl_staf S, tbl_lembaga G ,tbl_perusahaan R, tbl_hasil H 
WHERE P.no_peserta = H.no_peserta  And S.nip = H.nip And 
G.no_lembaga = H.no_lembaga And R.no_perusahaan = H.no_perusahaan && keterampilan='$keterampilan'";
		}		
	}else{
		$query2	= "SELECT H.id_hasil, P.no_peserta, P.nm_peserta, P.jekel, P.keterampilan, S.nip, S.nm_staf, 
G.no_lembaga , G.nm_lembaga, R.nm_perusahaan , R.alamat, H.nilai, H.hasil, H.ket, H.tgl 
FROM tbl_pemagang P, tbl_staf S, tbl_lembaga G ,tbl_perusahaan R, tbl_hasil H 
WHERE P.no_peserta = H.no_peserta  And S.nip = H.nip And 
G.no_lembaga = H.no_lembaga And R.no_perusahaan = H.no_perusahaan &&(nm_peserta LIKE '%$cari%' OR nm_perusahaan LIKE '%$cari%')  ";	
	}
	$data2	= mysql_query($query2);
	$jml	= mysql_num_rows($data2);
	
	$max	= ceil($jml/$lim);

echo "<table class = 'bordered' width='100%'>
		<tr>
					<th>No.</th>
			<th>No Peserta</th>
			<th>Nama Peserta</th>
			<th>Jenis Kelamin</th>
			<th>Nama Keterampilan</th>
			<th>Lembaga</th>
			<th>Nilai</th>
			<th>Hasil</th>
			<th>Keterangan</th>
			<th>Perusahaan</th>
			<th>Aksi</th>
		</tr>";
	if(!empty($keterampilan)){
		if($keterampilan=='all'){
			$sql	= "SELECT H.id_hasil, P.no_peserta, P.nm_peserta, P.jekel, P.keterampilan, S.nip, S.nm_staf, 
G.no_lembaga , G.nm_lembaga, R.nm_perusahaan , R.alamat, H.nilai, H.hasil, H.ket, H.tgl 
FROM tbl_pemagang P, tbl_staf S, tbl_lembaga G ,tbl_perusahaan R, tbl_hasil H 
WHERE P.no_peserta = H.no_peserta  And S.nip = H.nip And 
G.no_lembaga = H.no_lembaga And R.no_perusahaan = H.no_perusahaan  ORDER BY nm_peserta LIMIT $hal,$lim";
		}else{
			$sql	= "SELECT H.id_hasil, P.no_peserta, P.nm_peserta, P.jekel, P.keterampilan, S.nip, S.nm_staf, 
G.no_lembaga , G.nm_lembaga, R.nm_perusahaan , R.alamat, H.nilai, H.hasil, H.ket, H.tgl 
FROM tbl_pemagang P, tbl_staf S, tbl_lembaga G ,tbl_perusahaan R, tbl_hasil H 
WHERE P.no_peserta = H.no_peserta  And S.nip = H.nip And 
G.no_lembaga = H.no_lembaga And R.no_perusahaan = H.no_perusahaan && keterampilan='$keterampilan'
					ORDER BY nm_perusahaan
					LIMIT $hal,$lim";
		}		
	}else{
		$sql	= "SELECT H.id_hasil, P.no_peserta, P.nm_peserta, P.jekel, P.keterampilan, S.nip, S.nm_staf, 
G.no_lembaga , G.nm_lembaga, R.nm_perusahaan , R.alamat, H.nilai, H.hasil, H.ket, H.tgl 
FROM tbl_pemagang P, tbl_staf S, tbl_lembaga G ,tbl_perusahaan R, tbl_hasil H 
WHERE P.no_peserta = H.no_peserta  And S.nip = H.nip And 
G.no_lembaga = H.no_lembaga And R.no_perusahaan = H.no_perusahaan && (nm_peserta LIKE '%$cari%' OR nm_perusahaan LIKE '%$cari%')
				ORDER BY nm_perusahaan
				LIMIT $hal,$lim";	
	}
						
		//echo $sql;
		$query = mysql_query($sql);
		
		$no=1+$hal;
		while($r_data=mysql_fetch_array($query)){
			echo "<tr>
					<td align='center'>$no</td>
					<td>$r_data[no_peserta]</td>
					<td>$r_data[nm_peserta]</td>
					<td>$r_data[jekel]</td>
        			<td>$r_data[keterampilan]</td>
        			<td>$r_data[nm_lembaga]</td>
        			<td>$r_data[nilai]</td>
        			<td>$r_data[hasil]</td>
        			<td>$r_data[ket]</td>
        			<td>$r_data[nm_perusahaan]</td>
					<td><div align='center'><a href='?page=u_hasil&id_hasil=$r_data[id_hasil]'><img src='../Image/s_okay.png' width='16' height='16' border='0' /></a><a href='javascript:void(0)' onClick=\"hapus_data('$r_data[id_hasil]')\"><img src='../Image/cancel.png' width='16' height='16' border='0' id='hapus' title='Hapus' /></a></div></td>
					</tr>";
			$no++;
		}
		
	echo "</table>";
	echo "<table width='100%'>
		<tr>
			<td>Jumlah Data : $jml</td>
			<td align='right'>Halaman :";
		if(!empty($keterampilan)){
			if($keterampilan=='all'){
				for ($h = 1; $h <= $max; $h++) {
					$list[$h] = $lim * $h - $lim;
					echo " <a href='javascript:void(0)' ";?> 
                    onClick="$.get('../admin/tampil_data.php?hal=<?php echo $list[$h]; ?>', 
                    null, function(data) {$('#tampil_data').html(data);})" <?php echo">".$h."</a> ";
				}
			}else{
				for ($h = 1; $h <= $max; $h++) {
					$list[$h] = $lim * $h - $lim;
					echo " <a href='javascript:void(0)' ";?> 
                    onClick="$.get('../admin/tampil_data.php?keterampilan=<?php echo $_GET[keterampilan];?>&hal=<?php echo $list[$h]; ?>', 
                    null, function(data) {$('#tampil_data').html(data);})" <?php echo">".$h."</a> ";
				}
			}		
		}else{
				for ($h = 1; $h <= $max; $h++) {
					$list[$h] = $lim * $h - $lim;
					echo " <a href='javascript:void(0)' ";?> 
                    onClick="$.get('../admin/tampil_data.php?cari=<?php echo $_GET[cari];?>&hal=<?php echo $list[$h]; ?>', 
                    null, function(data) {$('#tampil_data').html(data);})" <?php echo">".$h."</a> ";
				}
		}

	echo "</td>
		</tr>
		</table>";
?>
</p>
<p>&nbsp;</p>
  <p><span class="pull-right">
	<a href='../cetak/hsl_xls.php' target='_blank'
	class="btn" ><i class='icon-download-alt'></i>Excel</a> 
	<a href='../cetak/hsl_pdf.php'target='_blank'
	class="btn" ><i class='icon-download-alt'></i> PDF</a> <a href='../cetak/hsl_cetak.php?txt_cari'
	target='_blank'
	class="btn" ><i class='icon-print'></i>Cetak</a></span></p>