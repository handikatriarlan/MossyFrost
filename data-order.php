<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$title = "Mossy Frost - Data Transaksi";
ob_start();
?>

<main>
    <h1 class="title">Data Transaksi</h1>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>