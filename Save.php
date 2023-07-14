<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Administrador") {
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
 
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_Producto=$_POST['ID_Producto'];
    $Nom_producto=$_POST['Nom_producto'];
    $Cantidad_prod=$_POST['Cantidad_prod'];
    $Costo_unitario=$_POST['Costo_unitario'];
    $Tipo=$_POST['Tipo'];
    $Estatus=$_POST['Estatus'];
    $Peso=$_POST['Peso'];
    $Fecha_Caducidad=$_POST['Fecha_Caducidad'];
    $ID_Proveedor=$_POST['ID_Proveedor'];
    $costo=$_POST['costo'];

    $targetDir = "img/"; // Directorio donde se almacenarán las imágenes
    $targetFile = $targetDir . basename($_FILES["imagen"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verificar si el archivo es una imagen real o una imagen falsa
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if($check === false) {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Verificar si el archivo ya existe
    if (file_exists($targetFile)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }

    // Verificar el tamaño máximo del archivo (opcional)
    if ($_FILES["imagen"]["size"] > 500000) {
        echo "Lo siento, tu archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Permitir solo ciertos formatos de imagen
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk está establecido en 0 por un error
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no se pudo subir.";
    } else {
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFile)) {
            echo "El archivo ". basename( $_FILES["imagen"]["name"]). " ha sido subido correctamente.";

            $img = basename($_FILES["imagen"]["name"]);

            $queryInsert = "INSERT INTO $tabla (producto_id, nombre, precio, stock, sucursal_id, estatus, img, fecha_caducidad, tipo, peso,costo) VALUES ('$ID_Producto','$Nom_producto','$Costo_unitario','$Cantidad_prod','$ID_Proveedor','$Estatus','$img','$Fecha_Caducidad','$Tipo','$Peso','$costo')";

            $resultInsert = mysqli_query($link, $queryInsert);

            if ($resultInsert) {
                echo "<strong>Se ingresaron los registros con éxito</strong>.<br>";
                mysqli_close($link);

                $nuevaURL = "DetalleA.php";
                header("Location: $nuevaURL");
                exit;
            } else {
                echo "No se ingresaron los registros.<br>";
            }
        } else {
            echo "Lo siento, ha ocurrido un error al subir el archivo.";
        }
    }
}
?>
