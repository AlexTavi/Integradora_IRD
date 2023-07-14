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

    $link = mysqli_connect($host, $username, $password, $baseDeDatos);

    if (!$link) {
        echo "Error conectando a la base de datos: " . mysqli_connect_error();
        exit();
    }

    echo "Conexión a la base de datos establecida.<br>";

    return $link;
}

$link = Conectarse();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_u = $_POST['ID_usuario'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['apellido'];
    $Email = $_POST['Email'];
    $Domicilio = $_POST['Domicilio'];
    $Telefono = $_POST['Telefono'];
    $Estatus = $_POST['Estatus'];
    $Tipo = $_POST['Tipo'];
    $Pass = $_POST['Password'];

    $queryUpdate = "UPDATE $tabla SET nombre='$Nombre', apellido='$Apellido', correo='$Email', domicilio='$Domicilio', telefono='$Telefono', tipo_usuario='$Tipo', Password='$Pass', estatus='$Estatus' WHERE usuario_id='$ID_u';";
    $resultUpdate = mysqli_query($link, $queryUpdate);

    if ($resultUpdate) {
        echo "<strong>Se actualizó el registro exitosamente.</strong><br>";
    } else {
        echo "No se pudo actualizar el registro.<br>";
    }

    $nuevaURL = "DUC.php";
    header("Location: $nuevaURL");
    die();
}
?>
