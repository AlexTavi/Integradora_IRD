<?php
session_start();
// Dirección o IP del servidor MySQL
$host = "127.0.0.1";

// Nombre de usuario del servidor MySQL
$username = "Maoui";

// Contraseña del usuario
$password = "maouicafe";

// Nombre de la base de datos
$baseDeDatos = "BDMAOUI";

// Nombre de la tabla a trabajar
$tabla = "Nosotros";

function Conectarse()
{
    global $host, $username, $password, $baseDeDatos, $tabla;

    if (!($link = mysqli_connect($host, $username, $password))) {
        exit();
    }

    if (!mysqli_select_db($link, $baseDeDatos)) {
        exit();
    }

    return $link;
}

$link = Conectarse();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Maoui Café</title>
    <link rel="icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">


    <style>
        body {
            font-family:  'Helvetica', sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: red;
            color: #ffffff;
            width: 100%;
            text-align: center;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            margin: 20px 50px 20px 20px;
            text-decoration: none;
            color: #ffffff;
        }

        li a:hover {
            background-color: #ffffff;
            color: #ff0000;
        }
        img:hover {
            background-color: #ffffff;
            color: #ff0000;
        }
        .button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 5px;
}
.buttonr { 
  background-color: #ff0000;
  color: white;
  border: 2px solid #ff0000;
}

.buttonr:hover {
  
  background-color: white; 
  color: black; 
  }
        * {box-sizing: border-box;}
.mySlides {display: none;}
img {
    vertical-align: middle;
    margin: 10px 20px 20px 10px;
}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}
.content {
      padding: 20px;
    }


.iframe1 {
      width: 100%;
      height: 504px;
}

footer {
      background-color: red;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
    </style>
    <script>
    function showPage(pageName) {
      const pages = document.getElementsByClassName('page');
      for (let i = 0; i < pages.length; i++) {
        pages[i].style.display = 'none';
      }
      document.getElementById(pageName).style.display = 'block';
    }
  </script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-red">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div  class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" onclick="showPage('inicio')">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" onclick="showPage('catalogo')">Catálogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" onclick="showPage('login')">
                        <?php if (isset($_SESSION['logged_in'])) { echo "Iniciada"; } else { echo "Iniciar sesión"; } ?>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showPage('carrito')">
                        <img src="./img/icons8-shopping-cart-48.png" style="transform: scale(0.7);" alt="Carrito">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showPage('ubicacion')">
                        <img src="./img/icons8-google-maps-48.png" style="transform: scale(0.7);" alt="Ubicación">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
    <div class="content">
    <div class="page" id="inicio">
      <iframe class="iframe1" src="carrusel.php" frameborder="0"></iframe>
      <center>
      <a href="#" onclick="showPage('nosotros')" ><button class="button buttonr">Nosotros</button></a>
      <a href="#" onclick="showPage('catalogo')" ><button class="button buttonr">Catalogo</button></a>
      <a href="#" onclick="showPage('recetas')" ><button class="button buttonr">Recetas</button></a>
    </center>
    </div>

    <div class="page" id="nosotros" style="display: none;">
    <?php
    $querySelect = "SELECT * FROM $tabla";
    $resultSelect = mysqli_query($link, $querySelect);
    if ($resultSelect) {
      while ($row = $resultSelect->fetch_assoc()){
        if ($row!=null){
      echo "<h1>Nombre de la empresa: </h1><h4>".$row['Nombre']."</h4><br>";
      echo "<h1>Objetivo: </h1><h4>".$row['Objetivo']."</h4><br>";
      echo "<h1>Mision: </h1><h4>".$row['Mision']."</h4><br>";
      echo "<h1>Vision: </h1><h4>".$row['Vision']."</h4><br>";
      echo "<h1>Valores: </h1><h4><br>";
      $partes=explode(".",$row['Valores']);
      foreach ($partes as $parte){
        if($parte!=""){
        echo $parte.".<br><br>";
      }
    }
      echo "</h4>";

      }
    }
    if($row===null){
      echo "<small>No hay más información</small>";
    }
    }
    
?>    
</div>

    <div class="page" id="catalogo" style="display: none;">
      <iframe src="catalogo.php" frameborder="0" style="width:100%; height: 500px;"></iframe>
    </div>

    <div class="page" id="carrito" style="display: none;">
      <h1>Carrito de compras</h1>
      <iframe src="carrito.php" frameborder="0" style="width:100%; height: 500px;"></iframe>
    </div>

    <div class="page" id="ubicacion" style="display: none;">
      <h1>Ubicación</h1>
      <iframe src="mapa.php" frameborder="0" style="width:100%; height: 500px;"></iframe>
    </div>

    <div class="page" id="login" style="display: none;">
      <iframe src="login.php" frameborder="0" style="width:100%; height: 500px;"></iframe>
    </div>
    <div class="page" id="recetas" style="display: none;">
      <iframe src="recetas.php" frameborder="0" style="width:100%; height: 500px;"></iframe>
    </div>
  </div>
  
  <footer>
    &copy; 2023 Toothless Company Technologies. All rights reserved.
  </footer>
</body>
</html>
