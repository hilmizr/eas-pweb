<?php
session_start();
  require("../phpfpdf/fpdf.php");

  include "config.php";

  $pdf = new FPDF("L", "mm", "A5");

  $pdf->AddPage();
  $pdf->SetFont('Times', 'B', 18);
  $pdf->Cell($pdf->GetPageWidth() - 20, 7, "KARTU UJIAN SELEKSI PEGAWAI BARU ", 0, 1, "C");
  $pdf->Cell($pdf->GetPageWidth() - 20, 7, "KEMENTRIAN KELAUTAN DAN PERIKANAN", 0, 1, "C");
  $pdf->Cell(20, 6, "", 0, 1, "C");
  // $pdf->Cell($pdf->GetPageWidth(), 7, "", 0, 1, "C");
  // $pdf->Cell($pdf->GetPageWidth(), 7, "", 0, 1, "C");

  $query = "SELECT * FROM pendaftar WHERE username = :username";
  $sql = $pdo->prepare($query);
  $username = $_SESSION["username"];
  $sql->execute(['username' => $username]);

  if($sql){
    while($pendaftar = $sql->fetch()){
      $pdf->Cell($pdf->GetPageWidth() - 20, 7, "Nomor Peserta:\t".$pendaftar['no_peserta'], 0, 0, "C");
      $pdf->Ln();
      $pdf->Ln();
      $pdf->Cell($pdf->GetPageWidth() / 1.6, 0, "", 0, 0);
      $image = $pendaftar["foto_diri"];
      $url = "../eas-pweb/images/";
      $pdf->Cell(0, 4, $pdf->Image($url.$image, $pdf->GetX(), $pdf->GetY(), 65, 65), 0, 0, "C", false);
      $pdf->Ln();
      $pdf->SetFont('Times', 'B', 14);
      $pdf->Cell(20, 10, "NIK: " . $pendaftar['nik'], 0, 1);
      $pdf->Cell(20, 10, "Nama:\t" . $pendaftar['nama'], 0, 1);
      $pdf->Cell(20, 10, "Jenis Kelamin:\t" . $pendaftar['kelamin'], 0, 1);
      $pdf->Cell(20, 10, "Tempat/Tanggal Lahir:\t" . $pendaftar['tempat_lahir'] . ", " . $pendaftar['tgl_lahir'], 0, 1);
      $pdf->Cell(20, 10, "Pendidikan Terakhir:\t" . $pendaftar['pendidikan'], 0, 1);
      $pdf->Cell(20, 10, "Lokasi ujian:\t" . $pendaftar['lokasi_tes'], 0, 1);
    }

    $pdf->Output();
  }

?>