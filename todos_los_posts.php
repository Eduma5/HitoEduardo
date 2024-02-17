<!DOCTYPE html>
<html>
<head>
    <title>Todos los Posts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">
<h2 class="mt-5">Todos los Posts</h2>

<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "hito1edu");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para seleccionar todos los posts
$sql = "SELECT * FROM entradas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar cada post
    while($row = $result->fetch_assoc()) {
        echo "<div class='card mt-3'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row["titulo"] . "</h5>";
        echo "<p class='card-text'>" . $row["contenido"] . "</p>";
        echo "<img src='" . $row["imagen_url"] . "' class='img-fluid'>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No hay posts para mostrar.";
}

$conn->close();
?>
<a href="editar_entradas.php" class="btn btn-secondary mt-3">Editar Entradas</a>
<a href="blog.php" class="btn btn-secondary mt-3">Volver a Blog</a>
</body>
</html>
