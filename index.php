<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru SMA Gorgom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900' rel='stylesheet'>
</head>

<body class="fixed">
    <div class="merged">
         <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container" id="navbar-content">
            <a class="navbar-brand" href="index.php" id="logo">PSB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-item nav-link active" href="index.php">Home</a>
                    <a class="nav-item nav-link" href="form-daftar.php">Daftar Baru</a>
                    <a class="nav-item nav-link" href="list-siswa.php">Pendaftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section id="hero" class="min-vh-100 d-flex align-items-center text-center">
        <div class="container">
            <div class="row">
                <div class="col-12" id="hero-content">
                    <h1 class="fw-semibold mt-0 mb-4" id="title">Pendaftaran Siswa Baru</h1>
                        <?php if (isset($_GET["status"])) : ?>
                            <div class='alert <?= $_GET["status"] == "sukses" ? "alert-berhasil" : "alert-gagal" ?> alert-dismissible fade show me-2' role='alert'>
                                            <h4 class="alert-heading">
                                                 <?= $_GET["status"] == "sukses" ? "Berhasil!" : "Gagal!" ?>
                                            </h4>
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        <?php endif ?>
                    <div>
                        <a href="form-daftar.php" class="fw-semibold btn btn-brand me-2" id="daftar-btn">Daftar Baru</a>
                        <a href="list-siswa.php" class="fw-semibold btn btn-light ms-2" id="batal-btn">Pendaftar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>