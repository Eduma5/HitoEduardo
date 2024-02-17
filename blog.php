<!DOCTYPE html>
<html>
<head>
    <title>Publicar Entrada</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">
<h2 class="mt-5">Publicar nueva entrada</h2>
<form action="guardar_entrada.php" method="post" class="mt-3">
    <div class="form-group">
        <label for="titulo">Nombre:</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>
    <div class="form-group">
        <label for="contenido">Contenido:</label>
        <textarea class="form-control" id="contenido" name="contenido" required></textarea>
    </div>
    <div class="form-group">
        <label for="imagen_url">URL de la imagen:</label>
        <input type="text" class="form-control" id="imagen_url" name="imagen_url" placeholder="https://ejemplo.com/imagen.jpg" required>
    </div>
    <button type="submit" class="btn btn-primary">Publicar entrada</button>
</form>
<a href="todos_los_posts.php" class="btn btn-secondary mt-3">Ver Todos los Posts</a>
<a href="index.php" class="btn btn-secondary mt-3">Volver a inicio</a>
</body>
</html>