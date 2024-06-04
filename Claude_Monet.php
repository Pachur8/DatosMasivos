<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artista</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #AAB5DF;
        }
        .navbar-brand {
            color: black;
            font-weight: bold;
        }
        .nav-link {
            color: black;
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
            <a class="navbar-brand" href="artists.php">Artistas Destacados</a>
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="Vincent_van_Gogh.php">Vincent van Gogh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Leonardo_da_Vinci.php">Leonardo da Vinci</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Salvador_Dali.php">Salvador_Dalí</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Pablo_Picasso.php">Pablo Picasso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Diego_Velazquez.php">Diego Velázquez</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Rembrandt_van_Rijn.php">Rembrandt van Rijn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Claude_Monet.php">Claude Monet</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
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

                // Obtener detalles del artista
                $sql = "SELECT * FROM artistas WHERE id = 6"; // Reemplaza 1 con el ID del artista que deseas mostrar
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $nombre_artista = $row["autor"];
                    $foto_artista = 'images/' . $row["foto"]; // Ruta de la imagen del artista
                    $titulo_obra = $row["titulo"];
                    $nombre_obra = 'images/' . $row["obra"]; // Ruta de la imagen de la obra

                    // Mostrar los detalles del artista
                    echo '<h2 class="text-center">' . $nombre_artista . '</h2>';
                    echo '<img src="' . $foto_artista . '" class="img-fluid rounded mx-auto d-block mt-3" alt="Foto del artista">';
                    echo '<h3 class="text-center mt-3">Título de la obra: ' . $titulo_obra . '</h3>';
                    echo '<img src="' . $nombre_obra . '" class="img-fluid rounded mx-auto d-block mt-3" alt="Obra del artista">';
                } else {
                    echo '<p class="text-center">No se encontraron detalles del artista.</p>';
                }

                // Cerrar conexión
                $conn->close();
                ?>
            </div>
        </div>
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
