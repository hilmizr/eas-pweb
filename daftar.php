<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleksi Pegawai Baru Kementerian Kelautan dan Perikanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/masuk.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900' rel='stylesheet'>
</head>

<body>
    <div class="merged">

        <!-- Login Card -->
        <section id="hero" class="min-vh-100 d-flex align-items-center">
            <div class="container">
                <div class="row mx-5 px-5">
                    <div class="bg-card mx-5">
                        <div class="d-flex justify-content-center">
                            <h1 class="mt-4">Daftar Akun Baru</h1>
                        </div>
                        <div class="d-flex justify-content-center">
                            <form action="proses_daftar.php" method="POST" enctype="multipart/form-data">
                                <fieldset class="my-4">
                                <p>
                                    <label for="username" class="d-block text-start">Username: </label>
                                    <input type="text" name="username" class="my-2 py-3 px-2 bg-input" size="48"/>
                                </p>
                                <p>
                                    <label for="password" class="d-block text-start">Password: </label>
                                    <input type="password" name="password" class="my-2 py-3 px-2 bg-input" size="48"/>
                                </p>
                                <p>
                                    <label for="nik" class="d-block text-start">NIK: </label>
                                    <input type="text" name="nik" maxlength="16" class="my-2 py-3 px-2 bg-input" size="48"/>
                                </p>
                                <p>
                                    <label for="nama" class="d-block text-start">Nama: </label>
                                    <input type="text" name="nama" class="my-2 py-3 px-2 bg-input" size="48"/>
                                </p>
                                <p>
                                    <label for="kelamin" class="d-block text-start">Jenis Kelamin: </label>
                                    <input type="text" name="kelamin" class="my-2 py-3 px-2 bg-input" size="48"/>
                                </p>
                                <p>
                                    <label for="ttl" class="d-block text-start">Tempat dan Tanggal Lahir: </label>
                                    <div class="d-flex justfiy-content-between"> 
                                        <input type="text" name="tempat_lahir" maxlength="50" class="my-2 py-3 px-2 bg-input" size="20"/>
                                        <input type="text" name="tgl_lahir" maxlength="50" class="my-2 py-3 mx-2 px-2 bg-input" size="23"/>
                                    </div>
                                </p>
                                <p>
                                    <label for="pendidikan" class="d-block text-start">Pendidikan Terakhir: </label>
                                    <input type="text" name="pendidikan" maxlength="50" class="my-2 py-3 px-2 bg-input" size="48"/>
                                </p>
                                <p>
                                    <label for="alamat" class="d-block text-start">Alamat: </label>
                                    <textarea name="alamat" class="my-2 py-3 px-2 bg-input" cols='48'></textarea>
                                </p>
                                <p>
                                    <label for="jabatan" class="d-block text-start">Jabatan Pilihan: </label>
                                    <input type="text" name="jabatan" maxlength="50" class="my-2 py-3 px-2 bg-input" size="48"/>
                                </p>
                                <p>
                                    <div>Foto KTP: </div>
                                    <div><input type="file" name="foto_ktp" class="my-2 bg-input"></div>
                                </p>
                                <p>
                                    <div>Foto Diri: </div>
                                    <div><input type="file" name="foto_diri" class="my-2 bg-input"></div>
                                </p>
                                <p>
                                    <div>Ijazah: </div>
                                    <div><input type="file" name="ijazah" class="my-2 bg-input"></div>
                                </p>
                                <p class="d-flex justify-content-center my-4">
                                    <input type="submit" value="Daftar" name="daftar" class="fw-bold btn btn-brand me-2" id="masuk-btn"/>
                                </p>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>