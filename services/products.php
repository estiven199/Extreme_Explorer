<?php
// Incluir el archivo de conexión a la base de datos
include (__DIR__ . '/../db_connect.php');

/**
 * Obtener productos por oferta
 *
 * @param int $offer_value
 * @return array
 */
function getProductsByOffer($offer_value) {
    global $conn;
    $sql = "SELECT * FROM products WHERE offer = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $offer_value);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = array();
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    } else {
        echo "No products found with offer value: $offer_value";
    }

    $stmt->close();
    return $products;
}

/**
 * Obtener todos los productos
 *
 * @return array
 */
function getAllProducts() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    $products = array();
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    } else {
        echo "No products found.";
    }

    return $products;
}

/**
 * Obtener productos por categoría
 *
 * @param string $category
 * @return array
 */
function getProductsByCategory($category) {
    global $conn;
    $sql = "SELECT * FROM products WHERE catID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = array();
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    } else {
        echo "No products found in category: $category";
    }

    $stmt->close();
    return $products;
}

function getProductById($productID) {
    global $conn;
    $sql = "SELECT * FROM products WHERE productID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productID);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
    return $product;
}


// // Check if the user is logged in as an admin
// if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
//     header('Location: login.php');
//     exit();
// }

// Insert a new product
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'insert') {
//     $productName = $_POST['productName'];
//     $description = $_POST['description'];
//     $images = $_POST['images'];
//     $size = $_POST['size'];
//     $colour = $_POST['colour'];
//     $price = $_POST['price'];
//     $type = $_POST['type'];
//     $catID = $_POST['catID'];

//     $sql = "INSERT INTO products (productName, description, images, size, colour, price, type, catID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param('sssssdsi', $productName, $description, $images, $size, $colour, $price, $type, $catID);

//     if ($stmt->execute()) {
//         echo "Product inserted successfully!";
//     } else {
//         echo "Error: " . $stmt->error;
//     }
//     $stmt->close();
// }

// // Update an existing product
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'update') {
//     $productID = $_POST['productID'];
//     $productName = $_POST['productName'];
//     $description = $_POST['description'];
//     $images = $_POST['images'];
//     $size = $_POST['size'];
//     $colour = $_POST['colour'];
//     $price = $_POST['price'];
//     $type = $_POST['type'];
//     $catID = $_POST['catID'];

//     $sql = "UPDATE products SET productName = ?, description = ?, images = ?, size = ?, colour = ?, price = ?, type = ?, catID = ? WHERE productID = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param('sssssdsi', $productName, $description, $images, $size, $colour, $price, $type, $catID, $productID);

//     if ($stmt->execute()) {
//         echo "Product updated successfully!";
//     } else {
//         echo "Error: " . $stmt->error;
//     }
//     $stmt->close();
// }

// // Delete an existing product
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete') {
//     $productID = $_POST['productID'];

//     $sql = "DELETE FROM products WHERE productID = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param('i', $productID);

//     if ($stmt->execute()) {
//         echo "Product deleted successfully!";
//     } else {
//         echo "Error: " . $stmt->error;
//     }
//     $stmt->close();
// }

// $conn->close();
?>
