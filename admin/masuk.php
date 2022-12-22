<?php 
 
include '../config.php';
 
error_reporting(0);
 
session_start();
 
$message = "";  
 try  
 {  
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = 'All fields are required';  
           }  
           else  
           {  
                $query = "SELECT * FROM panitia WHERE username = :username AND password = :password";  
                $statement = $pdo->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];  
                     header("location: dashboard.php");  
                }  
                else  
                {  
                     $message = 'Wrong Data';  
                }  
           }  
      }
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  

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

<body class="fixed text-white">
    <div class="merged">
        <!-- Login Card -->
        <section id="hero" class="min-vh-100 d-flex align-items-center">
            <div class="container">
                <div class="row mx-5 px-5">
                    <?php  
                    if(isset($message))  
                    {  
                        echo '<label class="text-danger d-flex justify-content-center align-items-center">'.$message.'</label>';  
                    }  
                    ?>  
                    <div class="bg-card mx-5">
                        <div class="d-flex justify-content-center">
                            <h1 class="mt-4">Login</h1>
                        </div>
                        <div class="d-flex justify-content-center">
                            <form method="POST" enctype="multipart/form-data">
                                <fieldset class="my-4">
                                <p>
                                    <label for="username" class="d-block text-start">Username: </label>
                                    <input type="text" name="username" maxlength="50" class="my-2 py-3 bg-input px-2" size="48"/>
                                </p>
                                <p>
                                    <label for="password" class="d-block text-start">Password: </label>
                                    <input type="password" name="password" maxlength="50" class="my-2 py-3 bg-input px-2" size="48"/>
                                </p>
                                <p class="d-flex justify-content-center my-4">
                                    <input type="submit" value="Masuk" name="login" class="fw-bold btn btn-brand me-2" id="masuk-btn"/>
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