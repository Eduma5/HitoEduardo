<?php
session_start(); // Iniciar la sesión

// Manejar la inserción en la base de datos
$conn = new mysqli("localhost", "root", "", "hito1edu");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$autor_email = $_SESSION['email']; // Obtener el email del autor de la sesión
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$imagen_url = $_POST['imagen_url'];

// Verificar si el email del autor existe en la tabla de usuarios
$verificar_usuario = "SELECT email FROM usuarios WHERE email = '$autor_email'";
$resultado = $conn->query($verificar_usuario);
if ($resultado->num_rows > 0) {
    // Insertar la entrada en la tabla entradas
    $sql = "INSERT INTO entradas (autor_email, titulo, contenido, imagen_url) VALUES ('$autor_email', '$titulo', '$contenido', '$imagen_url')";
    if ($conn->query($sql) === TRUE) {
        echo "La entrada se ha guardado correctamente.";
    } else {
        echo "Error al guardar la entrada: " . $conn->error;
    }
} else {
    echo "El email del autor no existe en la tabla de usuarios.";
}

$conn->close();
?>