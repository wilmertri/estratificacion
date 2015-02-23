<?php
include ("controlador/conexion.php");
class mtipuso
{
	var $arr;
	function mtipuso(){}
	
	function instipuso($nomtipuso, $obstipuso)
	{
		$sql = "INSERT INTO tbtipousopredio (tipousopredio, obstipusopredio) VALUES ('".$nomtipuso."','".$obstipuso."');";
		$this->cons($sql);
	}
	function deltipuso($idtipuso)
	{
		$sql = "DELETE FROM tbtipousopredio WHERE idtbtipousopredio='".$idtipuso."';";
		$this->cons($sql);
	}
	function updtipuso($idtipuso, $nomtipuso, $obstipuso)
	{
		$sql = "UPDATE tbtipousopredio SET tipousopredio='".$nomtipuso."', obstipusopredio = '".$obstipuso."' WHERE idtbtipousopredio='".$idtipuso."';";
		$this->cons($sql);
	}
	
	function cons($c)
	{
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function seltipuso()
	{
		$sql = "SELECT * FROM tbtipousopredio;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function seltipuso1($idtipuso)
	{
		$sql = "SELECT * FROM tbtipousopredio WHERE idtbtipousopredio='".$idtipuso."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>