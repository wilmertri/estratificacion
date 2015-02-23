<?php
include ("controlador/conexion.php");
class mpredio
{
	var $arr;
	function mpredio(){}
	
	function inspred($codcas, $codcasnew, $dirpred, $areatotal, $areacons, $latitud, $longitud, $usoecono, $zonapot, $zonaubi, $vereda, $unidad)
	{
		$sql = "INSERT INTO tbpredio (codcas, codcasnue, dirpred, areatotal, areacons, latitud, longitud, fuenteinfo, usoeconopred, zonapot, zonaubi, vereda, unidad) VALUES ('".$codcas."','".$codcasnew."' , '".$dirpred."','".$areatotal."','".$areacons."','".$latitud."','".$longitud."','1','".$usoecono."','".$zonapot."','".$zonaubi."','".$vereda."','".$unidad."');";
		$this->cons($sql);
	}
	function delpred($idpredio)
	{
		$sql = "DELETE FROM tbpredio WHERE idpredio='".$idpredio."';";
		$this->cons($sql);
	}
	function updpred($codcas, $codcasnew, $dirprep, $areatotal, $areacons, $latitud, $longitud, $usoecono, $zonapot, $zonaubi, $vereda)
	{
		$sql = "UPDATE tbpredio SET codcas='".$codcas."', codcasnue = '".$codcasnew."', dirpred = '".$dirpred."', areatotal = '".$areatotal."', areacons ='".$areacons."', latitud = '".$latitud."', longitud = '".$longitud."', fuenteinfo = '".$fuenteinfo."', usoeconopred = '".$usoecono."', zonapot = '".$zonapot."', zonaubi = '".$zonaubi."', vereda = '".$vereda."' WHERE idpredio='".$idpredio."';";
		$this->cons($sql);
	}
	
	function updpred2($idpredio, $dirpred, $areacons)
	{
		$sql = "UPDATE tbpredio SET dirpred = '".$dirpred."', areacons ='".$areacons."' WHERE idpredio='".$idpredio."';";
		$this->cons($sql);
	}

	function cons($c)
	{
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}


	function selpred1($idpredio)
	{
		$sql = "SELECT * FROM tbpredio WHERE idpredio='".$idpredio."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selpred($codcas)
	{
		$sql = "SELECT pr.idpredio, pr.codcasnue, pr.dirpred, pr.areatotal, pr.areacons, pr.latitud, pr.longitud, pr.unidad, fi.fuenteinfo, ue.idusoeconopred, ue.usoeconopred, zp.zonapot, zu.zonaubi, v.nomver  FROM tbpredio as pr 
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
	function selestr($codcas)
	{
		$sql = "SELECT es.idestrato, es.numestrato, es.observaciones, es.fechamod, es.usuariomod, pr.unidad, us.nomusu FROM tbestrato as es 
					INNER JOIN tbpredio as pr ON es.predio=pr.idpredio
    				INNER JOIN tbusuario as us ON es.usuariomod=us.numdocusu
				WHERE pr.codcas='".$codcas."' ORDER BY pr.unidad;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selpredmax($codcas)
	{
		$sql = "SELECT MAX(idpredio), unidad FROM `tbpredio` WHERE codcas ='".$codcas."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selzonapot()
	{
		$sql = "SELECT * FROM tbzonapot;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function selzonaubi()
	{
		$sql = "SELECT * FROM tbzonaubi;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selusoecono()
	{
		$sql = "SELECT * FROM tbusoeconopred;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selvereda()
	{
		$sql = "SELECT * FROM tbvereda;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selfueninfo()
	{
		$sql = "SELECT * FROM tbfuenteinfo;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	

	
}
?>