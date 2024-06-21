<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$title = "Mossy Frost - Data Pengguna";
ob_start();
?>

<main>
    <h1 class="title">Data Pengguna</h1>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>