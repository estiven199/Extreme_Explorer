<?php
$_SESSION['logged_in'] = isset($_SESSION['logged_in'])

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extreme Explorer - Products</title>
    <link rel="stylesheet" href="/Extreme_Explorer/pages/products/products.css">
</head>
<body>
    <?php include (__DIR__ . '/../../components/header/header.php'); ?>
    <?php include (__DIR__ . '/../../services/products.php'); ?>


    <div class="container">
        <aside class="filters">
            <h2>Products</h2>
            <p>1046 results</p>
            <div class="filter-section">
                <h3>Filters</h3>
                <!-- Add filters as needed -->
            </div>
        </aside>
        <main class="product-list">
            <?php
            // Get the value of 'category' from the URL
            $category = isset($_GET['category']) ? $_GET['category'] : '';

            // Get products based on the category or show all products
            if ($category) {
                $products = getProductsByCategory($category);
            } else {
                $products = getAllProducts();
            }

            // Display products
            if (!empty($products)) {
                foreach ($products as $product) {
                    echo '<div class="product-item">';
                    echo '<img src="/Extreme_Explorer/public/' . $product['images'] . '" alt="' . $product['images'] . '">';
                    echo '<div class="product-details">';
                    echo '<div class="product-title">' . $product['productName'] . '</div>';
                    echo '<div class="product-title">' . $product['description'] . '</div>';
                    echo '<div class="product-price">$' . number_format($product['price'], 2) . '</div>';
                    echo '<div class="product-discount">' . $product['offer'] . '% OFF</div>';
                    echo '<div class="btn">';
                    if ($_SESSION['logged_in']) {
                        echo '<button class="buy-btn">Buy</button>';
                    } else {
                        echo '<p>Please log in to buy this product</p>';
                    }
                    echo '<a class="view-btn" href="/Extreme_Explorer/pages/product/product.php?productID=' . $product['productID'] . '" class="view-btn">View</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No products found.";
            }

            // Close connection
            $conn->close();
            ?>
        </main>
    </div>
    <?php include (__DIR__ . '/../../components/footer/footer.html'); ?>
</body>
</html>
