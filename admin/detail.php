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
                <a href="admin/dashboard.php" class="fw-bold btn btn-dark px-5 m-auto" id="daftar-btn">Detail Pendaftar</a>
            </div>


            <div class="d-flex flex-column gap-3">
                <div class="text-center">
                    <p class="m-0 fw-bold fs-3">SubhanJiran</p>
                    <p>3525011711086062</p>
                </div>
                <a href="admin/masuk.php" class="fw-bold btn btn-dark px-5 m-auto" id="daftar-btn">Keluar</a>
            </div>

        </sidebar>


        <article class="py-5 px-3 flex-grow-1">
            <h1 class="heading-title">Dashboard Panitia</h1>
            <p class="fs-5 mb-4 ">Selamat datang, Subhan!</p>

            <div>
                <div class="card card-member p-4">
                    <div class="card-body d-flex flex-column gap-5">
                        <div class="d-flex">
                            <div class="d-flex flex-column  gap-2" style="flex: 1">
                                <div>
                                    <h3 class="fs-4 fw-normal mb-0">Nama</h3>
                                    <p class="fs-2 fw-bold">Banyu Tirta Baradus</p>
                                </div>
                                <div>
                                    <h3 class="fs-4 fw-normal mb-0">NIK</h3>
                                    <p class="fs-2 fw-bold">3525015306780002</p>
                                </div>
                                <div>
                                    <h3 class="fs-4 fw-normal mb-0">Pilihan Jabatan</h3>
                                    <p class="fs-2 fw-bold">Raja Pantai Utara</p>
                                </div>
                                <div>
                                    <h3 class="fs-2">Status Pendaftaran</h3>
                                    <select class="form-select select-status py-3 text-white fw-bolder" aria-label="Default select example">
                                        <option selected class="py-3 fw-bolder">Belum Diverifikasi</option>
                                        <option value="1" class="p-3 fw-bolder text-success" style="padding: 3rem !important;">Lolos Berkas</option>
                                        <option value="2" class="p-3 fw-bolder text-danger">Tidak Lolos Berkas</option>
                                    </select>
                                </div>
                            </div>
                            <div style="flex: 1" class="p-5 d-flex justify-content-center align-items-start">
                                <img src="../assets/img/logo.png" alt="Foto Profil" class="img-fluid img-profile">
                            </div>
                        </div>
                        <div class="d-flex gap-4">
                            <a href="detail.php" class="fw-bold btn btn-dark w-50 py-3 fs-4" id="daftar-btn">Simpan</a>
                            <a href="detail.php" class="fw-semibold btn btn-dark-outline w-50 py-3 fs-4" id="daftar-btn">Kembali</a>
                        </div>
                    </div>
                </div>

            </div>
        </article>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>