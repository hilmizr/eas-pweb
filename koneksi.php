<?php
// Nama dari Host
$host = "localhost";
// Username
$username = "root";
// Password MySQL
$password = "";
// Nama Database
$database = "psfoto"; // Nama databasenya
// Koneksi ke MySQL dengan PDO
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>