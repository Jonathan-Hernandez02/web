<?php
session_start();
include("db.php"); 

// Asegurarse de que venga un producto y cantidad
if(isset($_POST['id_producto']) && isset($_POST['cantidad'])) {

    $id_producto = intval($_POST['id_producto']);
    $cantidad = intval($_POST['cantidad']);

    // Obtener los datos del producto
    $result = $conn->query("SELECT * FROM menu WHERE id = $id_producto");
    if($row = $result->fetch_assoc()) {

        $nombre = $row['nombre'];
        $precio = $row['precio'];
        $subtotal = $precio * $cantidad;

        // Identificador de sesión para diferenciar carritos
        $session_id = session_id();

        // Insertar en la tabla carrito
        $stmt = $conn->prepare("INSERT INTO carrito (id_producto, nombre_producto, precio, cantidad, subtotal, session_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isdiss", $id_producto, $nombre, $precio, $cantidad, $subtotal, $session_id);
        $stmt->execute();
        $stmt->close();

        // Redirigir de vuelta al menú
        header("Location: menu.php");
        exit;

    } else {
        echo "Producto no encontrado.";
    }

} else {
    echo "Datos incompletos.";
}
?>
