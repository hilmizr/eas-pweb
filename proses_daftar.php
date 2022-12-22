<?php
// Load file koneksi.php
include "config.php";
// Ambil Data yang Dikirim dari Form

$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$email = $_POST['email'];
$nik = $_POST['nik'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$birthCity = $_POST['birthCity'];
$birthDate = $_POST['birthDate'];
$education = $_POST['education'];
$address = $_POST['address'];
$position = $_POST['position'];

// Password Checking
if ($password != $confirmPassword) {
    setcookie('error', "password");
    setcookie('title', "Password tidak sama!");
    header("Location: daftar.php");
    exit();
}

$ktpName = $_FILES['ktp']['name'];
$profilePhotoName = $_FILES['profilePhoto']['name'];
$certificateName = $_FILES['certificate']['name'];
$tempKTP = $_FILES['ktp']['tmp_name'];
$tempProfilePhoto = $_FILES['profilePhoto']['tmp_name'];
$tempCertificateName = $_FILES['certificate']['tmp_name'];

//Hashing password
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$ktp = date('dmYHis') . $ktpName;
$profilePhoto = date('dmYHis') . $profilePhotoName;
$certificate = date('dmYHis') . $certificateName;

// Set path folder tempat menyimpan fotonya
$path1 = "images/" . $ktp;
$path2 = "images/" . $profilePhoto;
$path3 = "images/" . $certificate;

// Proses upload
if (move_uploaded_file($tempKTP, $path1) && move_uploaded_file($tempProfilePhoto, $path2) && move_uploaded_file($tempCertificateName, $path3)) { // Cek apakah gambar berhasil diupload atau tidak
    // Proses simpan ke Database
    $sql = $pdo->prepare("INSERT INTO pendaftar
        (username, password, email, nik, nama, kelamin, tempat_lahir, tgl_lahir, pendidikan, alamat, jabatan, foto_ktp, foto_diri, ijazah) 
        VALUES(:username, :password, :email, :nik, :nama, :kelamin, :tempat_lahir, :tgl_lahir, :pendidikan, :alamat, :jabatan, :foto_ktp, :foto_diri, :ijazah)");
    $sql->bindParam(':username', $username);
    $sql->bindParam(':password', $password_hashed);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':nik', $nik);
    $sql->bindParam(':nama', $name);
    $sql->bindParam(':kelamin', $gender);
    $sql->bindParam(':tempat_lahir', $birthCity);
    $sql->bindParam(':tgl_lahir', $birthDate);
    $sql->bindParam(':pendidikan', $education);
    $sql->bindParam(':alamat', $address);
    $sql->bindParam(':jabatan', $position);
    $sql->bindParam(':foto_ktp', $ktp);
    $sql->bindParam(':foto_diri', $profilePhoto);
    $sql->bindParam(':ijazah', $certificate);
    $sql->execute(); // Eksekusi query insert

    if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: index.php"); // Redirect ke halaman index.php
    } else {
        // Jika Gagal, Lakukan :
        setcookie('error', "database");
        setcookie('title', "Terjadi kesalahan saat mencoba untuk menyimpan data ke database.");
        setcookie('message', "Silakan coba lagi.");
        header("Location: daftar.php");

        echo "";
        echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
    }
} else {
    // Jika gambar gagal diupload, Lakukan :
    setcookie('error', "image");
    setcookie('title', "Terjadi kesalahan saat menyimpan file.");
    setcookie('message', "Silakan coba lagi.");
    header("Location: daftar.php");
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
