<!-- login_handler.php -->
<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener las credenciales del formulario
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Realizar la verificación de las credenciales en la base de datos
    // Suponiendo que utilizas MySQL
    $conn = new mysqli("localhost", "root", "", "hito1edu");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['contrasena'];

        // Verificar la contraseña introducida con la contraseña almacenada
        if (password_verify($contrasena, $hashed_password)) {
            // Iniciar la sesión y redirigir a blog.php
            session_start();
            $_SESSION['email'] = $email;
            header('Location: blog.php');
            exit;
        } else {
            // Credenciales incorrectas, mostrar un mensaje de error
            echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
        }
    } else {
        // Email no encontrado en la base de datos
        echo "No se encontró el email en la base de datos.";
    }

    $conn->close();
}
?>