<?php 
include("includes/header.php"); 
include("db.php"); 
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Buscar el usuario por correo
    $result = $conn->query("SELECT * FROM usuarios WHERE email='$email'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($pass, $user['password'])) {
        // Guardar en sesión: nombre y rol
        $_SESSION['user'] = $user['nombre']; // nombre que se mostrará
        $_SESSION['rol'] = $user['rol'];     // rol para controlar acceso
        $_SESSION['id_usuario'] = $user['id']; // opcional, útil para ventas o historial

        // Redirigir según rol
        if($user['rol'] == 'admin'){
            header("Location: admin.php");
        } else {
            header("Location: menu.php"); // o la página principal para clientes
        }
        exit;
    } else {
        echo "<div class='alert alert-danger text-center mt-3'>Credenciales inválidas</div>";
    }
}
?>

<h2 class="text-center mt-4">Iniciar Sesión</h2>
<form method="POST" class="w-50 mx-auto mt-3">
  <input type="email" name="email" class="form-control mb-2" placeholder="Correo" required>
  <input type="password" name="password" class="form-control mb-2" placeholder="Contraseña" required>
  <button class="btn btn-warning w-100">Ingresar</button>
</form>


<?php include("includes/footer.php"); ?>
