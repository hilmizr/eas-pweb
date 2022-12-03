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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-filestyle/2.1.0/bootstrap-filestyle.min.js" integrity="sha512-HfRdzrvve5p31VKjxBhIaDhBqreRXt4SX3i3Iv7bhuoeJY47gJtFTRWKUpjk8RUkLtKZUhf87ONcKONAROhvIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="merged">
         <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
            <div class="container" id="navbar-content">
                <a class="navbar-brand" href="index.php">PSB</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-item nav-link" href="index.php">Home</a>
                        <a class="nav-item nav-link active" href="form-daftar.php">Daftar Baru</a>
                        <a class="nav-item nav-link" href="list-siswa.php">Pendaftar</a>
                    </div>
                </div>
            </div>
        </nav>

    <main class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <div class="card border-0 shadow" id="frm-card">
            <div class="card-body p-5">
                <h1 class="mb-4 px-md-5 mx-auto" id="frm-daftar-title">Formulir <span>Pendaftaran</span></h1>
                <form action="proses_simpan.php" method="POST" id="frm-daftar" enctype="multipart/form-data">
                    <div class="mb-3 row mx-auto my-auto justify-content-center" id="center-label">
                        <label for="nis" class="col-md-2 col-form-label">NIS</label>
                        <div class="col-md-10">
                            <input type="text" name="nis"/>
                        </div>
                    </div>
                    <div class="mb-3 row mx-auto my-auto justify-content-center" id="center-label">
                        <label for="nama" class="col-md-2 col-form-label">Nama</label>
                        <div class="col-md-10">
                            <input type="text" name="nama"/>
                        </div>
                    </div>
                    <div class="mb-3 row mx-auto my-auto justify-content-center" id="center-label">
                        <label for="jenis_kelamin" class="col-md-2 col-form-label">Kelamin</label>
                        <div class="col-md-10 d-flex align-items-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="kelamin1" value="Laki-laki">
                                <label class="form-check-label" for="kelamin1">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="kelamin2" value="Perempuan">
                                <label class="form-check-label" for="kelamin2">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row mx-auto my-auto justify-content-center" id="center-label">
                        <label for="telp" class="col-md-2 col-form-label">Telepon</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="telp" name="telp">
                        </div>
                    </div>
                    <div class="mb-3 row mx-auto my-auto justify-content-center" id="center-label">
                        <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
                        <div class="col-md-10">
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row mx-auto my-auto justify-content-center" id="center-label">
                        <label for="foto" class="col-md-2 col-form-label">Foto</label>
                        <div class="col-md-10">
                            <!-- <input type="file" name="file" id="file" class="inputfile" />
                            <label for="file">Choose a file</label> -->
                            <input type="file" name="foto" id="foto" class="form-control text-white">
                        </div>
                    </div>
                    <div class="contain-btn">
                        <tr>
                            <td class='text-center col-md-4 d-inline'>
                                <a href="form-daftar.php">
                                    <input type="submit" name="simpan" value="Simpan" class="fw-semibold btn" id="simpan-btn-2"></input>
                                </a>
                                <a href="index.php">
                                    <input type="button" value="Batal" class="fw-semibold btn btn-light" id="batal-btn-2">
                                </a>
                            </td>
                        </tr>
                    </div>
                

                </form> 
               
            </div>
        </div>
    </main>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-filestyle/2.1.0/bootstrap-filestyle.min.js" integrity="sha512-HfRdzrvve5p31VKjxBhIaDhBqreRXt4SX3i3Iv7bhuoeJY47gJtFTRWKUpjk8RUkLtKZUhf87ONcKONAROhvIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>