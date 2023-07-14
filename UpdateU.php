<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Usuario general") {
}elseif (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Administrador"|$_SESSION['logged_in'] === "Empleado") {
}else{header("Location:index.php");
exit();}
// Dirección o IP del servidor MySQL
$host = "127.0.0.1";

// Nombre de usuario del servidor MySQL
$username = "Maoui";

// Contraseña del usuario
$password = "maouicafe";

// Nombre de la base de datos
$baseDeDatos = "BDMAOUI";

// Nombre de la tabla a trabajar
$tabla = "Usuarios";

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Sing in</title>
    <style>
        body {
            font-family: Century, "Helvetica Neue", Helvetica, sans-serif;
            background: #F2F2F2;
        }

        /* Estilos para los botones */
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

        /* Estilos para el formulario */
        fieldset {
            background-color: #F2F2F2;
            border-radius: 5px;
            padding: 20px;
        }

        legend {
            color: red;
            font-size: 24px;
            font-weight: bold;
        }

        .form-label {
            color: red;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid gray;
            border-radius: 5px;
        }

        .form-text {
            color: #FF5050;
        }

        .btn-primary {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: white;
            color: red;
        }
        .container {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
<div class="container">
        <h1>Perfil de Usuario</h1>
        <div class="form-group">
              <form method="POST" action="">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $_SESSION['user'][0]['nombre']; ?>" required>
            </div>
            <div class="form-group">
              <form method="POST" action="">
                <label for="apellido">Apellido/s:</label>
                <input type="text" id="apellido" name="apellido" value="<?php echo $_SESSION['user'][0]['apellido']; ?>" required>
            </div>
            <div class="form-group">
                <label for="domicilio">Domicilio:</label>
                <input type="text" id="domicilio" name="domicilio" value="<?php echo $_SESSION['user'][0]['domicilio']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $_SESSION['user'][0]['telefono']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="text" minlength="8" id="password" name="password" value="<?php echo $_SESSION['user'][0]['Password']; ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Guardar cambios">
            </div>
        </form>
    </div>
    <a href="perfil.php"><button class="btn">Regresar</button></a>
    </body>
</html>
<?php
if($_POST){
    $name=$_POST['nombre'];
    $dom=$_POST['domicilio'];
    $tel=$_POST['telefono'];
    $pass=$_POST['password'];
    $ap=$_POST['apellido'];
    $id=$_SESSION['user'][0]['usuario_id'];
    $queryUpdate="UPDATE $tabla SET nombre='$name', apellido='$ap' ,domicilio='$dom', telefono='$tel', Password='$pass' WHERE usuario_id='$id';";
        $resultUpdate = mysqli_query($link, $queryUpdate); 
        if($resultUpdate)
         {
            echo "<strong>Se ingresaron los registros con exito</strong>. <br>";
            $querySelect = "SELECT * FROM $tabla WHERE usuario_id='$id'";
            $resultSelect = mysqli_query($link, $querySelect);
            if ($row = mysqli_fetch_array($resultSelect)){
                unset($_SESSION['user']);
                $_SESSION['user'][]=$row;
                header("Location:perfil.php");
                die();
        }
         }
         else
         {
            echo "No se ingresaron los registros. <br>";
         }
}
?>