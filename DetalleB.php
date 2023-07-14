<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Administrador"|$_SESSION['logged_in'] === "Empleado") {
}else{
    $nuevaURL = "login";
    header("Location: $nuevaURL.php");
    die();
}
 // Dirección o IP del servidor MySQL
 $host = "localhost";
 

 // Nombre de usuario del servidor MySQL
 $username = "Maoui";

 // Contraseña del usuario
 $password = "maouicafe";

 // Nombre de la base de datos
 $baseDeDatos ="BDMAOUI";

 // Nombre de la tabla a trabajar
 $tabla = "Productos";

 function Conectarse()
 {
    global $host, $username, $password, $baseDeDatos, $tabla;

    if (!($link = mysqli_connect($host, $username, $password))) 
    { 
       exit(); 
       }
    else
    {
    }
    if (!mysqli_select_db($link, $baseDeDatos)) 
    { 
       exit(); 
    }
    else
    {
    }
 return $link; 
 } 

 $link = Conectarse();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    
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
    <style>
        body {
            color: #000000;
            background-color: #ffffff;
        }
        .card{
            min-width: 150px;
        }

        .card-header{
            color:red;
        }
        .card-body{
            color:red;
        }
        .navbar {
            background-color: #ff0000;
        }

        .navbar-brand {
            color: #ffffff;
        }

        .container-fluid {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        form {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        legend {
            color: #ff0000;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            color: #ff0000;
        }

        .form-control {
            border: 1px solid #cccccc;
            border-radius: 5px;
            padding: 10px;
        }

        .form-text {
            color: #888888;
        }

        .btn-primary {
            background-color: #ff0000;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #ff3333;
        }

        .text-primary {
            color: #ff0000;
        }

        .text-secondary {
            color: #888888;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-red">
Bajas  
<div class="container-fluid">
    <a class="navbar-brand" href="">Detalles</a>
      </div>
      <div class="container-fluid">
        <a class="navbar-brand" href="productos.php">Inicio</a>
      </div>
</nav>
<br>
<form action="" method="POST" class="text-primary">
<div class="form-group row" style="align-items: center;">
<div class="col-sm-2" style="justify-content: center;">
      <label for="ID_Producto" class="form-label mt-4">Id del producto</label>
      <input type="text" name="ID_Producto" placeholder="100xx" class="form-control">
      <small class="form-text text-muted">Ingresa el id del producto.</small>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
    <div class="col-sm-2">
<div class="card">
  <h3 class="card-header">Datos</h3>
  <div class="card-body">
    <?php
 if($_POST)
      {
        $ID_Producto=$_POST['ID_Producto'];
        $Estatus=$_POST['Estatus'];
        $querySelect="SELECT producto_id, nombre, estatus,sucursal_id FROM $tabla WHERE producto_id='$ID_Producto';";
        $resultSelect = mysqli_query($link, $querySelect);  
        if($resultSelect!=null && $ID_Producto!=null)
         {
            $row = mysqli_fetch_array($resultSelect);
            echo "ID Producto: ".$row["producto_id"];
            echo "<br>";
            echo "Nombre: ".$row["nombre"];
            echo "<br>";
            echo "Estatus: ".$row["estatus"];
            echo "<br>";
            echo "ID Proveedor: ".$row["sucursal_id"];
            
         }
         if($Estatus!=null&& $ID_Producto!=null){
            $queryUpdate="UPDATE Productos SET estatus='$Estatus' WHERE producto_id=$ID_Producto"; 
            $resultUpdate= mysqli_query($link, $queryUpdate);
            $nuevaURL="DetalleB";
            header("Location: $nuevaURL.php");
            die();
            $querySelect="SELECT producto_id, nombre, estatus,sucursal_id FROM $tabla WHERE producto_id='$ID_Producto';";
            $resultSelect = mysqli_query($link, $querySelect);  
            $row = mysqli_fetch_array($resultSelect);
            echo "ID Producto: ".$row["producto_id"];
            echo "<br>";
            echo "Nombre: ".$row["nombre"];
            echo "<br>";
            echo "Estatus: ".$row["estatus"];
            echo "<br>";
            echo "ID Proveedor: ".$row["sucursal_id"];
            
         }
         mysqli_free_result($resultSelect); 
         mysqli_close($link); 
 
      }
?>
</div>
</div>
</div>
<div class="col-sm-2">
      <label for="Estatus" class="form-label mt-4">Estatus del producto</label>
      <input type="int" name="Estatus" placeholder="#" class="form-control">
      <small class="form-text text-muted">Ingresa el estatus del producto.</small>
      <button type="submit" class="btn btn-primary">Cambiar</button>
    </div>
</form>
<script>
    function reloadParentPage() {
      if (window.top !== window.self) {
        window.top.location.reload();
      } else {
        window.location.reload();
      }
    }
  </script>
<button onclick="reloadParentPage()" class="btn-primary">Actualizar Catalogo</button>
</body>
</html>