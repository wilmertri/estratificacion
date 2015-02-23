<?php
	include("controlador/csolicitud.php");
?>
<div class="forms1">
	<h1 class='page-header'>Estratificar</h1>
	<h4> <strong> Código catastral: <?php echo $consdatsal[0]['codcas']; ?> </strong> </h4>
	<form name="formconspred" method="POST" action="home.php?var=130" id="formgen">
		<div class="row">
			<div class="form-group col-lg-3">	
				<label for="Estrato" class="control-label">Estrato: </label>
				<input name="numestrato" type="text" class="form-control">
				<input name="actu" value="actu" type="hidden">
				<input name="predio" value="<?php echo $consdatsal[0]['predio']; ?>" type="hidden">
				<input name="codcas" value="<?php echo $consdatsal[0]['codcas']; ?>" type="hidden">
				<input name="idsolicitud" value="<?php echo $pr; ?>" type="hidden">
			</div>
			<div class="form-group col-lg-6">	
				<label for="Estrato" class="control-label">Observaciones: </label>
				<textarea rows="6" cols="50" name="observacion"></textarea>
			</div>
			<div class="form-group">
				<div class="col-xs-12">
					<input type="submit" class="btn btn-primary" value="Cerrar solicitud">
				</div>
			</div>	
		</div>
	</form>
</div>
<table class="table">
		<thead>
			<tr>
				<th>No pregunta</th>
				<th>Pregunta</th>
				<th>Respuesta</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Pregunta 1</th>
				<td>Garajes</td>
				<td><?php echo $respuesta2; ?></td>
			</tr>
			<tr>
				<th>Pregunta 2</th>
				<td>Materiales de la fachada</td>
				<td><?php echo $respuesta3; ?></td>
			</tr>
			<tr>
				<th>Pregunta 3</th>
				<td>Materiales de la puerta principal</td>
				<td><?php echo $respuesta4; ?></td>
			</tr>
		</tbody>
	</table>