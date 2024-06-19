<?php
$title = "Mossy Frost - Menu";
ob_start();
?>

<main>
    <h1 class="title">Menu Kami</h1>
    <div class="menu-items">
        <div class="menu-item">
            <img src="assets/images/cappuccino-jelly.jpg" alt="Menu 1">
            <h2>Cappuccino Jelly</h2>
            <p>Cappuccino dengan tambahan jelly berbagai rasa.</p>
            <span>Rp20.000</span>
        </div>
        <div class="menu-item">
            <img src="assets/images/milk-tea-delight.jpg" alt="Menu 2">
            <h2>Milk Tea Delight</h2>
            <p>Milk tea dengan rasa yang lezat dan segar.</p>
            <span>Rp25.000</span>
        </div>
        <div class="menu-item">
            <img src="assets/images/strawberry-smoothie.jpg" alt="Menu 3">
            <h2>Strawberry Smoothie</h2>
            <p>Smoothie segar dengan rasa strawberry asli.</p>
            <span>Rp30.000</span>
        </div>
        <div class="menu-item">
            <img src="assets/images/coffee-frappe.jpg" alt="Menu 4">
            <h2>Cofee Frappe</h2>
            <p>Coffee Frappe kami akan membuat hari anda lebih bersemangat.</p>
            <span><sup>Rp37.000</sup> Rp30.000</span>
        </div>
        <div class="menu-item">
            <img src="assets/images/hazelnut-cappuccino.jpg" alt="Menu 5">
            <h2>Hazelnut Cappuccino</h2>
            <p>Rasakan kelembutan cappuccino dengan sentuhan Hazelnut.</p>
            <span>Rp22.500</span>
        </div>
        <div class="menu-item">
            <img src="assets/images/green-tea-latte.jpg" alt="Menu 6">
            <h2>Green Tea Latte</h2>
            <p>Paduan sempurna antara rasa segar Green Tea dan Latte.</p>
            <span>Rp17.500</span>
        </div>
    </div>
</main>


<?php
$content = ob_get_clean();
include "layouts/app.php";
?>