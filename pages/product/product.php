<?php
$_SESSION['logged_in'] = isset($_SESSION['logged_in']);
include (__DIR__ . '/../../services/products.php');

$productID = isset($_GET['productID']) ? $_GET['productID'] : 0;
$product = getProductById($productID);

if (!$product) {
    echo "Product not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="/Extreme_Explorer/pages/product/product.css">
</head>

<body>
    <?php include (__DIR__ . '/../../components/header/header.php'); ?>

    <div class="product-detail-container">
        <div class="product-image">
            <img src="/Extreme_Explorer/public/<?php echo $product['images']; ?>"
                alt="<?php echo $product['productName']; ?>">
        </div>
        <div class="product-info">
            <h1><?php echo $product['productName']; ?></h1>
            <p><?php echo $product['description']; ?></p>
            <p>Size: <?php echo $product['size']; ?></p>
            <p>Colour: <?php echo $product['colour']; ?></p>
            <p>Type: <?php echo $product['Type']; ?></p>
            <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
            <?php
            if ($_SESSION['logged_in']) {
                echo '<button class="buy-btn">Buy</button>';
            } else {
                echo '<p>Please log in to buy this product</p>';
            }
            ?>
        </div>
    </div>
    <?php include (__DIR__ . '/../../components/footer/footer.html'); ?>

</body>

</html>