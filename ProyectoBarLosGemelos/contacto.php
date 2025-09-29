<?php
include("includes/header.php");

// Conexión a la base de datos
$conexion = new mysqli("localhost:33065", "root", "", "losgemelos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    // Preparar la consulta
    $stmt = $conexion->prepare("INSERT INTO contacto (nombre, correo, mensaje) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $correo, $mensaje);

    if ($stmt->execute()) {
        echo "<p class='text-success text-center'>Mensaje enviado correctamente</p>";
    } else {
        echo "<p class='text-danger text-center'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

?>

<h2 class="text-center">Contáctanos</h2>
<form class="w-50 mx-auto" method="POST">
  <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
  <input type="email" name="correo" class="form-control mb-2" placeholder="Correo" required>
  <textarea name="mensaje" class="form-control mb-2" placeholder="Mensaje" required></textarea>
  <button type="submit" class="btn btn-warning w-100">Enviar</button>
</form>

<?php include("includes/footer.php"); ?>
