<?php
	include("controlador/csolicitud.php");
?>
<div class="forms1">
	<h1 class='page-header'>Nueva solicitud</h1>
	<form name="formconspred" method="POST" action="" id="formgen">
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
			<thead>
				<th colspan="4">DATOS DEL PREDIO</th>
			</thead>
			<tr>
				<td>Codigo catastral:</td>
				<td><strong><?php echo $codcas; ?></strong></td>
				<td>Dirección:</td>
				<td><strong><?php echo $conspred[0]['dirpred']; ?></strong></td>
			</tr>
			<tr>
				<td>Area total:</td>
				<td><strong><?php echo $conspred[0]['areatotal']; ?> m<sup>2</sup></strong></td>
				<td>Area construida:</td>
				<td><strong><?php echo $conspred[0]['areacons']; ?> m<sup>2</sup></strong></td>
			</tr>
			<tr>
				<td>Uso economico:</td>
				<td><strong><?php echo $conspred[0]['usoeconopred']; ?></strong></td>
				<td>Vereda:</td>
				<td><strong><?php echo $conspred[0]['nomver']; ?></strong></td>
			</tr>
			<tr>
				<td>Zona POT:</td>
				<td><strong><?php echo $conspred[0]['zonapot']; ?></strong></td>
				<td>Zona ubicación:</td>
				<td><strong><?php echo $conspred[0]['zonaubi']; ?></strong></td>
			</tr>
			<tr>
				<td>Estrato:</td>
				<td>
					<strong>
						<?php
							if ($conspred[0]['numestrato']==9) 
							{
							 	echo " (".$estrato.")";
							}
							else
							{
								echo $conspred[0]['numestrato']." (".$estrato.")"; 	
							} 
						?>	
					</strong>
				</td>
			</tr>
		</table>
		<form name="formsolint" method="POST" action="home.php?var=130" id="formgen" onSubmit="">
			<div class="row">
				<div class="form-group col-lg-6">	
					<label for="Expediente" class="control-label">Radicado de entrada: </label>
					<input name="radent" type="text" class="form-control">
					<input name="predio" type="hidden" value="<?php echo $conspred[0]['idpredio']; ?>">
				</div>
				<div class="form-group col-lg-6">	
					<label for="Solicitante" class="control-label">Documento del Solicitante: </label>
					<input name="solicitante" type="text" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-6">	
					<label for="Numero de factura" class="control-label">Numero de factura: </label>
					<input name="numfac" type="text" class="form-control">
				</div>
				<div class="form-group col-lg-3">	
					<label for="Fecha de solicitud" class="control-label">Fecha de solicitud: </label>
					<input name="fecha" type="date" class="form-control">
					<label for="Formato de fecha" class="control-label">(DD/MM/AAAA)</label>
				</div>
				<div class="form-group col-lg-3">	
					<label for="Hora de solicitud" class="control-label">Hora de solicitud: </label>
					<input name="hora" type="time" class="form-control">
					<label for="Formato de hora" class="control-label">(HH:MM)</label>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-6">
					<label for="Observacion" class="control-label">Observación:</label>
					<select name="observacion" id="" class="form-control">
						<?php
							$tipobs = $ins->seltipobs();
							for ($i=0; $i < count($tipobs) ; $i++) 
							{ 
						?>
						<option value="<?php echo $tipobs[$i]['idtipoobs']; ?>"> <?php echo $tipobs[$i]['nomtipobs']; ?> </option>
						<?php
							}  
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-6">
					<br><input type="submit" class="btn btn-primary" value="Generar solicitud">
				</div>	
			</div>
		</form>
	<?php
		}
		else
		{
	?>
			<br>
			<div class="row">
				<div class="col-lg-6">
					<div class="alert alert-info">
						<strong>Predio no encontrado!</strong><br><a href="home.php?var=40">Ingresar Predio</a>
					</div>
				</div>
			</div>
			
	<?php		
		}
	}	
	?>
</div>		