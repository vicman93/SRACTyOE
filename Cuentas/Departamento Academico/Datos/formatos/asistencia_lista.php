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
      $this->SetXY(100,-25);
      $this->SetFont('Helvetica','I',10);
	  $this->SetTextColor(30,95,3);
      $this->Write (5,utf8_decode ('Carretera Campeche-Escárcega km 9, Lerma, Campeche C.P. 24500, San Francisco de Campeche, Campeche. Tel. 981-81- 2-02-02. y 981-81-2-00-33'));
	  
	$this->SetY(-13);
    $this->SetTextColor(65,45,3);
    $this->SetFont('Arial','I',8);
 
    $this->Cell(0,10,utf8_decode ('Página '.$this->PageNo()).'/{nb}',0,0,'C');
	}  
    }
	
	{


	$pdf = new pdf ('L','pt','A4');
	$pdf->AliasNbPages();
$pdf->AddPage();


	$rec=mysql_query("SELECT nombact, ponente FROM lista where nombact = 'EDUCACION A FUTURO'");
while ($row=mysql_fetch_array($rec)){

$pdf->SetXY(10, 160);
$pdf->SetFont("Arial","I",15);
$pdf->SetTextColor(3,45,3);
$pdf->Cell(0, 3, utf8_decode('Actividad: '),0,1, 'C');
$pdf->SetTextColor(0,0,204);
$pdf->Cell(1150,0,$row['nombact'],0,0,'C',false);

$pdf->SetXY(10, 180);
$pdf->SetTextColor(3,45,3);
$pdf->Cell(0, 4, utf8_decode('Expositor: '),0,1, 'C');
$pdf->SetTextColor(0,0,204);
$pdf->Cell(1150,0,$row['ponente'],0,0,'C',false);
}
$pdf->Ln(25);


$pdf->SetFont('Arial','B',10);

$pdf->SetTextColor(30,45,3);
$pdf->Cell(25,17 ,'No.', 1, 0,'C');
$pdf->Cell(50,17,'Matricula',1,0,'C');
$pdf->Cell(120,17,'Nombre',1,0,'C');
$pdf->Cell(90,17,'Apellido Paterno',1,0,'C');
$pdf->Cell(90,17,'Apellido Materno',1,0,'C');
$pdf->Cell(240,17,'Programa Educativo',1,0,'C');
$pdf->Cell(60,17,'Hora entrada',1,0,'C');
$pdf->Cell(60,17,'Hora salida',1,0,'C');
$pdf->Cell(60,17,'Firma',1,0,'C');
$pdf->Ln(17);


$rec=mysql_query("SELECT idalumno, matricula, nombre, appaterno, apmaterno, carrera, horae, horas FROM lista where nombact = 'EDUCACION A FUTURO'  ");
$item = 0;
while ($d=mysql_fetch_array($rec)){
$item = $item + 1;
$pdf->SetFont('Arial','I',10);	
$pdf->SetTextColor(45,48,125);
$pdf->Cell(25,17,$item ,1,0,'C',false);
$pdf->Cell(50,17,$d['matricula'],1,0,'C',false);
$pdf->Cell(120,17,$d['nombre'],1,0,'C',false);
$pdf->Cell(90,17,$d['appaterno'],1,0,'C',false);
$pdf->Cell(90,17,$d['apmaterno'],1,0,'C',false);
$pdf->Cell(240,17,$d['carrera'],1,0,'C',false);
$pdf->Cell(60,17,$d['horae'],1,0,'C',false);
$pdf->Cell(60,17,$d['horas'],1,0,'C',false);
$pdf->Cell(60,17,'',1,0,'C',false);

$pdf->Ln(17);	
}
	}
$pdf->Output('lista_asistencia','I');

?>
	

?>
