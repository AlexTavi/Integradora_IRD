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
 $usuario = "Maoui";

 // Contraseña del usuario
 $password = "maouicafe";

 // Nombre de la base de datos
 $baseDeDatos ="BDMAOUI";

 // Nombre de la tabla a trabajar
 $tabla = "Productos";

 function Conectarse()
 {
    global $host, $usuario, $password, $baseDeDatos, $tabla;

    if (!($link = mysqli_connect($host, $usuario, $password))) 
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
        .table{
          background-color: #ff0000;
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
Cambios  
<div class="container-fluid">
    <a class="navbar-brand" href="">Detalles</a>
      </div>
      <div class="container-fluid">
        <a class="navbar-brand" href="productos.php">Inicio</a>
      </div>
</nav>
<div>

<br>
    <?php
    if ($_POST) {
        $ID_producto=$_POST['id'];
        $querySelect="SELECT * FROM $tabla WHERE producto_id='$ID_producto'";
        $resultSelect = mysqli_query($link, $querySelect);  
        if($resultSelect!=null && $ID_producto!=null)
         {
            $row = mysqli_fetch_array($resultSelect); 
        }
         mysqli_free_result($resultSelect); 
    }
    ?>
<div>
<form action="Updatet.php" method="POST" class="text-primary" enctype="multipart/form-data">
<legend>Datos del producto</legend>
<div class="text-secondary">
<div class="form-group row">
<div class="col-sm-2">
    <label for="ID_Producto" class="form-label mt-4">Id del producto</label>
    <input type="text" name="ID_Producto" placeholder="100xx" class="form-control" value="<?php echo $row['producto_id'];?>" readonly required>
    <small class="form-text text-muted">Ingresa el id del producto.</small>
</div>

                <div class="col-sm-2">
                    <label for="Nom_producto" class="form-label mt-4">Nombre del producto</label>
                    <input type="text" name="Nom_producto" placeholder="Miau" class="form-control" value="<?php echo $row['nombre'];?>" required>
                    <small class="form-text text-muted">Ingresa el nombre del producto.</small>
                </div>
                <div class="col-sm-2">
                    <label for="Costo_unitario" class="form-label mt-4">Costo de venta por pieza del producto</label>
                    <input type="number" name="Costo_unitario" placeholder="$" class="form-control" value="<?php echo $row['precio'];?>" required>
                    <small class="form-text text-muted">Ingresa el costo de venta del producto.</small>
                </div>
                <div class="col-sm-2">
                    <label for="Cantidad_prod" class="form-label mt-4">Cantidad de unidades del producto</label>
                    <input type="number" name="Cantidad_prod" placeholder="Miau" class="form-control" value="<?php echo $row['stock'];?>" required>
                    <small class="form-text text-muted">Ingresa la cantidad en inventario del producto.</small>
                </div>
                <div class="col-sm-2">
                    <label for="ID_Proveedor" class="form-label mt-4">Id de la Sucursal</label>
                    <input type="text" name="ID_Proveedor" placeholder="AAxx" class="form-control" value="<?php echo $row['sucursal_id'];?>" required>
                    <small class="form-text text-muted">Ingresa el id de la sucursal del producto.</small>
                </div>
                <div class="col-sm-2">
                    <label for="Estatus" class="form-label mt-4">Estatus del producto</label>
                    <input type="number" name="Estatus" placeholder="#" class="form-control" value="<?php echo $row['estatus'];?>" required>
                    <small class="form-text text-muted">Ingresa el estatus del producto.</small>
                </div>
                
                <div class="col-sm-2">
                    <label for="Fecha_Caducidad" class="form-label mt-4">Caducidad del producto</label>
                    <input type="date" name="Fecha_Caducidad" placeholder="aaaa/mm/dd" class="form-control" value="<?php echo $row['fecha_caducidad'];?>" required>
                    <small class="form-text text-muted">Ingresa la fecha de caducidad del producto.</small>
                </div>
                
                
                <div class="col-sm-2">
                    <label for="Tipo" class="form-label mt-4">Categoría del producto</label>
                    <input type="text" name="Tipo" placeholder="Gato" class="form-control" value="<?php echo $row['tipo'];?>" required>
                    <small class="form-text text-muted">Ingresa la categoría del producto.</small>
                </div>
                
                <div class="col-sm-2">
                    <label for="Peso" class="form-label mt-4">Peso del producto</label>
                    <input type="number" name="Peso" placeholder="#" class="form-control" value="<?php echo $row['peso'];?>" required>
                    <small class="form-text text-muted">Ingresa el peso del producto.</small>
                </div>
                <div class="col-sm-2">
                    <label for="costo" class="form-label mt-4">Costo de compra por pieza del producto</label>
                    <input type="number" name="costo" placeholder="$" class="form-control" value="<?php echo $row['costo']; ?>" required>
                    <small class="form-text text-muted">Ingresa el costo de compra del producto.</small>
                </div>
                <div class="col-sm-2">
                    <label for="imagen" class="form-label mt-4">Imagen</label>
                    <input type="file" name="imagen" accept="image/jpeg">
                    <small class="form-text text-muted">Solo JPEG.</small>
                </div>
</div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>
</div>
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
