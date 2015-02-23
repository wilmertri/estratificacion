<?php
	require_once("../dompdf/dompdf_config.inc.php");
  include ("../controlador/csolicitud2.php");  
  require('rotation.php');
  /* definimos la ruta de las fuentes*/
  /* Incorporamos la librería */ 
  //require('jlpdf.php');

 class PDF extends PDF_Rotate
 {
  function Header()
  {
    //Put the watermark
    //$this->RotatedText(70,205,'e informativo',45);
    $this->Image('header.jpg',20,10,170);
    $this->SetFont('Arial','B',12);
  }
   

  function RotatedText($x, $y, $txt, $angle)
  {
    //Text rotated around its origin
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
  }

  function Footer()
  {

    $this->SetY(-10);
    $this->SetFont('Arial','I',8);
    $this->Image('pie.jpg',8,250,180);
  }

}

$txt4="Fecha: ".$fecha."\nHora:   ".$hora;

$txt="\n
De acuerdo con la información de estrato que reposa en la Base de Datos de la Secretaría de Planeación y en concordancia con las metodologías realizadas por el Departamento Nacional de Planeacion (DNP), se ha encontrado que el predio identificado con: \n";
$txt1 = "\n       Cédula catastral Nº:        ".$consdat2[0]['codcas']."\n       Dirección:                        ".$consdat2[0]['dirpred']." \n       Estrato:                            ".$estrato." (".$consdat2[0]['numestrato'].").";

$txt2 = "Esta constancia se emite como respuesta a la solicitud realizada con numero de radicación: ".$consdat2[0]['noexp'];

$txt3 = "Base de Datos de Estratificación Municipal actualizada al 30-Sep-2014\nVisítenos en: http://www.chia-cundinamarca.gov.co/";

$txt5 = "De acuerdo con lo establecido en la Ley 142 de 1994, el estrato es asignado únicamente a predios destinados exclusivamente para vivienda.  Cualquier aclaración adicional le atenderemos con gusto en la Dirección de Planificación del Desarrollo, al teléfono 8 632858 o al PBX 8 844444 ext. 2104.";

$pdf=new PDF();
$pdf->AddPage();
$pdf->Ln(50);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(0,5,$txt4,0,'L');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(85);
$pdf->Cell(20,10,'Secretaria de Planeación',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(85);
$pdf->Cell(20,10,'Dirección de Planificación del Desarrollo',0,1,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(85);
$pdf->Cell(20,10,'Constancia de Estratificación Socioeconomica',0,1,'C');
$pdf->SetFont('Arial','',12); 
$pdf->MultiCell(0,5,$txt,0,'J');
$pdf->SetFont('Arial','B',12); 
$pdf->MultiCell(0,5,$txt1,0,'J');
$pdf->Ln(10);
$pdf->SetFont('Arial','',12); 
$pdf->MultiCell(0,5,$txt5,0,'J');
$pdf->Ln(10);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,$txt2,0,'J');
$pdf->Ln(10);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,5,$txt3,0,'L');
//$pdf->Cell(0,6,'Clave: '.$dato[0]['codigocatastral'],0,1);
$pdf->Output();

?>