<?php
	include ("modelo/mperfil.php"); 
	$ins = new mperfil();
	
	$idper = isset($_POST["idper"]) ? $_POST["idper"]:NULL;
	$nomper = isset($_POST["nomper"]) ? $_POST["nomper"]:NULL;
 
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;

	$det = $ins->selper1($pr);
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
	
	if ($del)
	{
		$ins->delper($del);
	}
	
	//Actualizar
	if ($idper && $nomper  && $actu)
	{
		$ins->updper($idper,$nomper);
	}
	
	//Insertar
	if ($nomper && !$actu)
	{
		$ins->insper($nomper);
	}
	$dat = $ins->selper();
	
?>