
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/Extreme_Explorer/pages/admin/admin.css">
</head>
<body>
    <?php include (__DIR__ . '/../../components/header/header.php'); ?>

    <div class="admin-container">
        <h1>Admin Panel</h1>
        <h2>Insert New Product</h2>
        <form action="admin.php" method="post">
            <input type="hidden" name="action" value="insert">
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="images">Image Path:</label>
                <input type="text" id="images" name="images" required>
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" id="size" name="size" required>
            </div>
            <div class="form-group">
                <label for="colour">Colour:</label>
                <input type="text" id="colour" name="colour" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" id="type" name="type" required>
            </div>
            <div class="form-group">
                <label for="catID">Category ID:</label>
                <input type="number" id="catID" name="catID" required>
            </div>
            <button type="submit" class="submit-btn">Insert Product</button>
        </form>

        <h2>Update Product</h2>
        <form action="admin.php" method="post">
            <input type="hidden" name="action" value="update">
            <div class="form-group">
                <label for="productID">Product ID:</label>
                <input type="number" id="productID" name="productID" required>
            </div>
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="images">Image Path:</label>
                <input type="text
