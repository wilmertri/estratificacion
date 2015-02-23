<?php
	include ("modelo/mpredio.php"); 
	$ins = new mpredio();
	
	$idpredio 	= 	isset($_POST["idpredio"]) ? $_POST["idpredio"]:NULL;
	$codcas 	=   isset($_POST["codcas"]) ? $_POST["codcas"]:NULL;
	$codcasnew 	= 	isset($_POST['codcasnew']) ? $_POST["codcasnew"]:NULL;
	$dirpred	= 	isset($_POST['dirpred']) ? $_POST["dirpred"]:NULL;
	$areatotal	=	isset($_POST['areatotal']) ? $_POST["areatotal"]:NULL;
	$areacons	=	isset($_POST['areacons']) ? $_POST["areacons"]:NULL;
	$latitud	=	isset($_POST['latitud']) ? $_POST["latitud"]:NULL;
	$longitud	=	isset($_POST['longitud']) ? $_POST["longitud"]:NULL;
	$fuenteinfo	=	isset($_POST['fuenteinfo']) ? $_POST["fuenteinfo"]:NULL;
	$usoecono	=	isset($_POST['usoecono']) ? $_POST["usoecono"]:NULL;
	$zonapot	=	isset($_POST['zonapot']) ? $_POST["zonapot"]:NULL;
	$zonaubi 	=	isset($_POST['zonaubi']) ? $_POST["zonaubi"]:NULL;
	$vereda		=	isset($_POST['vereda']) ? $_POST["vereda"]:NULL;
 
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;

	
	$det = $ins->selpred1($pr);
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;

	$datzonpot	= $ins->selzonapot();
	$datzonubi 	= $ins->selzonaubi();
	$datfuen 	= $ins->selfueninfo();
	$datusoeco 	= $ins->selusoecono();
	$datver 	= $ins->selvereda();
	
	$conspred	= $ins->selpred($codcas);
	$consestr	= $ins->selestr($codcas);
	$consultpred = $ins->selpredmax($codcas);
	if ($consultpred) {
		$unidad = $conspred[0]['unidad'] + 1;
	}
	else
	{
		$unidad = 1;
	}

	if ($del)
	{
		$ins->delpre($del);
	}
	
	//Actualizar Predio

	if ($idpredio && $codcas && $codcasnew && $dirpred && $unipred && $tipuso && $zona && $estpred && $actu)
	{
		$ins->updpred($idpredio,$codcas,$codcasnew,$dirpred,$unipred,$tipuso,$zona,$estpred);
	}
	//echo "Id predio: ".$idpredio." Dirección: ".$dirpred." Area construida: ".$areacons." Actu: ".$actu;
	if ($idpredio && $dirpred && $actu)
	{
		$ins->updpred2($idpredio,$dirpred,$areacons);
	}
	
	//Insertar Predio

	if ($codcas && $dirpred  && $usoecono && $zonapot && $zonaubi && $vereda && !$actu)
	{
		$ins->inspred($codcas,$codcasnew,$dirpred,$areatotal, $areacons, $latitud, $longitud, $usoecono, $zonapot, $zonaubi, $vereda, $unidad);
	}
	
	
?>