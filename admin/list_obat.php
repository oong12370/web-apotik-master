<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title></head>

<body>
<fieldset>
<legend>View Data Obat</legend>
<form id="form1" name="form1" method="post" action="">
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
	$query2	= "select tbl_obat.kd_obat,nm_obat,nm_katagori,harga,tgl,stok from tbl_obat inner join tbl_katagori on tbl_obat.kd_katagori=tbl_katagori.kd_katagori && nm_obat LIKE '$_POST[cari_data]%'";
}else{
	$query2	= "select tbl_obat.kd_obat,nm_obat,nm_katagori,harga,tgl,stok from tbl_obat inner join tbl_katagori on tbl_obat.kd_katagori=tbl_katagori.kd_katagori && nm_obat LIKE '$_POST[cari_data]%' BETWEEN '$kode1' AND '$kode2' ";
}
	$data2	= mysql_query($query2);
	$jml	= mysql_num_rows($data2);
	
	$max	= ceil($jml/$lim);

echo "<div id='info'>
	<table width='100%' border='1' id='theList'>
		<tr>
			<th bgcolor='#666666'>No.</th>
			<th bgcolor='#666666'>Kode Obat</th>
			<th bgcolor='#666666'>Nama Obat</th>
			<th bgcolor='#666666'>Jenis</th>
			<th bgcolor='#666666'>Tanggal</th>
			<th bgcolor='#666666'>Harga</th>
			<th bgcolor='#666666'>Stock</th>
			<th bgcolor='#666666'>Action</th>
		</tr>";
		if (empty($kode1) && empty($kode2)){
		$sql = "select tbl_obat.kd_obat,nm_obat,nm_katagori,harga,tgl,stok from tbl_obat inner join tbl_katagori on tbl_obat.kd_katagori=tbl_katagori.kd_katagori && nm_obat LIKE '$_POST[cari_data]%'
				ORDER BY kd_obat 
				LIMIT $hal,$lim";
		}else{
		$sql = "select tbl_obat.kd_obat,nm_obat,nm_katagori,harga,tgl,stok from tbl_obat inner join tbl_katagori on tbl_obat.kd_katagori=tbl_katagori.kd_katagori && nm_obat LIKE '$_POST[cari_data]%'
				WHERE nm_obat BETWEEN '$kode1' AND '$kode2'
				ORDER BY kd_obat
				LIMIT $hal,$lim";
		}
				
		//echo $sql;
		$query = mysql_query($sql);
		
		$no=1+$hal;
		while($r_data=mysql_fetch_array($query)){
			echo "<tr>
					<td align='center'>$no</td>
					<td>$r_data[kd_obat]</td>
					<td>$r_data[nm_obat]</td>
					<td>$r_data[nm_katagori]</td>
					<td>$r_data[tgl]</td>
					<td>$r_data[harga]</td>
					<td>$r_data[stok]</td>
					<td><div align='center'><a href='?page=edit_obat&kd_obat=$r_data[kd_obat]'>Edit</a> | <a href='?page=hps_obat&kd_obat=$r_data[kd_obat]'>Hapus</div></td>
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
                    onClick="$.get('../admin/list_obat.php?hal=<?php echo $list[$h]; ?>', 
                    null, function(data) {$('#info').html(data);})" <?php echo">".$h."</a> ";
				}
	echo "</td>";
		}else{
		echo "<td align='right'>Halaman :";
			for ($h = 1; $h <= $max; $h++) {
					$list[$h] = $lim * $h - $lim;
					echo " <a href='javascript:void(0)' ";?> 
                    onClick="$.get('../admin/list_obat.php?kode1=<?php echo $_GET['kode1'];?>
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
<br />
  <table width="599" height="41" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="11" bgcolor="#CCCCCC">&nbsp;</td>
      <td width="482" bgcolor="#CCCCCC"><label>Cari Data Berdasarkan Nama Obat :
          <input name="cari_data" type="text" id="cari_data" size="30" />
      </label></td>
      <td width="106"><label></label></td>
    </tr>
  </table>
</form>
</form>
</fieldset>
</body>
</html>
