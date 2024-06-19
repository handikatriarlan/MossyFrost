<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "db_mossyfrost";

$conn = new PDO("mysql:host=$server;dbname=$db", $username, $password);
