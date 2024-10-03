<?php
session_start();
include_once("../Servidor/conexion.php");

// Ejecución de la consulta y manejo de errores
$sql = "SELECT c.categoria, COUNT(p.idcat) as sum 
        FROM categorias AS c 
        LEFT JOIN productos AS p ON c.idcat = p.idcat 
        GROUP BY c.categoria"; // Agrupar por categoría

$res = $conexion->query($sql);

if (!$res) {
    die("Error en la consulta SQL: " . $conexion->error);
}
?>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Categoría', 'Cantidad de Productos'],
            <?php
                $rows = [];
                while ($fila = $res->fetch_assoc()) {
                    $rows[] = "['" . $fila["categoria"] . "'," . $fila["sum"] . "]";
                }
                echo implode(",", $rows); // Elimina la coma final
                ?>
        ]);

        var options = {
            title: 'CANTIDAD DE PRODUCTOS POR CATEGORÍA',
            width: 600,
            height: 400,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script>
</head>

<body>
<header>
        <!-- Encabezado -->
        <?php include_once("include/encabezado.php") ?>
        <!-- Fin encabezado -->
    </header>

    <div id="chart_div"></div>

    <footer>
        <?php include_once("include/pie.php"); ?>
    </footer>

</body>

</html>
