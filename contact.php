<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mossy Frost - Kontak</title>
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

        <main>
            <h1 class="title">Hubungi Kami</h1>
            <section class="contact-info">
                <div class="contact-item">
                    <h2>E-mail</h2>
                    <p><a href="mailto:mossyfrost@gmail.com" target="_blank">mossyfrost@gmail.com</a></p>
                </div>
                <div class="contact-item">
                    <h2>WhatsApp</h2>
                    <p><a href="https://wa.me/+6289613338528" target="_blank">+62 896 1333 8528</a></p>
                </div>
                <div class="contact-item">
                    <h2>Instagram</h2>
                    <p><a href="https://instagram.com" target="_blank">@mossy.frost</a></p>
                </div>
            </section>
            <section class="contact-form">
                <h2>Kirim Pesan</h2>
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon:</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan:</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit">Kirim</button>
                </form>
            </section>
            <section class="map">
                <h2>Temukan Kami</h2>
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.4031756442914!2d98.58518510949824!3d3.49372059646596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303125197f331eeb%3A0x1c418b38fc4ea5e!2sUINSU%20Medan%20Tuntungan%20Kampus%20IV!5e0!3m2!1sen!2ssg!4v1714834244683!5m2!1sen!2ssg"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </section>
        </main>

        <footer>
            <p>&copy;2024 Mossy Frost. Semua hak cipta dilindungi undang-undang.</p>
        </footer>
    </div>
</body>

</html>