<?php
// Incluir el archivo de conexión
include("../Servidor/conexion.php");

// nombre del archivo y charset
header('Content-Type: text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="ReporteProd.csv"');

// Salida del archivo
$salida = fopen('php://output', 'w');

// Encabezados del CSV
fputcsv($salida, array('ID Producto', 'Nombre', 'Descripcion', 'Cantidad', 'Precio', 'Color', 'Tamaño', 'ID Categoria'));

// Consulta para obtener los datos
$reporteCsv = mysqli_query($conexion, 'SELECT * FROM productos');

// Verificar si la consulta fue exitosa
if (!$reporteCsv) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

// Escribir los datos en el archivo CSV
while ($filaR = mysqli_fetch_assoc($reporteCsv)) {
    fputcsv($salida, array(
        $filaR['idprod'],
        iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $filaR['nombre']),
        iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $filaR['descripcion']),
        $filaR['cantidad'],
        $filaR['precio'],
        iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $filaR['color']),
        iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $filaR['tamanio']),
        $filaR['idcat']
    ));
}

// Cerrar la salida
fclose($salida);
?>
