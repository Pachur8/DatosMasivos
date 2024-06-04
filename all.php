<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las Obras</title>
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
                    <a class="nav-link active" href="all.php">Ver todas las obras</a>
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
                    <a class="nav-link" href="register.php">Resgistro</a>
                </li>
	    </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Todas las Obras</h1>
        <div class="row">
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

            // Consulta para obtener todas las obras
            $sql = "SELECT * FROM artistas";
            $result = $conn->query($sql);

            // Mostrar las obras
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="images/' . $row["obra"] . '" class="card-img-top" alt="Imagen de la obra">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["titulo"] . '</h5>';
                    echo '<p class="card-text">Autor: ' . $row["autor"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-md-12">';
                echo '<p class="text-center">No hay obras para mostrar.</p>';
                echo '</div>';
            }

            // Cerrar conexión
            $conn->close();
            ?>
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
