<?php
$title = "Mossy Frost - Login";
ob_start();

include "config/connection.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Email atau password yang Anda masukkan salah.";
    }
}
?>

<main class="login-page">
    <form class="login-form" action="login.php" method="post">
        <h2>Masuk ke Akun</h2>

        <?php
        if (!empty($error_message)) {
            echo "<p style='color:red;'>$error_message</p>";
        }
        ?>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" name="login" value="Login">

        <p>Belum memiliki akun? <a href="register.php">Daftar sekarang</a></p>
    </form>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>