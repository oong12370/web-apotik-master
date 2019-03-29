<link type="text/css" href="../css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />

		<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.8.24.custom.min.js"></script>
		
		<script type="text/javascript">
		$(function() {
		$( "#periode1" ).datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: "2012:2013",
				dateFormat: "yy-mm-dd"
			});
		$( "#periode2" ).datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: "2012:2013",
				dateFormat: "yy-mm-dd"
			});
		});
		</script>


	<form action="aksi_tgl.php" method="post" name="postform" id="postform" target="_blank">
  <table class="" width="320" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="2" bgcolor=><strong>Pencarian Transaksi </strong></td>
    </tr>
    <tr>
      <td width="165"><span class="style1">Tanggal Awal</span></td>
      <td width="155">:
      <input type="date" class="calendar-body" name="tanggal_awal" size="15" value="<?php echo $min_tanggal['min_tanggal'];?>"/></td>
    </tr>
    <tr>
      <td><span class="style1">Tanggal Akhir</span></td>
      <td>:
      <input type="date" name="tanggal_akhir" size="15" value="<?php echo $max_tanggal['max_tanggal'];?>"/></td>
    </tr>
    <tr>
      <td bgcolor=""><input class="btn" type="submit" value="View" name="cari" /></td>
    </tr>
  </table>
</form>


	<div align="center">================================================&gt; Data Summary Penjualan &lt;==============================================</div>
	<div align="right"><a href="summary.php" target="_blank"><img src="../image/printer_empty.png" width="30" height="30" border="0" /></a>
      <?php include "list-penjulan.php"; ?>
    </div>
	