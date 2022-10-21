<?php
require('assets/plugin/fpdf.php');


class PDF extends FPDF
{
    // Load data
    function BasicTable($header)
    {
        include('../server/api.php');
        $data = getDailyReport();

        $sum = 0;

        foreach ($header as $col)
            $this->Cell(60, 7, $col, 1);
            $this->Ln();
        // Data
        while ($row = mysqli_fetch_assoc($data)) {
            $sum = $sum + $row['total'];
            $this->Cell(60, 6, 'Rs. ' . $row['total'], 1);
            $this->Cell(60, 6, '#' . $row['order_id'], 1);
            $this->Cell(60, 6, 'Rs. ' . $row['date_updated'], 1);
            $this->Ln();
        }
        $this->Cell(60, 10, 'Total : Rs. ' . $sum, 1);

    }

}

$pdf = new PDF();
// Column headings
$header = array('Amount', 'ID', 'Date');
// Data loading
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->Cell(80);
$pdf->Cell(30,10,'~~~ Black & White ~~~',2,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'TODAY SALES REPORT',2,0,'C');
$pdf->Ln();
$pdf->Cell(15);
$pdf->Cell(30,10,"Created date is " .date("Y/m/d"),2,0,'C');
$pdf->Ln();
$pdf->BasicTable($header);
$pdf->Output();
?>