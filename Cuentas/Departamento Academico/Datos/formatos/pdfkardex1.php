<?php
include('fpdf/fpdf.php');
include('conea.php');

class pdf extends FPDF{
public function Header(){
	$this->SetFont('Arial', '', 10);
	$this -> Image("membrete.jpg" ,20,15,550,50);
		
$this -> SetFont ('Arial','','17');
$this-> Cell(0,130,"DEPARTAMENTO DE DESARROLLO ACADEMICO",0,0,'C');
	$this -> SetXY('10', '105');
	$this -> SetFont('Arial','','14');
    $this -> Cell (0,25, utf8_decode("Kardex de Actividades Complementarias de Tutorias y Orientación Educativa"),0,0,'C');
	$this -> Ln(15);
	$this ->SetFont('Arial', '', 12);
     $this ->Cell(0, 35, 'Fecha: '.date('d-m-Y').'', 0,1,'C');
	$this -> SetTextColor(255,255,255);
	$this -> Ln(15);
	
}
function Footer()
{
$this -> SetXY(120, -33);
$this -> SetFont ('Helvetica','','7');
$this -> SetTextColor(0,0,3);

$this ->Write(5,utf8_decode('Carretera Campeche-Escárcega Km.9 , Lerma, Campeche, C.P. 24500, San francisco de Campeche, Campeche.'));
$this -> SetXY(234, -25);
$this -> SetFont ('Helvetica','','7');
$this -> SetTextColor(0,0,3);
$this ->Write(8,utf8_decode('Tel. 981-81-2-02-02 y 981-81-2-00-33'));
$this -> SetTextColor(0,0,3);

$this ->SetY(-18);
$this -> SetFont ('Arial','I','6');
$this ->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
$pdf = new pdf('P','pt','A4');
$pdf -> addPage();
$pdf ->AliasNbPages();

$consulta_mysql="select appaterno, apmaterno, nombre, matricula, carrera from kardex where idalumno='$id_alumnos '";
$result_consulta_mysql=mysql_query($consulta_mysql,$conex);
while($row = mysql_fetch_array($result_consulta_mysql)){

$appaterno= $row['appaterno'];
$apmaterno= $row['apmaterno'];
$nombre= $row['nombre'];
$matricula= $row['matricula'];
$carrera= $row['carrera'];

$pdf -> SetXY('32', '160');
$pdf -> SetFont('Arial', 'B','10');
$pdf -> Cell(100, 20, utf8_decode('Nombre Completo: '), 0,0,'C');
$pdf -> SetFont('Arial', 'I','8');
$pdf->Cell(90,22,$nombre , 0,0,'0');
$pdf->Cell(50,22.2, $appaterno , 0,0,'0');
$pdf->Cell(50,22.2, $apmaterno , 0,0,'0');
$pdf -> SetFont('Arial', 'B','10');
$pdf -> SetXY('34', '170');
$pdf->Cell(100, 40, utf8_decode( 'Número de Control: '), 0,0,'C');
$pdf -> SetFont('Arial', 'I','8');
$pdf->Cell(43,40, $matricula ,0,0,'C');
$pdf -> SetFont('Arial', 'B','10');
$pdf -> SetXY('37', '180');
$pdf->Cell(100, 60, utf8_decode( 'Programa Educativo: '), 0,0,'C');
$pdf -> SetFont('Arial', 'I','8');
$pdf->Cell(100,60, $carrera  , 0,0,'0');

}
$pdf -> Ln(20);


$pdf -> SetFont('times', 'B','9');
$pdf -> SetXY('28.3', '240');
$pdf->Cell(80, 20, 'Areá', 1,0,'C');
$pdf->Cell(100, 20, 'nombrec', 1,0,'C');
$pdf->Cell(100, 20, 'Tipo de Actividad', 1,0,'C');
$pdf->Cell(180, 20, 'Nombre de la actividad', 1,0,'C');
$pdf->Cell(170, 20, 'Ponente', 1,0,'C');
$pdf->Cell(65, 20, 'Fecha Realizada', 1,0,'C');
$pdf->Cell(30, 20, 'Horas ', 1,0,'C');
$pdf -> Ln(20);

$consulta_mysql="select  area, nombrec, tipoact, nombact, ponente, fecha, totalh from kardex where idalumno='$id_alumnos '";
$result_consulta_mysql=mysql_query($consulta_mysql,$conex);
while($datos = mysql_fetch_array($result_consulta_mysql)){

$area=$datos['area'];
 $nombrec=$datos['nombrec'];
$tipoact= $datos['tipoact'];
$nombact= $datos['nombact'];
$ponente= $datos['ponente'];
$fecha= $datos['fecha'];
$totalh= $datos['totalh'];

$pdf -> SetFont('times', 'B','7');
$pdf -> SetTextColor(0,0,204);
$pdf->Cell(100,20, $area , 1,0,'0');
$pdf->Cell(100,20, $nombrec  , 1,0,'0');
$pdf->Cell(100,20, $tipoact  , 1,0,'0');
$pdf->Cell(180,20, $nombact ,1,0,'C');
$pdf->Cell(170,20, $ponente, 1,0,'C');
$pdf->Cell(65,20, $fecha,  1,0,'C');
$pdf->Cell(30,20, $totalh, 1,0,'C');

$pdf -> Ln(20);
}

$pdf ->Output('Kardex','I');
?>