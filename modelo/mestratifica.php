<?php
include ("controlador/conexion.php");
class mestratifica
{
	function mestratifica(){}

	function insestrat($numestrato, $observaciones, $usuario, $predio)
	{
		$sql = "INSERT INTO tbestrato(numestrato, observaciones, usuariomod, predio) values ('".$numestrato."','".$observaciones."','".$usuario."','".$predio."');";
		$this->cons($sql);
	}

	function insarch($nombrearchivo, $rutaserv, $extension, $perfilusu, $predio)
	{
		$sql = "INSERT INTO tbdocsanexos(nomdoc, dirdoc, extension, perfilusu, predio) values ('".$nombrearchivo."','".$rutaserv."','".$extension."','".$perfilusu."','".$predio."');";
		$this->cons($sql);
	}

	function updunidest($idestrato, $unidactu)
	{
		$sql = "UPDATE tbestrato SET unidactu='".$unidactu."' WHERE idestrato='".$idestrato."';";
		$this->cons($sql);
	}

	function delestrat($idestrato)
	{
		$sql = "DELETE FROM tbestrato WHERE idestrato='".$idestrato."';";
		$this->cons($sql);
	}
	function updestrat($idestrato, $numestrato, $observaciones, $usuario, $predio)
	{
		$sql = "UPDATE tbestrato SET numestrato='".$numestrato."', observaciones = '".$observaciones."', usuario = '".$usuario."', predio = '".$predio."' WHERE idestrato='".$idpredio."';";
		$this->cons($sql);
	}
	
	function updobs($idestrato, $observaciones)
	{
		$sql = "UPDATE tbestrato SET observaciones = '".$observaciones."' WHERE idestrato='".$idestrato."';";
		$this->cons($sql);
	}

	function selanexos()
	{
		$sql = "SELECT * FROM tbdocsanexos";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selanexos1($idpredio)
	{
		$sql = "SELECT * FROM tbdocsanexos WHERE predio='".$idpredio."' order by extension";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selanexos2($idpredio, $perusu)
	{
		$sql = "SELECT * FROM tbdocsanexos WHERE predio='".$idpredio."' AND perfilusu ='".$perusu."' order by extension";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selest()
	{
		$sql = "SELECT * FROM tbestrato";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selest1($idestrato)
	{
		$sql = "SELECT * FROM tbestrato WHERE idestrato='".$idestrato."'";
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
	function selunidest($idpredio)
	{
		$sql = "SELECT idestrato, unidactu FROM tbestrato WHERE predio = '".$idpredio."' ORDER BY idestrato DESC LIMIT 1";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function cons($c)
	{
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
}
?>