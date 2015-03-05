<?php 
	include ("modelo/mestadi.php"); 
	$ins = new mestadi(); 

	$tipoestadi = isset($_POST['tipoestadi']) ? $_POST['tipoestadi']:NULL;
	$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
?>