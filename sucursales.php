<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Sucursales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados */
        .table-light-red {
            background-color: #ffe5e5;
        }
        
        .table-medium-red {
            background-color: #ffcccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h5>Tabla de Sucursales</h5>

        <?php
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "Maoui";
        $password = "maouicafe";
        $database = "BDMAOUI";
        $conn = new mysqli($servername, $username, $password, $database);

        // Comprobar conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Obtener los IDs de las sucursales para el select
        $idQuery = "SELECT DISTINCT sucursal_id FROM Sucursal";
        $idResult = $conn->query($idQuery);
        $ids = [];
        if ($idResult->num_rows > 0) {
            while ($row = $idResult->fetch_assoc()) {
                $ids[] = $row["sucursal_id"];
            }
        }
        ?>

        <form method="GET">
            <div class="form-group">
                <label for="sucursal-id">Seleccionar ID de Sucursal:</label>
                <select class="form-control" id="sucursal-id" name="sucursal_id">
                    <?php
                    foreach ($ids as $id) {
                        $selected = "";
                        if (isset($_GET["sucursal_id"]) && $_GET["sucursal_id"] == $id) {
                            $selected = "selected";
                        }
                        echo "<option value='$id' $selected>$id</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-danger">Mostrar Datos</button>
        </form>

        <?php
        if (isset($_GET["sucursal_id"])) {
            $selectedId = $_GET["sucursal_id"];

            // Obtener los datos de la sucursal seleccionada
            $dataQuery = "SELECT sucursal_id, nombre, direccion, ciudad, telefono, estatus FROM Sucursal WHERE sucursal_id = '$selectedId'";
            $dataResult = $conn->query($dataQuery);

            if ($dataResult->num_rows > 0) {
                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Sucursal ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Dirección</th>";
                echo "<th>Ciudad</th>";
                echo "<th>Teléfono</th>";
                echo "<th>Estatus</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = $dataResult->fetch_assoc()) {
                    $estatus = $row["estatus"];
                    $rowClass = ($estatus == "Activo") ? "table-light-red" : "table-medium-red";

                    echo "<tr class='$rowClass'>";
                    echo "<td>" . $row["sucursal_id"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["direccion"] . "</td>";
                    echo "<td>" . $row["ciudad"] . "</td>";
                    echo "<td>" . $row["telefono"] . "</td>";
                    echo "<td>" . $row["estatus"] . "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>No se encontraron registros para el ID de sucursal seleccionado.</p>";
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
