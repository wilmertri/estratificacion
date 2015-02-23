<?php
	require_once("../dompdf/dompdf_config.inc.php");
	include ("../controlador/cestrato.php");	
  require('rotation.php');

 class PDF extends PDF_Rotate
 {
  function Header()
  {
    //Put the watermark
    $this->SetFont('Arial','B',45);
    $this->SetTextColor(187,184,188);
    $this->RotatedText(25,235
      ,'Documento gratuito e informativo',45);
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
$txt="\n\n

Señor Usuario\n
De acuerdo con la información de estrato que reposa en la Base de Datos de la Secretaría de Planeación, se ha encontrado que el predio identificado con cédula catastral Nº.".$dato[0]['codigocatastral']." Ubicado en la ".$dato[0]['direccion']." tiene asignado el estrato ".$dato[0]['estrato'].".

";
$txt1 = "Esta consulta es únicamente informativa, si requiere un Certificado de Estrato con destino a las Empresas de Servicios Públicos, por favor acercarse a la Oficina de Archivo y  Correspondencia, ubicada en el Edificio de Planeación (antiguo Banco Agrario), para diligenciar la solicitud.

De acuerdo con lo establecido en la Ley 142 de 1994, el estrato es asignado únicamente a predios destinados exclusivamente para vivienda.  Cualquier aclaración adicional le atenderemos con gusto en la Dirección de Planificación del Desarrollo, al teléfono 8 632858 o al PBX 8 844444 ext. 2104.
";

$txt2 = "Base de Datos de Estratificación Municipal actualizada al 30-Sep-2014
";
$pdf=new PDF();
$pdf->AddPage();
$pdf->Ln(60);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(85);
$pdf->Cell(20,10,'Consulta de Estrato para la zona urbana',0,1,'C');
$pdf->SetFont('Arial','',14); 
$pdf->MultiCell(0,5,$txt,0,'J');
$pdf->Ln(10);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,$txt1,0,'J');
$pdf->Ln(20);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(0,5,$txt2,0,'J');
//$pdf->Cell(0,6,'Clave: '.$dato[0]['codigocatastral'],0,1);
$pdf->Output();

?>