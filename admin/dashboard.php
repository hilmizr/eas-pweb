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

        <title>Dashboard Admin</title>

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900' rel='stylesheet'>

        <!-- Styling -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
    </head>

    <body>

        <main class="d-flex">
            <sidebar class="d-flex flex-column justify-content-between flex-shrink-0 p-3 text-white" style="width: 22rem; height: 100vh">
                <div class="d-flex flex-column gap-5">
                    <a href="dashboard.php" class="d-flex justify-content-center">
                        <img src="../assets/img/logo.png" alt="" class="img-fluid auth-logo">
                    </a>
                    <a href="dashboard.php" class="fw-bold btn btn-dark px-5 m-auto" id="daftar-btn">Dashboard</a>
                </div>


                <div class="d-flex flex-column gap-3">
                    <div class="text-center">
                        <p class="m-0 fw-bold fs-3"><?= $_SESSION["username"] ?></p>
                    </div>
                    <a href="logout.php" class="fw-bold btn btn-dark px-5 m-auto" id="daftar-btn">Keluar</a>
                </div>

            </sidebar>


            <article class="py-5 px-3 flex-grow-1">
                <h1 class="heading-title">Dashboard Panitia</h1>
                <p class="fs-5 mb-4 ">Selamat datang, <?php echo $_SESSION["username"] ?>!</p>

                <div>
                    <?php
                    $query = "SELECT nama, nik, foto_diri FROM pendaftar";
                    $statement = $pdo->prepare($query);
                    $statement->execute();
                    $arr = $statement->fetchAll();
                    ?>
                    <div class="card card-member mb-3">
                        <?php foreach ($arr as $item) { ?>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-4">
                                        <img src="../images/<?= $item['foto_diri'] ?>" alt="Foto Profil" class="img-fluid img-profile">
                                        <div>
                                            <p class="card-title fw-bold fs-5 mb-0"><?= $item['nama'] ?></p>
                                            <p class="card-text"><?= $item['nik'] ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="fw-semibold btn btn-dark-outline px-5 m-auto" id="daftar-btn">Belum Diverifikasi</button>
                                        <a href="detail.php" class="fw-bold btn btn-dark px-5 m-auto" id="daftar-btn">Detail</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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