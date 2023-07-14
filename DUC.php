<?php
session_start();
if (!isset($_SESSION['logged_in']) || ($_SESSION['logged_in'] !== "Administrador" && $_SESSION['logged_in'] !== "Empleado")) {
    $nuevaURL = "login.php";
    header("Location: $nuevaURL");
    die();
}

// Dirección o IP del servidor MySQL
$host = "localhost";

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
    } else {
    }
    if (!mysqli_select_db($link, $baseDeDatos)) {
        exit();
    } else {
    }
    return $link;
}

$link = Conectarse();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_usuario = $_POST['id'];

    $sql = "SELECT * FROM Usuarios WHERE usuario_id = '$ID_usuario'";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // No se encontró ningún usuario con el ID proporcionado
        $row = null;
    }
} else {
    // No se envió ninguna solicitud POST
    $row = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
            max-width: 1250px;
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
    <div class="container-fluid">
        <a class="navbar-brand" href="">Detalles</a>
    </div>
    <div class="container-fluid">
        <a class="navbar-brand" href="users.php">Inicio</a>
    </div>
</nav>
<div>
    <form action="UpdateUser.php" method="POST" class="text-primary">
        <legend>Datos del usuario</legend>
        <div class="text-secondary">
            <div class="form-group row">
                <div class="col-sm-2">
                    <label for="ID_usuario" class="form-label mt-4">Id del usuario</label>
                    <input type="text" name="ID_usuario" placeholder="100xx" class="form-control" readonly value="<?php if($row!=null) echo $row["usuario_id"]; ?>" required>
                    <small class="form-text text-muted">Ingresa el id del usuario.</small>
                </div>
                <div class="col-sm-2">
                    <label for="Nombre" class="form-label mt-4">Nombre del usuario</label>
                    <input type="text" name="Nombre" placeholder="Miau" class="form-control" value="<?php if($row!=null) echo $row["nombre"]; ?>" required>
                    <small class="form-text text-muted">Ingresa el nombre del usuario.</small>
                </div>
                <div class="col-sm-2">
                    <label for="apellido" class="form-label mt-4">Apellido del usuario</label>
                    <input type="text" name="apellido" placeholder="Miau" class="form-control" value="<?php if($row!=null) echo $row["apellido"]; ?>" required>
                    <small class="form-text text-muted">Ingresa el apellido del usuario.</small>
                </div>
                <div class="col-sm-2">
                    <label for="Email" class="form-label mt-4">Correo electronico del usuario</label>
                    <input type="email" name="Email" placeholder="@miau.com" class="form-control" value="<?php if($row!=null) echo $row["correo"]; ?>">
                    <small class="form-text text-muted">Ingresa la cantidad en inventario del usuario.</small>
                </div>
                <div class="col-sm-2">
                    <div style="width: 150px">
                        <div class="form-group">
                            <label for="Tipo">Tipo de cuenta</label>
                            <select class="form-select" name="Tipo">
                                <option <?php if($row['tipo_usuario']==="Usuario general"){echo "selected";}?>>Usuario general</option>
                                <option <?php if($row['tipo_usuario']==="Empleado"){echo "selected";}?>>Empleado</option>
                                <option <?php if($row['tipo_usuario']==="Administrador"){echo "selected";}?>>Administrador</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label for="Domicilio" class="form-label mt-4">Domicilio del usuario</label>
                    <input type="text" name="Domicilio" placeholder="Av.Gato" class="form-control" value="<?php if($row!=null) echo $row["domicilio"]; ?>">
                    <small class="form-text text-muted">Dirección del usuario.</small>
                </div>
                <div class="col-sm-2">
                    <label for="Telefono" class="form-label mt-4">Telefono del usuario</label>
                    <input type="text" name="Telefono" placeholder="xxx-xxx-xxxx" class="form-control" value="<?php if($row!=null) echo $row["telefono"]; ?>">
                    <small class="form-text text-muted">Numero celular del usuario.</small>
                </div>
                <div class="col-sm-2">
                    <label for="Estatus" class="form-label mt-4">Estatus del usuario</label>
                    <input type="int" name="Estatus" placeholder="#" class="form-control" value="<?php if($row!=null) echo $row["estatus"]; ?>">
                    <small class="form-text text-muted">Estatus de la cuenta del usuario.</small>
                </div>
                <div class="col-sm-2">
                    <label for="Password" class="form-label mt-4">Contraseña del usuario</label>
                    <input type="text" name="Password" placeholder="xxxxxxxx" class="form-control" value="<?php if($row!=null) echo $row["Password"]; ?>">
                    <small class="form-text text-muted">Contraseña del usuario.</small>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
</body>
</html>
