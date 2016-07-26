<?php
include('fpdf/fpdf.php');
include('cone.php');

class pdf extends FPDF{
public function Header(){
	$this->SetFont('Arial', '', 10);
	$this -> Image("membrete.jpg" ,20,20,550,50);
		
$this -> SetFont ('times','B','14');
$this-> Cell(0,150,"CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA",0,1,'C');
	$this -> SetXY('0', '130');
	$this ->SetFont('Arial', 'I', 10);
     $this ->Cell(900,35, 'Fecha: '.date('d-m-Y').'', 0,1,'C');
	$this -> Ln(15);
	
}
}

$pdf = new pdf('P','pt','A4');
$pdf -> addPage();



$pdf -> SetXY('90', '170');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 60, utf8_decode('C.______________________________ '), 0,1,'J');

$pdf -> SetXY('90', '220');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 30, utf8_decode('Jefe (a) del Departamento de Servicios Escolares o su equivalente '), 0,1,'J');
$pdf -> SetXY('90', '240');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 30, utf8_decode('en los Institutos Tecnológicos Descentralizados'), 0,1,'J');


$pdf -> SetXY('90', '255');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 60, utf8_decode('PRESENTE '), 0,1,'J');


$pdf -> SetXY('90', '280');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 60, utf8_decode('Los que suscriben ____________________________________________________, '), 0,1,'J');

$pdf -> SetXY('90', '320');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('por este medio se permite hacer de su conocimiento que el estudiante'), 0,1,'J');
$pdf -> Ln(30);

$pdf -> SetXY('-830', '340');
$pdf -> SetFont('Arial', 'B','12');
$pdf->Cell(0,20,'nombre del alumno' ,0,0,'C',false);
$pdf -> Ln(40);

$pdf -> SetXY('250', '340');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('con número de control '), 0,1,'J');


$pdf -> SetXY('260', '340');
$pdf -> SetFont('Arial', 'B','12');
$pdf->Cell(0,20,'matricula ' ,0,0,'C',false);
$pdf -> Ln(30);

$pdf -> SetXY('88', '360');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('de la carrera de'), 0,1,'J');
$pdf -> Ln(30);

$pdf -> SetXY('60', '360');
$pdf -> SetFont('Arial', 'B','12');
$pdf->Cell(0,20,'Carrera' ,0,0,'C',false);
$pdf -> Ln(30);

$pdf -> SetXY('90', '380');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('ha cumplido su actividad complementaria'), 0,1,'J');
$pdf -> Ln(30);

$pdf -> SetXY('315', '380');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('con el nivel de desempeño ____________'), 0,1,'J');
$pdf -> Ln(30);


$pdf -> SetXY('90', '400');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('y un valor numerico de ____, durante el período escolar _________________ con un'), 0,1,'J');
$pdf -> Ln(40);

$pdf -> SetXY('90', '420');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('valor curricular de 1 crédito.'), 0,1,'J');
$pdf -> Ln(40);






$pdf -> SetXY('85', '450');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 60, utf8_decode(' Se extiende la presente en la _______________ a los ____ días de _______ de 20___.'), 0,1,'J');
$pdf -> Ln(40);

$pdf -> SetXY('230', '510');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('ATENTAMENTE'), 0,1,'J');
$pdf -> Ln(40);

$pdf -> SetXY('210', '550');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode(' ________________________________  '), 0,1,'J');

$pdf -> SetXY('250', '570');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('NOMBRE DEL PROFE  '), 0,1,'J');

$pdf -> SetXY('250', '590');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('Vo. Bo. del jefe (a) del'), 0,1,'J');
$pdf -> SetXY('240', '610');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('Departamento de Desarrollo Academico'), 0,1,'J');




$pdf -> SetXY('85', '680');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode(' __________________________________'), 0,1,'J');


$pdf -> SetXY('100', '700');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode(' Nombre del profe  '), 0,1,'J');


$pdf -> SetXY('100', '720');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('Coordinador institucional de tutorias'), 0,1,'J');

$pdf -> SetXY('350', '680');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode(' __________________________________'), 0,1,'J');


$pdf -> SetXY('350', '700');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode(' Nombre del profe  '), 0,1,'J');


$pdf -> SetXY('350', '720');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('Coordinador de orientacion educativa'), 0,1,'J');


$pdf -> Ln(30);
$pdf ->Output('registro','I');


?>