<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Usuario general") {
    $nuevaURL = "perfil";
    header("Location: $nuevaURL.php");
    die();
}elseif (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Administrador" | $_SESSION['logged_in'] === "Empleado") {
    $nuevaURL = "Principal";
    header("Location: $nuevaURL.php");
    die();
}

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
    </style>
</head>

<body>
    <h1>Inicio de sesión</h1>
    <a href="CreateAcc.php"><button title="Registrarte en el sistema" class="btn btn-success">Crear cuenta</button></a>
    <form action="" method="POST">
        <fieldset>
            <center>
                <br>
                <legend>Iniciar Sesión</legend>
                <div style="width: 150px">
                    <div class="form-group">
                        <label for="ID_Usuario" class="form-label">Correo del Usuario</label>
                        <input type="email" name="ID_Usuario" class="form-control" placeholder="@miau.com" required>
                        <small class="form-text text-muted">Aquí ingresa el correo del Usuario que has elegido.</small>
                    </div>
                </div>
                <div style="width: 150px">
                    <div class="form-group">
                        <label for="Pass" class="form-label">Contraseña</label>
                        <input type="password" name="Pass" class="form-control" placeholder="Contraseña" required>
                        <small class="form-text text-muted">Ingresa tu contraseña.</small>
                    </div>
                </div>
                <?php
    if ($_POST) {
        $ID_Usuario = $_POST['ID_Usuario'];
        $Pass = $_POST['Pass'];
        $querySelect = "SELECT * FROM $tabla WHERE correo='$ID_Usuario'";
        $resultSelect = mysqli_query($link, $querySelect);
        if ($row = mysqli_fetch_array($resultSelect)) {
            echo "<br>";
            echo "Correo de Usuario encontrado";
            if ($row["Password"] == $Pass) {
                echo "<br>";
                echo "Contraseña correcta";
                if ($row["estatus"] == 1) {
                    mysqli_free_result($resultSelect);
                    $_SESSION['logged_in'] = $row['tipo_usuario'];
                    $_SESSION['user'][]=$row;

                    echo '<script>
                            if (window.top !== window.self) {
                                window.top.location.reload();
                            } else {
                                window.location.reload();
                            }
                          </script>';
                } else {
                    echo "<br>";
                    echo "Baja del sistema";
                }
            } else {
                echo "<br>";
                echo "Contraseña incorrecta o cuenta dada de baja";
                mysqli_free_result($resultSelect);
            }
        } else {
            echo "<br>";
            echo "Correo no registrado";
        }
    }
    ?>
                <br>
                
                <button type="submit" class="btn">Ingresar</button>
            </center>
        </fieldset>
    </form>
</body>
</html>