<?php
// Incluir la librería de FPDF
require("lib/fpdf/fpdf.php");

class PDF extends FPDF {
    // Cabecera
    function Header() {
        $this->Image("img/logo.png", 10, 8, 33);
        $this->SetFont("Arial", 'B', 15);
        $this->Cell(110);
        $this->Cell(60, 10, 'REPORTE DE CATEGORÍAS EXISTENTES', 0, 0, 'C');
        $this->Ln(30);
        $this->SetFillColor(255, 236, 161); // color de la celda 
        $this->SetTextColor(0, 0, 0); // color de texto 
        $this->SetFont("Arial", 'B', 12);
        
        // Ancho total de la tabla
        $totalWidth = 30 + 150; // ID + Categoría

        // Calcular la posición inicial para centrar la tabla
        $this->SetX((210 - $totalWidth) / 2); // 210 es el ancho de la página en formato A4 en modo 'L'

        $this->Cell(30, 10, 'ID', 1, 0, 'C', true);
        $this->Cell(150, 10, 'Categoria', 1, 0, 'C', true);
        $this->Ln(10); 
    }

    // Pie de página
    function Footer() {
        // Posición a 1.5 cm del final de la página
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
    }
}

// Incluir la conexión a la base de datos
require("../Servidor/conexion.php");

// Asegurarse de que la conexión se estableció correctamente
if (mysqli_connect_errno()) {
    die('Error de conexión: ' . mysqli_connect_error());
}

// Consulta a la base de datos
$consulta = "SELECT * FROM categorias";
$resultado = mysqli_query($conexion, $consulta);

if (!$resultado) {
    die('Error en la consulta: ' . mysqli_error($conexion));
}

$pdf = new PDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

// Fetch data and display it in the PDF
while ($row = mysqli_fetch_assoc($resultado)) {
    // Calcular la posición inicial para centrar la tabla
    $totalWidth = 30 + 150; // ID + Categoría
    $pdf->SetX((210 - $totalWidth) / 2); // Centrar en la página

    $pdf->Cell(30, 10, $row['idcat'], 1, 0, 'C');
    $pdf->Cell(150, 10, utf8_decode($row['categoria']), 1, 0, 'C');
    $pdf->Ln();
}

$pdf->Output();
?>
