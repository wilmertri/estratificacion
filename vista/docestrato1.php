<?php
	require_once("../dompdf/dompdf_config.inc.php");
  include ("../controlador/csolicitud2.php");  
  require('rotation.php');
  /* definimos la ruta de las fuentes*/
  /* Incorporamos la librería */ 
  //require('jlpdf.php');
  header ('Content-type: text/html; charset=utf-8');

 class PDF extends PDF_Rotate
 {
  function Header()
  {
    //Put the watermark
    //$this->RotatedText(70,205,'e informativo',45);
    $this->Image('header.jpg',20,10,170,40);
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

    $this->SetY(-2);
    $this->SetFont('Arial','I',8);
    $this->Image('pie.jpg',8,255,190,25);
  }

}

$txt7="Consecutivo: ".$consdat[0]['codcons'];
$txt ="La Dirección de Planificación del Desarrollo hace constar que de acuerdo con la información que reposa en la base de datos de la Secretaría de Planeación, y los documentos de estratificación adoptados por zonas, mediante ".$decreto.", la aplicación de la metodología elaborada por el Departamento Nacional de Planeación -DNP- adoptada para la zona mencionada, el inmueble referenciado a continuación presenta la siguiente información:";
//$txt="La Dirección de planificación del Desarrollo hace constar que de acuerdo con la información que reposa en la base de datos de la Secretaría de Planeación, y los documentos de estratifiación adoptados por zonas, mediante ".$decreto.", la aplicación de la metodología elaborada por el Departamento Nacional de Planeación (DNP) adoptada para la zona mencionada, el inmueble referenciado a continuación presenta la siguiente información: ";
//$txt="\n
//La dirección de planificación del desarrollo de acuerdo con la información de estrato que reposa en la Base de Datos de la Secretaría de Planeación y en concordancia con el ".$decreto.", se ha encontrado que el predio identificado con: \n";
$txt1 = "\n   Cédula catastral anterior:  ".$consdat[0]['codcas']."\n   Cédula catastral nueva¹:    ".$codnuevo."\n   Dirección:                            ".$consdat[0]['dirpred']." \n   Estrato:                                ".$estrato." (".$consdat[0]['numestrato'].").";

$txt6 = "Es deber de cada municipio clasificar en estratos los inmuebles residenciales que deben recibir servicios públicos, conforme a lo dispuesto en el Artículo 10.1 de la Ley 142 de 1994.";
$txt2 = "Se emite como respuesta a la solicitud: ".$consdat[0]['radent']." del ".substr($consdat[0]['fechasol'], 0, -9).", radicada por el interesado.";

$txt3 = "   - Base de Datos de Estratificación Municipal actualizada al 30-Sep-2014\n   - Verifique la validez de esta constancia utilizando este número: (".$consdat[0]['codcons']."), en la página\n www.planear.came.gov.co / verificar constancia.\nVisítenos en: http://www.chia-cundinamarca.gov.co/";

$txt8 = "Por lo tanto es competencia de las empresas de Servicios Públicos Domiciliarios de conformidad con los criterios de clasificación de sus usuarios, confirmar el estrato para el presente inmueble en virtud de su uso o destinación.";
//$txt8 = "Verifique la validez de este documento con el número consecutivo que aparece en la parte superior en la pagina www.planear.came.gov.co en la opción Verificar constancia. Cualquier aclaración adicional le atenderemos con gusto en la Dirección de Planificación del Desarrollo, al teléfono 8 632858 o al PBX 8 844444 ext. 2104.";
if ($consdat[0]['observaciones']==""){
  $txt5 = "Observación: Ninguna.";
}
else
{
  $txt5 = "Observación: ".$consdat[0]['observaciones'];
}

$txt9="Por lo tanto es competencia de las empresas de Servicios Públicos Domiciliarios de conformidad con los criterios de clasificación de sus usuarios, confirmar el estrato para el presente inmueble en virtud de su uso o destinación.";
$txt10 = "Revisó: Jose Hernando Luque - Secretaría Técnica Comités de Estratificación\nDigitó: Adriana Marcela  Moreno - Contratista";
$txt11="¹ Resolución No. 70 de 2011. Artículo 160.";

$pdf=new PDF();
$pdf->AddPage();
$pdf->Ln(45);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(85);
$pdf->Cell(20,10,'Constancia de',0,1,'C');
$pdf->Cell(85);
$pdf->Cell(20,5,'Estratificación Socioeconómica',0,1,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','',11); 
$pdf->MultiCell(0,5,$txt,0,'J');
$pdf->SetFont('Arial','B',11); 
$pdf->MultiCell(0,5,$txt1,0,'J');

$pdf->Ln(2);
$pdf->SetFont('Arial','',9); 
$pdf->MultiCell(0,5,$txt5,0,'J');

$pdf->Ln(3);
$pdf->SetFont('Arial','',10); 
$pdf->MultiCell(0,5,$txt6,0,'J');

$pdf->Ln();
$pdf->SetFont('Arial','I',11); 
$pdf->MultiCell(0,5,$txt8,0,'J');


$pdf->Ln(5);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,$txt2,0,'J');

$pdf->Ln(20);
$pdf->SetFont('Arial','',7);
//$pdf->MultiCell(0,5,$txt10,0,'L');
$pdf->Cell(120,15,'Revisó: Jose Hernando Luque - Secretaría Técnica Comités de Estratificación',0,1,'L');
$pdf->Cell(120,-7,'Digitó: Adriana Marcela  Moreno - Contratista',0,1,'L');
$pdf->Ln(8);
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(0,5,$txt3,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell(55,15,'¹ Resolución No. 70 de 2011. Artículo 160.',0,1,'C');


$pdf->Image('../img/qr.png',170,230,-300);
if ($consdat[0]['observaciones']==""){
  $pdf->Image('../img/firma.jpg',10,185,-300);
}
else
{
  $pdf->Image('../img/firma.jpg',10,190,-300);
}
if ($consdat[0]['observaciones']==""){
  $pdf->Line(10,240,70,240);
}
else
{
  $pdf->Line(10,250,70,250);
}

//$pdf->Cell(0,6,'Clave: '.$dato[0]['codigocatastral'],0,1);
$pdf->Output();

?>