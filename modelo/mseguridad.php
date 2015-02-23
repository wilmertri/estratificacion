<?php
	session_start();
	$autenticado = isset($_SESSION['autenticado']) ? $_SESSION['autenticado']:NULL;
	
	//Comprobar que el usuario este autenticado
	if($autenticado != 10)
	{
		session_destroy();
		header("Location: index.php");
		exit();
	}
?>