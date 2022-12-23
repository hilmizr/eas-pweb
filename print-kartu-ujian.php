<?php

$path =  $_SERVER['DOCUMENT_ROOT'] . '/phpfpdf/fpdf.php';
require($path);

session_start();
include "config.php";

$pdf = new FPDF("l", "mm", "A5");

$pdf->AddPage();
$pdf->SetFont('Times', 'B', 18);
$pdf->Cell($pdf->GetPageWidth() - 20, 7, "KARTU UJIAN SELEKSI PEGAWAI BARU ", 0, 1, "C");
$pdf->Cell($pdf->GetPageWidth() - 20, 7, "KEMENTRIAN KELAUTAN DAN PERIKANAN", 0, 1, "C");
$pdf->Cell(20, 6, "", 0, 1, "C");

$query = "SELECT * FROM pendaftar WHERE username = :username";
$sql = $pdo->prepare($query);
$username = $_SESSION["username"];
$sql->execute(['username' => $username]);

if ($sql) {
  while ($pendaftar = $sql->fetch()) {
    $width = $pdf->GetPageWidth();

    $pdf->Cell($width - 20, 7, "Nomor Peserta:\t" . $pendaftar['no_peserta'], 1, 1, "C");
    $pdf->Ln();

    $pdf->Cell($width * 3 / 5, 10, "NIK: " . $pendaftar['nik'], 0, 0);

    $pdf->SetX($width * 3 / 5 + 10);
    $pdf->Cell(
      ($width * 2 / 5) - 20,
      10,
      $pdf->Image('images/' . $pendaftar['foto_diri'], $pdf->GetX(), $pdf->GetY(), ($width * 2 / 5) - 20),
      0,
      1,
      'C',
      false
    );

    $pdf->MultiCell($width * 3 / 5, 10, "Nama:\t" . $pendaftar['nama'], 0, 1);
    $pdf->MultiCell($width * 3 / 5, 10, "Jenis Kelamin:\t" . $pendaftar['kelamin'], 0, 1);
    $pdf->MultiCell($width * 3 / 5, 10, "Tempat/Tanggal Lahir:\t" . $pendaftar['tempat_lahir'] . ", " . $pendaftar['tgl_lahir'], 0, 1);
    $pdf->MultiCell($width * 3 / 5, 10, "Pendidikan Terakhir:\t" . $pendaftar['pendidikan'], 0, 1);
    $pdf->MultiCell($width * 3 / 5, 10, "Lokasi ujian:\t" . $pendaftar['lokasi_tes'], 0, 1);
  }

  $pdf->Output();
}
