<?php
require('fpdf/fpdf.php');
require ('cone.php');
class pdf extends FPDF
{
	public function Header()
{

$this->SetFont ('Arial','',10);
$this->Image('membrete.jpg' , 30 ,15, 790,70);



$this->SetFont ('Arial','B',20);
$this->Cell(0, 180, utf8_decode('Departamento De Desarrollo Académico'),0,1,'C');
}

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Helvetica','I',10);
	  $this->SetTextColor(30,45,3);
      $this->Write (5,utf8_decode ('Carretera Campeche-Escárcega km 9, Lerma, Campeche C.P. 24500, San Francisco de Campeche, Campeche. Tel. 981-81- 2-02-02. y 981-81-2-00-33'));
    }
}


 {

$pdf = new pdf ('L','pt','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B','13');
$pdf->SetTextColor(30,45,3);
$pdf->Cell(140,17 ,'Nombre de los cursos', 1, 0,'C');
$pdf->Cell(145,17,'Periodo de Realizacion',1,0,'C');
$pdf->Cell(70,17,'Programa educativo',1,0,'C');
$pdf->Cell(200,17,'Instructor',1,0,'C');
$pdf->Cell(100,17,'Participantes',1,0,'C');



$pdf -> Ln();

$rec=mysql_query("SELECT * FROM reporte ");
while ($row=mysql_fetch_array($rec)){
	
	
$pdf->SetFont("Arial","I",10);	
$pdf->SetTextColor(45,48,255);	
$pdf->Cell(140,17,$row['nombact'],1,0,'C',false);
$pdf->Cell(145,17,$row['periodo'],1,0,'C',false);
$pdf->Cell(70,17,$row['carrera'],1,0,'C',false);
$pdf->Cell(200,17,$row['ponente'],1,0,'C',false);
$pdf->Cell(100,17,$row['sexo'],1,0,'C',false);

	
$pdf->Ln();
}
}
$pdf->Output('Cursos','I');


?>
