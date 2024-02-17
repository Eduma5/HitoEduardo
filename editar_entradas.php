<!DOCTYPE html>
<html>
<head>
    <title>Editar Entradas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">
<h2 class="mt-5">Editar Entradas</h2>

<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "hito1edu");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha recibido un id de entrada para editar o eliminar
if (isset($_GET['id'])) {
    $id_entrada = $_GET['id'];
    if (isset($_POST['actualizar'])) {
        $nuevo_titulo = $_POST['nuevo_titulo'];
        $nuevo_contenido = $_POST['nuevo_contenido'];
        // Consulta para actualizar la entrada
        $sql_actualizar = "UPDATE entradas SET titulo = '$nuevo_titulo', contenido = '$nuevo_contenido' WHERE id = $id_entrada";
        if ($conn->query($sql_actualizar) === TRUE) {
            echo "Entrada actualizada correctamente.";
        } else {
            echo "Error al actualizar la entrada: " . $conn->error;
        }
    } elseif (isset($_POST['eliminar'])) {
        // Consulta para eliminar la entrada
        $sql_eliminar = "DELETE FROM entradas WHERE id = $id_entrada";
        if ($conn->query($sql_eliminar) === TRUE) {
            echo "Entrada eliminada correctamente.";
            // Redirigir de vuelta a editar_entradas.php
            header('Location: editar_entradas.php');
            exit();
        } else {
            echo "Error al eliminar la entrada: " . $conn->error;
        }
    }

    // Obtener los datos de la entrada a editar
    $sql_entrada = "SELECT * FROM entradas WHERE id = $id_entrada";
    $result_entrada = $conn->query($sql_entrada);

    if ($result_entrada->num_rows > 0) {
        $row_entrada = $result_entrada->fetch_assoc();
        echo "<form method='post'>";
        echo "<div class='form-group'>";
        echo "<label for='nuevo_titulo'>Título:</label>";
        echo "<input type='text' class='form-control' id='nuevo_titulo' name='nuevo_titulo' value='" . $row_entrada["titulo"] . "'>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='nuevo_contenido'>Contenido:</label>";
        echo "<textarea class='form-control' id='nuevo_contenido' name='nuevo_contenido' rows='5'>" . $row_entrada["contenido"] . "</textarea>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary' name='actualizar'>Actualizar</button>";
        echo "<button type='submit' class='btn btn-danger' name='eliminar'>Eliminar</button>";
        echo "</form>";
        echo "<a href='todos_los_posts.php' class='btn btn-secondary mt-3'>Volver a Posts</a>";
    } else {
        echo "No se encontró la entrada a editar.";
    }
} else {
    // Consulta para seleccionar todas las entradas
    $sql = "SELECT * FROM entradas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar cada entrada con botones para editar y eliminar
        while($row = $result->fetch_assoc()) {
            echo "<div class='card mt-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row["titulo"] . "</h5>";
            echo "<p class='card-text'>" . $row["contenido"] . "</p>";
            echo "<a href='editar_entradas.php?id=" . $row["id"] . "' class='btn btn-primary'>Editar</a>";
            echo "</div>";
            echo "</div>";
        }
        echo "<a href='todos_los_posts.php' class='btn btn-secondary mt-3'>Ver Posts</a>";
    } else {
        echo "No hay entradas para mostrar.";
    }
}

$conn->close();
?>
</body>
</html>