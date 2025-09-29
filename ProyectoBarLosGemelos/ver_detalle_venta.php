<?php
include("includes/header.php");
include("db.php");
session_start();

// Verificar que se envió el id
if(!isset($_GET['id'])){
    echo "<div class='container mt-5'><div class='alert alert-danger text-center'>No se especificó la venta</div></div>";
    include("includes/footer.php");
    exit;
}

$id_venta = $_GET['id'];

// Obtener productos de la venta
$result = $conn->query("SELECT d.*, m.nombre AS nombre_producto
                        FROM detalle_venta d
                        JOIN menu m ON d.id_producto = m.id
                        WHERE d.id_venta = $id_venta");

?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Productos de la Venta #<?php echo $id_venta; ?></h2>
    <table class="table table-striped">
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
        </tr>
        <?php 
        $total = 0; // aquí acumulamos todos los subtotales

        while($row = $result->fetch_assoc()): 
            $subtotal = $row['cantidad'] * $row['precio_unitario'];
            $total += $subtotal; // sumamos al total
        ?>
        <tr>
            <td><?php echo $row['nombre_producto']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            <td>L. <?php echo number_format($row['precio_unitario'],2); ?></td>
            <td>L. <?php echo number_format($subtotal,2); ?></td>
        </tr>
        <?php endwhile; ?>
        <!-- Fila final mostrando el total general -->
        <tr>
            <td colspan="3" class="text-end"><strong>Total:</strong></td>
            <td><strong>L. <?php echo number_format($total,2); ?></strong></td>
        </tr>
    </table>
    <a href="admin.php" class="btn btn-primary mt-3">Volver al Panel</a>
</div>
<?php
include("includes/footer.php");
?>