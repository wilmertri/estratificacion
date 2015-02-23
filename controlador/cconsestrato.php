<?php
	include ("modelo/mconsestrato.php"); 
	$ins = new mestrato();
	
	$codcas	= 	isset($_POST["codcas"]) ? $_POST["codcas"]:NULL;
	$cod	= 	isset($_POST["cod"]) ? $_POST["cod"]:NULL;
	
	$dat = $ins->selest1($codcas);
	$estrato = "";

	/*
		if ($dat1[0]['numestrato']==1) {
			$estrato = "UNO";
		}
		if ($dat1[0]['numestrato']==2) {
			$estrato = "DOS";
		}
		if ($dat1[0]['numestrato']==3) {
			$estrato = "TRES";
		}
		if ($dat1[0]['numestrato']==4) {
			$estrato = "CUATRO";
		}
		if ($dat1[0]['numestrato']==5) {
			$estrato = "CINCO";
		}
		if ($dat1[0]['numestrato']==6) {
			$estrato = "SEIS";
		}
	*/
		
	function valornum($est)
	{
		if ($est==1) {
			$estrato = "UNO";
		}
		if ($est==2) {
			$estrato = "DOS";
		}
		if ($est==3) {
			$estrato = "TRES";
		}
		if ($est==4) {
			$estrato = "CUATRO";
		}
		if ($est==5) {
			$estrato = "CINCO";
		}
		if ($est==6) {
			$estrato = "SEIS";
		}

		return $estrato;
	}

?>