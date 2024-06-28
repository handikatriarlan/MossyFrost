<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $sql_delete = "DELETE FROM orders WHERE id = :delete_id";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bindParam(':delete_id', $delete_id, PDO::PARAM_INT);

    if ($stmt_delete->execute()) {
        header("Location: data-order.php");
        exit();
    } else {
        echo "Gagal menghapus transaksi.";
    }
}

if (isset($_POST['transaction_id']) && isset($_POST['status'])) {
    $update_id = $_POST['transaction_id'];
    $new_status = $_POST['status'];

    $sql_update = "UPDATE orders SET status = :status WHERE id = :id";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bindParam(':status', $new_status, PDO::PARAM_STR);
    $stmt_update->bindParam(':id', $update_id, PDO::PARAM_INT);

    if ($stmt_update->execute()) {
        header("Location: data-order.php");
        exit();
    } else {
        echo "Gagal mengupdate status transaksi.";
    }
}

$sql = "SELECT o.id, u.name as user_name, m.name as menu_name, o.shipping_address, o.order_date, o.quantity, o.price as menu_price, o.sugar_level, o.additional_message, o.status
        FROM orders o
        INNER JOIN users u ON o.user_id = u.id
        INNER JOIN menus m ON o.menu_id = m.id
        ORDER BY o.order_date DESC";

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
                <th>#</th>
                <th>Nama Pengguna</th>
                <th>Nama Menu</th>
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
                    <td><?php echo date('d-m-Y H:i:s', strtotime($transaction['order_date'])); ?></td>
                    <td><?php echo $transaction['quantity']; ?></td>
                    <td>Rp<?php echo number_format($transaction['menu_price'], 0, ',', '.'); ?></td>
                    <td>Rp<?php echo number_format($transaction['menu_price'] * $transaction['quantity'], 0, ',', '.'); ?></td>
                    <td><?php echo ucfirst($transaction['sugar_level']); ?></td>
                    <td><?php echo htmlspecialchars($transaction['additional_message']); ?></td>
                    <td>
                        <form action="data-order.php" method="POST">
                            <input type="hidden" name="transaction_id" value="<?php echo $transaction['id']; ?>">
                            <select name="status" class="status-select">
                                <option value="pending" <?php echo ($transaction['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                <option value="selesai" <?php echo ($transaction['status'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                                <option value="dibatalkan" <?php echo ($transaction['status'] == 'Dibatalkan') ? 'selected' : ''; ?>>Dibatalkan</option>
                                <option value="sedang diantar" <?php echo ($transaction['status'] == 'Sedang Diantar') ? 'selected' : ''; ?>>Sedang Diantar</option>
                                <option value="sedang diproses" <?php echo ($transaction['status'] == 'Sedang Diproses') ? 'selected' : ''; ?>>Sedang Diproses</option>
                            </select>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button type="submit" class="btn-update">Update</button>
                                <a href="data-order.php?delete=<?php echo $transaction['id']; ?>" class="btn-delete">Delete</a>
                            </div>
                        </form>
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
