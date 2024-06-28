<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Query untuk mengambil data transaksi dari tabel orders
$sql = "SELECT o.id, u.name as user_name, m.name as menu_name, o.shipping_address, o.order_date, o.quantity, o.price as menu_price, o.sugar_level, o.additional_message, o.status
        FROM orders o
        INNER JOIN users u ON o.user_id = u.id
        INNER JOIN menus m ON o.menu_id = m.id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

$title = "Mossy Frost - Data Transaksi";
ob_start();
?>

<main>
    <h1 class="title">Data Transaksi</h1>
    <table class="order-history">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pengguna</th>
                <th>Nama Menu</th>
                <th>Alamat Pengiriman</th>
                <th>Tanggal Pesanan</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total</th>
                <th>Kadar Gula</th>
                <th>Pesan Tambahan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $index => $transaction) : ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($transaction['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($transaction['menu_name']); ?></td>
                    <td><?php echo htmlspecialchars($transaction['shipping_address']); ?></td>
                    <td><?php echo date('d-m-Y H:i:s', strtotime($transaction['order_date'])); ?></td>
                    <td><?php echo $transaction['quantity']; ?></td>
                    <td>Rp<?php echo number_format($transaction['menu_price'], 0, ',', '.'); ?></td>
                    <td>Rp<?php echo number_format($transaction['menu_price'] * $transaction['quantity'], 0, ',', '.'); ?></td>
                    <td><?php echo ucfirst($transaction['sugar_level']); ?></td>
                    <td><?php echo htmlspecialchars($transaction['additional_message']); ?></td>
                    <td><?php echo htmlspecialchars($transaction['status']); ?></td>
                    <td>
                        <a href="update_transaction.php?id=<?php echo $transaction['id']; ?>" class="btn-update">Update</a>
                        <a href="delete_transaction.php?id=<?php echo $transaction['id']; ?>" class="btn-delete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>