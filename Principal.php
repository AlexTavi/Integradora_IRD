<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Usuario general") {
  $nuevaURL = "index";
  header("Location:$nuevaURL.php");
  die();
}elseif (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Administrador" | $_SESSION['logged_in'] === "Empleado") {
}else{
  $nuevaURL = "login";
header("Location: $nuevaURL.php");
die();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
          <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0
.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min
.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/p
opper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.
min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function destruirSesionYRecargar() {
      $.ajax({
        url: 'destroy_session.php',
        type: 'POST',
        success: function(response) {
          // Recargar la página principal fuera del iframe
          if (window.top !== window.self) {
            window.top.location.reload();
          } else {
            window.location.reload();
          }
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    }
  </script>
  <style>
    body {
        text-align: center;
      }

      .navbar {
        background-color: #ff0000;
      }

      .navbar img {
        max-width: 50px;
        height: auto;
      }

      button {
        background-color: #ff0000;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        margin: 10px;
        cursor: pointer;
      }

      button:hover {
        background-color: white;
        color:black;
      }

      .btn-success {
        background-color: red;
      }

      .btn-primary {
        background-color: red;
      }

      .btn-warning {
        background-color: red;
      }

      .btn-secondary {
        background-color: red;
      }
    </style>
</head>
<body style="text-align:center;">
<nav class="navbar navbar-expand-lg navbar-dark bg-red">
  <div><img src="./img/toothless.png"/></div>
  <div><button class="btn" onclick="destruirSesionYRecargar()">Cerrar Sesión</button></div>
</nav>
</p>
<div>
<a href="productos.php"><button title="Este boton sirve para gestionar los productos" class="btn btn-success">Productos</button></a>
</div>
<div>
<a href="users.php"><button title="Este boton nos sirve para gestionar los usuarios" type="button" class="btn btn-primary">Usuarios</button></a>
</div>
<a href="DetalleR.php"><button title="Este boton genera reportes con criterios especificos" type="button" class="btn btn-secondary">Reportes</button></a>
<div>
  <?php
  if($_SESSION['logged_in'] === "Administrador"){
    echo "<a href='guarda.php'><button class='btn'>Respaldo</button></a>";
  }
  ?>
    </div>
</body>
</html>