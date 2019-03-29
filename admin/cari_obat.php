<?php

include '../temp/koneksi.php';

if(isset($_GET['search_word']))
{
$search_word=$_GET['search_word'];

$sql=mysql_query("SELECT * FROM tbl_obat WHERE nm_obat  LIKE '%$search_word%' ORDER BY nm_obat  DESC LIMIT 20 ");

$count=mysql_num_rows($sql);

if($count > 0)
{
?>
<tr>
        <td width="114" bgcolor="#DCDCDC"><span class="style7">Kode Obat </span></td>
        <td width="114" bgcolor="#DCDCDC"><span class="style7">Nama Obat </span></td>
        <td width="75" bgcolor="#DCDCDC"><span class="style7">Harga</span></td>
        <td width="75" bgcolor="#DCDCDC"><span class="style7">Stok</span></td>
        <td width="76" bgcolor="#DCDCDC"><div align="center"><em>Aksi</em></div></td>
</tr>
<?php 
while($row=mysql_fetch_array($sql))
{

		
echo "<tr>";
echo "<td align=center>".$row['kd_obat']."</td>";
echo "<td>&nbsp;".$row['nm_obat']."</td>";
echo "<td align=center>".$row['harga']."</td>";
echo "<td align=center>".$row['stok']."</td>";
echo "<td align=center><a href='?page=coba&kd_obat=$row[kd_obat]''><img src='../image/ico_active_16.png' width='16' height='16' border='0'></a></td>";
echo "</tr>";
 ?>
<?php
}
}
else
{
echo "<li>Nama Tidak Ada</li>";
}
}
?>
