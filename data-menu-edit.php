<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$title = "Mossy Frost - Edit Menu";
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menu_id = $_POST['menu_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $user_id = $_SESSION['user_id'];

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target_dir = "assets/images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "UPDATE menus SET name = :name, description = :description, price = :price, image = :image
                        WHERE id = :menu_id AND user_id = :user_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':menu_id', $menu_id);
            $stmt->bindParam(':user_id', $user_id);

            if ($stmt->execute()) {
                header("Location: data-menu.php");
                exit();
            } else {
                echo "Terjadi kesalahan saat mengupdate menu.";
            }
        }
    } else {
        $sql = "UPDATE menus SET name = :name, description = :description, price = :price
                WHERE id = :menu_id AND user_id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':menu_id', $menu_id);
        $stmt->bindParam(':user_id', $user_id);

        if ($stmt->execute()) {
            header("Location: data-menu.php");
            exit();
        } else {
            echo "Terjadi kesalahan saat mengupdate menu.";
        }
    }
}

if (isset($_GET['id'])) {
    $menu_id = $_GET['id'];
    $sql = "SELECT id, name, description, price, image FROM menus WHERE id = :menu_id AND user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':menu_id', $menu_id);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $menu = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<main>
    <h1 class="title">Edit Menu</h1>
    <div class="order-form">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="menu_id" value="<?php echo $menu['id']; ?>">
            <div class="form-group">
                <label for="name" class="label">Nama:</label>
                <input type="text" id="name" name="name" class="input" value="<?php echo htmlspecialchars($menu['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description" class="label">Deskripsi:</label>
                <textarea id="description" name="description" class="input textarea" required><?php echo htmlspecialchars($menu['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="price" class="label">Harga:</label>
                <input type="number" id="price" name="price" class="input" value="<?php echo $menu['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="image" class="label">Gambar:</label><br>
                <img src="assets/images/<?php echo htmlspecialchars($menu['image']); ?>" alt="<?php echo htmlspecialchars($menu['name']); ?>"><br>
                <input type="file" id="image" name="image" class="input-file" accept="image/jpeg, image/png, image/jpg">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>