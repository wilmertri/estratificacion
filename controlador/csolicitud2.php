<?php
	include ("../modelo/msolicitud2.php");

	$ins = new msolint();
	
	$fecestr		= getdate();
	$fechahora		= $fecestr['year'].'-'.$fecestr['mon'].'-'.$fecestr['mday'].' '.$fecestr['hours'].':'.$fecestr['minutes'].':'.$fecestr['seconds'];
	$fechacon 		= $fecestr['year'].$fecestr['mon'].$fecestr['mday'];
	$fechasis		= $fecestr['year'].'-'.$fecestr['mon'].'-'.$fecestr['mday'];
	$hora 			= $fecestr['hours'].$fecestr['minutes'].$fecestr['seconds'];
	$solicitante	= isset($_POST["solicitante"]) ? $_POST["solicitante"]:NULL;
	$idsolicitud	= isset($_POST["idsolicitud"]) ? $_POST["idsolicitud"]:NULL;
	$codcas			= isset($_POST["codcas"]) ? $_POST["codcas"]:NULL;
	$radent			= isset($_POST["radent"]) ? $_POST["radent"]:NULL;
	$radsal			= isset($_POST["radsal"]) ? $_POST["radsal"]:NULL;
	$numfac			= isset($_POST["numfac"]) ? $_POST["numfac"]:NULL;
	$usuario  		= isset($_SESSION['idUsuario']) ? $_SESSION["idUsuario"]:NULL;
	$predio			= isset($_POST["predio"]) ? $_POST["predio"]:NULL;
	$ca				= isset($_GET["ca"]) ? $_GET["ca"]:NULL;
	$documento		= isset($_POST["documento"]) ? $_POST["documento"]:NULL;
	$fecha 			= $fecestr['year']."/".$fecestr['mon']."/".$fecestr['mday'];
	$hora 			= $fecestr['hours'].":".$fecestr['minutes'].":".$fecestr['seconds'];
	$idpred			= isset($_POST["idpredio"]) ? $_POST["idpredio"]:NULL;
	$numfac			= strtoupper($numfac);
	$contador 		= "";
	$inf=0;


	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	$pr1 = isset($_GET["pr1"]) ? $_GET["pr1"]:NULL;

	$conspredios 	= $ins->selpred();
	$conspred 		= $ins->selpred1($codcas);
	$consestra 		= $ins->selest1($codcas);
	$conssol 		= $ins->selsol1($idsolicitud);
	$conssolmax		= $ins->selsolmax();
	$consdoc 		= $ins->selest1($codcas);
	$conssoli		= $ins->selsoli($documento);
	$conspred		= $ins->selpred2($idpred);
	$consest2 		= $ins->selest1($conspred[0]['codcas']);
	$consdat		= $ins->seldat1($pr1);
	$consdat2		= $ins->seldat2($pr);

	if ($consdat) 
	{
		if ($consdat[0]['zonaubi']==1) {
			$decreto = 'Decreto 069 de 1996: "Adopción de Estratificación socioeconómica para la Zona Urbana"';
		}
		if ($consdat[0]['zonaubi']==2) {
			$decreto = 'Decreto 023 del 2002: "Adopción de Estratificación socioeconómica para fincas y Viviendas dispersas en Zona rural"';
		}
		if ($consdat[0]['zonaubi']==3) {
			$decreto = 'Decreto 014 del 2002: "Adopción de Estratificación socioeconómica para Centros Poblados"';
		}
	}
	if ($consdat) 
	{
		if ($consdat[0]['codcasnue']=="") {
			$codnuevo = "Código no disponible.";
		}
		else{
			$codnuevo = $consdat[0]['codcasnue']; 	
		}
	}	

	/* Verificar la funcion de consulta de consecutivo*/
	if (is_null($conssolmax)) 
	{
		$con = 1;
	}
	else
	{
		$con = $conssolmax[0]['solmax'] + 1;
	}

	$consecutivo = consec($con,$fechacon);
	
	if ($consdat) 
	{
		if ($consdat[0]['numestrato']==1) {
			$estrato = "UNO";
		}
		if ($consdat[0]['numestrato']==2) 
		{
			$estrato = "DOS";
		}
		if ($consdat[0]['numestrato']==3) 
		{
			$estrato = "TRES";
		}
		if ($consdat[0]['numestrato']==4) 
		{
			$estrato = "CUATRO";
		}
		if ($consdat[0]['numestrato']==5) 
		{
			$estrato = "CINCO";
		}
		if ($consdat[0]['numestrato']==6) 
		{
			$estrato = "SEIS";
		}
	}
	if ($consdat2) {
		if ($consdat2[0]['numestrato']==1) 
		{
			$estrato = "UNO";
		}
		if ($consdat2[0]['numestrato']==2) 
		{
			$estrato = "DOS";
		}
		if ($consdat2[0]['numestrato']==3) 
		{
			$estrato = "TRES";
		}
		if ($consdat2[0]['numestrato']==4) 
		{
			$estrato = "CUATRO";
		}
		if ($consdat2[0]['numestrato']==5) 
		{
			$estrato = "CINCO";
		}
		if ($consdat2[0]['numestrato']==6) 
		{
			$estrato = "SEIS";
		}
	}
	

	function consec($con,$fec){
		$pre1 = "0000";
		$pre2 = "000";
		$pre3 = "00";
		$pre4 = "0";

		if (strlen($con)==1) {
			$contador = $fec.$pre1.$con;
		}
		if (strlen($con)==2) {
			$contador = $fec.$pre2.$con;
		}
		if (strlen($con)==3) {
			$contador = $fec.$pre3.$con;
		}
		if (strlen($con)==4) {
			$contador = $fec.$pre4.$con;
		}
		if (strlen($con)==5) {
			$contador = $fec.$con;
		}
		return $contador;	
	}
	
	//Actualizar
	
	
	//Insertar
	if ($radent && $solicitante && $predio && $numfac && !$actu)
	{
		$ins->inssol($fechahora, $radent, $solicitante, $predio, $consecutivo, $numfac, $usuario);
	}

	//Cerrar solicitud
	if ($radsal && $fechahora && $actu)
	{
		$ins->updsol2($pr, $radsal, $fechahora);
		$inf=1;
	}



?>