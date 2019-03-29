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
<?
include ('../temp/koneksi.php');

$kode1	= $_GET['kode1'];
$kode2	= $_GET['kode2'];
$hal	= $_GET['hal'] ? $_GET['hal'] : 0;
$lim	= 3;

if (empty($kode1) && empty($kode2)){
	$query2	= "SELECT * FROM gallery";
}else{
	$query2	= "SELECT * FROM gallery
			WHERE no_info BETWEEN '$kode1' AND '$kode2' ";
}
	$data2	= mysql_query($query2);
	$jml	= mysql_num_rows($data2);
	
	$max	= ceil($jml/$lim);

echo "<div id='info'>
<table width='800' border='0' align='center'>";
if (empty($kode1) && empty($kode2)){
		$sql = "SELECT * FROM gallery
				ORDER BY id_foto
				LIMIT $hal,$lim";
		}else{
		$sql = "SELECT * FROM gallery
				WHERE no_info BETWEEN '$kode1' AND '$kode2'
				ORDER BY id_foto
				LIMIT $hal,$lim";
		}
				
		//echo $sql;
		$query = mysql_query($sql);
		
		$no=1+$hal;
		while($r_data=mysql_fetch_array($query)){
			echo "
			
            <tr>
              <td>$r_data[nama]<span class='label label-success'></span></td>
              <td>&nbsp;</td>
            </tr>
  <tr>
    <td width='200' rowspan='2'><a href='../image/$r_data[namafoto]' target='_blank'><img src='../image/$r_data[namafoto]' width='200' height='200' border='0'/></a></td>
    <td width='1172'>&nbsp;</td>
  </tr>
 
  ";
			$no++;
		}
		
echo "</table>
";
	echo "<table width='100%'>
		<tr>
			<td>Jumlah Data : $jml</td>";
		if (empty($kode1) && empty($kode2)){
		echo "<td align='right'>Halaman :";
			for ($h = 1; $h <= $max; $h++) {
					$list[$h] = $lim * $h - $lim;
					echo " <a href='javascript:void(0)' ";?> 
                    onClick="$.get('../peserta/informasi.php?hal=<?php echo $list[$h]; ?>', 
                    null, function(data) {$('#info').html(data);})" <?php echo">".$h."</a> ";
				}
	echo "</td>";
		}else{
		echo "<td align='right'>Halaman :";
			for ($h = 1; $h <= $max; $h++) {
					$list[$h] = $lim * $h - $lim;
					echo " <a href='javascript:void(0)' ";?> 
                    onClick="$.get('.././peserta/informasi.php?kode1=<?php echo $_GET['kode1'];?>
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