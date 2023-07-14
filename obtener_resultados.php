<?php
$servername = "localhost";
$username = "Maoui";
$password = "maouicafe";
$dbname = "BDMAOUI";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$fecha = $_POST['fecha'];

$sql = "SELECT * FROM Ventas WHERE fecha_venta = '$fecha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='profile-card'>";
        echo "<h3>ID de Venta: <span class='highlight'>" . $row['venta_id'] . "</span></h3>";
        echo "<p>Fecha de Venta: " . $row['fecha_venta'] . "</p>";
        echo "<p>ID de Usuario: " . $row['usuario_id'] . "</p>";
        echo "<p>Estatus: " . $row['estatus'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No se encontraron resultados para la fecha seleccionada.";
}

$conn->close();
?>
