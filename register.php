<?php
$title = "Mossy Frost - Daftar";
ob_start();
?>

<main class="login-page">
    <form class="login-form" action="#" method="post">
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

        <input type="submit" value="Daftar">

        <p>Sudah memiliki akun? <a href="login.php">Masuk</a></p>
    </form>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>