<?php
	include ("modelo/mtipuso.php"); 
	$ins = new mtipuso();
	
	$idtipuso = isset($_POST["idtipuso"]) ? $_POST["idtipuso"]:NULL;
	$nomtipuso = isset($_POST["nomtipuso"]) ? $_POST["nomtipuso"]:NULL;
	$obstipuso = isset($_POST['obstipuso']) ? $_POST["obstipuso"]:NULL;
 
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;

	$det = $ins->seltipuso1($pr);
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	
	if ($del)
	{
		$ins->deltipuso($del);
	}
	
	//Actualizar Zona

	if ($idtipuso && $nomtipuso && $obstipuso && $actu)
	{
		$ins->updtipuso($idtipuso,$nomtipuso,$obstipuso);
	}
	
	//Insertar Zona

	if ($nomtipuso && $obstipuso && !$actu)
	{
		$ins->instipuso($nomtipuso, $obstipuso);
	}
	$dat = $ins->seltipuso();
	
?>