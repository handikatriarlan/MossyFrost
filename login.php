<?php
$title = "Mossy Frost - Login";
ob_start();
?>

<main class="login-page">
    <form class="login-form" action="#">
        <h2>Masuk ke Akun</h2>
        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <input type="submit" value="Login">

        <p>Belum memiliki akun?<a href="register.php"> Daftar sekarang</a></p>
    </form>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>