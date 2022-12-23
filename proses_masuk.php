<?php

include 'config.php';
session_start();

function redirectAndFlashMessage(string $url, string $error, string $title, string $message = "")
{
    $_SESSION['error'] = $error;
    $_SESSION['title'] = $title;
    $_SESSION['message'] = $message;
    header("Location: " . $url);
}

function redirectAndSetSession(string $url, array $vars)
{
    foreach ($vars as $key => $value)
        $_SESSION[$key] = $value;
    header("Location: " . $url);
}

try {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (empty($_POST["username"]) || empty($_POST["password"])) {
        redirectAndFlashMessage(
            url: 'masuk.php',
            error: 'required',
            title: 'Username dan password tidak boleh dikosongi!',
            message: "Silakan coba lagi."
        );
        return;
    }

    $sql = $pdo->prepare("SELECT * FROM pendaftar WHERE username = :username");
    $sql->bindParam(':username', $_POST["username"]);
    $sql->execute();

    if ($sql->rowCount() <= 0) {
        redirectAndFlashMessage(
            url: 'masuk.php',
            error: 'notFound',
            title: 'Pengguna tidak terdaftar!',
        );
        return;
    }

    $result = $sql->fetch(PDO::FETCH_ASSOC);

    if ($password != $result['password']) {
        redirectAndFlashMessage(
            url: 'masuk.php',
            error: 'password',
            title: 'Username atau password tidak valid!',
        );
        return;
    }

    $vars = array(
        "id" => $result['id'],
        'username' => $result['username']
    );

    redirectAndSetSession('home.php', $vars);

    return;
} catch (PDOException $error) {
    redirectAndFlashMessage(
        url: 'masuk.php',
        error: 'database',
        title: 'Terjadi kesalahan saat menghubungkan ke database.',
        message: 'Silakan coba lagi.',
    );
    return;
}
