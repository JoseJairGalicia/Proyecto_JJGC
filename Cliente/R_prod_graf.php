<?php
session_start();
include_once("../Servidor/conexion.php");

// Ejecución de la consulta y manejo de errores
$sql = "SELECT p.nombre, COUNT(p.idprod) as sum 
        FROM productos AS p 
        GROUP BY p.nombre"; // Agrupar por nombre del producto

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
            ['Nombre del Producto', 'Cantidad'],
            <?php
                $rows = [];
                while ($fila = $res->fetch_assoc()) {
                    $rows[] = "['" . $fila["nombre"] . "'," . $fila["sum"] . "]";
                }
                echo implode(",", $rows); // Elimina la coma final
                ?>
        ]);

        var options = {
            title: 'CANTIDAD DE PRODUCTOS POR NOMBRE',
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
