<?php include("koneksi.php"); ?>

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

<body>
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
                    <a class="nav-item nav-link" href="index.php">Home</a>
                    <a class="nav-item nav-link" href="form-daftar.php">Daftar Baru</a>
                    <a class="nav-item nav-link active" href="list-siswa.php">Pendaftar</a>
                </div>
            </div>
        </div>
    </nav>
    
    <main class="container vh-100 py-5" id="list-siswa">
        <h1 class="mb-4 px-md-5 mx-auto" id="frm-daftar-title">Siswa <span>Terdaftar</span></h1>
        <div class="d-block mx-5">
            <nav class="d-flex justify-content-between">
                <nav class="d-flex">
                    <a href="form-daftar.php" class="btn-sm btn-info mx-1" id="daftar-btn-3">+ Daftar Baru</a>
                </nav>
            </nav>
            <div class="d-flex justify-content-center mb-3">
                <table class="table" id="table-siswa">
                    <thead class="table-info text-center">
                        <tr class="text-center">
                            <th scope="col">Foto</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelamin</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $sql = $pdo->prepare("SELECT * FROM siswa");
                        $sql->execute(); // Eksekusi querynya

                        while ($data = $sql->fetch()) {
                            echo "<tr>";
                            echo "<td class='align-items-center col-md-2 text-center'><img src='images/".$data['foto']."' width='100' height='100'></td>";
                            echo "<td class='col-md-2 text-center'>".$data['nis']."</td>";
                            echo "<td class='col-md-2 text-center'>".$data['nama']."</td>";
                            echo "<td class='col-md-2 text-center'>".$data['jenis_kelamin']."</td>";
                            echo "<td class='col-md-2 text-center'>".$data['telp']."</td>";
                            echo "<td class='col-md-2'>".$data['alamat']."</td>";
                            
                            echo "<td class='text-center col-md-2'>";
                            echo "<a href='form-edit.php?id=".$data['id']."' class='btn-sm mx-1' id='edit-btn'>Edit</a>";
                            echo "<a href='proses_hapus.php?id=".$data['id']."' class='btn-sm mx-1' id='hapus-btn'>Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </div>
    </body>
</html>