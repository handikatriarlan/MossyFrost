<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$title = "Mossy Frost - Riwayat";
ob_start();
?>

<main>
    <div class="title">
        <h1>Riwayat Pemesanan</h1>
    </div>
    <table class="order-history">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Item</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>25.</td>
                <td>19-05-2024</td>
                <td>Raspberry Frappe</td>
                <td>3</td>
                <td>Rp40.000</td>
            </tr>
        </tbody>
    </table>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>