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
	$estrato = 0;
	$estletra = "";

	$suma = $pre1 + $pre2 + $pre3 + $pre4 + $pre5 + $pre6 + $pre7 + $pre8 + $pre9 + $pre10 + $pre11 + $pre12;
	if ($suma>0) {
		if ($suma<25) {
			$estrato = 1;
			$estletra = "UNO";
		}
		else if ($suma<32) {
			$estrato = 2;
			$estletra = "DOS";
		}
		else{
			$estrato = 3;
			$estletra = "TRES";
		}
	}
	
?>