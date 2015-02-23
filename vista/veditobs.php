<?php
	include("controlador/cestratifica.php");
?>
<div class="forms1">
	<h1 class='page-header'>Editar Observación</h1>
	<form name="formconspred" method="POST" action="" id="formgen">
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Estrato" class="control-label">Observaciones: </label>
				<textarea rows="6" cols="45" name="observacion" title="Necesita una observación sobre la estratificación que realizara." required></textarea>
				<input type="hidden" name="actu" value="actu" />
				<input type="hidden" name="idestrato" value="<?php echo $consobs[0]['idestrato']; ?>" />
			</div>
			<?php $obs = $ins->selest1($pr); ?>
			<div class="form-group col-lg-6">	
				<label for="Estrato" class="control-label">Observacion actual: </label>
				<label name="observacion"><?php echo $obs[0]['observaciones']; ?> </label>
			</div>
			<div class="form-group">
				<div class="col-xs-12">
					<input type="submit" class="btn btn-primary" value="Actualizar"> <a href="home.php?var=50" class="btn btn-primary">Volver</a>
				</div>
			</div>	
		</div>
	</form>
</div>
