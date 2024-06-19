<header>
    <img src="assets/images/mossy-frost-header.png" alt="Mossy Frost Banner" class="header-img">
    <nav>
        <ul>
            <li class="brand"><a href="index.php">Mossy Frost</a></li>
            <li class="align-right"><a href="index.php">Beranda</a></li>
            <li class="align-right"><a href="menu.php">Menu</a></li>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li class="align-right"><a href="order.php">Pesan</a></li>
                <li class="align-right"><a href="history.php">Riwayat</a></li>
                <li class="align-right"><a href="contact.php">Kontak</a></li>
                <li class="align-right"><a href="logout.php">Keluar</a></li>
            <?php } else { ?>
                <li class="align-right"><a href="contact.php">Kontak</a></li>
                <li class="align-right"><a href="login.php">Masuk</a></li>
                <li class="align-right"><a href="register.php">Daftar</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>