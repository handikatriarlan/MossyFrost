<?php
session_start();

$title = "Mossy Frost - Beranda";
ob_start();
?>
<main>
    <section class="hero-section">
        <div class="hero-content">
            <h1>Selamat datang di Mossy Frost</h1>
            <p>Nikmati berbagai minuman segar berkualitas tinggi dengan rasa unik dari Mossy Frost.</p>
            <a href="menu.php" class="btn">Lihat Menu</a>
        </div>
        <img src="assets/images/coffee-frappe-banner.png" alt="" class="hero-image">
    </section>

    <section class="about-section">
        <h1 class="title">Tentang Kami</h1>
        <p>Mossy Frost adalah tempat untuk menemukan minuman dingin yang menyegarkan dengan berbagai varian rasa. Kami menggunakan bahan-bahan berkualitas tinggi dan teknik pembuatan yang inovatif untuk memberikan pengalaman minum yang tak terlupakan kepada pelanggan kami.</p>
    </section>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>