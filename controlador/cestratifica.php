<?php
	include ("modelo/mestratifica.php"); 
	$ins = new mestratifica();
	
	$idestrato 		= 	isset($_POST["idestrato"]) ? $_POST["idestrato"]:NULL;
	$numestrato		=   isset($_POST["numestrato"]) ? $_POST["numestrato"]:NULL;
	$observacion 	= 	isset($_POST['observacion']) ? $_POST["observacion"]:NULL;
	//$observacion	= 	ucfirst(strtolower($observacion));
	$predio         = 	isset($_POST['predio']) ? $_POST["predio"]:NULL;
	$usuario  		= 	isset($_SESSION['idUsuario']) ? $_SESSION["idUsuario"]:NULL;
	$anexo 			=   isset($_POST['anexo']) ? $_POST["anexo"]:NULL;
	$nomarc 		=   isset($_POST['name']) ? $_POST["name"]:NULL;
	$rutaservidor	=   'diranexos';
	$rutatemporal	= 	isset($_FILES['archivo']['tmp_name']) ? $_FILES['archivo']['tmp_name']:NULL;
	$nombrearchivo	=   isset($_FILES['archivo']['name']) ? $_FILES['archivo']['name']:NULL;
	$rutadestino	=	$rutaservidor.'/'.$nombrearchivo;
	$extensionar	= 	end(explode(".", $nombrearchivo));		
	$valida = 0;
 
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;

	$consobs = $ins->selest1($pr);

	//echo $idestrato;
	//echo $observacion;
	//echo $actu;
	//var_dump($consobs);

	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;

	$unidadactu = $ins->selunidest($pr);
	
	if ($unidadactu) 
	{
		$idest = $unidadactu[0]['idestrato'];
		$newunidad = $unidadactu[0]['unidactu'] + 1;
	}

	if ($del)
	{
		$ins->delpre($del);
	}
	
	//Actualizar Predio

	if ($idestrato && $numestrato && $observacion && $usuario && $predio && $actu)
	{
		$ins->updestrat($idpredio,$codcas,$codcasnew,$dirpred,$unipred,$tipuso,$zona,$estpred);
	}
	
	//Actualizar Observación

	if ($idestrato && $observacion && $actu)
	{
		$ins->updobs($idestrato,$observacion);
		echo "<strong>Observación actualizada</strong>";
	}

	//Insertar Estrato
	if ($numestrato && $observacion && $usuario && $pr && !$actu)
	{
		if ($newunidad) {
			$ins->updunidest($idest,$newunidad);
		}
		$ins->insestrat($numestrato, $observacion, $usuario, $pr);
		$valida = 1;
	}

	//Anexo de documentos
	if ($anexo && $nombrearchivo && $nomarc) 
	{
		
		move_uploaded_file($rutatemporal,$rutadestino);
		$ins->insarch($nomarc,$rutadestino,$extensionar, $perusu, $pr);
		
	}
	
	
?>