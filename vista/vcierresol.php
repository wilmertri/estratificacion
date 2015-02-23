<?php
	include("controlador/csolicitud.php");
?>
<div class="forms1">
	<h1 class='page-header'>Cierre de solicitud</h1>
	<form name="formconspred" method="POST" action="" id="formgen">
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Codigo catastral" class="control-label">Radicado de salida: </label>
				<input name="radsal" type="text" class="form-control">
				<input name="actu" value="actu" type="hidden">
			</div>
			<div class="form-group">
				<div class="col-xs-12">
					<input type="submit" class="btn btn-primary" value="Cerrar solicitud">
				</div>
			</div>	
		</div>
	</form>
	<span class="help-block">Indique por favor el número de radicado de salida para finalizar la solicitud.</span>
<?php
	if ($inf==1) 
	{
?>
	<div class="alert alert-success">Cierre Exitoso! <a href="home.php?var=130" class="alert-link">Regresar</a></div> 
<?php
	}
?>
</div>