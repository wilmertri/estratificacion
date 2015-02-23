<?php
include ("../controlador/conexion.php");
class msolint{
	
	function msolint(){}
	
	function cons($c)
	{
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	
	/*CREACIÓN DE SOLICITUD*/
	function inssol($fechasol, $radent, $solicitante, $predio, $codcons, $numfac, $usuario)
	{
		$sql = "INSERT INTO  tbsolicitud (tiposol, fechasol, radent, solicitante, tipopago, predio, codcons, numfac, usuario) values ('1','".$fechasol."','".$radent."','".$solicitante."','1','".$predio."','".$codcons."','".$numfac."','".$usuario."');";
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

	/* CIERRE DE SOLICITUD */
	function updsol2($idsolicitud, $radsal, $fecha)
	{
		$sql = "UPDATE tbsolicitud SET radsal='".$radsal."', fechasal='".$fecha."' WHERE idsolicitud ='".$idsolicitud."';";
		$this->cons($sql);
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
		$sql = "SELECT MAX(idsolicitud) AS solmax FROM tbsolicitud;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/* SELECCIÓN DE SOLICITUDES */
	function selsol()
	{
		$sql = "SELECT  * FROM tbsolicitudinterna;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	/* SELECCIÓN DE SOLICITUD PENDIENTES DE CIERRE*/
	function selsolpend()
	{
		$sql = "SELECT * FROM tbsolicitud WHERE fechasal IS NULL;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	/* SELECCIÓN DE PREDIOS */
	function selpred()
	{
		$sql = "SELECT  * FROM tbpredio;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	/* SELECCIÓN DE PREDIO POR CÓDIGO CATASTRAL*/
	function selpred1($codcas)
	{
		$sql = "SELECT * FROM tbpredio WHERE codcas='".$codcas."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/* SELECCIÓN DE PREDIO POR ID*/
	function selpred2($idpredio)
	{
		$sql = "SELECT * FROM tbpredio WHERE idpredio='".$idpredio."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/* SELECCIÓN DE DATOS FORMATO SOLICITUD EXTERNA*/
	function seldat1($idsolicitud)
	{
		$sql = "SELECT ts.radent, ts.fechasol, ts.codcons, pr.codcas, pr.codcasnue, pr.dirpred, pr.zonaubi, est.numestrato, est.observaciones, zu.decretoestra, sol.nombre, sol.telefono, tip.nomtipobs FROM tbsolicitud as ts 
					INNER JOIN tbpredio 			as pr ON pr.idpredio=ts.predio 
					INNER JOIN tbestrato 			as est ON pr.idpredio=est.predio
					INNER JOIN tbzonaubi 			as zu ON pr.zonaubi=zu.idzonaubi
					INNER JOIN tbsolicitante 		as sol ON ts.solicitante=sol.documento
					INNER JOIN tbtipoobservacion 	as tip ON ts.observacion=tip.idtipoobs
				WHERE idsolicitud ='".$idsolicitud."' ORDER BY est.idestrato DESC LIMIT 1;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/* SELECCIÓN DE DATOS FORMATO SOLICITUD INTERNA*/
	function seldat2($idsolicitud)
	{
		$sql = "SELECT pr.codcas, pr.dirpred, est.numestrato, est.idestrato, ts.fechasol, ts.noexp FROM tbsolicitudinterna as ts 
					INNER JOIN tbpredio as pr ON pr.idpredio=ts.predio 
					INNER JOIN tbestrato as est ON pr.idpredio=est.predio
				WHERE idsolint ='".$idsolicitud."' order by est.idestrato desc limit 1";
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

	/* SELECCIÓN DE SOLICITANTE */
	function selsoli($documento)
	{
		$sql = "SELECT * FROM tbsolicitante WHERE documento='".$documento."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/* SELECCIÓN DE USO ECONOMICO */
	function selusoeco($idusoeco)
	{
		$sql = "SELECT * FROM tbusoeconopred WHERE idusoeconopred='".$idusoeco."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/* SELECCIÓN DE ZONA POT */
	function selzonapot($idzonapot)
	{
		$sql = "SELECT * FROM tbzonapot WHERE idzonapot='".$idzonapot."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/* SELECCIÓN DE ZONA DE UBICACIÓN */
	function selzonaubi($idzonaubi)
	{
		$sql = "SELECT * FROM tbzonaubi WHERE idzonaubi='".$idzonaubi."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/* SELECCIÓN DE LA VEREDA */
	function selvereda($idvereda)
	{
		$sql = "SELECT * FROM tbvereda WHERE idvereda='".$idvereda."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>