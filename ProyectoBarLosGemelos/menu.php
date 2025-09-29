<?php include("includes/header.php"); ?>
<?php include("db.php"); ?>

<h2 class="text-center">Nuestro Menú</h2>
<div class="row">
<?php
$result = $conn->query("SELECT * FROM menu");

while($row = $result->fetch_assoc()):

    if($row['nombre'] == "Cerveza Nacional") $img = "img/cerveza_nacional.jpg";
    elseif($row['nombre'] == "Cerveza Importada") $img = "img/cerveza_importada.jpg";
    elseif($row['nombre'] == "Cerveza Corona") $img = "img/cerveza_corona.jpg";
    elseif($row['nombre'] == "Hamburguesa") $img = "img/hamburguesa.jpg";
    elseif($row['nombre'] == "Alitas BBQ") $img = "img/alitas_bbq.jpg";
    elseif($row['nombre'] == "Margarita") $img = "img/margarita.jpg";

?>
  <div class="col-md-4">
    <div class="card text-dark mb-3">


      <img src="<?php echo $img; ?>" 
           alt="<?php echo $row['nombre']; ?>" 
           class="card-img-top img-fluid" 
           style="max-height:200px; object-fit:cover;">

      <div class="card-body">
        <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
        <p class="card-text"><?php echo $row['descripcion']; ?></p>
        <p><strong>L. <?php echo number_format($row['precio'],2); ?></strong></p>

        <form action="agregar_carrito.php" method="POST">
          <input type="hidden" name="id_producto" value="<?php echo $row['id']; ?>">
          <input type="number" name="cantidad" value="1" min="1" class="form-control mb-2" style="width:80px;">
          <button type="submit" class="btn btn-primary">Agregar al carrito</button>
        </form>
      </div>
    </div>
  </div>
<?php endwhile; ?>
</div>

<div><a href="ver_carrito.php" class="btn btn-info">Ver Carrito</a></div>

<?php include("includes/footer.php"); ?>
