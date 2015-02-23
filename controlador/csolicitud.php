<?php
	include ("modelo/msolicitud.php");

	$ins = new msolicitud();
	
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
	$fecha2			= isset($_POST["fecha"]) ? $_POST["fecha"]:NULL;
	$hora2			= isset($_POST["hora"]) ? $_POST["hora"]:NULL;
	$fechahora2		= $fecha2.' '.$hora2;
	$observacion	= isset($_POST["observacion"]) ? $_POST["observacion"]:NULL;
	$observacion	= ucfirst(strtolower($observacion));
	$numestrato		= isset($_POST["numestrato"]) ? $_POST["numestrato"]:NULL;
	$pendiente 		= 2;
	$contador 		= "";
	$inf=0;

	
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	
	$conspred 		= $ins->selpred1($codcas);	
	$conspredios 	= $ins->selpred();
	$consestra 		= $ins->selest1($codcas);
	$conssol 		= $ins->selsol1($idsolicitud);
	$conssolmax		= $ins->selsolmax();
	$consdoc 		= $ins->selest1($codcas);
	$conssoli		= $ins->selsoli($documento);
	$consdat		= $ins->seldat1($idsolicitud);
	$consesta		= $ins->seldat2($pr);
	$consdatsal		= $ins->seldatint2($pr);
	$email			= $ins->selsolemail($solicitante);

	//echo "Email: ".$email[0]['email']." de: ".$solicitante;
	
	$unidadactu = $ins->selunidest($conspred[0]['idpredio']);

	//echo "Código catastral: ".$codcas;
	
	if ($unidadactu) 
	{
		$idest = $unidadactu[0]['idestrato'];
		$newunidad = $unidadactu[0]['unidactu'] + 1;
	}

	//$RP1 = $consdatsal[0]['RP1'];
	$RP2 = $consdatsal[0]['RP2'];
	$RP3 = $consdatsal[0]['RP3'];
	$RP4 = $consdatsal[0]['RP4'];

	/*
	if ($RP1==1) 
	{
		$respuesta1 = "Sin antejardin";	
	}
	if ($RP1==2) 
	{
		$respuesta1 = "Con antejardin pequeño";	
	}
	if ($RP1==3) 
	{
		$respuesta1 = "Con antejardin mediano";	
	}
	if ($RP1==4) 
	{
		$respuesta1 = "Con antejardin grande";	
	}
	*/
	if ($RP2==1) 
	{
		$respuesta2 = "Sin garaje ni parqueadero";	
	}
	if ($RP2==2) 
	{
		$respuesta2 = "Con garaje cubierto usado para otros fines";	
	}
	if ($RP2==3) 
	{
		$respuesta2 = "Con garaje adicional a la viivenda";	
	}
	if ($RP2==4) 
	{
		$respuesta2 = "Garaje sencillo que hace parte del diseño";	
	}
	if ($RP3==1) 
	{
		$respuesta3 = "Guadua, caña esterilla, tabla";	
	}
	if ($RP3==2) 
	{
		$respuesta3 = "En revoque, (pañete, repello) sin pintura";	
	}
	if ($RP3==3) 
	{
		$respuesta3 = "En revoque, (pañete, repello) con pintura";	
	}
	if ($RP3==4) 
	{
		$respuesta3 = "Con enchape en ladrillo pulido o madera";	
	}
	if ($RP4==1) 
	{
		$respuesta4 = "Tabla, Esterilla";	
	}
	if ($RP4==2) 
	{
		$respuesta4 = "Madera pulida, lamina metalica, aluminio";	
	}
	if ($RP4==3) 
	{
		$respuesta4 = "Madera fina tallada o en vidrio";	
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
	

	if ($conspred[0]['numestrato']==1) 
	{
		$estrato = "UNO";
	}
	if ($conspred[0]['numestrato']==2) 
	{
		$estrato = "DOS";
	}
	if ($conspred[0]['numestrato']==3) 
	{
		$estrato = "TRES";
	}
	if ($conspred[0]['numestrato']==4) 
	{
		$estrato = "CUATRO";
	}
	if ($conspred[0]['numestrato']==5) 
	{
		$estrato = "CINCO";
	}
	if ($conspred[0]['numestrato']==6) 
	{
		$estrato = "SEIS";
	}
	if ($conspred[0]['numestrato']==9) 
	{
		$estrato = "NO APLICA";
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
	if ($radent && $solicitante && $predio && $numfac && $fechahora2 && !$actu)
	{
		$ins->inssol($fechahora2, $radent, $solicitante, $predio, $consecutivo, $numfac, $usuario, $observacion);
		if ($email) 
		{
			$email_from	= "estratificacion@chia.gov.co";
			$email_to 	= $email[0]['email'];
			$message = '
			<html>
			<head>
			  <title>Respuesta a Solicitud de Constancia de Estrato Socio-económico</title>
			</head>
			<body>
			  <h3>Respuesta a solicitud de constancia de estrato socio-económico</h3>
			  <p>Señor(a): '.$email[0]['nombre'].'</p>
			  <p>
			  	Su solicitud con numero de radicación: <strong>'.$radent.'</strong> ha sido tramitada con exito, por favor ingrese al siguiente enlace para descargar su constancia:
			  	<a href="http://186.155.252.75:8080/estratificacionweb/home.php">Descarga de constancia</a>
			  </p>
			  <p>
			  	Alcaldia Municipal de chia<br>
				Dirección de Planificación del Desarrollo<br>
			  	Secretaría de planeación<br>
			  </p>		
			</body>
			</html>
			';
			$subject   = "Respuesta de solicitud de constancia de estrato";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'From: ' .$email_from . "\r\n".  
		  				'X-Mailer: PHP/' . phpversion();
			$correo = mail($email_to, $subject, $message, $headers);
			if ($correo) {
		 		echo "<strong>OK.. EMAIL ENVIADO...</strong>";
			} 
		}
	}

	//Cerrar solicitud
	if ($radsal && $fechahora && $actu)
	{
		$ins->updsol2($pr, $radsal, $fechahora);
		$inf=1;
	}
	//Insertar estrato y actualizar solicitud Zona rural
	if ($numestrato && $observacion && $usuario && $predio && $idsolicitud && $pendiente && $actu)
	{
		if ($newunidad) {
			$ins->updunidest($idest,$newunidad);
		}
		$ins->insestrat($numestrato, $observacion, $usuario, $predio);
		$ins->updsol3($idsolicitud,$pendiente);
	}


?>