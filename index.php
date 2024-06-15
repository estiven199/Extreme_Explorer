<?php
session_start(); // Asegúrate de iniciar la sesión al principio del archivo
$_SESSION['logged_in'] = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : false;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extreme Explorer - Inicio</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'components/header/header.php'; ?>
    <main class="homepage">
        <section class="hero">
            <img src="public/Banners.png" alt="Ahorra en la app">
        </section>
        <section class="services">
            <div class="service-card">
                <img src="public/user-1.svg" alt="Ingresa a tu cuenta">
                <h3>Sign in to your account</h3>
                <p>Enjoy offers and shop without limits</p>
            </div>
            <div class="service-card">
                <img src="public/location.svg" alt="Ingresa tu ubicación">
                <h3>Enter your location</h3>
                <p>Check costs and delivery times</p>
            </div>
            <div class="service-card">
                <img src="public/payment.svg" alt="Medios de pago">
                <h3>Payment methods</h3>
                <p>Pay for your purchases quickly and securely</p>
            </div>
            <div class="service-card">
                <img src="public/products.svg" alt="Menos de $40.000">
                <h3> Under $100</h3>
                <p>Discover products with low prices</p>
            </div>
            <div class="service-card">
                <img src="public/protected.svg" alt="Compra protegida">
                <h3> Purchase protection</h3>
                <p>You can return your purchase for free</p>
            </div>
            <div class="service-card">
                <img src="public/stores.svg" alt="Tiendas oficiales">
                <h3>Official stores</h3>
                <p>Find your favorite brands</p>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2>Offers</h2>
                        <div class="offers-section">
                            <?php
                            // Incluir el archivo PHP que contiene la lógica para obtener los productos con oferta
                            include 'services/get_offers.php';

                            // Verificar si hay productos para mostrar
                            if (!empty($products)) {
                                // Iterar sobre los productos y generar HTML para cada uno
                                foreach ($products as $product) {
                                    echo '<div class="card">';
                                    echo '<img src="public/' . $product['images'] . '" alt="' . $product['productName'] . '">';
                                    echo '<div class="card-body">';
                                    echo '<h5 class="card-title">' . $product['productName'] . '</h5>';
                                    echo '<p class="old-price">$' . number_format($product['price'] + ($product['price'] * 0.35), 2) . '</p>';
                                    // Puedes calcular el descuento aquí si es necesario
                                    echo '<p class="price">$' . number_format($product['price'], 2) . '</p>';
                                    echo '<span class="discount">35% OFF</span>';
                                    echo '<p class="free-shipping">Free shipping</p>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<p>No hay productos con oferta disponible.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="banner-container">
                <div class="banner-item">
                    <img src="public/hiking_gear.png" alt="Hiking Gear">
                    <div class="content">
                        <div class="title">Pay in Installments with 0% Interest</div>
                        <a href="#" class="btn-des">View Offers</a>
                    </div>
                </div>
                <div class="banner-item">
                    <img src="public/discount_coupon_34_percent.png" alt="Camping Equipment">
                    <div class="content">
                        <div class="title">Clearance Sale Up to 40% OFF</div>
                        <a href="#" class="btn-des">View Offers</a>
                    </div>
                </div>
                <div class="banner-item">
                    <img src="public/discount_coupons.png" alt="Discount Coupons">
                    <div class="content">
                        <div class="title">Save with Discount Coupons</div>
                        <a href="#" class="btn-des">View Coupons</a>
                    </div>
                </div>
                <div class="banner-item">
                    <img src="public/fishing_gear.png" alt="Fishing Gear">
                    <div class="content">
                        <div class="title">Discover All Coupons to Activate</div>
                        <a  href="#" class="btn-des">Activate 50% OFF</a>
                    </div>
                </div>
                <div class="banner-item">
                    <img src="public/daily_deals.png" alt="Daily Deals">
                    <div class="content">
                        <div class="title">Don't Miss Out! Daily Deals Up to 40% OFF</div>
                        <a href="#" class="btn-des">View More</a>
                    </div>
                </div>
                <div class="banner-item">
                    <img src="public/special_offers.png" alt="Special Offers">
                    <div class="content">
                        <div class="title">Special Offers for a Limited Time</div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include 'components/footer/footer.html'; ?>
</body>

</html>