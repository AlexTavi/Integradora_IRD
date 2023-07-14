<!DOCTYPE html>
<html>
<head>
    <title>Gráfica de Pastel</title>
    <style>
        .chart-container {
            width: 400px;
            height: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <canvas id="chart"></canvas>
    </div>

    <?php
    // Obtener datos de la base de datos y preparar los valores para la gráfica
    $servername = "localhost";
    $username = "Maoui";
    $password = "maouicafe";
    $dbname = "BDMAOUI";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "SELECT detalle_id, Total FROM DetallesVenta";
    $result = $conn->query($sql);

    $data = array();
    while ($row = $result->fetch_assoc()) {
        if (!isset($data[$row['detalle_id']])) {
            $data[$row['detalle_id']] = 0;
        }
        $data[$row['detalle_id']] += $row['Total'];
    }

    $labels = array();
    $values = array();
    foreach ($data as $detalle_id => $total) {
        $labels[] = "Detalle ID: " . $detalle_id;
        $values[] = $total;
    }

    $conn->close();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    data: <?php echo json_encode($values); ?>,
                    backgroundColor: [
                        '#ff6384',
                        '#36a2eb',
                        '#cc65fe',
                        '#ffce56',
                        '#4bc0c0',
                        '#e7e9ed'
                    ]
                }]
            }
        });
    </script>
</body>
</html>
