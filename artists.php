<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistas Destacados</title>
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
                    <a class="nav-link active" href="artists.php">Artistas Destacados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="events.php">Eventos Especiales</a>
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
    <div class="container">
        <h1 class="text-center mt-5">Artistas Destacados</h1>
	<p class="text-center">Descubre el talento único de nuestros artistas destacados. Desde pinturas vibrantes hasta esculturas cautivadoras, cada obra cuenta una historia única. Explora sus creaciones y sumérgete en el mundo del arte con nosotros.</p>
        </br>
	<div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <ul class="list-group">
                    <?php
                    // Conexión a la base de datos
                    $servername = "localhost";
                    $username = "root";
                    $password = "localhost";
                    $dbname = "big_data_db";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verificar la conexión
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    // Consulta para obtener los nombres de los artistas
                    $sql = "SELECT autor FROM artistas";
                    $result = $conn->query($sql);

                    // Si hay resultados, mostrarlos como una lista
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $nombre_artista = $row["autor"];
                            $nombre_artista = str_replace(" ", "_", $nombre_artista); // Reemplazar espacios por guiones bajos
                            echo '<li class="list-group-item"><a href="' . $nombre_artista . '.php">' . $row["autor"] . '</a></li>';
                        }
                    } else {
                        echo '<li class="list-group-item">No hay artistas para mostrar</li>';
                    }

                    // Cerrar conexión
                    $conn->close();
                    ?>
                </ul>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
