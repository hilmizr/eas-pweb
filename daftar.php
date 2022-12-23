<?php
session_start()
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Seleksi Pegawai Baru Kementerian Kelautan dan Perikanan</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900' rel='stylesheet'>

    <!-- Styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/daftar.css">
</head>

<body>
    <div class="merged">

        <!-- Login Card -->
        <section id="hero" class="min-vh-100">
            <div class="container py-5 d-flex vh-100 align-items-center justify-content-center">
                <div class="card cardRegister p-5">
                    <div class="card-body">

                        <div class="px-5 mb-4">
                            <div class="d-flex gap-5 position-relative justify-content-between">
                                <div class="horizontalLine horizontalLineInactive horizontalLineLeft"></div>
                                <div class="horizontalLine horizontalLineInactive horizontalLineRight"></div>
                                <div class="rounded-circle navPoint position-relative z-10 px-3 py-2 bg-brand">
                                    1
                                </div>
                                <div class="rounded-circle navPoint position-relative z-10 px-3 py-2 bg-gray">
                                    2
                                </div>
                                <div class="rounded-circle navPoint position-relative z-10 px-3 py-2 bg-gray">
                                    3
                                </div>
                            </div>
                        </div>


                        <?php if (isset($_SESSION["error"])) : ?>
                            <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                                <strong class="text-danger"><?= $_SESSION["title"] ?></strong>
                                <?php
                                $errorTypeContainsMessage = ['database', 'image', 'internal'];

                                if (in_array($_SESSION["error"], $errorTypeContainsMessage)) : ?>
                                    <span class="text-dark"> <?= $_SESSION["message"] ?> </span>
                                <?php endif ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>

                        <?php
                        unset($_SESSION["error"]);
                        unset($_SESSION["title"]);
                        unset($_SESSION["message"]);
                        ?>

                        <form id="registerForm" action="proses_daftar.php" method="POST" enctype="multipart/form-data">

                            <!- Accordion -->
                                <div class="accordion accordion-flush" id="accordionRegister">
                                    <div class="bg-transparent">
                                        <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionRegister">
                                            <div class="accordion-body">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control bg-gray border-0 py-3 text-white" id="username" name="username">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control bg-gray border-0 py-3 text-white" id="email" name="email">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control bg-gray border-0 py-3 text-white" id="password" name="password">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                    <input type="password" class="form-control bg-gray border-0 py-3 text-white" id="confirmPassword" name="confirmPassword">
                                                </div>

                                                <button onclick="navToSecondAccordion()" class="btn collapsed w-100 buttonAccordionPrimary mb-3 fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    Next
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-transparent">
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionRegister">
                                            <div class="accordion-body">
                                                <div class="mb-3">
                                                    <label for="nik" class="form-label">NIK</label>
                                                    <input type="text" class="form-control bg-gray border-0 py-3 text-white" id="nik" name="nik">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Nama</label>
                                                    <input type="text" class="form-control bg-gray border-0 py-3 text-white" id="nama" name="name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Laki-laki">
                                                            <label class="form-check-label text-white" for="genderMale">
                                                                Laki-Laki
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Perempuan">
                                                            <label class="form-check-label text-white" for="genderFemale">
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="form-label">Tempat dan Tanggal Lahir</label>
                                                    <div class="col-12 col-lg-6">
                                                        <input type="text" class="form-control bg-gray border-0 py-3 text-white" id="birthCity" name="birthCity" placeholder="Kota Kelahiran">
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <input type="DATE" class="form-control bg-gray border-0 py-3 text-white" id="birthDate" name="birthDate">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="education" class="form-label">Pendidikan Terakhir</label>
                                                    <select class="form-select bg-gray border-0 py-3 text-white" id="education" name="education">
                                                        <option selected value="">-</option>
                                                        <option value="SMA/SMK">SMA/SMK</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="address" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control bg-gray border-0 py-3 text-white" id="address" name="address">
                                                </div>

                                                <button onclick="navToThirdAccordion()" class="btn collapsed w-100 buttonAccordionPrimary mb-3 fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                    Next
                                                </button>

                                                <button onclick="navToFirstAccordion()" class="btn collapsed w-100 buttonAccordionSecondary fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                    Back
                                                </button>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-transparent">
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionRegister">
                                            <div class="accordion-body">
                                                <div class="mb-3">
                                                    <label for="position" class="form-label">Jabatan Pilihan</label>
                                                    <select class="form-select bg-gray border-0 py-3 text-white" id="position" name="position">
                                                        <option selected value="">-</option>
                                                        <option value="Teknisi Lapangan">Teknisi Lapangan</option>
                                                        <option value="Operator">Operator</option>
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Supervisor">Supervisor</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ktp" class="form-label">KTP</label>
                                                    <label for="ktp" class="form-label btn w-100 py-3 bg-gray d-flex justify-content-between"><span></span><span class="ms-0 bg-brand h-100 px-3 rounded">Upload</span></label>
                                                    <input style="display:none;" class="form-control bg-gray border-0 form-control-lg" type="file" id="ktp" name="ktp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="profilePhoto" class="form-label">Foto Diri</label>
                                                    <label for="profilePhoto" class="form-label btn w-100 py-3 bg-gray d-flex justify-content-end"><span></span><span class="ms-0 bg-brand h-100 px-3 rounded">Upload</span></label>
                                                    <input style="display:none;" class="form-control bg-gray border-0 form-control-lg" type="file" id="profilePhoto" name="profilePhoto">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="certificate" class="form-label">Ijazah</label>
                                                    <label for="certificate" class="form-label btn w-100 py-3 bg-gray d-flex justify-content-end"><span></span><span class="ms-0 bg-brand h-100 px-3 rounded">Upload</span></label>
                                                    <input style="display:none;" class="form-control bg-gray border-0 form-control-lg" type="file" id="certificate" name="certificate">
                                                </div>

                                                <button id="submitButton" type="submit" name="register" class="btn w-100 buttonAccordionPrimary mb-3 fw-bolder">
                                                    Submit</button>

                                                <button onclick="navToSecondAccordion()" class="btn collapsed w-100 buttonAccordionSecondary fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    Back
                                                </button>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="assets/js/daftar.js"></script>
</body>

</html>