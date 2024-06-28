<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql_orders = "SELECT o.id, o.order_date, m.name AS menu_name, o.quantity, m.price AS menu_price, o.sugar_level, o.additional_message, o.status 
              FROM orders o
              INNER JOIN menus m ON o.menu_id = m.id
              WHERE o.user_id = :user_id 
              ORDER BY o.order_date DESC";
$stmt_orders = $conn->prepare($sql_orders);
$stmt_orders->bindParam(':user_id', $user_id);
$stmt_orders->execute();
$orders = $stmt_orders->fetchAll(PDO::FETCH_ASSOC);

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
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total</th>
                <th>Kadar Gula</th>
                <th>Pesan Tambahan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $index => $order) : ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo date('d M Y H:i:s', strtotime($order['order_date'])); ?></td>
                    <td><?php echo htmlspecialchars($order['menu_name']); ?></td>
                    <td><?php echo $order['quantity']; ?></td>
                    <td>Rp<?php echo number_format($order['menu_price'], 0, ',', '.'); ?></td>
                    <td>Rp<?php echo number_format($order['menu_price'] * $order['quantity'], 0, ',', '.'); ?></td>
                    <td><?php echo ucfirst($order['sugar_level']); ?></td>
                    <td><?php echo htmlspecialchars($order['additional_message']); ?></td>
                    <td><?php echo htmlspecialchars($order['status']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>