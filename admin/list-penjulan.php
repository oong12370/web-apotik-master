<script type="text/javascript">
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
</script>
<?php
error_reporting(0);
include '../temp/koneksi.php';

$kode1	= $_GET['kode1'];
$kode2	= $_GET['kode2'];
$hal	= $_GET['hal'] ? $_GET['hal'] : 0;
$lim	= 5;

if (empty($kode1) && empty($kode2)){
	$query2	= "SELECT  tbl_transaksi.no_transaksi, tbl_transaksi.tgl, tbl_transaksi.subtotal, tbl_konsumen.kd_konsumen, tbl_konsumen.nm_konsumen,tbl_konsumen.keluhan, detail.no_transaksi,  tbl_obat.kd_obat from detail
  inner join tbl_transaksi on  detail.no_transaksi = tbl_transaksi.no_transaksi
  inner join tbl_konsumen on tbl_transaksi.kd_konsumen = tbl_konsumen.kd_konsumen
  inner join tbl_obat on detail.kd_obat = tbl_obat.kd_obat";
}else{
	$query2	= "SELECT  tbl_transaksi.no_transaksi, tbl_transaksi.tgl, tbl_transaksi.subtotal, tbl_konsumen.kd_konsumen, tbl_konsumen.nm_konsumen,tbl_konsumen.keluhan, detail.no_transaksi,  tbl_obat.kd_obat from detail
  inner join tbl_transaksi on  detail.no_transaksi = tbl_transaksi.no_transaksi
  inner join tbl_konsumen on tbl_transaksi.kd_konsumen = tbl_konsumen.kd_konsumen
  inner join tbl_obat on detail.kd_obat = tbl_obat.kd_obat BETWEEN '$kode1' AND '$kode2' ";
}
	$data2	= mysql_query($query2);
	$jml	= mysql_num_rows($data2);
	
	$max	= ceil($jml/$lim);

echo "<div id='info'>
	<table width='100%' border='1' id='theList'>
		<tr>
			<th bgcolor='#666666'>No.</th>
			<th bgcolor='#666666'>Kode Transaksi</th>
			<th bgcolor='#666666'>Nama Konsumen</th>
			<th bgcolor='#666666'>Tanggal</th>
			<th bgcolor='#666666'>Obat</th>
			<th bgcolor='#666666'>Harga</th>
			<th bgcolor='#666666'>Jumlah</th>
			<th bgcolor='#666666'>Total</th>
		</tr>";
		if (empty($kode1) && empty($kode2)){
		$sql = "SELECT  tbl_transaksi.no_transaksi, tbl_transaksi.tgl, tbl_transaksi.subtotal, tbl_konsumen.kd_konsumen, tbl_konsumen.nm_konsumen,tbl_konsumen.keluhan, detail.no_transaksi, detail.harga, detail.jumlah,  tbl_obat.kd_obat ,tbl_obat.nm_obat from detail
  inner join tbl_transaksi on  detail.no_transaksi = tbl_transaksi.no_transaksi
  inner join tbl_konsumen on tbl_transaksi.kd_konsumen = tbl_konsumen.kd_konsumen
  inner join tbl_obat on detail.kd_obat = tbl_obat.kd_obat 
				LIMIT $hal,$lim";
		}else{
		$sql = "SELECT  tbl_transaksi.no_transaksi, tbl_transaksi.tgl, tbl_transaksi.subtotal, tbl_konsumen.kd_konsumen, tbl_konsumen.nm_konsumen,tbl_konsumen.keluhan, detail.no_transaksi, detail.harga, detail.jumlah,  tbl_obat.kd_obat from detail
  inner join tbl_transaksi on  detail.no_transaksi = tbl_transaksi.no_transaksi
  inner join tbl_konsumen on tbl_transaksi.kd_konsumen = tbl_konsumen.kd_konsumen
  inner join tbl_obat on detail.kd_obat = tbl_obat.kd_obat BETWEEN '$kode1' AND '$kode2'
				
				LIMIT $hal,$lim";
		}
				
		//echo $sql;
		$query = mysql_query($sql);
		  
		$no=1+$hal;
		while($r_data=mysql_fetch_array($query)){
		$harga = $r_data['harga'];
  			$jumlah = $r_data['jumlah'];
		$subtotal = $harga*$jumlah;
			echo "<tr>
					<td align='center'>$no</td>
					<td>$r_data[no_transaksi]</td>
					<td>$r_data[nm_konsumen]</td>
					<td>$r_data[tgl]</td>
					<td>$r_data[nm_obat]</td>
					<td>$r_data[harga]</td>
					<td>$r_data[jumlah]</td>
					<td>$subtotal</td>
					
					</tr>";
			$no++;
		}
		
echo "</table>";
	echo "<table width='100%'>
		<tr>
			<td>Jumlah Data : $jml</td>";
		if (empty($kode1) && empty($kode2)){
		echo "<td align='right'>Halaman :";
			for ($h = 1; $h <= $max; $h++) {
					$list[$h] = $lim * $h - $lim;
					echo " <a href='javascript:void(0)' ";?> 
                    onClick="$.get('../admin/list_konsumen.php?hal=<?php echo $list[$h]; ?>', 
                    null, function(data) {$('#info').html(data);})" <?php echo">".$h."</a> ";
				}
	echo "</td>";
		}else{
		echo "<td align='right'>Halaman :";
			for ($h = 1; $h <= $max; $h++) {
					$list[$h] = $lim * $h - $lim;
					echo " <a href='javascript:void(0)' ";?> 
                    onClick="$.get('../admin/list_konsumen.php?kode1=<?php echo $_GET['kode1'];?>
                    &kode2=<?php echo $_GET['kode2'];?>
                    &hal=<?php echo $list[$h]; ?>', 
                    null, function(data) {$('#info').html(data);})" <?php echo">".$h."</a> ";
				}
	echo "</td>";
		}
	echo "</tr>
		</table>";
	echo "</div>";
?>