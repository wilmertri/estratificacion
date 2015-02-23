<?php
	include("controlador/cconsestrato.php");
?>
	<form name="FormPer" method="POST" action="" id="formu">
		<div class="form-group"> 
			<h2>Consulta Estrato</h2>
		</div>
		<div class="form-group">		
			<label for="Codigo catastral" class="control-label">Por favor ingrese su cédula catastral: </label>
			<input name="codcas" type="text" class="form-control"><br>
			<label for="Informacion" class="control-label">Ejemplo: 000000044458000</label>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Consultar">
		</div>
	</form>
	<?php
		if ($codcas) 
		{
			if($dat)
			{
	?> 
				<table class="table">
					<thead>
						<tr>
							<th colspan="4">Resultado de busqueda</th>
						</tr>
						<tr>
							<th>Código catastral</th>
							<th>Dirección</th>
							<th>Estrato</th>	
							<th>Fecha asignación</th>
							<th>Unidad de predio</th>
						</tr>
					</thead>
					<?php
						for ($i=0; $i <count($dat) ; $i++) {
					?>
					<tr>
						<td><?php echo $dat[$i]['codcas']; ?></td>
						<td><?php echo $dat[$i]['dirpred']; ?></td>
						<td><?php echo "(".valornum($dat[$i]['numestrato']).") ".$dat[$i]['numestrato']; ?></td>
						<td><?php echo substr($dat[$i]['fechamod'],0,-9); ?></td>
						<td><?php echo $dat[$i]['unidad']; ?></td>
					</tr>
					<?php
						}
					?>
				</table>
	<?php
			}
			else
			{
	?>
				<table class="table">
					<thead>
						<tr>
							<th colspan="2">Resultado de busqueda</th>
						</tr>
					</thead>
					<tr>
						<td colspan="2">Codigo catastral no encontrado en base de datos.</td>
					</tr>
				</table>		
	<?php		
			}
		}
	?>