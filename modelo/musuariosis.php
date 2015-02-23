<?php
include ("controlador/conexion.php");
class musuario{
	var $arr;
	
	function musuario(){}
	
	function cons($c)
	{
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	
	function insusu($numdocusu, $nomusu, $password, $perfil, $estado)
	{
		$sql = "INSERT INTO  tbusuario (numdocusu, nomusu, password, perfil, estado) values ('".$numdocusu."','".$nomusu."','".$password."','".$perfil."','".$estado."');";
		$this->cons($sql);
	}
	function updusu($numdocusu, $nomusu, $apeusu, $passusu, $perusu, $estusu)
	{
		$sql = "UPDATE tbusuario SET nomusu='".$nomusu."', password='".$passusu."', perfil='".$perusu."', estado='".$estusu."' WHERE numdocusu ='".$numdocusu."';";
		$this->cons($sql);
	}
	function updpass($numdocusu, $passusu)
	{
		$sql = "UPDATE tbusuario SET password='".$passusu."' WHERE numdocusu ='".$numdocusu."';";
		$this->cons($sql);
	}
	function selusu()
	{
		$sql = "SELECT us.numdocusu, us.nomusu, us.estado, p.nomperfil FROM tbusuario as us INNER JOIN tbperfil as p ON us.perfil=p.idperfil;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selusu1($numdocusu)
	{
		$sql = "SELECT us.nomusu, us.password, us.estado, p.nomperfil FROM tbusuario as us INNER JOIN tbperfil as p ON us.perfil=p.idperfil WHERE numdocusu = '".$numdocusu."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function delapre($numdocusu)
	{
		$sql =  "DELETE FROM tbusuario WHERE numdocusu='".$numdocusu."';";
		$this->cons($sql);
	}
    
    function selper(){
		$sql = "SELECT * FROM tbperfil;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>