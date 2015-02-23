<?php
	include("controlador/cpredio.php");
?>
<div class="forms1">
	<h1 class='page-header'>Editar predio</h1>
	<form name="formconspred" method="POST" action="" id="formgen" onSubmit="">
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Codigo catastral" class="control-label">Codigo catastral: </label>
				<input name="codcas" type="text" class="form-control" value="<?php echo $det[0]['codcas']; ?>" disabled>
				<input name="idpredio" type="hidden" value="<?php echo $det[0]['idpredio']; ?>">
				<input name="actu" type="hidden" value="actu">
			</div>
			<div class="form-group col-lg-6">	
				<label for="Codigo catastral" class="control-label">Dirección: </label>
				<input name="dirpred" type="text" class="form-control" value="<?php echo $det[0]['dirpred']; ?>">
			</div>
			<div class="form-group col-lg-6">	
				<label for="Area construida" class="control-label">Área construida: (m<sup>2</sup>)</label>
				<input name="areacons" type="text" class="form-control" value="<?php echo $det[0]['areacons']; ?>">
			</div>
			<div class="form-group">
				<div class="col-xs-12 colbutton">
					<input type="submit" class="btn btn-primary" value="Guardar cambios">
					<a href="home.php" class="btn btn-primary">Salir</a>
				</div>
			</div>	
		</div>
	</form>
	<br><br>
	<?php if ($actu) { ?>
	<table class="table">
		<thead>
			<tr>
				<th colspan="3">Cambios realizados</th>
			</tr>
			<tr>
				<th>Código catastral</th>
				<th>Dirección</th>
				<th>Área construida</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $det[0]['codcas']; ?></td>
				<td><?php echo $dirpred; ?></td>
				<td><?php echo $areacons; ?></td>
			</tr>
		</tbody>
	</table>
	<?php } ?>
</div>