<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bar Los Gemelos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <!-- 🔹 NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
    <div class="container">
      <a class="navbar-brand fw-bold text-warning" href="index.php">
        <img src="img/logoempresa.jpg" width="100" class="me-2">Bar Los Gemelos
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="menu.php">Menú</a></li>
          <li class="nav-item"><a class="nav-link" href="reservas.php">Reservación</a></li>
          <li class="nav-item"><a class="nav-link" href="contacto.php">Contáctanos</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 🔹 HERO / PORTADA -->
  <header class="hero text-light d-flex align-items-center text-center" style="background: url('img/bar1.jpg') center/cover no-repeat; height: 90vh;">
    <div class="container">
      <h1 class="display-3 fw-bold">🍻 Bienvenidos al Bar Los Gemelos</h1>
<p class="lead text-dark">El mejor ambiente, las mejores bebidas y la comida que tanto disfrutas.</p>
      <a href="menu.php" class="btn btn-warning btn-lg mt-3">Ver Menú</a>
    </div>
  </header>

  <!-- 🔹 SECCIÓN QUIÉNES SOMOS -->
  <section class="container py-5 text-center">
    <h2 class="text-warning mb-4">¿Quiénes somos?</h2>
    <p class="lead">Somos un bar local que nació con la idea de ofrecer un espacio único donde disfrutar con amigos. Contamos con un ambiente acogedor, música en vivo y un menú lleno de sabor.</p>
    <div class="row mt-4">
      <div class="col-md-6">
        <img src="img/imagen1.jpg" class="img-fluid rounded shadow" alt="Ambiente del bar">
      </div>
      <div class="col-md-6 d-flex align-items-center">
        <p>En Bar Los Gemelos creemos que cada visita debe ser una experiencia inolvidable. Desde nuestras bebidas artesanales hasta la atención de nuestro equipo, buscamos que disfrutes al máximo cada momento.</p>
      </div>
    </div>
  </section>

  <!-- 🔹 SECCIÓN SERVICIOS -->
  <section class="bg-dark text-light py-5">
    <div class="container">
      <h2 class="text-center text-warning mb-5">Lo que ofrecemos</h2>
      <div class="row text-center">
        <div class="col-md-4 mb-4">
          <div class="card bg-secondary shadow h-100">
            <img src="img/comida1.webp" class="card-img-top" alt="Comida">
            <div class="card-body">
              <h5 class="card-title">🍔 Comida</h5>
              <p class="card-text">Hamburguesas, alitas y platos preparados con ingredientes frescos.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card bg-secondary shadow h-100">
            <img src="img/bebida1.jpg" class="card-img-top" alt="Bebidas">
            <div class="card-body">
              <h5 class="card-title">🍹 Bebidas</h5>
              <p class="card-text">Desde cervezas nacionales hasta cócteles internacionales preparados por bartenders expertos.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card bg-secondary shadow h-100">
            <img src="img/imagen9.jpg" class="card-img-top" alt="Ambiente">
            <div class="card-body">
              <h5 class="card-title">🎶 Ambiente</h5>
              <p class="card-text">Un lugar ideal para compartir con tus amigos.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="container py-5 text-center">
    <h2 class="text-warning mb-4">Galería</h2>
    <p class="mb-4">Así se vive la experiencia en Bar Los Gemelos.</p>
    <div class="row">
      <div class="col-md-4 mb-3"><img src="img/imagen4.jpg" class="img-fluid rounded shadow"></div>
      <div class="col-md-4 mb-3"><img src="img/imagen6.jpg" class="img-fluid rounded shadow"></div>
      <div class="col-md-4 mb-3"><img src="img/imagen7.jpg" class="img-fluid rounded shadow"></div>
      <div class="col-md-4 mb-3"><img src="img/imagen8.jpg" class="img-fluid rounded shadow"></div>
      <div class="col-md-4 mb-3"><img src="img/imagen11.jpg" class="img-fluid rounded shadow"></div>
      <div class="col-md-4 mb-3"><img src="img/imagen10.jpg" class="img-fluid rounded shadow"></div>
    </div>
  </section>

<section class="bg-dark text-light py-5">
  <div class="container">
    <h2 class="text-center text-warning mb-5">Reglas del Bar</h2>
    <div class="row text-center justify-content-center">

      <div class="col-md-6 mb-4">
        <div class="card bg-secondary shadow h-100">
          <img src="img/reglas11.jpg" class="card-img-top rounded" alt="Regla 1">
          <div class="card-body">
            <h5 class="card-title"> Regla 1</h5>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card bg-secondary shadow h-100">
          <img src="img/reglas2.jpg" class="card-img-top rounded" alt="Regla 2">
          <div class="card-body">
            <h5 class="card-title"> Regla 2</h5>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card bg-secondary shadow h-100">
          <img src="img/reglas4.jpg" class="card-img-top rounded" alt="Regla 3">
          <div class="card-body">
            <h5 class="card-title"> Regla 3</h5>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card bg-secondary shadow h-100">
          <img src="img/reglas5.jpg" class="card-img-top rounded" alt="Regla 4">
          <div class="card-body">
            <h5 class="card-title"> Regla 4</h5>
            
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="container py-5 text-center">
  <h2 class="text-warning mb-4">Informacion</h2>
  <p class="mb-4">Bar Los Gemelos.</p>
  <div class="row justify-content-center">

    <div class="col-md-4 mb-3">
      <div class="ratio ratio-16x9 rounded shadow">
        <video controls>
          <source src="videos/video1.mp4" type="video/mp4">
          Tu navegador no soporta videos HTML5.
        </video>
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <div class="ratio ratio-16x9 rounded shadow">
        <video controls>
          <source src="videos/video2.mp4" type="video/mp4">
          Tu navegador no soporta videos HTML5.
        </video>
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <div class="ratio ratio-16x9 rounded shadow">
        <video controls>
          <source src="videos/video3.mp4" type="video/mp4">
          Tu navegador no soporta videos HTML5.
        </video>
      </div>
    </div>

  </div>
</section>




  <!-- 🔹 FOOTER -->
  <footer class="bg-dark text-light py-4 text-center">
    <p class="mb-1">© 2025 Bar Los Gemelos. Todos los derechos reservados.</p>
    <small>📍 El Progreso, Yoro - Honduras | 📞 +504 9955-9542</small>
    <div class="mt-2">
      <a href="#" class="text-warning me-3"><i class="bi bi-facebook"></i></a>
      <a href="#" class="text-warning me-3"><i class="bi bi-instagram"></i></a>
      <a href="#" class="text-warning"><i class="bi bi-whatsapp"></i></a>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</body>
</html>
