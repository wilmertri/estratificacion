<?php
	include("controlador/cusuario.php");
?>
<div class="forms1">
	<h1 class='page-header'>Cambio de contraseña</h1>
	<form name="formconspred" method="POST" action="" id="formgen" onSubmit="">
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Contraseña actual" class="control-label">Contraseña actual: </label>
				<input name="passactu" type="password" class="form-control" title="Se requiere la contraseña actual"  maxlength="15" required>
				<input type="hidden" name="cambpass" value="cambio">
			</div>
		</div>
		<div class="row">	
			<div class="form-group col-lg-6">	
				<label for="Contraseña nueva" class="control-label">Nueva contraseña: </label>
				<input name="passnew" type="password" class="form-control" pattern=".{6,}" title="Se requiere la contraseña nueva de minimo 6 caracteres"  maxlength="15" required>
			</div>
		</div>
		<div class="row">	
			<div class="form-group col-lg-6">	
				<label for="Contraseña nueva" class="control-label">Repetir contraseña: </label>
				<input name="passnew2" type="password" class="form-control" pattern=".{6,}" title="Se requiere repetir la contraseña de minimo 6 caracteres"  maxlength="15" required>
			</div>
		</div>
		<div class="row">	
			<div class="form-group">
				<div class="col-xs-12 colbutton">
					<input type="submit" class="btn btn-primary" value="Cambiar contraseña">
					<a href="home.php?var=15" class="btn btn-primary">Volver</a>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="forms1">
	<div class="row">
<?php
	if ($passactu) 
	{
		if ($valid==1) {
?>
	<div class="alert alert-success col-lg-4">
		Contraseña cambiada con exito!
	</div>
	<?php
		}
		else
		{
	?>
		<div class="alert alert-danger col-lg-4">
			Por favor verifique sus datos!
		</div>
	<?php		
		}
	}
?>
	</div>
</div>