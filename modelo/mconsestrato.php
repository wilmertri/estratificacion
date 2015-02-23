<?php
include ("controlador/conexion.php");
class mestrato
{
	var $arr;
	function mestrato(){}
	
	function selest()
	{
		$sql = "SELECT * FROM tbestrato";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selest1($codcas)
	{
		$sql1 = "SELECT pr.idpredio, pr.codcas, pr.dirpred, pr.unidad, est.numestrato, est.fechamod, est.predio FROM tbpredio as pr INNER JOIN tbestrato as est ON pr.idpredio=est.predio WHERE pr.codcas = '".$codcas."' AND est.numestrato BETWEEN 1 AND 6 ORDER BY pr.unidad, est.idestrato DESC;";
		$sql = "SELECT * FROM `estratificacion` WHERE codigocatastral='".$codcas."' AND estrato BETWEEN 1 AND 6 ORDER BY `idestrato` DESC LIMIT 0,1";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql1,0);
		return $data;
	}
	function inscont($estrato)
	{
		$sql = "INSERT INTO tbconteo (estrato) VALUES ('".$estrato."');";
		$this->cons($sql);
	}
}
?>