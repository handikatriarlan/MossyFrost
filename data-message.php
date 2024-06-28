<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$title = "Mossy Frost - Data Pesan";
ob_start();

if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $message_id = $_GET['delete'];

    $sql_delete = "DELETE FROM messages WHERE id = :message_id";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bindParam(':message_id', $message_id);

    if ($stmt_delete->execute()) {
        header("Location: data-message.php");
        exit();
    } else {
        echo "Gagal menghapus pesan.";
    }
}

$sql = "SELECT id, email, name, message, created_at FROM messages ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <h1 class="title">Data Pesan</h1>
    <table class="order-history">
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($messages as $message) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($message['email']); ?></td>
                    <td><?php echo htmlspecialchars($message['name']); ?></td>
                    <td><?php echo htmlspecialchars($message['message']); ?></td>
                    <td><?php echo date('d M Y H:i:s', strtotime($message['created_at'])); ?></td>
                    <td>
                        <a href="data-message.php?delete=<?php echo $message['id']; ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">Hapus</a>
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