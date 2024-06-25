<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$title = "Mossy Frost - Tambah Pengguna";
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (email, name, phone, address, password)
            VALUES (:email, :name, :phone, :address, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        header("Location: data-user.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menambah pengguna.";
    }
}
?>

<main>
<div class="order-form">
    <h1 class="title">Tambah Pengguna Baru</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email" class="label">Email:</label>
            <input type="email" id="email" name="email" class="input" required>
        </div>
        <div class="form-group">
            <label for="name" class="label">Nama:</label>
            <input type="text" id="name" name="name" class="input" required>
        </div>
        <div class="form-group">
            <label for="phone" class="label">Telepon:</label>
            <input type="text" id="phone" name="phone" class="input" required>
        </div>
        <div class="form-group">
            <label for="address" class="label">Alamat:</label>
            <textarea id="address" name="address" class="input textarea" required></textarea>
        </div>
        <div class="form-group">
            <label for="password" class="label">Password:</label>
            <input type="password" id="password" name="password" class="input" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit">Tambah Pengguna</button>
        </div>
    </form>
    </div>
</main>


<?php
$content = ob_get_clean();
include "layouts/app.php";
?>