<?php
	include ("modelo/msolint.php");

	$ins = new msolint();
	
	$idsolint		= isset($_POST["idsol"]) ? $_POST["idsol"]:NULL;
	$solicitante  	= isset($_SESSION['idUsuario']) ? $_SESSION["idUsuario"]:NULL;
	$codcas			= isset($_POST["codcas"]) ? $_POST["codcas"]:NULL;
	$predio			= isset($_POST["predio"]) ? $_POST["predio"]:NULL;
	$numexp			= isset($_POST["numexp"]) ? $_POST["numexp"]:NULL;
	$zonarur		= isset($_POST["zonrur"]) ? $_POST["zonrur"]:NULL;
	$zonacp			= isset($_POST["zoncp"]) ? $_POST["zoncp"]:NULL;
	$observacion	= isset($_POST["observacion"]) ? $_POST["observacion"]:NULL;
	$usuario  		= isset($_SESSION['idUsuario']) ? $_SESSION["idUsuario"]:NULL;
	$fecestr		= getdate();
	$fechacon 		= $fecestr['year'].$fecestr['mon'].$fecestr['mday'];
	$contador 		= "";
	$estrato 		= "";
	$actu 			= isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr 			= isset($_GET["pr"]) ? $_GET["pr"]:NULL;

	$conspred 		= $ins->selpred1($codcas);
	$consestra 		= $ins->selest1($codcas);
	$conssol 		= $ins->selsol1($idsolint);
	$conssolmax		= $ins->selsolmax();

	/*RESPUESTAS DE LA ZONA URBANA*/
	$RP2 		= isset($_POST["preur2"]) ? $_POST["preur2"]:NULL;
	$RP3 		= isset($_POST["preur3"]) ? $_POST["preur3"]:NULL;
	$RP4 		= isset($_POST["preur4"]) ? $_POST["preur4"]:NULL;

	/*RESPUESTAS DE LA ZONA RURAL*/
	$RPR1 		= isset($_POST["prezr1"]) ? $_POST["prezr1"]:NULL;
	$RPR2 		= isset($_POST["prezr2"]) ? $_POST["prezr2"]:NULL;
	$RPR3 		= isset($_POST["prezr3"]) ? $_POST["prezr3"]:NULL;
	$RPR4 		= isset($_POST["prezr4"]) ? $_POST["prezr4"]:NULL;
	$RPR5 		= isset($_POST["prezr5"]) ? $_POST["prezr5"]:NULL;
	$RPR6 		= isset($_POST["prezr6"]) ? $_POST["prezr6"]:NULL;
	$RPR7 		= isset($_POST["prezr7"]) ? $_POST["prezr7"]:NULL;
	$RPR8 		= isset($_POST["prezr8"]) ? $_POST["prezr8"]:NULL;
	$RPR9 		= isset($_POST["prezr9"]) ? $_POST["prezr9"]:NULL;
	$RPR10 		= isset($_POST["prezr10"]) ? $_POST["prezr10"]:NULL;

	/*RESPUESTAS DEL CENTRO POBLADO*/
	$RPC1 		= isset($_POST["precp1"]) ? $_POST["precp1"]:NULL;
	$RPC2 		= isset($_POST["precp2"]) ? $_POST["precp2"]:NULL;
	$RPC3 		= isset($_POST["precp3"]) ? $_POST["precp3"]:NULL;
	$RPC4 		= isset($_POST["precp4"]) ? $_POST["precp4"]:NULL;
	$RPC5 		= isset($_POST["precp5"]) ? $_POST["precp5"]:NULL;

	$puntzonrur = $RPR1 + $RPR2 + $RPR3 + $RPR4 + $RPR5 + $RPR6 + $RPR7 + $RPR8 + $RPR9 + $RPR10 + 21;
	$puntzoncp	= $RPC1 + $RPC2 + $RPC3 + $RPC4 + $RPC5 + 19;

	//echo "Puntaje: ".$puntzonrur." ";
	
	$unidadactu = $ins->selunidest($conspred[0]['idpredio']);
	//echo "Unidad de actu: ".$unidadactu[0]['unidactu'];
	//echo "Código catastral: ".$codcas;
	
	if ($unidadactu) 
	{
		$idest = $unidadactu[0]['idestrato'];
		$newunidad = $unidadactu[0]['unidactu'] + 1;
	}
	

	if ($puntzonrur>21) {
		if ($puntzonrur<25) {
			$estratorur = 1;
			$estletra = "UNO";
		}
		else if ($puntzonrur<32) {
			$estratorur = 2;
			$estletra = "DOS";
		}
		else if ($puntzonrur<44){
			$estratorur = 3;
			$estletra = "TRES";
		}
		else if ($puntzonrur<54){
			$estratorur = 4;
			$estletra = "CUATRO";
		}
		else if ($puntzonrur<70){
			$estratorur = 5;
			$estletra = "CINCO";
		}
		else{
			$estratorur = 6;
			$estletra = "SEIS";	
		}
	}

	if ($puntzoncp>19) {
		if ($puntzoncp<25) {
			$estrato = 1;
			$estletra = "UNO";
		}
		else if ($puntzoncp<32) {
			$estrato = 2;
			$estletra = "DOS";
		}
		else{
			$estrato = 3;
			$estletra = "TRES";
		}
	}

	if ($RP2) {
		$pendiente = 1;
	}
	else{
		$pendiente = 2;
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
	

	function converletra()
	{
		if ($consestra[0]['numestrato']==1) 
		{
			$estrato = "UNO";
		}
		if ($consestra[0]['numestrato']==2) 
		{
			$estrato = "DOS";
		}
		if ($consestra[0]['numestrato']==3) 
		{
			$estrato = "TRES";
		}
		if ($consestra[0]['numestrato']==4) 
		{
			$estrato = "CUATRO";
		}
		if ($consestra[0]['numestrato']==5) 
		{
			$estrato = "CINCO";
		}
		if ($consestra[0]['numestrato']==6) 
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
	
	//Insertar solicitud zona urbana
	if ($numexp && $predio && $consecutivo && $solicitante  && !$zonarur && !$zonacp && !$actu)
	{
		$ins->inssol($numexp, $solicitante, $consecutivo, $predio, $RP2, $RP3, $RP4, $pendiente);
	}

	//Insertar solicitud zona rural
	if ($numexp && $predio && $consecutivo && $solicitante  && $zonarur && !$zonacp && !$actu)
	{
		if ($newunidad) {
			$ins->updunidest($idest,$newunidad);
		}
		$ins->inssol2($numexp, $solicitante, $consecutivo, $predio, $pendiente);
		$ins->insestrat($estratorur, $observacion, $usuario, $predio);
	}	

	#echo $numexp." ".$predio." ".$consecutivo." ".$solicitante." ".$zonacp." ".$usuario." ".$estrato." ".$observacion." ".$predio;
	//Insertar solicitud zona centro poblado
	if ($numexp && $predio && $consecutivo && $solicitante  && $zonacp && !$zonarur && !$actu)
	{
		if ($newunidad) {
			$ins->updunidest($idest,$newunidad);
		}
		$ins->inssol2($numexp, $solicitante, $consecutivo, $predio, $pendiente);
		$ins->insestrat($estrato, $observacion, $usuario, $predio);
	}

?>