<?php
	include("controlador/cperfil.php");
?>
<div class="forms1">
	<h1 class='page-header'>Registro perfil</h1>
	<form name"FormPer" method="POST" action="" id="formgen" onSubmit="return confirm('Por  favor primero  verifique  los datos ingresados  antes de hacer clic en  !aceptar!')">
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Nombre del perfil" class="control-label">Nombre del perfil:</label>
				<input name="nomper" type="text" class="form-control" required pattern="[A-Za-z]*">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<input type="submit" class="btn btn-primary" value="Ingresar">
			</div>
		</div>
	</form>
</div>		