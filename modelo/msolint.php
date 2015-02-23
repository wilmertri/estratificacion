<?php
include ("controlador/conexion.php");
class msolint{
	
	function msolint(){}
	
	function cons($c)
	{
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	
	/*CREACIÓN DE SOLICITUD*/
	function inssol($numexp, $solicitante, $consec, $predio, $RP2, $RP3, $RP4, $pendiente)
	{
		$sql = "INSERT INTO  tbsolicitudinterna (noexp, solicitante, consec, predio, RP2, RP3, RP4, pendiente) values ('".$numexp."','".$solicitante."','".$consec."','".$predio."','".$RP2."','".$RP3."','".$RP4."','".$pendiente."');";
		$this->cons($sql);
	}
	/*CREACIÓN DE SOLICITUD 2*/
	function inssol2($numexp, $solicitante, $consec, $predio, $pendiente)
	{
		$sql = "INSERT INTO  tbsolicitudinterna (noexp, solicitante, consec, predio, pendiente) values ('".$numexp."','".$solicitante."','".$consec."','".$predio."','".$pendiente."');";
		$this->cons($sql);
	}
	/*ACTUALIZAR UNIDAD DE ACTUALIZACION */
	function updunidest($idestrato, $unidactu)
	{
		$sql = "UPDATE tbestrato SET unidactu='".$unidactu."' WHERE idestrato='".$idestrato."';";
		$this->cons($sql);
	}

	/* MODIFICACIÓN DE PREDIO */
	function modpred()
	{
		$sql = "UPDATE tbpredio SET codcas='".$codcas."', codcasnue = '".$codcasnew."', dirpred = '".$dirpred."', areatotal = '".$areatotal."', areacons ='".$areacons."', latitud = '".$latitud."', longitud = '".$longitud."', fuenteinfo = '".$fuenteinfo."', usoeconopred = '".$usoecono."', zonapot = '".$zonapot."', zonaubi = '".$zonaubi."', vereda = '".$vereda."' WHERE idpredio='".$idpredio."';";
	}
	
	/* MODIFICACIÓN DE SOLICITUD */
	function updsol($idsolint, $numexp, $consec, $fecha, $predio)
	{
		$sql = "UPDATE tbsolicitudinterna SET noexp='".$nomusu."', consec='".$consec."', fechasol='".$fecha.", predio ='".$predio."' WHERE idsolint ='".$idsolint."';";
		$this->cons($sql);
	}
	
	//UNIDAD DE ACTUALIZACION
	function selunidest($idpredio)
	{
		$sql = "SELECT idestrato, unidactu FROM tbestrato WHERE predio = '".$idpredio."' ORDER BY idestrato DESC LIMIT 1";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/* SELECCIÓN DE SOLICITUD */
	function selsol1($idsolint)
	{
		$sql = "SELECT  * FROM tbsolicitudinterna WHERE idsolint = '".$idsolint."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
    
    /* SELECCIÓN DE SOLICITUD MAXIMA */
	function selsolmax()
	{
		$sql = "SELECT MAX(idsolint) AS solmax FROM tbsolicitudinterna;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selsol()
	{
		$sql = "SELECT  * FROM tbsolicitudinterna;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function selpred1($codcas)
	{
		$sql = "SELECT pr.idpredio, pr.codcas, pr.codcasnue, pr.dirpred, pr.areatotal, pr.areacons, pr.latitud, pr.longitud, pr.unidad, fi.fuenteinfo, ue.idusoeconopred, ue.usoeconopred, zp.zonapot, zu.idzonaubi, zu.zonaubi, v.nomver  FROM tbpredio as pr 
					INNER JOIN tbfuenteinfo   as fi ON pr.fuenteinfo=fi.idfuenteinfo
				    INNER JOIN tbusoeconopred as ue ON pr.usoeconopred = ue.idusoeconopred
				    INNER JOIN tbzonapot      as zp ON pr.zonapot = zp.idzonapot
				    INNER JOIN tbzonaubi      as zu ON pr.zonaubi = zu.idzonaubi
				    INNER JOIN tbvereda       as v  ON pr.vereda  = v.idvereda
				WHERE pr.codcas = '".$codcas."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/*SELECCIÓN DE ESTRATO POR CODIGO CATASTRAL*/
    function selest1($codcas)
	{
		$sql1 = "SELECT pr.idpredio, pr.codcas, pr.dirpred, est.numestrato, est.predio FROM tbpredio as pr INNER JOIN tbestrato as est ON pr.idpredio=est.predio WHERE pr.codcas = '".$codcas."' AND est.numestrato BETWEEN 1 AND 6;";
		$sql = "SELECT * FROM `estratificacion` WHERE codigocatastral='".$codcas."' AND estrato BETWEEN 1 AND 6 ORDER BY `idestrato` DESC LIMIT 0,1";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql1,0);
		return $data;
	}

	/*ESTRATIFICAR*/
	function insestrat($numestrato, $observaciones, $usuario, $predio)
	{
		$sql = "INSERT INTO tbestrato(numestrato, observaciones, usuariomod, predio) values ('".$numestrato."','".$observaciones."','".$usuario."','".$predio."');";
		$this->cons($sql);
	}
	
	/* SELECCIÓN DE SOLICITUDES PENDIENTES URBABNISMO*/
	function selsollist()
	{
		$sql = "SELECT  ts.idsolint, ts.noexp, ts.solicitante, ts.fechasol, ts.consec, ts.pendiente, us.nomusu, pr.codcas, pr.idpredio  FROM tbsolicitudinterna as ts 
					INNER JOIN tbpredio as pr ON ts.predio=pr.idpredio
					INNER JOIN tbusuario as us ON ts.solicitante=us.numdocusu 
				ORDER BY idsolint asc;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>