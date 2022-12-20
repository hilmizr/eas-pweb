<?php
    // Load file koneksi.php
    include "config.php";
    // Ambil Data yang Dikirim dari Form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $kelamin = $_POST['kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $pendidikan = $_POST['pendidikan'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    $foto_ktp = $_FILES['foto_ktp']['name'];
    $foto_diri = $_FILES['foto_diri']['name'];
    $ijazah = $_FILES['ijazah']['name'];
    $tmpktp = $_FILES['foto_ktp']['tmp_name'];
    $tmpdr = $_FILES['foto_diri']['tmp_name'];
    $tmpij = $_FILES['ijazah']['tmp_name'];
    //Hashing password
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotoktp = date('dmYHis').$foto_ktp;
    $fotodiri = date('dmYHis').$foto_diri;
    $fotoijazah = date('dmYHis').$ijazah;
    // Set path folder tempat menyimpan fotonya
    $path1 = "images/".$fotoktp;
    $path2 = "images/".$fotodiri;
    $path3 = "images/".$fotoijazah;
    // Proses upload
    if(move_uploaded_file($tmpktp, $path1) && move_uploaded_file($tmpdr, $path2) && move_uploaded_file($tmpij, $path3)){ // Cek apakah gambar berhasil diupload atau tidak
    // Proses simpan ke Database
    $sql = $pdo->prepare("INSERT INTO pendaftar
        (username, password, nik, nama, kelamin, tempat_lahir, tgl_lahir, pendidikan, alamat, jabatan, foto_ktp, foto_diri, ijazah) 
        VALUES(:username, :pwd, :nik, :nama, :kelamin, :tempat_lahir, :tgl_lahir, :pendidikan, :alamat, :jabatan, :foto_ktp, :foto_diri, :ijazah)");
    $sql->bindParam(':username', $username);
    $sql->bindParam(':pwd', $password_hashed);       
    $sql->bindParam(':nik', $nik);
    $sql->bindParam(':nama', $nama);
    $sql->bindParam(':kelamin', $kelamin);
    $sql->bindParam(':tempat_lahir', $tempat_lahir);
    $sql->bindParam(':tgl_lahir', $tgl_lahir);
    $sql->bindParam(':pendidikan', $pendidikan);
    $sql->bindParam(':alamat', $alamat);
    $sql->bindParam(':jabatan', $jabatan);
    $sql->bindParam(':foto_ktp', $fotoktp);
    $sql->bindParam(':foto_diri', $fotodiri);
    $sql->bindParam(':ijazah', $fotoijazah);
    $sql->execute(); // Eksekusi query insert
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: index.php"); // Redirect ke halaman index.php
    }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
    }
    }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
    }
?>