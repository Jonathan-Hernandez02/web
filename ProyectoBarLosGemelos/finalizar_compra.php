<?php
include("includes/header.php");
include("db.php");
session_start();
$session_id = session_id();

// Verificar si hay productos en el carrito
$result = $conn->query("SELECT * FROM carrito WHERE session_id='$session_id'");
if($result->num_rows == 0){
    echo "<div class='container mt-5'>
            <div class='alert alert-warning text-center'>
            Tu carrito está vacío.<br>
            <a href='menu.php' class='btn btn-primary mt-3'>Volver al menú</a>
            </div>
          </div>";
    include("includes/footer.php");
    exit;
}

// Si no se ha enviado el formulario con el nombre, mostrar formulario
if(!isset($_POST['nombre_cliente'])){
?>
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Ingresa tu nombre para finalizar la compra</h4>
            <form action="finalizar_compra.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="nombre_cliente" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Finalizar Compra</button>
            </form>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");
    exit;
}

// Si ya se envió el nombre, procesar la venta
$nombre_cliente = $_POST['nombre_cliente'];

// Calcular total
$total = 0;
$result = $conn->query("SELECT * FROM carrito WHERE session_id='$session_id'");
while($row = $result->fetch_assoc()){
    $total += $row['subtotal'];
}

$stmt = $conn->prepare("INSERT INTO ventas (id_cliente, nombre_cliente, total, fecha) VALUES (NULL, ?, ?, NOW())");
$stmt->bind_param("sd", $nombre_cliente, $total);
$stmt->execute();
$id_venta = $stmt->insert_id;
$stmt->close();

// Insertar en detalle_venta
$result = $conn->query("SELECT * FROM carrito WHERE session_id='$session_id'");
while($row = $result->fetch_assoc()){
    $stmt = $conn->prepare("INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiid", $id_venta, $row['id_producto'], $row['cantidad'], $row['precio']);
    $stmt->execute();
    $stmt->close();
}

// Vaciar carrito
$conn->query("DELETE FROM carrito WHERE session_id='$session_id'");

// Mensaje de éxito
echo "<div class='container mt-5'>
        <div class='alert alert-success text-center'>
            Compra finalizada con éxito.<br>
            <a href='menu.php' class='btn btn-primary mt-3'>Volver al menú</a>
        </div>
        </div>";

include("includes/footer.php");
?>
