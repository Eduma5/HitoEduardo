<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el email y la contraseña actual y nueva desde el formulario
    $email = $_POST["email"];
    $contrasena_actual = $_POST["contrasena_actual"];
    $nueva_contrasena = $_POST["nueva_contrasena"];

    // Conectar a la base de datos
    $conn = new mysqli("localhost", "root", "", "hito1edu");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Buscar al usuario por su email
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Obtener la información del usuario
        $usuario = $result->fetch_assoc();
        $contrasena_encriptada = $usuario["contrasena"];

        // Verificar la contraseña actual encriptada
        if (password_verify($contrasena_actual, $contrasena_encriptada)) {
            // Encriptar la nueva contraseña
            $nueva_contrasena_encriptada = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

            // Actualizar la contraseña en la base de datos
            $sql_update = "UPDATE usuarios SET contrasena='$nueva_contrasena_encriptada' WHERE email='$email'";
            if ($conn->query($sql_update) === TRUE) {
                echo "Contraseña actualizada correctamente";
            } else {
                echo "Error al actualizar la contraseña: " . $conn->error;
            }
        } else {
            echo "La contraseña actual es incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">
<h2 class="mt-5">Cambiar Contraseña</h2>
<form action="cambiar_contrasena.php" method="post">
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="contrasena_actual">Contraseña Actual:</label>
        <input type="password" class="form-control" id="contrasena_actual" name="contrasena_actual">
    </div>
    <div class="form-group">
        <label for="nueva_contrasena">Nueva Contraseña:</label>
        <input type="password" class="form-control" id="nueva_contrasena" name="nueva_contrasena">
    </div>
    <button type="submit" class="btn btn-primary">Guardar Nueva Contraseña</button>
    <a href="login.php" class="btn btn-secondary">Volver Login</a>
</form>
</body>
</html>