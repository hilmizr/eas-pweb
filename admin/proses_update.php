<?php
// Load file koneksi.php
include "../config.php";
// Ambil data ID yang dikirim oleh form_ubah.php melalui URL
$id = $_POST['id'];
// Ambil Data yang Dikirim dari Form
$status = $_POST['status'];
// Proses ubah data ke Database
$sql = $pdo->prepare("UPDATE pendaftar SET status=:status WHERE id=:id");
$sql->bindParam(':id', $id);
$sql->bindParam(':status', $status);
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