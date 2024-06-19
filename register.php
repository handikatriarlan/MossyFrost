<?php
$title = "Mossy Frost - Daftar";
ob_start();

include "config/connection.php";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        $error_message = "Password tidak cocok. Ulangi kembali.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql_check_email = "SELECT COUNT(*) AS count FROM users WHERE email = :email";
        $stmt_check_email = $conn->prepare($sql_check_email);
        $stmt_check_email->bindParam(':email', $email);
        $stmt_check_email->execute();
        $row = $stmt_check_email->fetch(PDO::FETCH_ASSOC);

        if ($row['count'] > 0) {
            $error_message = "Email sudah terdaftar. Silahkan gunakan email yang lain.";
        } else {
            $sql = "INSERT INTO users (name, email, phone, address, password) VALUES (:name, :email, :phone, :address, :password)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':password', $hashed_password);

            if ($stmt->execute()) {
                header("Location: login.php");
                exit();
            } else {
                $error_message = "Terjadi kesalahan saat memproses pendaftaran.";
            }
        }
    }
}
?>

<main class="login-page">
    <form class="login-form" action="register.php" method="POST">
        <h2>Daftar Akun</h2>

        <?php
        if (isset($error_message)) {
            echo "<p style='color:red;'>$error_message</p>";
        }
        ?>

        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Nomor HP:</label>
        <input type="number" id="phone" name="phone" required>

        <label for="address">Alamat:</label>
        <textarea name="address" id="address" required></textarea>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Ulangi Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <input type="submit" name="register" value="Daftar">

        <p>Sudah memiliki akun? <a href="login.php">Masuk</a></p>
    </form>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>