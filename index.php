<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            text-align: center;
            margin-top: 50px;
        }
    </style>

</head>
<body>
<div class="container">
    <h1>Bienvenido a la página web</h1>
    <button class="btn btn-primary" onclick="location.href='registro.php'">Registrarse</button>
    <button class="btn btn-primary" onclick="location.href='login.php'">Iniciar sesión</button>
    <button class="btn btn-primary" onclick="location.href='logout.php'">Cerrar sesión</button>
    <br>
    <p>Explicación de diferencias entre lenguajes de programación orientada a objetos, a eventos y lenguajes procedimentales:</p>
    <h2>Lenguajes Procedimentales:</h2>
    <p>En los lenguajes de programación procedimentales, el enfoque principal está en los procedimientos o funciones. El código se estructura en una secuencia de instrucciones que se ejecutan de manera lineal. Estos lenguajes se centran en la manipulación de datos a través de procedimientos o funciones, donde los datos y las operaciones son independientes entre sí.</p>
    <p>Ejemplos: C, Pascal, BASIC.</p>
    <br>
    <hr>
    <br>
    <h2>Lenguajes Orientados a Objetos:</h2>
    <p>Los lenguajes de programación orientados a objetos (OOP) se centran en los objetos y las interacciones entre ellos. En este paradigma, los datos y las operaciones se encapsulan dentro de objetos, que son instancias de clases. Los objetos pueden contener datos (atributos) y métodos (funciones) que operan en esos datos. La programación orientada a objetos fomenta la reutilización del código, la modularidad y la abstracción.</p>
    <p>Ejemplos: Java, C++, Python.</p>
    <br>
    <hr>
    <br>
    <h2>Lenguajes de Eventos:</h2>
    <p>En los lenguajes de programación de eventos, el flujo de control del programa está determinado por eventos que ocurren durante la ejecución del programa, como clics de ratón, pulsaciones de teclas o cambios en el estado de la aplicación. Se escriben manejadores de eventos para responder a estos eventos y ejecutar código específico cuando se produce un evento particular. Estos lenguajes son comunes en el desarrollo de interfaces de usuario, tanto en aplicaciones de escritorio como en aplicaciones web.</p>
    <p>Ejemplos: JavaScript (en desarrollo web), Visual Basic (en desarrollo de aplicaciones de Windows).</p>
    <br>
    <hr>
    <br>
</div>
<?php
// Store IP and date in a cookie
$ip = $_SERVER['REMOTE_ADDR'];
setcookie("user_ip", $ip, time() + 3600, "/");
setcookie("date_access", date("Y-m-d H:i:s"), time() + 3600, "/");
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>