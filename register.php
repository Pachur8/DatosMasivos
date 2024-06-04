<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Nueva Obra</title>
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
                    <a class="nav-link" href="events.php">Eventos Especiales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Acerca de</a>
                </li>
	        <li class="nav-item">
                    <a class="nav-link active" href="register.php">Resgistro</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Mandanos tus obras!</h1>
        <form action="register.php" method="post" class="mb-4">
            <div class="form-group">
                <label for="nombre">Nombre del Artista</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto del Artista (ej. artista2.jpg)</label>
                <input type="text" class="form-control" id="foto" name="foto" required>
            </div>
            <div class="form-group">
                <label for="titulo">Nombre de la Obra</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="obra">Imagen de la Obra (ej. obra324.jpg)</label>
                <input type="text" class="form-control" id="obra" name="obra" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $foto = $_POST['foto'];
            $titulo = $_POST['titulo'];
            $obra = $_POST['obra'];

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

            // Insertar los datos en la tabla artistas2
            $sql = "INSERT INTO artistas2 (autor, foto, titulo, obra) VALUES ('$nombre', '$foto', '$titulo', '$obra')";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Nueva obra agregada exitosamente.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . $conn->error . '</div>';
            }

            // Cerrar conexión
            $conn->close();
        }
        ?>
    </div>
    <div style="margin-bottom: 50px;"></div>
    <footer class="footer py-3 bg-custom text-custom text-center">
        <div class="container">
            © 2024 Galería de Arte. Todos los derechos reservados.
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
