<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "Administrador"|$_SESSION['logged_in'] === "Empleado") {
}else{
    $nuevaURL = "Principal";
    header("Location: $nuevaURL.php");
    die();
}
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "Maoui";
$password = "maouicafe";
$database = "BDMAOUI";

// Nombre del archivo de respaldo
$backupFile = '/web/www/BD/respaldo.sql';

// Comando para respaldar la base de datos
$command = "mysqldump --user=$username --password=$password --host=$servername $database > $backupFile";

// Ejecutar el comando
exec($command);

// Verificar si se generó correctamente el respaldo
if (file_exists($backupFile)) {
    header("Location:Principal.php");
    exit();
} else {
    echo "Ha ocurrido un error al crear el respaldo de la base de datos.";
    echo "<a href='guarda.php'><button class='btn'>Regresar</button></a>";
}
?>

