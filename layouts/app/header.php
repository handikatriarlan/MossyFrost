<header>
    <img src="assets/images/mossy-frost-header.png" alt="Mossy Frost Banner" class="header-img">
    <nav>
        <ul>
            <li class="brand"><a href="index.php">Mossy Frost</a></li>
            <li class="align-right"><a href="index.php">Beranda</a></li>
            <?php if (isset($_SESSION['user_id']) && $_SESSION['role'] == 'user') { ?>
                <li class="align-right"><a href="menu.php">Menu</a></li>
                <li class="align-right"><a href="order.php">Pesan</a></li>
                <li class="align-right"><a href="history.php">Riwayat</a></li>
                <li class="align-right"><a href="contact.php">Kontak</a></li>
                <li class="align-right"><a href="logout.php">Keluar</a></li>
            <?php } else if (isset($_SESSION['user_id']) && $_SESSION['role'] == 'admin') { ?>
                <li class="align-right"><a href="admin/data-user.php">Data Pengguna</a></li>
                <li class="align-right"><a href="admin/data-menu.php">Data Menu</a></li>
                <li class="align-right"><a href="admin/data-order.php">Data Pesan</a></li>
                <li class="align-right"><a href="admin/data-contact.php">Data Kontak</a></li>
                <li class="align-right"><a href="logout.php">Keluar</a></li>
            <?php } else { ?>
                <li class="align-right"><a href="menu.php">Menu</a></li>
                <li class="align-right"><a href="order.php">Pesan</a></li>
                <li class="align-right"><a href="contact.php">Kontak</a></li>
                <li class="align-right"><a href="login.php">Masuk</a></li>
                <li class="align-right"><a href="register.php">Daftar</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>