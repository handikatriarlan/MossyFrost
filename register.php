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

    // Validasi password
    if ($password != $confirm_password) {
        $error_message = "Password dan Ulangi Password tidak cocok.";
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // SQL untuk memasukkan data ke tabel users
        $sql = "INSERT INTO users (name, email, phone, address, password) VALUES ('$name', '$email', '$phone', '$address', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            // Pendaftaran berhasil, arahkan ke halaman login
            header("Location: login.php");
            exit(); // Pastikan tidak ada output lain sebelum header redirect
        } else {
            $error_message = "Terjadi kesalahan: " . $conn->error;
        }
    }
}
?>

<main class="login-page">
    <form class="login-form" action="register.php" method="POST">
        <h2>Daftar Akun</h2>
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