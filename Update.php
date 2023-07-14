<html>
<?php
session_start();
if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] === "Administrador" || $_SESSION['logged_in'] === "Empleado")) {
} else {
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
$baseDeDatos = "BDMAOUI";

// Nombre de la tabla a trabajar
$tabla = "Productos";

function Conectarse()
{
    global $host, $username, $password, $baseDeDatos, $tabla;

    if (!($link = mysqli_connect($host, $username, $password))) {
        echo "Error conectando a la base de datos.<br>";
        exit();
    } else {
        echo "Listo, estamos conectados.<br>";
    }

    if (!mysqli_select_db($link, $baseDeDatos)) {
        echo "Error seleccionando la base de datos.<br>";
        exit();
    } else {
        echo "Obtuvimos la base de datos $baseDeDatos sin problema.<br>";
    }

    return $link;
}

$link = Conectarse();

if ($_POST) {
    $ID_Producto = $_POST['ID_Producto'];
    $Nom_producto = $_POST['Nom_producto'];
    $Cantidad_prod = $_POST['Cantidad_prod'];
    $Costo_unitario = $_POST['Costo_unitario'];
    $Tipo = $_POST['Tipo'];
    $Estatus = $_POST['Estatus'];
    $Peso = $_POST['Peso'];
    $Fecha_Caducidad = $_POST['Fecha_Caducidad'];
    $ID_Proveedor = $_POST['ID_Proveedor'];
    $costo=$_POST['costo'];
    // Verificar si se ha enviado un archivo de imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        echo "Con imagen";
        $nombreArchivo = $_FILES['imagen']['name'];
        $rutaArchivo = $_FILES['imagen']['tmp_name'];

        // Mover la imagen al directorio deseado
        $directorioImagenes = 'img/';
        $rutaDestino = $directorioImagenes . $nombreArchivo;
        move_uploaded_file($rutaArchivo, $rutaDestino);

        $queryUpdate = "UPDATE $tabla SET producto_id='$ID_Producto', nombre='$Nom_producto', precio='$Costo_unitario', stock='$Cantidad_prod', sucursal_id='$ID_Proveedor', estatus='$Estatus', img='$nombreArchivo', fecha_caducidad='$Fecha_Caducidad', tipo='$Tipo', peso='$Peso', costo='$costo' WHERE producto_id='$ID_Producto'";
    } else {
        echo "Sin imagen";
        // No se ha enviado un archivo de imagen, actualizar sin la imagen
        $queryUpdate = "UPDATE $tabla SET producto_id='$ID_Producto', nombre='$Nom_producto', precio='$Costo_unitario', stock='$Cantidad_prod', sucursal_id='$ID_Proveedor', estatus='$Estatus', fecha_caducidad='$Fecha_Caducidad', tipo='$Tipo', peso='$Peso', costo='$costo' WHERE producto_id='$ID_Producto'";
    }

    $resultUpdate = mysqli_query($link, $queryUpdate);

    if ($resultUpdate) {
        echo "<strong>Se ingresaron los registros con éxito</strong>.<br>";
        mysqli_close($link);
        $nuevaURL = "DetalleC.php";
                header("Location: $nuevaURL");
                exit;
    } else {
        echo "No se ingresaron los registros.<br>";
    }
}
?>
</html>
