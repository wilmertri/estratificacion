<?php
include ("controlador/conexion.php");
class msolicitante
{
	function msolicitante(){}
	
	function inssol($numdoc, $nomsol, $telsol, $email)
	{
		$sql = "INSERT INTO tbsolicitante (documento, nombre, telefono, email) VALUES ('".$numdoc."','".$nomsol."','".$telsol."','".$email."');";
		$this->cons($sql);
	}
	function delsol($numdoc)
	{
		$sql = "DELETE FROM tbsolicitante WHERE documento='".$numdoc."';";
		$this->cons($sql);
	}
	function updsol($numdoc, $nomsol, $telsol, $email)
	{
		$sql = "UPDATE tbsolicitante SET nombre='".$nomsol."', telefono ='".$telsol."', email ='".$email."' WHERE documento='".$numdoc."';";
		$this->cons($sql);
	}
	function cons($c)
	{
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	function selsol(){
		$sql = "SELECT * FROM tbsolicitante;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selsol1($numdoc){
		$sql = "SELECT * FROM tbsolicitante WHERE documento='".$numdoc."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>