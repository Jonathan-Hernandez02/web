<?php
session_start();
include("db.php"); // tu conexión

$session_id = session_id();

// Actualizar cantidades si se envió el formulario
if(isset($_POST['update'])) {
    foreach($_POST['cantidades'] as $id_carrito => $cantidad) {
        $cantidad = intval($cantidad);
        $stmt = $conn->prepare("UPDATE carrito SET cantidad=?, subtotal=precio*? WHERE id=? AND session_id=?");
        $stmt->bind_param("iiss", $cantidad, $cantidad, $id_carrito, $session_id);
        $stmt->execute();
        $stmt->close();
    }
}

// Obtener los productos del carrito
$result = $conn->query("SELECT * FROM carrito WHERE session_id='$session_id'");
?>

<?php include("includes/header.php"); ?>

<h2 class="text-center">Mi Carrito</h2>

<?php if($result->num_rows > 0): ?>
<form action="ver_carrito.php" method="POST">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $total = 0;
        while($row = $result->fetch_assoc()):
            $total += $row['subtotal'];
        ?>
        <tr>
            <td><?php echo $row['nombre_producto']; ?></td>
            <td>L. <?php echo number_format($row['precio'],2); ?></td>
            <td>
                <input type="number" name="cantidades[<?php echo $row['id']; ?>]" value="<?php echo $row['cantidad']; ?>" min="1" style="width:80px;">
            </td>
            <td>L. <?php echo number_format($row['subtotal'],2); ?></td>
            <td>
                <a href="eliminar_carrito.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">X</a>
            </td>
        </tr>
        <?php endwhile; ?>
        <tr>
            <td colspan="3" class="text-right"><strong>Total:</strong></td>
            <td colspan="2"><strong>L. <?php echo number_format($total,2); ?></strong></td>
        </tr>
    </tbody>
</table>

<button type="submit" name="update" class="btn btn-primary">Actualizar Cantidades</button>
<a href="finalizar_compra.php" class="btn btn-success">Finalizar Compra</a>
</form>

<?php else: ?>
<p class="text-center">Tu carrito está vacío.</p>
<?php endif; ?>

<?php include("includes/footer.php"); ?>
