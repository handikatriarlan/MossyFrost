<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$title = "Mossy Frost - Data Pengguna";
ob_start();

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['delete'])) {
    $userId = $_GET['delete'];
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $userId);

    if ($stmt->execute()) {
        header("Location: data-user.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menghapus pengguna.";
    }
}

$sql = "SELECT id, email, name, phone, address, role FROM users WHERE role = 'user'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <h1 class="title">Data Pengguna</h1>
    <a href="data-user-add.php" class="btn-add">Tambah Pengguna</a>
    <table class="order-history">
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['phone']); ?></td>
                    <td><?php echo htmlspecialchars($user['address']); ?></td>
                    <td>
                        <div class="action-buttons">
                            <a href="data-user-edit.php?id=<?php echo $user['id']; ?>" class="btn-edit">Edit</a>
                            <a href="data-user.php?delete=<?php echo $user['id']; ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">Hapus</a>
                        </div>
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