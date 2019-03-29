<script type="text/javascript">	
$(document).ready(function() {
	$("#tabs").tabs({selected:0});
	$("#tampil_data").load('../admin/hasil.php');
	
	$("#txt_cari").keyup(function() {
		var cari 	= $("#txt_cari").val()
		var akses	= 1; 
		$.ajax({
			type	: "GET",
			url		: "../admin/hasil.php",
			data	: "cari="+cari,
			timeout	: 3000,
			beforeSend	: function(){		
				$("#hasil").html("<img src='loading.gif' />");			
			},				  
			success	: function(data){
				$("#hasil").html(data);
				$("#cari_txt_all").attr("checked","checked");
				$("#cari_txt_a").attr("checked","checked");
			}
		});
	});
	
	$(".cari_-katagori").click(function() {
		var jekel = $(".cari_katagori:checked").val();
		$.ajax({
			type	: "GET",
			url		: "../admin/thasil.php",
			data	: "kd_katagori="+kd_katagori,
			timeout	: 3000,
			beforeSend	: function(){		
				$("#hasil").html("<img src='loading.gif' />");			
			},				  
			success	: function(data){
				$("#hasil").html(data);
				$("#txt_cari").val('');
			}
		});
	});

	$(".cari_katagori").click(function() {
		var kd_katagori = $(".cari_katagori:checked").val();
		$.ajax({
			type	: "GET",
			url		: "../admin/hasil.php",
			data	: "kd_katagori="+kd_katagori,
			timeout	: 3000,
			beforeSend	: function(){		
				$("#tampil_data").html("<img src='loading.gif' />");			
			},				  
			success	: function(data){
				$("#hasil").html(data);
				$("#txt_cari").val('');
			}
		});

	});

	$("#btn").click(function() {
	});
});

</script>

<style type="text/css">
#info {
	font-size:12px;
	font-weight:bold;
	color:#F00;
}
fieldset {
  padding: 0 20px 20px;
  margin: 0 0 30px;
  border: 2px solid #593131;
  background: #eae1c0;
  border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
}
.style4 {font-size: 18px}

</style>
<?php
echo "<div id='tabs'>";
echo "<ul ><li>
  <div align='center' class='style4'><a href='#data'>Report Pembelian</a></div>
</li>
      </ul>
";
	echo "<div id='form'>
	</div>";
	echo "<div id='data'>
			<div id='pencarian'>
			<fieldset>
			<legend>Cari Data</legend>
			<table width='100%'>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
			  </tr>
				<tr>
					<td width='10%'>Nama pelanggan </td>
					<td width='2%'>:</td>
					<td><input type='text' name='txt_cari' id='txt_cari' size='80'></td>
				</tr>
				<tr>
					<td>Katagori</td>
					<td>:</td>
				  <td><input type='radio' name='cari_txt_katagori' id='cari_txt_all' value='all' class='cari_katagori' checked>
				    All
					<input type='radio' name='cari_txt_katagori' id='cari_txt_elektronika' value='Obat A' class='cari_keterampilan' >
					Obat A
					<input type='radio' name='cari_txt_keterampilan' id='cari_txt_motor' value='Obat B' class='cari_keterampilan'>
					Obat B				
					<input type='radio' name='cari_txt_keterampilan' id='cari_txt_mobil' value='Obat C' class='cari_keterampilan'>
Obat C
<input type='radio' name='cari_txt_keterampilan' id='cari_txt_menjahit' value='Obat D' class='cari_keterampilan' />
Obat D
<input type='radio' name='cari_txt_keterampilan' id='cari_txt_komputer' value='Obat E' class='cari_keterampilan' />
Obat E</td>
				</tr>	
			</table>
			</fieldset>
			</div><br>
			<div id='tampil_data' align='center'></div>
	</div>";
	echo "<div id='info' align='center'></div>";
echo "</div>";
?>
<link href="../css/gried.css" rel="stylesheet" type="text/css" />
