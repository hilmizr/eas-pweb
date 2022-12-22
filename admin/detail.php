<?php
include '../config.php';
session_start();
if (isset($_SESSION["username"])) {
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pendaftaran</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900' rel='stylesheet'>

    <!-- Styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/detail.css">
</head>

<body>

    <main class="d-flex">
        <sidebar class="d-flex flex-column justify-content-between flex-shrink-0 p-3 text-white" style="width: 22rem; height: 100vh">
            <div class="d-flex flex-column gap-5">
                <a href="dashboard.php" class="d-flex justify-content-center">
                    <img src="../assets/img/logo.png" alt="" class="img-fluid auth-logo">
                </a>
                <a href="dashboard.php" class="fw-bold btn btn-dark px-5 m-auto" id="daftar-btn">Detail Pendaftar</a>
            </div>


            <div class="d-flex flex-column gap-3">
                <div class="text-center">
                    <p class="m-0 fw-bold fs-3"><?=$_SESSION['username']?></p>
                </div>
                <a href="../admin/masuk.php" class="fw-bold btn btn-dark px-5 m-auto" id="daftar-btn">Keluar</a>
            </div>

        </sidebar>


        <article class="py-5 px-3 flex-grow-1">
            <h1 class="heading-title">Dashboard Panitia</h1>
            <p class="fs-5 mb-4 ">Selamat datang, <?=$_SESSION['username']?>!</p>

            <div>
                <div class="card card-member p-4">
                    <div class="card-body d-flex flex-column gap-5">
                        <div class="d-flex">
                            <div class="d-flex flex-column  gap-2" style="flex: 1">
                            <?php
                                $id = $_GET['id'];
                                $query = "SELECT * FROM pendaftar WHERE id = $id";
                                $statement = $pdo->prepare($query);
                                $statement->execute();
                                $pendaftar = $statement->fetch();
                            ?>
                                <div>
                                    <h3 class="fs-4 fw-normal mb-0">Nama</h3>
                                    <p class="fs-2 fw-bold"><?=$pendaftar['nama']?></p>
                                </div>
                                <div>
                                    <h3 class="fs-4 fw-normal mb-0">NIK</h3>
                                    <p class="fs-2 fw-bold"><?=$pendaftar['nik']?></p>
                                </div>
                                <div>
                                    <h3 class="fs-4 fw-normal mb-0">Jenis Kelamin</h3>
                                    <p class="fs-2 fw-bold"><?=$pendaftar['kelamin']?></p>
                                </div>
                                <div>
                                    <h3 class="fs-4 fw-normal mb-0">Alamat</h3>
                                    <p class="fs-2 fw-bold"><?=$pendaftar['alamat']?></p>
                                </div>
                                <div>
                                    <h3 class="fs-4 fw-normal mb-0">Pendidikan terakhir</h3>
                                    <p class="fs-2 fw-bold"><?=$pendaftar['pendidikan']?></p>
                                </div>
                                <div>
                                    <h3 class="fs-4 fw-normal mb-0">Pilihan Jabatan</h3>
                                    <p class="fs-2 fw-bold"><?=$pendaftar['jabatan']?></p>
                                </div>
                                <div>
                                    <h3 class="fs-4 fw-normal mb-0">Berkas</h3>
                                    <div class="d-flex my-2 gap-4">
                                        <a href="../images/<?= $pendaftar['foto_ktp'] ?>" class="fw-semibold btn btn-info w-50 py-3 fs-4" id="daftar-btn">KTP</a>
                                        <a href="../images/<?= $pendaftar['ijazah'] ?>" class="fw-semibold btn btn-info w-50 py-3 fs-4" id="daftar-btn">Ijazah</a>
                                    </div>
                                </div>
                                <form action="proses_update.php" method="post">
                                    <input type="hidden" name="id" value="<?= $pendaftar['id'] ?>" />
                                    <div>
                                        <h3 class="fs-2 mt-4">Status Pendaftaran</h3>
                                        <?php
                                        if($pendaftar['status'] == null){
                                            echo
                                            '<select class="form-select select-status py-3 text-white fw-bolder" name="status" aria-label="Default select example">
                                                <option selected class="py-3 fw-bolder" >Belum Diverifikasi</option>
                                                <option value="1"  class="p-3 fw-bolder text-success" style="padding: 3rem !important;">Lolos Berkas</option>
                                                <option value="2"  class="p-3 fw-bolder text-danger">Tidak Lolos Berkas</option>
                                            </select>';
                                        } else if($pendaftar['status'] == '1'){
                                            echo
                                            '<select class="form-select select-status py-3 text-white fw-bolder" name="status" aria-label="Default select example">
                                                <option class="py-3 fw-bolder" >Belum Diverifikasi</option>
                                                <option selected value="1"  class="p-3 fw-bolder text-success" style="padding: 3rem !important;">Lolos Berkas</option>
                                                <option value="2"  class="p-3 fw-bolder text-danger">Tidak Lolos Berkas</option>
                                            </select>';
                                        } else if($pendaftar['status'] == '2'){
                                            echo
                                            '<select class="form-select select-status py-3 text-white fw-bolder" name="status" aria-label="Default select example">
                                                <option class="py-3 fw-bolder" >Belum Diverifikasi</option>
                                                <option value="1"  class="p-3 fw-bolder text-success" style="padding: 3rem !important;">Lolos Berkas</option>
                                                <option selected value="2"  class="p-3 fw-bolder text-danger">Tidak Lolos Berkas</option>
                                            </select>';
                                        }
                                        ?>
                                    </div>
                                    <?php if ($pendaftar['status'] == '1'){
                                        echo '<div>
                                                <label for="lokasi_tes" class="d-block"> <h3 class="fs-4 fw-normal mb-0 my-4">Lokasi Tes</h3></label>
                                                <input type="text" class="bg-input border-0 py-3 px-2 text-white" id="location" name="location">
                                            </div>';
                                    }
                                    ?>
                                    <div class="my-4 d-flex gap-4">
                                        <button type="submit" class="fw-bold btn btn-dark w-50 py-3 fs-4" id="daftar-btn">Simpan</button>
                                        <a href="dashboard.php" class="fw-semibold btn btn-dark-outline w-50 py-3 fs-4" id="daftar-btn">Kembali</a>
                                    </div>
                                </form>
                            </div>
                            <div style="flex: 1" class="p-5 d-flex justify-content-center align-items-start">
                                <img src=../images/<?= $pendaftar['foto_diri'] ?> alt="Foto Profil" class="img-fluid img-profile">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </article>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
<?php
} else {
    header("location: masuk.php");
}
?>