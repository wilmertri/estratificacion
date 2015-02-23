<?php
include ("controlador/conexion.php");
class msolicitud{
	var $arr;
	
	function msolint(){}
	
	function cons($c)
	{
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	
	/*CREACIÓN DE SOLICITUD*/
	function inssol($fechasol, $radent, $solicitante, $predio, $codcons, $numfac, $usuario, $observacion)
	{
		$sql = "INSERT INTO  tbsolicitud (tiposol, fechasol, radent, solicitante, tipopago, predio, codcons, numfac, usuario, observacion) values ('1','".$fechasol."','".$radent."','".$solicitante."','1','".$predio."','".$codcons."','".$numfac."','".$usuario."','".$observacion."');";
		$this->cons($sql);
	}

	/*ACTUALIZAR UNIDAD DE ESTRATO */
	function updunidest($idestrato, $unidactu)
	{
		$sql = "UPDATE tbestrato SET unidactu='".$unidactu."' WHERE idestrato='".$idestrato."';";
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

	/* SELECCIÓN DE SOLICITUDES URBANISMO*/
	function selsol()
	{
		$sql = "SELECT  * FROM tbsolicitudinterna;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/* SELECCIÓN DE SOLICITUDES */
	function selsol2()
	{
		$sql = "SELECT sol.idsolicitud, sol.fechasol, sol.fechasal, sol.radent, sol.numfac, sol.observacion, sol.fecha_create, pr.codcas, soli.nombre, tipob.nomtipobs, usu.nomusu FROM tbsolicitud AS sol 
					INNER JOIN tbpredio as pr ON sol.predio=pr.idpredio
				    INNER JOIN tbsolicitante as soli ON sol.solicitante=soli.documento
				    INNER JOIN tbtipoobservacion as tipob ON sol.observacion=tipob.idtipoobs
				    INNER JOIN tbusuario as usu ON sol.usuario=usu.numdocusu;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	/* SELECCIÓN DE SOLICITUDES PENDIENTES URBABNISMO*/
	function selsolpendurb()
	{
		$sql = "SELECT  * FROM tbsolicitudinterna WHERE pendiente = 1;";
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
	/* SELECCIOÓN DE PREDIO POR CÓDIGO CATASTRAL*/
	function selpred1($codcas)
	{
		$sql = "SELECT pr.idpredio, pr.codcas, pr.codcasnue, pr.dirpred, pr.areatotal, pr.areacons, pr.latitud, pr.longitud, pr.unidad, fi.fuenteinfo, ue.idusoeconopred, ue.usoeconopred, zp.zonapot, zu.zonaubi, v.nomver, est.numestrato FROM tbpredio as pr 
					INNER JOIN tbfuenteinfo   as fi ON pr.fuenteinfo=fi.idfuenteinfo
				    INNER JOIN tbusoeconopred as ue ON pr.usoeconopred = ue.idusoeconopred
				    INNER JOIN tbzonapot      as zp ON pr.zonapot = zp.idzonapot
				    INNER JOIN tbzonaubi      as zu ON pr.zonaubi = zu.idzonaubi
				    INNER JOIN tbvereda       as v  ON pr.vereda  = v.idvereda
                    INNER JOIN tbestrato      as est ON pr.idpredio = est.predio
				WHERE pr.codcas = '".$codcas."' order by est.idestrato DESC LIMIT 1;;";
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

	/* SELECCIÓN DE DATOS FORMATO*/
	function seldat1($idsolicitud)
	{
		$sql = "SELECT pr.idpredio, pr.codcas, pr.dirpred, est.numestrato, sol.nombre FROM tbsolicitud as ts 
					INNER JOIN tbpredio as pr ON pr.idpredio=ts.predio 
					INNER JOIN tbestrato as est ON pr.idpredio=est.predio
    				INNER JOIN tbsolicitante as sol ON ts.solicitante=sol.documento 
				WHERE idsolicitud ='".$idsolicitud."';";
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

	/* SELECCIÓN DE DATOS ESTRATIFICACION*/
	function seldat2($idsolicitud)
	{
		$sql = "SELECT pr.codcas FROM tbsolicitud as ts 
					INNER JOIN tbpredio as pr ON pr.idpredio=ts.predio  
				WHERE idsolicitud ='".$idsolicitud."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/* SELECCIÓN DE DATOS ESTRATIFICACION*/
	function seldatint2($idsolicitud)
	{
		$sql = "SELECT ts.predio, pr.codcas, ts.RP1, ts.RP2, ts.RP3, ts.RP4 FROM tbsolicitudinterna as ts 
					INNER JOIN tbpredio as pr ON pr.idpredio=ts.predio  
				WHERE idsolint ='".$idsolicitud."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	/*ESTRATIFICAR*/
	function insestrat($numestrato, $observaciones, $usuario, $predio)
	{
		$sql = "INSERT INTO tbestrato(numestrato, observaciones, usuariomod, predio) values ('".$numestrato."','".$observaciones."','".$usuario."','".$predio."');";
		$this->cons($sql);
	}

	/*RESPONDER SOLICITUD URBANISMO*/
	function updsol3($idsolicitud, $pendiente)
	{
		$sql = "UPDATE tbsolicitudinterna SET pendiente='".$pendiente."' WHERE idsolint ='".$idsolicitud."';";
		$this->cons($sql);
	}
	
	//SELECCIONAR EL EMAIL DEL SOLICITANTE PARA ENVIAR CORREO ELECTRONICO
	function selsolemail($numdoc){
		$sql = "SELECT nombre,email FROM tbsolicitante WHERE documento='".$numdoc."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	//SELECCIONAR EL TIPO DE OBSERVACION
	function seltipobs()
	{
		$sql = "SELECT * FROM tbtipoobservacion;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>