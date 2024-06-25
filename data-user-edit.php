<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$title = "Mossy Frost - Edit Pengguna";
ob_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
        $sql = "UPDATE users SET email = :email, name = :name, phone = :phone, address = :address, password = :password WHERE id = :id";
    } else {
        $sql = "UPDATE users SET email = :email, name = :name, phone = :phone, address = :address WHERE id = :id";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':id', $_GET['id']);

    if (!empty($_POST['password'])) {
        $stmt->bindParam(':password', $password);
    }

    if ($stmt->execute()) {
        header("Location: data-user.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat mengedit pengguna.";
    }
}

$userId = $_GET['id'];
$sql = "SELECT email, name, phone, address FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $userId);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<main>
    <div class="order-form">
        <h1 class="title">Edit Pengguna</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email" class="label">Email:</label>
                <input type="email" id="email" name="email" class="input" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="name" class="label">Nama:</label>
                <input type="text" id="name" name="name" class="input" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="phone" class="label">Telepon:</label>
                <input type="text" id="phone" name="phone" class="input" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
            </div>
            <div class="form-group">
                <label for="address" class="label">Alamat:</label>
                <textarea id="address" name="address" class="input textarea" required><?php echo htmlspecialchars($user['address']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="password" class="label">Password:</label>
                <input type="password" id="password" name="password" class="input">
                <span class="note">Kosongkan jika tidak ingin mengubah password</span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>