<?php
	include("controlador/cestratifica.php");
?>
<div class="forms1">
	<h1 class='page-header'>Estratificar</h1>
	<form name="formconspred" method="POST" action="" id="formgen">
		<div class="row">
			<div class="form-group col-lg-3">	
				<label for="Estrato" class="control-label">Estrato: </label>
				<input name="numestrato" type="text" class="form-control" title="Se requiere un valor de estrato" required maxlength="1">
				<input name="predio" value="<?php echo $consdatsal[0]['predio']; ?>" type="hidden">
			</div>
			<div class="form-group col-lg-6">	
				<label for="Estrato" class="control-label">Observaciones: </label>
				<textarea rows="6" cols="50" name="observacion" title="Necesita una observación sobre la estratificación que realizara." required></textarea>
			</div>
			<div class="form-group">
				<div class="col-xs-12">
					<input type="submit" class="btn btn-primary" value="Generar estrato"> <a href="home.php?var=50" class="btn btn-primary">Volver</a>
				</div>
			</div>	
		</div>
	</form>
</div>
<div class="forms1">
	<div class="row">
<?php
	if ($numestrato) 
	{
		if ($valida==1) {
?>
	<div class="alert alert-success col-lg-6">
		Estratificación registrada con exito!<br>
		<a href="home.php?var=145&pr=<?php echo $pr;?>" class="alert-link">Anexar documentos</a>
	</div>
	<?php
		}
		else
		{
	?>
		<div class="alert alert-danger col-lg-6">
			Por favor verifique sus datos!
		</div>
	<?php		
		}
	}
?>
	</div>
</div>