<?php
session_start();
include("db.php"); // tu conexión

$session_id = session_id();

if(isset($_GET['id'])) {
    $id_carrito = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM carrito WHERE id=? AND session_id=?");
    $stmt->bind_param("is", $id_carrito, $session_id);
    $stmt->execute();
    $stmt->close();
}

// Redirige de vuelta al carrito
header("Location: ver_carrito.php");
exit;
?>
