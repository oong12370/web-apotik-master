<?php

include '../temp/koneksi.php';

if(isset($_GET['search_word']))
{
$search_word=$_GET['search_word'];

$sql=mysql_query("SELECT * FROM tbl_konsumen WHERE nm_konsumen LIKE '%$search_word%' ORDER BY nm_konsumen DESC LIMIT 20");

$count=mysql_num_rows($sql);

if($count > 0)
{
?>
<tr>
        <td width="114" bgcolor="#DCDCDC"><span class="style7">Kode Konsumen </span></td>
        <td width="114" bgcolor="#DCDCDC"><span class="style7">Nama Konsumen </span></td>
		<td width="75" bgcolor="#DCDCDC"><span class="style7">Telpon</span></td>
        <td width="75" bgcolor="#DCDCDC"><span class="style7">Alamat</span></td>
        <td width="76" bgcolor="#DCDCDC"><div align="center"><em>Aksi</em></div></td>
</tr>
<?php 
while($row=mysql_fetch_array($sql))
{

		
echo "<tr>";
echo "<td align=center>".$row['kd_konsumen']."</td>";
echo "<td>&nbsp;".$row['nm_konsumen']."</td>";
echo "<td align=center>".$row['telp']."</td>";
echo "<td align=center>".$row['alamat']."</td>";
echo "<td align=center><a href='?page=transaksi&kd_konsumen=$row[kd_konsumen]''><img src='../image/ico_active_16.png' width='16' height='16' border='0'></a></td>";
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
