<?php

// Conexión a la base de datos (modifica los valores según tu configuración)
$servername = "localhost";
$username = "azure123";
$dbname = "tarea1db";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Chequea la conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Consulta para obtener los usuarios
$sql = "SELECT id, username FROM Usuarios";
$result = $conn->query($sql);

// Verifica el resultado de la consulta
if ($result->num_rows > 0) {
  // Recorre cada registro y lo agrega a la tabla HTML
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["username"] . "</td>";
    echo "</tr>";
  }
} else {
  echo "No se encontraron usuarios";
}

$conn->close();

?>

