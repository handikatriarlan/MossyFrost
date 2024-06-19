<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mossy Frost - Pesan</title>
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
                <ul class="navbar">
                    <li class="brand"><a href="index.php">Mossy Frost</a></li>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="order.php">Pesan</a></li>
                    <li><a href="history.php">Riwayat</a></li>
                    <li><a href="contact.php">Kontak</a></li>
                    <li><a href="login.php">Masuk</a></li>
                </ul>
            </nav>
        </header>

        <main class="main-content">
            <div class="order-form">
                <div class="title">
                    <h1>Pesan Sekarang</h1>
                    <p>Silakan lengkapi formulir di bawah ini untuk melakukan pemesanan.</p>
                </div>
                <form action="" method="GET">
                    <div class="form-group">
                        <label for="name" class="label">Nama:</label>
                        <input type="text" id="name" name="name" class="input">
                    </div>

                    <div class="form-group">
                        <label for="email" class="label">Email:</label>
                        <input type="email" id="email" name="email" class="input">
                    </div>

                    <div class="form-group">
                        <label for="phone" class="label">Nomor Telepon:</label>
                        <input type="text" id="phone" name="phone" class="input">
                    </div>

                    <div class="form-group">
                        <label for="address" class="label">Alamat:</label>
                        <textarea id="address" name="address" class="input textarea"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="menu">
                            <div class="menu-left">
                                <label for="product" class="label">Menu yang Dipesan:</label>
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="green-tea-latte" name="product" value="green-tea-latte"
                                        class="checkbox-input">
                                    <label for="green-tea-latte" class="checkbox-label">Green Tea Latte</label>
                                </div>
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="vanilla-milkshake" name="product"
                                        value="vanilla-milkshake" class="checkbox-input">
                                    <label for="vanilla-milkshake" class="checkbox-label">Vanilla Milkshake</label>
                                </div>
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="hazelnut-cappuccino" name="product"
                                        value="hazelnut-cappuccino" class="checkbox-input">
                                    <label for="hazelnut-cappuccino" class="checkbox-label">Hazelnut Cappuccino</label>
                                </div>
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="peppermint-mocha" name="product" value="peppermint-mocha"
                                        class="checkbox-input">
                                    <label for="peppermint-mocha" class="checkbox-label">Peppermint Mocha</label>
                                </div>
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="orange-julius" name="product" value="orange-julius"
                                        class="checkbox-input">
                                    <label for="orange-julius" class="checkbox-label">Orange Julius</label>
                                </div>
                            </div>
                            <div class="menu-right">
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="coconut-milkshake" name="product"
                                        value="coconut-milkshake" class="checkbox-input">
                                    <label for="coconut-milkshake" class="checkbox-label">Coconut Milkshake</label>
                                </div>
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="irish-coffee" name="product" value="irish-coffee"
                                        class="checkbox-input">
                                    <label for="irish-coffee" class="checkbox-label">Irish Coffee</label>
                                </div>
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="coffe-frappe" name="product" value="coffe-frappe"
                                        class="checkbox-input">
                                    <label for="coffe-frappe" class="checkbox-label">Coffe Frappe</label>
                                </div>
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="pineapple-smoothie" name="product"
                                        value="pineapple-smoothie" class="checkbox-input">
                                    <label for="pineapple-smoothie" class="checkbox-label">Pineapple Smoothie</label>
                                </div>
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" id="mint-mojito" name="product" value="mint-mojito"
                                        class="checkbox-input">
                                    <label for="mint-mojito" class="checkbox-label">Mint Mojito</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sugar-level" class="label">Kadar Gula:</label>
                        <select id="sugar-level" name="sugar-level" class="input select">
                            <option value=""></option>
                            <option value="normal-sugar">Normal</option>
                            <option value="less-sugar">Less</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity" class="label">Jumlah:</label>
                        <input type="number" id="quantity" name="quantity" class="input">
                    </div>

                    <div class="form-group">
                        <label for="message" class="label">Pesan Tambahan:</label>
                        <textarea id="message" name="message" class="input textarea"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Pesan Sekarang" class="btn-submit">
                    </div>
                </form>
            </div>
        </main>

        <footer class="footer">
            <p>&copy;2024 Mossy Frost. Semua hak cipta dilindungi undang-undang.</p>
        </footer>
    </div>
</body>

</html>