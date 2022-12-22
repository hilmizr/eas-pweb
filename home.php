<?php
include 'config.php';
session_start();
if (isset($_SESSION["username"])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Seleksi Pegawai Baru Kementerian Kelautan dan Perikanan</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <!-- Styling -->
        <link rel="stylesheet" type="text/css" href="assets/css/home.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900' rel='stylesheet'>

    </head>

    <body>
        <div class="merged">
            <?php
            $query = "SELECT * FROM pendaftar WHERE username = :username";
            $statement = $pdo->prepare($query);
            $username = $_SESSION["username"];
            $statement->execute(['username' => $username]);
            $user = $statement->fetch();
            ?>

            <!-- Navbar -->
            <nav>
                <img src="https://kkp.go.id/an-component/media/upload-gambar-pendukung/kkp/DATA%20KKP/2019/Logo%20KKP/KKP%20Ind.png" alt="Brand Logo" class="brand-logo">
                <div class="profile">
                    <img src="images/<?= $user['foto_diri'] ?>" alt="Profile Picture" class="profile-picture">
                    <div class="username-and-id">
                        <span class="username"><?= $_SESSION["username"] ?></span>
                        <span class="id-number"><?= $user["nik"] ?></span>
                    </div>
                    <a href="logout.php" class="fw-semibold btn btn-brand me-2" id="logout-btn">Keluar</a>
                </div>
            </nav>

            <!-- Card -->
            <div class="container mb-5 shadow-lg">
                <div class="row justify-content-center">
                    <div class="card p-5" style="width: 100%;">
                        <div class="row no-gutters">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h1 class="card-title" id="main-title">Profil Pendaftar</h1>
                                    <h5 class="card-title" id="card-label">Nama</h5>
                                    <p class="card-text"><?= $user["nama"] ?></p>
                                    <h5 class="card-title mt-3" id="card-label">NIK</h5>
                                    <p class="card-text"><?= $user["nik"] ?></p>
                                    <h5 class="card-title mt-3" id="card-label">Pilihan Jabatan</h5>
                                    <p class="card-text"><?= $user["jabatan"] ?></p>
                                    <?php
                                    echo '<h5 class="card-title mt-3" id="card-label">Status Pendaftaran</h5>';
                                     if ($user["status"] === null) {
                                        echo '<p class="card-text">Belum Diverifikasi</p>';
                                    } else if ($user["status"] == '1') {
                                        echo '<p class="card-text" id="card-text-green">Lolos Berkas</p>';
                                        echo '<h5 class="card-title mt-3" id="card-label">Nomor Peserta</h5>';
                                        echo '<p class="card-text" id="card-text">'.$user['no_peserta'].'</p>';
                                        echo '<h5 class="card-title mt-3" id="card-label">Lokasi Ujian</h5>';
                                        echo '<p class="card-text" id="card-text">'.$user['lokasi_tes'].'</p>';
                                    } else if ($user["status"] == '2') {
                                        echo '<p class="card-text" id="card-text-red">Tidak Lolos Berkas</p>';
                                    } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="images/<?= $user['foto_diri'] ?>" class="card-img shadow-lg" id="user-photo" alt="User profile picture">
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <?php if ($user["status"] === null) {
                                echo '<a href="#" class="btn mt-4" id="edit-btn">Edit</a>';
                            } else if ($user["status"] == '1') { 
                                echo '<a href="#" class="btn mt-4" id="kartu-btn">Lihat Kartu Ujian</a>';
                            } else if ($user["status"] == '2'){
                                echo '<p href="#" class="btn mt-4 text-white" id="kartu-btn-tidak">Tetap semangat dan jangan menyerah untuk mencoba di kesempatan berikutnya!</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    header("location: masuk.php");
}
?>