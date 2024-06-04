<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos Especiales</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #AAB5DF;
        }
        .nav-link {
            color: black;
            font-weight: bold;
            padding: 8px;
        }
        .bg-custom {
            background-color: #AAB5DF;
        }
        .text-custom {
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="big_data_index.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="all.php">Ver todas las obras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="artists.php">Artistas Destacados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="events.php">Eventos Especiales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Acerca de</a>
                </li>
		<li class="nav-item">
                    <a class="nav-link" href="register.php">Resgistro</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Eventos Especiales</h1>
        <div class="card-deck mt-4">
	    <?php
                // Rutas de las imágenes de las obras
                $imagen_evento_1 = 'images/Salvador_Dali-La_Persistencia_de_la_Memoria-1931.jpg';
                $imagen_evento_2 = 'images/Van_Gogh-Starry_Night-1889.jpg';
                $imagen_evento_3 = 'images/Monet-Sunrise-1872.jpg';
            ?>
            <div class="card">
                  <img src="<?php echo $imagen_evento_1; ?>" class="card-img-top" alt="Evento 1">
                  <div class="card-body">
                      <h5 class="card-title">Conferencia de Arte Contemporáneo</h5>
                      <p class="card-text">Únete a nosotros para una conferencia emocionante sobre arte contemporáneo. Expertos en el campo compartirán sus conocimientos y perspectivas sobre las tendencias actuales en el mundo del arte.</p>
                      <p class="card-text">
                          <small class="text-muted">Ubicación: Galería Principal</small><br>
                          <small class="text-muted">Fecha: 15 de mayo de 2024</small>
                      </p>
                  </div>
              </div>
              <div class="card">
                  <img src="<?php echo $imagen_evento_2; ?>" class="card-img-top" alt="Evento 2">
                  <div class="card-body">
                      <h5 class="card-title">Exposición de Pinturas Clásicas</h5>
                      <p class="card-text">Descubre la belleza de las pinturas clásicas en nuestra exposición especial. Obras maestras de renombrados artistas te esperan en esta experiencia única.</p>
                      <p class="card-text">
                          <small class="text-muted">Ubicación: Sala de Exposiciones</small><br>
                          <small class="text-muted">Fecha: 22 de junio de 2024</small>
                      </p>
                  </div>
              </div>
              <div class="card">
                  <img src="<?php echo $imagen_evento_3; ?>" class="card-img-top" alt="Evento 3">
                  <div class="card-body">
                      <h5 class="card-title">Taller de Pintura en Vivo</h5>
                      <p class="card-text">Participa en nuestro taller de pintura en vivo y experimenta la creación artística de primera mano. Aprende técnicas y métodos de artistas profesionales además de conocer algunos de sus secretos.</p>
                      <p class="card-text">
                          <small class="text-muted">Ubicación: Patio de Esculturas</small><br>
                          <small class="text-muted">Fecha: 10 de julio de 2024</small>
                      </p>
                  </div>
             </div>
        </div>
    </div>
    <div style="margin-bottom: 50px;"></div>
    <footer class="footer py-3 bg-custom text-custom text-center">
        <div class="container">
            © 2024 Galería de Arte. Todos los derechos reservados.
        </div>
    </footer>
    <script>
        function setFooterPosition() {
            const body = document.body;
            const html = document.documentElement;
            const height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
            const footer = document.querySelector('.footer');
            const footerHeight = footer.offsetHeight;
            if (height > window.innerHeight) {
                footer.style.position = 'static';
            } else {
                footer.style.position = 'fixed';
                footer.style.bottom = '0';
                footer.style.left = '0';
                footer.style.width = '100%';
            }
        }
        window.addEventListener('resize', setFooterPosition);
        setFooterPosition();
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
