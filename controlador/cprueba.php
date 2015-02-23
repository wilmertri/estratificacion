<?php
	$fecestr	=	getdate();
	$fechahora		=	$fecestr['year'].'-'.$fecestr['mon'].'-'.$fecestr['mday'].' '.$fecestr['hours'].'-'.$fecestr['minutes'].'-'.$fecestr['seconds'];
	$fecha = $fecestr['year'].$fecestr['mon'].$fecestr['mday'];
	$hora = $fecestr['hours'].$fecestr['minutes'].$fecestr['seconds'];
	
	$contador = "";

	function consec($con,$fec){
		$pre1 = "0000";
		$pre2 = "000";
		$pre3 = "00";
		$pre4 = "0";

		if (strlen($con)==1) {
			$contador = $fec.$pre1.$con;
		}
		if (strlen($con)==2) {
			$contador = $fec.$pre2.$con;
		}
		if (strlen($con)==3) {
			$contador = $fec.$pre3.$con;
		}
		if (strlen($con)==4) {
			$contador = $fec.$pre4.$con;
		}
		if (strlen($con)==5) {
			$contador = $fec.$con;
		}
		return $contador;	
	}
	

?>