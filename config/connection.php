<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "db_mossyfrost";

try {
    $conn = new PDO("mysql:host=$server;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected!\n";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    die();
}
