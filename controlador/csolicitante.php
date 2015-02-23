<?php
	include ("modelo/msolicitante.php"); 
	$ins = new msolicitante();
	
	$numdoc 	= isset($_POST["numdoc"]) ? $_POST["numdoc"]:NULL;
	$nomsol		= isset($_POST["nomsol"]) ? $_POST["nomsol"]:NULL;
 	$telsol		= isset($_POST["telsol"]) ? $_POST["telsol"]:NULL;
 	$email		= isset($_POST["email"]) ? $_POST["email"]:NULL;
 	$numdocbus 	= isset($_POST["numdocbus"]) ? $_POST["numdocbus"]:NULL;
	
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;

	$datsol = $ins->selsol1($pr);
	$datsol1 = $ins->selsol1($numdocbus);

	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	
	if ($del)
	{
		$ins->delper($del);
	}
	
	//Actualizar
	if ($numdoc && $nomsol && $telsol && $email && $actu)
	{
		$ins->updsol($numdoc,$nomsol,$telsol,$email);
	}
	
	//Insertar
	if ($numdoc && $nomsol && $telsol && !$actu)
	{
		$ins->inssol($numdoc,$nomsol,$telsol,$email);
	}
	
?>