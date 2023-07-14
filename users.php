<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Usuario general") {
  $nuevaURL = "index";
  header("Location:$nuevaURL.php");
  die();
}elseif (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Administrador" |$_SESSION['logged_in'] === "Empleado") {
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
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #ff0000;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        .btn {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: white;
            color: red;
        }
        .perfil {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ff0000;
            border-radius: 5px;
            margin-top: 50px;
        }

        .perfil h2 {
            color: #ff0000;
        }

        .perfil label {
            display: inline-block;
            width: 100px;
            font-weight: bold;
        }

        .perfil p {
            margin-top: 10px;
        }
    </style>
</head>
<body style="text-align:center;">
<nav class="navbar navbar-expand-lg navbar-dark bg-red">
  <div><img src="./img/toothless.png"/></div>
  <div><a href="Principal.php"><button class="button">Regresar</button></a></div>
</nav>
</p>
<?php
    foreach($_SESSION['user'] as $user){
      echo '<div class="perfil">';
      echo  '<h2>Perfil de Usuario</h2>';
      echo  '<label>ID de Usuario:</label>';
      echo  "<p>".$user['usuario_id']."</p>";
      echo  '<label>Nombre:</label>';
      echo  "<p>".$user['nombre']."</p>";
      echo  "<p>".$user['apellido']."</p>";
      echo  "<label>Email:</label>";
      echo  "<p>".$user['correo']."</p>";
      echo  "<label>Tipo:</label>";
      echo  "<p>".$user['tipo_usuario']."</p>";
      echo  "<label>Domicilio:</label>";
      echo  "<p>".$user['domicilio']."</p>";
      echo  "<label>Teléfono:</label>";
      echo  "<p>".$user['telefono']."</p>";
      echo  "<label>Contraseña:</label>";
      echo  "<p>".$user['Password']."</p>";
      echo '<a href="UpdateU.php"><button class="btn" >Actualizar datos</button></a>';
      echo "</div>";
    }
  ?>
<div>
<a href="DUA.php"><button title="Este boton sirve para dar de alta usuarios es decir registrarlos por primera vez" class="btn btn-success">Altas</button></a>
</div>
</p>
<div>
<a href="DUR.php"><button title="Este boton genera reportes con criterios especificos" type="button" class="btn btn-secondary">Reportes</button></a>
</div>
</body>
</html>