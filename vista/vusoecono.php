<?php
	include("controlador/cmetod.php");
?>
<div class="forms1">
	<h1 class='page-header'>Registro uso economico de predio</h1>
	<form method="POST" action="" id="formgen" onSubmit="return confirm('Por  favor primero  verifique  los datos ingresados  antes de hacer clic en  !aceptar!')">
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Letra del uso economico" class="control-label">Letra del uso economico: </label>
				<input name="idusoecono" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label for="observacion de la zona" class="control-label">Descripción del uso economico: </label>
				<input name="usoecono" type="text" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-12">
				<input type="submit" class="btn btn-primary" value="Ingresar">
			</div>
		</div>
	</form>
</div>		