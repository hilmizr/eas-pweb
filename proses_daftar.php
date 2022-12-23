<?php
// Load file koneksi.php
include "config.php";
session_start();

function redirectAndSendFlashMessage(string $url, string $error, string $title, string $message = "")
{
    $_SESSION['error'] = $error;
    $_SESSION['title'] = $title;
    $_SESSION['message'] = $message;
    header("Location: " . $url);
}

// Ambil Data yang Dikirim dari Form

try {
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
        redirectAndSendFlashMessage(
            'daftar.php',
            'password',
            'Password tidak sama!',
        );
        return;
    }

    $ktpName = $_FILES['ktp']['name'];
    $profilePhotoName = $_FILES['profilePhoto']['name'];
    $certificateName = $_FILES['certificate']['name'];
    $tempKTP = $_FILES['ktp']['tmp_name'];
    $tempProfilePhoto = $_FILES['profilePhoto']['tmp_name'];
    $tempCertificateName = $_FILES['certificate']['tmp_name'];

    //Hashing password
    // $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $ktp = date('dmYHis') . $ktpName;
    $profilePhoto = date('dmYHis') . $profilePhotoName;
    $certificate = date('dmYHis') . $certificateName;

    // Set path folder tempat menyimpan fotonya
    $path1 = "images/" . $ktp;
    $path2 = "images/" . $profilePhoto;
    $path3 = "images/" . $certificate;

    // Proses upload
    // Cek apakah gambar berhasil diupload atau tidak
    if (!(move_uploaded_file($tempKTP, $path1) && move_uploaded_file($tempProfilePhoto, $path2) && move_uploaded_file($tempCertificateName, $path3))) {
        // Jika gambar gagal diupload, Lakukan :
        redirectAndSendFlashMessage(
            'daftar.php',
            'image',
            "Terjadi kesalahan saat menyimpan file.",
            "Silakan coba lagi."
        );
        return;
    }


    // Proses simpan ke Database
    $sql = $pdo->prepare("INSERT INTO pendaftar
        (username, password, email, nik, nama, kelamin, tempat_lahir, tgl_lahir, pendidikan, alamat, jabatan, foto_ktp, foto_diri, ijazah) 
        VALUES(:username, :password, :email, :nik, :nama, :kelamin, :tempat_lahir, :tgl_lahir, :pendidikan, :alamat, :jabatan, :foto_ktp, :foto_diri, :ijazah)");
    $sql->bindParam(':username', $username);
    $sql->bindParam(':password', $password);
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

    // Cek jika proses simpan ke database sukses atau tidak
    if (!$sql) {
        // Jika Gagal, Lakukan :
        redirectAndSendFlashMessage(
            'daftar.php',
            'database',
            "Terjadi kesalahan saat mencoba untuk menyimpan data ke database.",
            "Silakan coba lagi."
        );
        return;
    }

    // Jika Sukses, Lakukan :
    header("location: index.php"); // Redirect ke halaman index.php
} catch (Error $error) {
    redirectAndSendFlashMessage(
        'daftar.php',
        'internal',
        "Terjadi kesalahan internal.",
        "Silakan coba lagi."
    );
    return;
}
