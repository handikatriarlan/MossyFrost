<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mossy Frost - Masuk</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header>
            <img src="assets/images/mossy-frost-header.png" alt="Mossy Frost Banner" class="header-img">
            <nav>
                <ul>
                    <li class="brand"><a href="index.php">Mossy Frost</a></li>
                    <li class="align-right"><a href="index.php">Beranda</a></li>
                    <li class="align-right"><a href="menu.php">Menu</a></li>
                    <li class="align-right"><a href="order.php">Pesan</a></li>
                    <li class="align-right"><a href="history.php">Riwayat</a></li>
                    <li class="align-right"><a href="contact.php">Kontak</a></li>
                    <li class="align-right"><a href="login.php">Masuk</a></li>
                </ul>
            </nav>
        </header>

        <main class="login-page">
            <form class="login-form" action="#">
                <h2>Masuk ke Akun</h2>
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password">

                <input type="submit" value="Login">

                <p>Belum memiliki akun?<a href="#"> Daftar sekarang</a></p>
            </form>
        </main>

        <footer>
            <p>&copy;2024 Mossy Frost. Semua hak cipta dilindungi undang-undang.</p>
        </footer>
    </div>
</body>

</html>