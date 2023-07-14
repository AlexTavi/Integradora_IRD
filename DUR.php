<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "Maoui";
$password = "maouicafe";
$dbname = "BDMAOUI";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Consulta SELECT
$sql = "SELECT usuario_id, nombre, apellido, correo, telefono, tipo_usuario, estatus, domicilio, codigo, Password FROM Usuarios";
$result = $conn->query($sql);

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Usuarios</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        button {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar">
<a href="users.php"><button class="btn">Regresar</button></a>
</nav>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Tipo de Usuario</th>
                <th>Estatus</th>
                <th>Domicilio</th>
                <th>Código</th>
                <th>Password</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["usuario_id"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["apellido"] . "</td>";
                    echo "<td>" . $row["correo"] . "</td>";
                    echo "<td>" . $row["telefono"] . "</td>";
                    echo "<td>" . $row["tipo_usuario"] . "</td>";
                    echo "<td>" . $row["estatus"] . "</td>";
                    echo "<td>" . $row["domicilio"] . "</td>";
                    echo "<td>" . $row["codigo"] . "</td>";
                    echo "<td>" . $row["Password"] . "</td>";
                    echo "<td><form action='DUC.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row["usuario_id"] . "'>";
                    echo "<button type='submit'>Ver Detalles</button>";
                    echo "</form></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No se encontraron registros</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
