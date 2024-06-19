<?php
$title = "Mossy Frost - Riwayat";
ob_start();
?>

<main>
    <div class="title">
        <h1>Riwayat Pemesanan Anda</h1>
        <p>(Hanya contoh. Ditampilkan hanya dan jika pengguna sudah masuk dengan akun dan telah melakukan
            pemesanan sebelumnya)</p>
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