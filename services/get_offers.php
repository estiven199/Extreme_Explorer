<?php
// Incluir el archivo de conexión a la base de datos
include 'db_connect.php';

// Obtener el valor de 'offer' desde la URL
$offer_value = isset($_GET['offer']) ? $_GET['offer'] : 1;

// Consulta SQL para seleccionar productos con el valor de offer obtenido
$sql = "SELECT * FROM products WHERE offer = $offer_value";

// Ejecutar la consulta y obtener el resultado
$result = $conn->query($sql);

// Crear un array para almacenar los productos
$products = array();

// Verificar si se encontraron resultados
if ($result && $result->num_rows > 0) {
    // Inicio del bucle para recorrer los resultados
    while($row = $result->fetch_assoc()) {
        // Guardar cada fila de resultado en el array de productos
        $products[] = $row;
    }
} else {
    echo "No se encontraron productos con oferta.";
}

// Cerrar conexión
$conn->close();

// Ahora puedes utilizar el array $products en tu código HTML o donde lo necesites
?>
