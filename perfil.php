<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Usuario general") {
} elseif (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Administrador") {
    $nuevaURL = "Principal";
    header("Location: $nuevaURL.php");
    die();
} else {
    $nuevaURL = "login";
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
$tabla = "DetallesVenta";

function Conectarse()
{
    global $host, $username, $password, $baseDeDatos;

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
<html>
<head>
    <title>Perfil de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
        .historial-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ff0000;
            border-radius: 5px;
            margin-top: 50px;
        }

        .historial-container h2 {
            color: #ff0000;
        }

        .historial-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .historial-table th,
        .historial-table td {
            padding: 8px;
            border: 1px solid #ff0000;
            text-align: left;
        }

        .historial-table th {
            background-color: #ff0000;
            color: #ffffff;
        }

        .historial-table tr:nth-child(even) {
            background-color: #ffe6e6;
        }

        .historial-table tr:hover {
            background-color: #ffb3b3;
        }

    </style>
</head>
<body>
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
  <div class="historial-container">
        <h2>Historial de Compras</h2>
        <table class="historial-table">
            <tr>
                <th>Fecha</th>
                <th>Producto/s</th>
                <th>Precio</th>
            </tr>
            <?php
            $id=$_SESSION['user'][0]['usuario_id'];
            $querySelect1="SELECT venta_id FROM Ventas WHERE usuario_id=$id";
            $resultSelect1= mysqli_query($link,$querySelect1);
            $row1= $resultSelect1->fetch_assoc();
            if($row1){
                while($row1!=null){
                    $idvs=$row1['venta_id'];
                $querySelect="SELECT * FROM $tabla WHERE venta_id='$idvs'";
                $resultSelect= mysqli_query($link,$querySelect);
                if($resultSelect){
                    $row = mysqli_fetch_array($resultSelect);
                    while($row!=null){
                    echo "<tr>";
                    echo  "<td>".$row['fecha']."</td>";
                    echo  "<td>".$row['cantidad']."</td>";
                    echo  "<td>".$row['Total']."</td>";
                    echo  "</tr>";
                    $row = mysqli_fetch_array($resultSelect);
                    
                }}
                $row1= $resultSelect1->fetch_assoc();
            }
            }else{
            echo "No hay compras";}
            ?>
        </table>
    </div>
    <br>
<center>   <button onclick="destruirSesionYRecargar()" class="btn">Cerrar Sesión</button></center>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function destruirSesionYRecargar() {
            $.ajax({
                url: 'destroy_session.php',
                type: 'POST',
                success: function (response) {
                    // Recargar la página productos fuera del iframe
                    if (window.top !== window.self) {
                        window.top.location.reload();
                    } else {
                        window.location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    </script>
</body>
</html>
