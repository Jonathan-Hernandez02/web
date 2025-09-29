<?php

include("includes/header.php");
include("db.php");
session_start();


if(!isset($_SESSION['user']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit;
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-3">Panel de Administración</h2>
    <p class="text-center">
        Bienvenido, <?php echo $_SESSION['user']; ?> | 
        <a href="logout.php">Cerrar sesión</a>
    </p>


    <div class="mb-4 text-center">
        <a href="admin.php?seccion=reservas" class="btn btn-primary mx-1">Reservas</a>
        <a href="admin.php?seccion=pedidos" class="btn btn-primary mx-1">Pedidos</a>
        <a href="admin.php?seccion=productos" class="btn btn-primary mx-1">Productos</a>
    </div>

    <div>
        <?php
        $seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'reservas';

        switch($seccion){
            case 'pedidos':
                // Pedidos de clientes
                $ventas = $conn->query("SELECT * FROM ventas ORDER BY fecha DESC");
                if($ventas->num_rows > 0):
                ?>
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID Venta</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($venta = $ventas->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $venta['id_venta']; ?></td>
                                    <td><?php echo $venta['nombre_cliente']; ?></td>
                                    <td><?php echo $venta['fecha']; ?></td>
                                    <td>L. <?php echo number_format($venta['total'],2); ?></td>
                                    <td>
                                        <a href="ver_detalle_venta.php?id=<?php echo $venta['id_venta']; ?>" class="btn btn-info btn-sm">Ver Productos</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">No hay pedidos registrados.</p>
                <?php
                endif;
                break;

            case 'productos':
                // Productos del menú
                $productos = $conn->query("SELECT * FROM menu ORDER BY nombre ASC");
                if($productos->num_rows > 0):
                ?>
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($prod = $productos->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $prod['id']; ?></td>
                                    <td><?php echo $prod['nombre']; ?></td>
                                    <td><?php echo $prod['descripcion']; ?></td>
                                    <td>L. <?php echo number_format($prod['precio'],2); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">No hay productos registrados.</p>
                <?php
                endif;
                break;


            case 'reservas':
            default:
                // Reservas
                $result = $conn->query("SELECT * FROM reservaciones ORDER BY fecha DESC");
                if($result->num_rows > 0):
                ?>
                    <table class="table table-dark table-striped">
                        <tr><th>Nombre</th><th>Teléfono</th><th>Fecha</th><th>Hora</th><th>Personas</th></tr>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><?php echo $row['fecha']; ?></td>
                            <td><?php echo $row['hora']; ?></td>
                            <td><?php echo $row['personas']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                <?php else: ?>
                    <p class="text-center">No hay reservas registradas.</p>
                <?php
                endif;
                break;
        }
        ?>
    </div>
</div>

<?php include("includes/footer.php"); ?>
