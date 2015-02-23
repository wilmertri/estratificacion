<?php
	include("controlador/cpredio.php");
?>
<div class="forms1">
	<h1 class='page-header'>Consultar predio</h1>
	<form name="formconspred" method="POST" action="" id="formgen" onSubmit="">
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Codigo catastral" class="control-label">Codigo catastral: </label>
				<input name="codcas" type="text" class="form-control" pattern="[0-9]{15}" title="La cédula catastral se compone de 15 digitos numericos" autocomplete="off" required maxlength="15">
			</div>
			<div class="form-group">
				<div class="col-xs-12 colbutton">
					<input type="submit" class="btn btn-primary" value="Consultar">
				</div>
			</div>	
		</div>
	</form>
	<?php
	if ($codcas) {
		if ($conspred) {
	?>
		<br>
		<table class="table">
			<?php
				for ($i=0; $i <count($conspred) ; $i++) { 
			?>
			<thead>
				<th colspan="4">DATOS DEL PREDIO UNIDAD <?php echo $conspred[$i]['unidad']; ?></th>
			</thead>
			<tr>
				<td>Codigo catastral:</td>
				<td><strong><?php echo $codcas; ?></strong></td>
				<td>Codigo catastral nuevo:</td>
				<td><strong><?php echo $conspred[$i]['codcasnue']; ?></strong></td>
			</tr>
			<tr>
				<td>Dirección:</td>
				<td><strong><?php echo $conspred[$i]['dirpred']; ?></strong></td>
				<td>Vereda:</td>
				<td><strong><?php echo $conspred[$i]['nomver']; ?></strong></td>
			</tr>
			<tr>
				<td>Area total:</td>
				<td><strong><?php echo $conspred[$i]['areatotal']; ?> m<sup>2</sup></strong></td>
				<td>Area construida:</td>
				<td><strong><?php echo $conspred[$i]['areacons']; ?> m<sup>2</sup></strong></td>
			</tr>
			<tr>
				<td>Latitud:</td>
				<td><strong><?php echo $conspred[$i]['latitud']; ?></strong></td>
				<td>Longitud:</td>
				<td><strong><?php echo $conspred[$i]['longitud']; ?></strong></td>
			</tr>
			<tr>
				<td>Uso economico:</td>
				<td><strong><?php echo $conspred[$i]['usoeconopred']; ?></strong></td>
				<td>Fuente de información:</td>
				<td><strong><?php echo $conspred[$i]['fuenteinfo']; ?></strong></td>
			</tr>
			<tr>
				<td>Zona POT:</td>
				<td><strong><?php echo $conspred[$i]['zonapot']; ?></strong></td>
				<td>Zona ubicación:</td>
				<td><strong><?php echo $conspred[$i]['zonaubi']; ?></strong></td>
			</tr>
			<tr>
				<?php
					if ($perusu==1 || $perusu==4) 
					{   
				?>
				<td><a href="home.php?var=55&pr=<?php echo $conspred[$i]['idpredio']; ?>" class="btn btn-primary">Estratificar</a></td>
				<td><a href="home.php?var=45&pr=<?php echo $conspred[$i]['idpredio']; ?>" class="btn btn-primary">Editar</a></td>
				<td><a href="home.php?var=145&pr=<?php echo $conspred[$i]['idpredio']; ?>" class="btn btn-primary">Documentos</a></td>
				<?php
					} 
				?>
				<td> <a href="home.php" class="btn btn-primary">Salir</a></td>
			</tr>
			<?php
			}
			?>
		</table>
		<table class="table">
			<?php
				for ($i=0; $i <count($consestr) ; $i++) { 
			?>
			<thead>
				<th colspan="4">ESTRATIFICACIÓN UNIDAD <?php echo $consestr[$i]['unidad']; ?></th>
			</thead>
			<tr>
				<td>Estrato:</td>
				<td><strong><?php echo $consestr[$i]['numestrato']; ?></strong></td>
				<td>Observación:</td>
				<td><strong><?php echo $consestr[$i]['observaciones']; ?></strong></td>
			</tr>
			<tr>	
				<td>Fecha de asignación:</td>
				<td><strong><?php echo $consestr[$i]['fechamod']; ?></strong></td>
				<td>Usuario asignador:</td>
				<td>
					<strong>
						<?php echo $consestr[$i]['nomusu']; ?>
					</strong>
				</td>
			</tr>
			<tr>
				<?php
					if ($perusu==1 || $perusu==4) 
					{   
				?>
				<td><a href="home.php?var=56&pr=<?php echo $consestr[$i]['idestrato']; ?>" class="btn btn-primary">Editar observación</a></td>
				<?php
					} 
				?>
				<td> <a href="home.php" class="btn btn-primary">Salir</a></td>
			</tr>
			<?php
			}
			?>
		</table>
		<?php 
				}
			}
		?>
</div>