<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',12);
// mencetak string 
$pdf->SetFont('Arial','B',12);
$pdf->Cell(275,7,'PENDAFTAR',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(32,6,'Foto',1,0, 'C');
$pdf->Cell(32,6,'NIS',1,0, 'C');
$pdf->Cell(32,6,'NAMA',1,0, 'C');
$pdf->Cell(32,6,'KELAMIN',1,0, 'C');
$pdf->Cell(32,6,'TELEPON',1,0, 'C');
$pdf->Cell(120,6,'ALAMAT',1,1, 'C');

$pdf->SetFont('Arial','',10);

include "koneksi.php";
$sql = $pdo->prepare("SELECT * FROM siswa");
$sql->execute(); // Eksekusi querynya

while ($data = $sql->fetch()){
    $pdf->Cell(32, 15, 
        $pdf->Image('images/'.$data['foto'], $pdf->GetX() + 10, $pdf->GetY() + 2, 12, 0)
    , 1, 0, 'C', false);
    $pdf->Cell(32,15,$data['nis'],1,0);
    $pdf->Cell(32,15,$data['nama'],1,0);
    $pdf->Cell(32,15,$data['jenis_kelamin'],1,0);
    $pdf->Cell(32,15,$data['telp'],1,0);
    $pdf->Cell(120,15,$data['alamat'],1,1); 
}

$pdf->Output();
?>