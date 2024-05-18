<?php

// Conexión a la base de datos (modifica los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "localhost";
$dbname = "final_exam_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario de manera segura para prevenir inyección SQL
$email = $conn->real_escape_string($_POST['email']);
$input_password = $conn->real_escape_string($_POST['password']);

// Consulta SQL para verificar las credenciales
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Log hashed password from the database
    error_log('Hashed password from database: ' . $row['password']);

    // Log input password
    error_log('Input password: ' . $input_password);

    $login_attempts = $row['login_attempts'];

    // Compare hashed passwords
    if ($input_password === $row['password'] and $login_attempts < 3) {
        // Credenciales válidas, redireccionar al usuario a mainscreen.php
        header("Location: mainscreen.php");
        exit();
    } else {
        // Contraseña incorrecta, incrementar el número de intentos de inicio de sesión fallidos
        $sql_update_attempts = "UPDATE users SET login_attempts = login_attempts + 1 WHERE email = '$email'";
        $conn->query($sql_update_attempts);

        // Verificar el número de intentos de inicio de sesión fallidos
        $sql_attempts = "SELECT login_attempts FROM users WHERE email = '$email'";
        $result_attempts = $conn->query($sql_attempts);
        $row_attempts = $result_attempts->fetch_assoc();
        $login_attempts = $row_attempts['login_attempts'];

        if ($login_attempts >= 3) {
            // Excedido el número máximo de intentos de inicio de sesión fallidos, redireccionar al usuario a hola.php
            header("Location: hola.php");
            exit();
        } else {
            // Volver al formulario de inicio de sesión
            header("Location: index.html");
            exit();
        }
    }
} else {
    // Usuario no encontrado, volver al formulario de inicio de sesión
    header("Location: index.html");
    exit();
}

// Cerrar conexión a la base de datos
$conn->close();
?>
