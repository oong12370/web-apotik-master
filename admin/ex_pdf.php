<?php
require('../fpdf/fpdf.php');

$host="localhost";
$user="root";
$pass="root";
$db="db_apotik";

$entries=10;
$waktu=date("Y-m-d H:i:s");
	
$koneksi=mysql_connect($host,$user,$pass);
mysql_select_db($db,$koneksi);

if($koneksi){
}else{
	echo "Gagal koneksi";
}


#ambil data di tabel   


//echo 'kode perusahaan : $kd_perusahaan';


$sql=mysql_query("SELECT * FROM tbl_obat where tgl_ex &&  DATEDIFF( `tgl_ex` , NOW( ) ) <7");//order by
$data=mysql_fetch_array($sql);
//data surat



//deklarasi FPDF
class PDF extends FPDF {
	//inisialisasi Header DOkumen PDF
	function Header() {
		//load image logo
		$this->Image('logo1.jpg',2.5,1,'C');
		//setting format font
		$this->SetFont('Arial','B',14);
		//header text
		$this->Ln(1);
		$this->Cell(0,2.5,' PENUNJUKAN PEMBIMBING SKRIPSI / TUGAS AKHIR ',0,0,'C');
		//ganti baris
		//$this->Ln();
		//setting format font
		
	}
 
}

//Membuat Objej fpdf
$pdf = new FPDF ('L','mm','letter');
//buat Halaman baru
$pdf->AddPage();

//Set Huruf arial,
$pdf->SetFont ('arial','B','14');
//Mencetak Huruf di Dalam File

$pdf->setXY(90,34);
$pdf->Cell(40,10,'Data Obat Expired ');
//Latar

$y_initial = 10;
$y_axis1 = 35;
$pdf->SetFont ('arial','B','10');
$pdf->setY($y_axis1);
$pdf->setXY(25,64);
$pdf->Cell(25,6,'Kode Obat',1,0,'C');
$pdf->Cell(40,6,'Nama Obat',1,0,'C');
$pdf->Cell(30,6,'tanggal masuk',1,0,'C');
$pdf->Cell(30,6,'tanggal Expired',1,0,'C');
$pdf->Cell(25,6,'Harga',1,0,'C');
$pdf->Cell(25,6,'Stok',1,0,'C');


include "../temp/koneksi.php";
$query = "SELECT * FROM tbl_obat where tgl_ex &&  DATEDIFF( `tgl_ex` , NOW( ) ) <7" ;
$rs = mysql_query($query) or die(mysql_error());
$y = 70;
$no = 0;
$row = 6;
while($data = mysql_fetch_array($rs)){
$no++;
$pdf->SetFont ('arial','','9');
$pdf->setY($y);
	$pdf->setXY(25,$y);

	$pdf->Cell(25,6,$data['kd_obat'],1,0,'L');
	$pdf->Cell(40,6,$data['nm_obat'],1,0,'L');
	$pdf->Cell(30,6,$data['tgl'],1,0,'L');
	$pdf->Cell(30,6,$data['tgl_ex'],1,0,'L');
	$pdf->Cell(25,6,$data['harga'],1,0,'L');
	$pdf->Cell(25,6,$data['stok'],1,0,'L');
		$y = $y + $row;
		}
	
$pdf->Output();

?>
