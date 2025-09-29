<?php include("includes/header.php"); ?>
<?php include("db.php"); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $personas = $_POST['personas'];

    $sql = "INSERT INTO reservaciones (nombre, telefono, fecha, hora, personas)
            VALUES ('$nombre','$telefono','$fecha','$hora','$personas')";
    if ($conn->query($sql)) {
        echo "<div class='alert alert-success'>Reserva realizada con éxito</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<h2 class="text-center">Haz tu Reservacion</h2>
<form method="POST" class="w-50 mx-auto">
  <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
  <input type="text" name="telefono" class="form-control mb-2" placeholder="Teléfono" required>
  <input type="date" name="fecha" class="form-control mb-2" required>
  <input type="time" name="hora" class="form-control mb-2" required>
  <input type="number" name="personas" class="form-control mb-2" placeholder="N° de Personas" required>
  <button class="btn btn-warning w-100">Reservar</button>
</form>

<?php include("includes/footer.php"); ?>