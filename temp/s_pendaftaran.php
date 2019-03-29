
<?php
include"koneksi.php";
//Upload Gambar
$folder ='../image/'; //folder tempat menyimpan file
$foto = $_FILES['foto']['name'];
if ($foto != "")
{
 
	
		$ext = explode(".",$foto);
	$ext = strtolower($ext[1]);
if (($ext == "jpg")||($ext == "jpeg")||($ext == "gif"))
{

$target = $folder.basename($_FILES['foto']['name']);
move_uploaded_file($_FILES['foto']['tmp_name'],$target);

	}
	}
$nama=$_POST['nama'];
$passEnkrip=md5($_POST['password']);
$jekel=$_POST['jekel'];
$alamat=$_POST['alamat'];
$email=$_POST['email'];
$tlp=$_POST['tlp'];
$level=$_POST['level'];
if($email=="" || $passEnkrip=="") {
	echo"<h2>Maaf, Masih Ada Data yang Kosong.</h2>";
	echo"<a href=\"javascript:history.back()\"> Klik disini </a> Untuk Mengulang Register.";

}else{

$sql=mysql_query("insert into pendaftaran values('','$nama','$passEnkrip','$jekel','$alamat','$email','$tlp','$foto','$level')");

echo"<h2>Register Berhasil</h2>";

}
?>