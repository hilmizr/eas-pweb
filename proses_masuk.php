<?php

include 'config.php';
session_start();

function redirectAndSendFlashMessage(string $url, string $error, string $title, string $message = "")
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

    if (empty($username) || empty($password)) {
        redirectAndSendFlashMessage(
            'masuk.php',
            'required',
            'Username dan password tidak boleh dikosongi!',
            "Silakan coba lagi."
        );
        return;
    }

    $sql = $pdo->prepare("SELECT * FROM pendaftar WHERE username=:username");
    $sql->bindParam(':username', $username);
    $sql->execute();

    if ($sql->rowCount() <= 0) {
        redirectAndSendFlashMessage(
            'masuk.php',
            'notFound',
            'Pengguna tidak terdaftar!'
        );
        return;
    }

    $result = $sql->fetch(PDO::FETCH_ASSOC);

    if ($password != $result['password']) {
        redirectAndSendFlashMessage(
            'masuk.php',
            'password',
            'Username atau password tidak valid!'
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
    redirectAndSendFlashMessage(
        'masuk.php',
        'database',
        'Terjadi kesalahan saat menghubungkan ke database.',
        'Silakan coba lagi.'
    );
    return;
}
