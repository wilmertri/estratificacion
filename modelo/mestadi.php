<?php
include ("controlador/conexion.php");
class mestadi
{
	function mestadi(){}
	
	function selestr1()
	{
		$sql = "SELECT * FROM tbestrato";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selest1($codcas)
	{
		$sql1 = "SELECT pr.idpredio, pr.codcas, pr.dirpred, est.numestrato, est.predio, pr.latitud, pr.longitud FROM tbpredio as pr INNER JOIN tbestrato as est ON pr.idpredio=est.predio WHERE pr.codcas = '".$codcas."' AND est.numestrato BETWEEN 1 AND 6 ORDER BY `idestrato` DESC LIMIT 0,1;";
		$sql = "SELECT * FROM `estratificacion` WHERE codigocatastral='".$codcas."' AND estrato BETWEEN 1 AND 6 ORDER BY `idestrato` DESC LIMIT 0,1";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql1,0);
		return $data;
	}
	function selestver1()
	{
		$sql1 = "SELECT tbe.numestrato, v.nomver, count(*) as Estrato_1 FROM tbestrato as tbe 
					INNER JOIN tbpredio as pr on pr.idpredio=tbe.predio 
					INNER JOIN tbvereda as v on pr.vereda=v.idvereda 
				WHERE tbe.unidactu = 1 and tbe.numestrato = 1 GROUP BY pr.vereda;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql1,0);
		return $data;
	}
	function selestver2()
	{
		$sql1 = "SELECT tbe.numestrato, v.nomver, count(*) as Estrato_2 FROM tbestrato as tbe 
					INNER JOIN tbpredio as pr on pr.idpredio=tbe.predio 
					INNER JOIN tbvereda as v on pr.vereda=v.idvereda 
				WHERE tbe.unidactu = 1 and tbe.numestrato = 2 GROUP BY pr.vereda;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql1,0);
		return $data;
	}
	function selestver3()
	{
		$sql1 = "SELECT tbe.numestrato, v.nomver, count(*) as Estrato_3 FROM tbestrato as tbe 
					INNER JOIN tbpredio as pr on pr.idpredio=tbe.predio 
					INNER JOIN tbvereda as v on pr.vereda=v.idvereda 
				WHERE tbe.unidactu = 1 and tbe.numestrato = 3 GROUP BY pr.vereda;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql1,0);
		return $data;
	}
	function selestver4()
	{
		$sql1 = "SELECT tbe.numestrato, v.nomver, count(*) as Estrato_4 FROM tbestrato as tbe 
					INNER JOIN tbpredio as pr on pr.idpredio=tbe.predio 
					INNER JOIN tbvereda as v on pr.vereda=v.idvereda 
				WHERE tbe.unidactu = 1 and tbe.numestrato = 4 GROUP BY pr.vereda;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql1,0);
		return $data;
	}
	function selestver5()
	{
		$sql1 = "SELECT tbe.numestrato, v.nomver, count(*) as Estrato_5 FROM tbestrato as tbe 
					INNER JOIN tbpredio as pr on pr.idpredio=tbe.predio 
					INNER JOIN tbvereda as v on pr.vereda=v.idvereda 
				WHERE tbe.unidactu = 1 and tbe.numestrato = 5 GROUP BY pr.vereda;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql1,0);
		return $data;
	}
	function selestver6()
	{
		$sql1 = "SELECT tbe.numestrato, v.nomver, count(*) as Estrato_6 FROM tbestrato as tbe 
					INNER JOIN tbpredio as pr on pr.idpredio=tbe.predio 
					INNER JOIN tbvereda as v on pr.vereda=v.idvereda 
				WHERE tbe.unidactu = 1 and tbe.numestrato = 6 GROUP BY pr.vereda;";
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
	function seldesc()
	{
		$sql = "SELECT  des.fecha_desc, sol.radent FROM tbdescargas as des 
					INNER JOIN tbsolicitud as sol ON des.solicitud = sol.idsolicitud;";
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