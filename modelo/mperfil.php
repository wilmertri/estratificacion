<?php
include ("controlador/conexion.php");
class mperfil
{
	var $arr;
	function mperfil(){}
	
	function insper($nomper)
	{
		$sql = "INSERT INTO tbperfil (nomperfil) VALUES ('".$nomper."');";
		$this->cons($sql);
	}
	function delper($idper)
	{
		$sql = "DELETE FROM tbperfil WHERE idperfil='".$idper."';";
		$this->cons($sql);
	}
	function updper($idper, $nomper)
	{
		$sql = "UPDATE tbperfil SET nomperfil='".$nomper."' WHERE idperfil='".$idper."';";
		$this->cons($sql);
	}
	function cons($c)
	{
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	function selper(){
		$sql = "SELECT * FROM tbperfil;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selper1($idper){
		$sql = "SELECT * FROM tbperfil WHERE idperfil='".$idper."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>