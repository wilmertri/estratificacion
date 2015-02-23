<?php
	
	$pre1 	= isset($_POST["pre1"]) ? $_POST["pre1"]:NULL;
	$pre2 	= isset($_POST["pre2"]) ? $_POST["pre2"]:NULL;
	$pre3 	= isset($_POST["pre3"]) ? $_POST["pre3"]:NULL;
	$pre4 	= isset($_POST["pre4"]) ? $_POST["pre4"]:NULL;
	$pre5 	= isset($_POST["pre5"]) ? $_POST["pre5"]:NULL;
	$pre6 	= isset($_POST["pre6"]) ? $_POST["pre6"]:NULL;
	$pre7 	= isset($_POST["pre7"]) ? $_POST["pre7"]:NULL;
	$pre8 	= isset($_POST["pre8"]) ? $_POST["pre8"]:NULL;
	$pre9 	= isset($_POST["pre9"]) ? $_POST["pre9"]:NULL;
	$pre10 	= isset($_POST["pre10"]) ? $_POST["pre10"]:NULL;
	$pre11 	= isset($_POST["pre11"]) ? $_POST["pre11"]:NULL;
	$pre12	= isset($_POST["pre12"]) ? $_POST["pre12"]:NULL;
	$pre13 	= isset($_POST["pre13"]) ? $_POST["pre13"]:NULL;
	$pre14 	= isset($_POST["pre14"]) ? $_POST["pre14"]:NULL;
	$pre15 	= isset($_POST["pre15"]) ? $_POST["pre15"]:NULL;
	$pre16	= isset($_POST["pre16"]) ? $_POST["pre16"]:NULL;
	
	$estrato = 0;
	$estletra = "";

	$suma = $pre1 + $pre2 + $pre3 + $pre4 + $pre5 + $pre6 + $pre7 + $pre8 + $pre9 + $pre10 + $pre11 + $pre12 + $pre13 + $pre14 + $pre15 + $pre16;
	if ($suma>0) {
		if ($suma<25) {
			$estrato = 1;
			$estletra = "UNO";
		}
		else if ($suma<32) {
			$estrato = 2;
			$estletra = "DOS";
		}
		else if ($suma<44){
			$estrato = 3;
			$estletra = "TRES";
		}
		else if ($suma<54){
			$estrato = 4;
			$estletra = "CUATRO";
		}
		else if ($suma<70){
			$estrato = 5;
			$estletra = "CINCO";
		}
		else{
			$estrato = 6;
			$estletra = "SEIS";	
		}
	}
	
?>