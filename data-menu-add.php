<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$title = "Mossy Frost - Tambah Menu";
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $user_id = $_SESSION['user_id'];

    $target_dir = "assets/images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO menus (name, description, price, image, user_id)
                    VALUES (:name, :description, :price, :image, :user_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':user_id', $user_id);

        if ($stmt->execute()) {
            header("Location: data-menu.php");
            exit();
        } else {
            echo "Terjadi kesalahan saat menambah menu.";
        }
    } else {
        echo "Terjadi error saat mengupload file.";
    }
}
?>

<main>
    <h1 class="title">Tambah Menu Baru</h1>
    <div class="order-form">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name" class="label">Nama:</label>
                <input type="text" id="name" name="name" class="input" required>
            </div>
            <div class="form-group">
                <label for="description" class="label">Deskripsi:</label>
                <textarea id="description" name="description" class="input textarea" required></textarea>
            </div>
            <div class="form-group">
                <label for="price" class="label">Harga:</label>
                <input type="number" id="price" name="price" class="input" required>
            </div>
            <div class="form-group">
                <label for="image" class="label">Gambar:</label>
                <input type="file" id="image" name="image" class="input-file" required accept="image/jpg, image/jpeg, image/png">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn-submit">Tambah Menu</button>
            </div>
        </form>
    </div>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>