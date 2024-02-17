<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (reemplaza 'localhost', 'usuario', 'contraseña' y 'basededatos' con tus propios valores)
    $conn = new mysqli("localhost", "root", "", "hito1edu");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener el email del formulario
    $email = $_POST["email"];

    // Consulta para verificar si el email ya está registrado
    $sql = "SELECT COUNT(*) as count FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $count = $row['count'];

    if ($count > 0) {
        echo "El email ya está registrado";
    } else {
        // Obtener los datos del formulario
        $nombre = $_POST["nombre"];
        // Encriptar la contraseña antes de guardarla en la base de datos
        $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);

        // Preparar la consulta para insertar los datos en la base de datos
        $sql_insert = "INSERT INTO usuarios (nombre, email, contrasena) VALUES ('$nombre', '$email', '$contrasena')";

        // Ejecutar la consulta de inserción
        if ($conn->query($sql_insert) === TRUE) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar: " . $conn->error;
        }
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>