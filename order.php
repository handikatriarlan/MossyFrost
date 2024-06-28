<?php
session_start();

include "config/connection.php";

if (!isset($_SESSION['user_id'])) { ?>
    <script>
        alert("Anda Belum Masuk. Silahkan masuk terlebih dahulu.");
        window.location.href = "login.php";
    </script>
<?php }

$user_id = $_SESSION['user_id'];

$sql_user = "SELECT name, email, phone, address FROM users WHERE id = :user_id";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bindParam(':user_id', $user_id);
$stmt_user->execute();
$user = $stmt_user->fetch(PDO::FETCH_ASSOC);

$sql_menus = "SELECT id, name, description, price, image, user_id FROM menus";
$stmt_menus = $conn->prepare($sql_menus);
$stmt_menus->execute();
$menus = $stmt_menus->fetchAll(PDO::FETCH_ASSOC);

$title = "Mossy Frost - Pesan";
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $user['name'];
    $email = $user['email'];
    $phone = $user['phone'];
    $address = $user['address'];
    $menu_id = $_POST['menu']; // Since it's radio button, only one menu will be selected
    $sugar_level = $_POST['sugar-level'];
    $quantity = $_POST['quantity'];
    $message = $_POST['message'];
    $sugar_level = $_POST['sugar-level'];

    // Fetch the price of the selected menu from the menus table
    $sql_menu_price = "SELECT price FROM menus WHERE id = :menu_id";
    $stmt_menu_price = $conn->prepare($sql_menu_price);
    $stmt_menu_price->bindParam(':menu_id', $menu_id);
    $stmt_menu_price->execute();
    $menu_price = $stmt_menu_price->fetch(PDO::FETCH_COLUMN);

    // Insert into orders table
    $sql_insert = "INSERT INTO orders (user_id, menu_id, shipping_address, order_date, quantity, price, sugar_level, additional_message, status)
               VALUES (:user_id, :menu_id, :address, NOW(), :quantity, :menu_price, :sugar_level, :message, 'pending')";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bindParam(':user_id', $user_id);
    $stmt_insert->bindParam(':menu_id', $menu_id);
    $stmt_insert->bindParam(':address', $address);
    $stmt_insert->bindParam(':quantity', $quantity);
    $stmt_insert->bindParam(':menu_price', $menu_price);
    $stmt_insert->bindParam(':sugar_level', $sugar_level); // Ensure the value matches one of enum values
    $stmt_insert->bindParam(':message', $message);

    if ($stmt_insert->execute()) {
        echo "<script>alert('Pesanan berhasil diterima. Pantau terus pemesanan anda melalui halaman riwayat pemesanan!');</script>";
        header("Location: history.php");
        exit();
    } else {
        echo "Gagal memproses pesanan.";
    }
}
?>

<main>
    <div class="order-form">
        <div class="title">
            <h1>Pesan Sekarang</h1>
            <p>Silakan lengkapi formulir di bawah ini untuk melakukan pemesanan.</p>
        </div>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name" class="label">Nama:</label>
                <input type="text" id="name" name="name" class="input" value="<?php echo htmlspecialchars($user['name']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="email" class="label">Email:</label>
                <input type="email" id="email" name="email" class="input" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="phone" class="label">Nomor Telepon:</label>
                <input type="text" id="phone" name="phone" class="input" value="<?php echo htmlspecialchars($user['phone']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="address" class="label">Alamat:</label>
                <textarea id="address" name="address" class="input textarea" readonly><?php echo htmlspecialchars($user['address']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="menu" class="label">Menu yang Dipesan:</label><br>
                <?php foreach ($menus as $menu) : ?>
                    <input type="radio" id="menu-<?php echo $menu['id']; ?>" name="menu" value="<?php echo $menu['id']; ?>" class="radio-input">
                    <label for="menu-<?php echo $menu['id']; ?>" class="radio-label"><?php echo htmlspecialchars($menu['name']); ?> - Rp<?php echo number_format($menu['price'], 0, ',', '.'); ?></label><br>
                <?php endforeach; ?>
            </div>

            <div class="form-group">
                <label for="sugar-level" class="label">Kadar Gula:</label>
                <select id="sugar-level" name="sugar-level" class="input select">
                    <option value=""></option>
                    <option value="normal">Normal</option>
                    <option value="less">Less</option>
                    <option value="half">Half</option>
                    <option value="no">No</option>
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

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>