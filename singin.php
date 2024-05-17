<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Usuarios (Username, Password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Usuario registrado correctamente";
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }

    $conn->close();
}
?>
