<?php
session_start();
 // Dirección o IP del servidor MySQL
 $host = "127.0.0.1";

 // Nombre de usuario del servidor MySQL
 $username = "Maoui";

 // Contraseña del usuario
 $password = "maouicafe";

 // Nombre de la base de datos
 $baseDeDatos ="BDMAOUI";

 // Nombre de la tabla a trabajar
 $tabla = "Usuarios";

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
    <title>Registro</title>
    <style>
        body {
            text-align: center;
            background-color: #F2F2F2;
        }
        
        .navbar {
            background-color: red;
            color: #ffffff;
        }
        
        .form-group label {
            color: #FF5050;
            font-weight: bold;
        }
        
        .form-control {
            border: 1px solid #FF5050;
            border-radius: 5px;
        }
        
        .form-control:focus {
            outline: none;
            box-shadow: 0 0 5px #FF5050;
        }
        
        .btn {
            background-color: red;
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            padding: 20px 20px;
            cursor: pointer;
        }
        
        .btn:hover {
            background-color: #FFFFFF;
            color: #FF5050;
        }
    </style>
    <script>
    function reloadParentPage() {
      window.top.location.href = "index.php";
    }
  </script>
</head>
<body style="text-align:center;">
<nav class="navbar">
    <h1>Registro</h1>
</nav>
<form action="" method="POST">
  <fieldset>
    <center>
    <legend>Verificar</legend>
    <?php

if($_POST){
  $cat=$_POST['numero'];
  $ID_User=$_POST['ID_Usuario'];
  $Estatus=1;
  $querySelect="SELECT * FROM $tabla WHERE codigo='$cat' AND correo='$ID_User'";
  $resultSelect = mysqli_query($link, $querySelect);  
  $row = mysqli_fetch_array($resultSelect);
  if($row!=null){
    $queryUpdate="UPDATE $tabla SET estatus='$Estatus' WHERE correo='$ID_User';";
        $resultUpdate = mysqli_query($link, $queryUpdate); 
        if($resultUpdate)
         {
            echo "<strong>Se ingresaron los registros con exito</strong>. <br>";
            $nuevaURL="login";
            header("Location: $nuevaURL.php");
            die();
        }
         else
         {
            echo "No se ingresaron los registros. <br>";
         }
}
}
?>

<div style="width: 150px;">
    <div class="form-group">
      <label for="ID_Usuario" class="form-label">Correo del Usuario</label>
      <input type="email" name="ID_Usuario" class="form-control" placeholder="xxxx">
      <small class="form-text text-muted">Introducir el correo de usuario.</small>
    </div>
    </div>
    <div style="width: 150px;">
    <div class="form-group">
      <label for="numero" class="form-label">Codigo de autenticación</label>
      <input type="int" name="numero" class="form-control" placeholder="xxxx">
      <small class="form-text text-muted">Introducir el codigo que le llego al correo introducido.</small>
    </div>
    </div>
    <button type="submit" class="btn">Verificar</button>
    </center>  
</fieldset>
</form>
</body>
</html>
