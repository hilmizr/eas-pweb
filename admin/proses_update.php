<?php
// Load file koneksi.php
include "../config.php";
// Ambil data ID yang dikirim oleh form_ubah.php melalui URL
$id = $_POST['id'];
// Ambil Data yang Dikirim dari Form
$status = $_POST['status'];
$noPeserta = 0;
$location = 0;

if($status == 1){
    $location = $_POST['location'];

    if($id < 10){
        $noPeserta = "NP-0000".$id;
    }
    else if($id < 100){
        $noPeserta = "NP-000".$id;
    }
    else if($id < 1000){
        $noPeserta = "NP-00".$id;
    }
    else if($id < 10000){
        $noPeserta = "NP-0".$id;
    }
    else if($id < 100000){
        $noPeserta = "NP-".$id;
    }
}
// Proses ubah data ke Database
$sql = $pdo->prepare("UPDATE pendaftar SET status=:status, no_peserta=:no_peserta, lokasi_tes=:lokasi_tes WHERE id=:id");
$sql->bindParam(':id', $id);
$sql->bindParam(':status', $status);
$sql->bindParam(':no_peserta', $noPeserta);
$sql->bindParam(':lokasi_tes', $location);
$execute = $sql->execute(); // Eksekusi / Jalankan query
if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: dashboard.php"); // Redirect ke halaman list-siswa.php
}else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='dashboard.php'>Kembali</a>";
}
?>