<?php
session_start();

include "config/connection.php";

$title = "Mossy Frost - Menu";
ob_start();

$sql = "SELECT name, description, price, image FROM menus";
$stmt = $conn->prepare($sql);
$stmt->execute();
$menus = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <h1 class="title">Menu Kami</h1>
    <div class="menu-items">
        <?php foreach ($menus as $menu) : ?>
            <div class="menu-item">
                <img src="assets/images/<?php echo htmlspecialchars($menu['image']); ?>" alt="<?php echo htmlspecialchars($menu['name']); ?>">
                <h2><?php echo htmlspecialchars($menu['name']); ?></h2>
                <p><?php echo htmlspecialchars($menu['description']); ?></p>
                <span>Rp<?php echo number_format($menu['price'], 0, ',', '.'); ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php
$content = ob_get_clean();
include "layouts/app.php";
?>