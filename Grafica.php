<!DOCTYPE html>
<html>
<head>
    <title>Gráfico de barras</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        canvas {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <canvas id="myChart"></canvas>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var categorias = JSON.parse('<?php echo obtenerCategorias(); ?>');
            var precios = JSON.parse('<?php echo obtenerPrecios(); ?>');
            
            var datasets = [{
                label: 'Precios',
                data: precios,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }];

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: categorias,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            myChart.update();
        });
    </script>
</body>
</html>

<?php
function obtenerCategorias() {
    $conexion = new mysqli('localhost', 'Maoui', 'maouicafe', 'BDMAOUI');
    $query = "SELECT nombre FROM Productos";
    $result = $conexion->query($query);

    $categorias = [];
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row['nombre'];
    }

    return json_encode($categorias);
}

function obtenerPrecios() {
    $conexion = new mysqli('localhost', 'root', 'satr1885', 'BDMAOUI');
    $query = "SELECT precio FROM Productos";
    $result = $conexion->query($query);

    $precios = [];
    while ($row = $result->fetch_assoc()) {
        $precios[] = $row['precio'];
    }

    return json_encode($precios);
}
?>
