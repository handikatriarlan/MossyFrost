<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$title = "Mossy Frost - Data Menu";
ob_start();

$sql = "SELECT id, name, description, price, image, user_id FROM menus";
$stmt = $conn->prepare($sql);
$stmt->execute();
$menus = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <h1 class="title">Data Menu</h1>
    <a href="data-menu-add.php" class="btn-add">Tambah Menu</a>
    <table class="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($menus as $menu) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($menu['name']); ?></td>
                    <td><?php echo htmlspecialchars($menu['description']); ?></td>
                    <td><?php echo "Rp" . number_format($menu['price'], 0, ',', '.'); ?></td>
                    <td><img src="assets/images/<?php echo htmlspecialchars($menu['image']); ?>" alt="<?php echo htmlspecialchars($menu['name']); ?>"></td>
                    <td>
                        <a href="data-menu-edit.php?id=<?php echo $menu['id']; ?>" class="btn-edit">Edit</a>
                        <br><br>
                        <a href="delete_menu.php?id=<?php echo $menu['id']; ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">Hapus</a>
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