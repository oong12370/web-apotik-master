<?php
error_reporting(0);
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

 $tanggal_awal =$_POST['tanggal_awal'];
  $tanggal_akhir =$_POST['tanggal_akhir'];
$sql=mysql_query("SELECT  tbl_transaksi.no_transaksi, tbl_transaksi.tgl, tbl_transaksi.subtotal, tbl_konsumen.kd_konsumen, tbl_konsumen.nm_konsumen,tbl_konsumen.keluhan, detail.no_transaksi, detail.jumlah,detail.harga,  tbl_obat.kd_obat from detail
  inner join tbl_transaksi on  detail.no_transaksi = tbl_transaksi.no_transaksi
  inner join tbl_konsumen on tbl_transaksi.kd_konsumen = tbl_konsumen.kd_konsumen
  inner join tbl_obat on detail.kd_obat = tbl_obat.kd_obat
   between '$tanggal_awal' and '$tanggal_akhir' order by tbl_transaksi.tgl");//order by
$data=mysql_fetch_array($sql);
//data surat
$no_transaksi=$data['no_transaksi'];
$kd_obat=$data['kd_obat'];
$jumlah=$data['jumlah'];
$harga=$data['harga'];


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
$pdf->setXY(85,15);
$pdf->Cell(40,20,'APOTIK INSAN PEMBANGUNAN BITUNG');
$pdf->setFont('Arial','B',12);
$pdf->setXY(55,15);
$pdf->Cell(30,30,'Jl. Raya Serang Km.10 Pos Bitung ,Kudu Jaya ,Curug Tangerang-Banten');
$pdf->setXY(123,15);
$pdf->setFont('Arial','B',10);
$pdf->setXY(90,34);
$pdf->Cell(40,10,'LAPORAN DATA OBAT YANG TERJUAL ');

//Latar
$pdf->setXY(110,10);
$pdf->setFont('Arial','B',14);

$pdf->setFont('Arial','',11);
$pdf->setXY(170,10);
$pdf->setFont('Arial','',10);
$pdf->Cell(68,67,date('D-d/m/Y'),0,1, 'C');
$pdf->setFont('Arial','',11);
$pdf->setXY(170,10);
$pdf->setXY(24,36);
$pdf->Cell(30,30,'Periode');
$pdf->Cell(11,30,': '.$tanggal_awal =$_POST['tanggal_awal'],0,1, 'L');
$pdf->setXY(24,40);
$pdf->Cell(30,30,' ');
$pdf->Cell(40,30,': '.$tanggal_akhir =$_POST['tanggal_akhir'],0,1, 'L');
$pdf->Line(25,34,260,34);
$pdf->SetLineWidth(0,5);
$pdf->Line(25,35,260,35);
$pdf->setXY(20,30);
//

$y_initial = 10;
$y_axis1 = 35;
$pdf->SetFont ('arial','B','10');
$pdf->setY($y_axis1);
$pdf->setXY(25,64);
$pdf->Cell(25,6,'No Transaksi',1,0,'C');
$pdf->Cell(25,6,'Pelanggan',1,0,'C');
$pdf->Cell(25,6,'Kode Obat',1,0,'C');
$pdf->Cell(25,6,'Nama Obat',1,0,'C');
$pdf->Cell(25,6,'Tanggal',1,0,'C');
$pdf->Cell(30,6,'Harga',1,0,'C');
$pdf->Cell(30,6,'Jumlah Beli',1,0,'C');
$pdf->Cell(50,6,'Total',1,0,'C');


include "../temp/koneksi.php";
$query = "SELECT  tbl_transaksi.no_transaksi, tbl_transaksi.tgl, tbl_transaksi.subtotal, tbl_konsumen.kd_konsumen, tbl_konsumen.nm_konsumen,tbl_konsumen.keluhan, detail.no_transaksi, detail.jumlah,detail.harga,  tbl_obat.kd_obat,  tbl_obat.nm_obat from detail
  inner join tbl_transaksi on  detail.no_transaksi = tbl_transaksi.no_transaksi
  inner join tbl_konsumen on tbl_transaksi.kd_konsumen = tbl_konsumen.kd_konsumen
  inner join tbl_obat on detail.kd_obat = tbl_obat.kd_obat
  WHERE tbl_transaksi.tgl between '$tanggal_awal' and '$tanggal_akhir' order by tbl_transaksi.tgl" ;
$rs = mysql_query($query) or die(mysql_error());
$y = 70;
$no = 0;
$row = 6;
while($data = mysql_fetch_array($rs)){
$jumlah=$data['jumlah'];
$harga=$data['harga'];
$total=$harga*$jumlah;
$sql2=mysql_query("SELECT sum(subtotal) as jml FROM tbl_transaksi where tbl_transaksi.tgl between '$tanggal_awal' and '$tanggal_akhir' order by tbl_transaksi.tgl");
	$rs2=mysql_fetch_array($sql2);
$no++;
$pdf->SetFont ('arial','','9');
$pdf->setY($y);
	$pdf->setXY(25,$y);
	$pdf->Cell(25,6,$data['no_transaksi'],1,0,'L');
	$pdf->Cell(25,6,$data['nm_konsumen'],1,0,'L');
	$pdf->Cell(25,6,$data['kd_obat'],1,0,'L');
	$pdf->Cell(25,6,$data['nm_obat'],1,0,'L');
	$pdf->Cell(25,6,$data['tgl'],1,0,'L');
	$pdf->Cell(30,6,$data['harga'],1,0,'L');
	$pdf->Cell(30,6,$data['jumlah'],1,0,'L');
	$pdf->Cell(50,6,$total,1,0,'L');
		$y = $y + $row;
		}
	$pdf->setY($y);
	$pdf->setXY(25,$y);
	$pdf->Cell(185,6,'Subtotal',1,0,'L');
	$pdf->Cell(50,6,$rs2['jml'],1,0,'L');
	
$pdf->Output();

?>
