<?php
require('fpdf/fpdf.php');
require('conea.php');

class PDF_MC_Table extends FPDF
{
var $widths;
var $aligns;
 function Header()
        {
       $this->SetFont('Arial', '', 10);
	$this -> Image("membrete.jpg" ,20,15,550,50);
		
$this -> SetFont ('Arial','','17');
$this-> Cell(0,130,"DEPARTAMENTO DE DESARROLLO ACADEMICO",0,0,'C');
	$this -> SetXY('10', '105');
	$this -> SetFont('Arial','','14');
    $this -> Cell (0,25, utf8_decode("Estadisticas de cursos de Acciones complementarias"),0,0,'C');
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
function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=4;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=8*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		$this->Rect($x,$y,$w,$h);
		//Print the text
		$this->MultiCell($w,8,$data[$i],0,$a);
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}
}
$pdf=new PDF_MC_Table('P','pt');
$pdf->AddPage();
$pdf ->AliasNbPages();{
 $conteo = mysql_query("SELECT count(*) as nparti FROM reporte");
  $cont = mysql_fetch_array($conteo,MYSQL_ASSOC);

$pdf -> SetFont('Arial', '','12');
$pdf -> SetXY('50', '170');
$pdf->Cell(100, 40, utf8_decode( 'Número de Participantes: '), 0,0,'C');
$pdf -> SetFont('Arial', '','12');
$pdf->Cell(150,40, $cont["nparti"].' participantes' ,0,0,'C');


}
$pdf -> Ln(20);


$pdf -> SetFont('times', 'B','10');
$pdf -> SetXY('28.3', '240');
$pdf->Cell(115, 20, utf8_decode('Carrera'), 1,0,'C');
$pdf->Cell(55, 20, utf8_decode('Sexo'), 1,0,'C');
$pdf->Cell(80, 20, utf8_decode('Matricula'), 1,0,'C');
$pdf->Cell(120, 20, utf8_decode('Nombre de la actividad'), 1,0,'C');
$pdf->Cell(75, 20, utf8_decode('Ponente'), 1,0,'C');
$pdf -> Ln(20);
{

$pdf->SetWidths(array(115,55,80,120,75,75));
$consulta = mysql_query("select  carrera, sexo, matricula, nombact, ponente, periodo from reporte ");

   while ($reg = mysql_fetch_array($consulta)) {
$pdf->SetFont('Arial','',8);
$pdf->Row(array(
 $reg['carrera'], $reg['sexo'], 
$reg['matricula'], $reg['nombact'], $reg['ponente'],

 ));

    }
$pdf->Ln(20);
}
$pdf ->Output('cursos impartidos.pdf','I');
?>

