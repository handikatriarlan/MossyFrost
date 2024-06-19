<?php
$title = "Mossy Frost - Daftar";
ob_start();
?>

<main class="login-page">
    <form class="login-form" action="#">
        <h2>Daftar Akun</h2>
        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <input type="submit" value="Login">

        <p>Sudah memiliki akun?<a href="#"> Masuk</a></p>
    </form>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>