<?php
include('fpdf/fpdf.php');
include('conea.php');

class pdf extends FPDF{
public function Header(){
	$this->SetFont('Arial', '', 10);
	$this -> Image("membrete.jpg" ,20,20,550,50);
		
$this -> SetFont ('times','B','14');
$this-> Cell(0,150,"DEPARTAMENTO DE DESARROLLO ACADEMICO",0,1,'C');
	$this -> SetXY('0', '150');
	$this -> SetFont('Arial','I','10');
    $this -> Cell(900,35,"Asunto: Constancia de Horas Acumuladas",0,0,'C');
	$this -> SetXY('0', '180');
	$this ->SetFont('Arial', 'I', 10);
     $this ->Cell(800,25, 'Fecha: '.date('d-m-Y').'', 0,1,'C');
	$this -> Ln(15);
	
}
function Footer()
{
$this -> SetXY(120, -33);
$this -> SetFont ('Helvetica','','7');
$this -> SetTextColor(0,0,3);

$this -> Write(5,utf8_decode('Carretera Campeche-Escárcega Km.9 , Lerma, Campeche, C.P. 24500, San francisco de Campeche, Campeche.'));
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

$consulta_mysql="select appaterno, apmaterno, nombre, matricula, 
carrera from kardex where idalumno='1'";
$result_consulta_mysql=mysql_query($consulta_mysql,$conex);
while($row = mysql_fetch_array($result_consulta_mysql)){

$appaterno= $row['appaterno'];
$apmaterno= $row['apmaterno'];
$nombre= $row['nombre'];
$matricula= $row['matricula'];
$carrera= $row['carrera'];


$pdf -> SetXY('90', '240');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 60, utf8_decode('El que suscribe del Departamento de 
Desarrollo Academico de este Instituto '), 0,1,'J');

$pdf -> SetXY('85', '290');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode(' Tecnológico 
,el cual hace constar que el (la) estudiante '), 0,1,'J');
$pdf -> Ln(30);

$pdf -> SetFont('Arial', 'B','12');
$pdf->Cell(250,30, $nombre ,0,0,0);
$pdf->Cell(60,30, $appaterno ,0,0,0 );
$pdf->Cell(60,30, $apmaterno ,0,0, 0 );
$pdf -> Ln(40);

$pdf -> SetXY('90', '380');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 60, utf8_decode('con número de control '), 0,1,'J');

$pdf -> SetFont('Arial', 'B','12');
$pdf -> SetXY('1', '396');
$pdf->Cell(0,30, $matricula ,0,0,'C');
$pdf -> Ln(40);

$pdf -> SetXY('350', '401');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('del Programa Educativo de '), 0,1,'J');
$pdf -> Ln(40);

$pdf -> SetFont('Arial', 'B','12');
$pdf -> SetXY('0', '430');
$pdf->Cell(0,30,$carrera     ,0,0,'C');
$pdf -> Ln(40);

$pdf -> SetXY('85', '450');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 60, utf8_decode('ha acumulado un 
total de 20 horas en  Actividades Complementarias 
 '), 0,1,'J');
$pdf -> Ln(40);

$pdf -> SetXY('90', '505');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('de Tutorias y Orientación Educativa ,'), 0,1,'J');
$pdf -> Ln(40);

$pdf -> SetXY('85', '550');
$pdf -> SetFont('Arial', '','12');
$pdf-> Cell(0, 20, utf8_decode('por esta razón se le asigna a esta
 constancia con valor a 1 credito  '), 0,1,'J');

}
$pdf -> Ln(30);



$pdf ->Output('constancia.pdf','I');


?>