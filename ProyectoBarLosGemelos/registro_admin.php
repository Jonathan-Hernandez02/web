<?php
include("includes/header.php");
include("db.php");
session_start();

// Solo admins pueden registrar otros admins
if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Procesar el registro cuando se envíe el formulario
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = trim($_POST['user']);
    $pass = trim($_POST['password']);

    if(empty($user) || empty($pass)) {
        $error = "Todos los campos son obligatorios.";
    } else {
        // Encriptar la contraseña
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        // Preparar la consulta
        $stmt = $conn->prepare("INSERT INTO usuarios (user,password) VALUES (?, ?)");
        $stmt->bind_param("ss", $user, $hashed_pass);

        if($stmt->execute()) {
            $success = "Administrador registrado correctamente.";
        } else {
            $error = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<h2 class="text-center">Registrar Nuevo Administrador</h2>

<?php if(isset($success)): ?>
    <p class="text-success text-center"><?php echo $success; ?></p>
<?php endif; ?>

<?php if(isset($error)): ?>
    <p class="text-danger text-center"><?php echo $error; ?></p>
<?php endif; ?>

<form class="w-50 mx-auto mt-4" method="POST">
    <input type="text" name="user" class="form-control mb-2" placeholder="Usuario" required>
    <input type="password" name="password" class="form-control mb-2" placeholder="Contraseña" required>
    <button type="submit" class="btn btn-warning w-100">Registrar Administrador</button>
</form>

<?php include("includes/footer.php"); ?>
