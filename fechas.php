<!DOCTYPE html>
<html>
<head>
    <title>Gráfico de Ventas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .profile-card {
            border: 1px solid #e57373;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #ffebee;
        }

        .profile-card h3 {
            margin-top: 0;
            color: #e57373;
        }

        .profile-card p {
            margin-bottom: 10px;
        }

        .profile-card .highlight {
            color: #e57373;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4><small>Ventas</small></h4>
        <div class="form-group">
            <label for="fecha">Selecciona una fecha:</label>
            <select class="form-control" id="fecha" name="fecha">
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

                $sql = "SELECT DISTINCT fecha_venta FROM Ventas";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['fecha_venta'] . "'>" . $row['fecha_venta'] . "</option>";
                    }
                }

                $conn->close();
                ?>
            </select>
        </div>
        <button type="button" class="btn btn-danger" onclick="mostrarResultados()">Mostrar Resultados</button>
        <div id="resultados"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        function mostrarResultados() {
            var fecha = document.getElementById("fecha").value;
            
            $.ajax({
                url: "obtener_resultados.php",
                type: "POST",
                data: { fecha: fecha },
                success: function(response) {
                    $("#resultados").html(response);
                }
            });
        }
    </script>
</body>
</html>
