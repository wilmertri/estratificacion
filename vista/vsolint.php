<?php
	include("controlador/csolint.php");
?>
<div class="forms1">
	<h1 class='page-header'>Nueva solicitud</h1>
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
		</table>
		<form name="formsolint" method="POST" action="" id="formgen" onSubmit="">
			<div class="row">
				<div class="form-group col-lg-6">	
					<label for="Expediente" class="control-label">Numero de expediente: </label>
					<input name="numexp" type="text" class="form-control"  maxlength="15">
					<input name="predio" type="hidden" value="<?php echo $conspred[0]['idpredio']; ?>">
					<input name="codcas" type="hidden" value="<?php echo $conspred[0]['codcas']; ?>">
				</div>
			</div>
	<?php
			if ($conspred[0]['idzonaubi']==1) 
			{
				include("vista/vmetodur.php");
			}
			if ($conspred[0]['idzonaubi']==2) 
			{
				include("vista/vmetodzr.php");
			}
			if ($conspred[0]['idzonaubi']==3) 
			{
				include("vista/vmetodcp.php");
			}
	?>
		<div class="row">
			<div class="form-group col-lg-6">	
				<input type="submit" class="btn btn-primary" value="Generar solicitud">
			</div>
		</div>
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
	</form>
</div>		
<div>
	<table id="example" class="display">
		<thead>
			<th>Código de solicitud</th>
			<th>Número de expendiente</th>
			<th>Código catastral</th>
			<th>Solicitante</th>
			<th>Fecha de solicitud</th>
			<th>Archivos anexos</th>
			<th>Constancia</th>
		</thead>
		<tbody>
		<?php
			$conslist = $ins->selsollist();
			for ($i=0; $i < count($conslist); $i++) 
			{ 
		?>
			<tr>
				<td><?php echo $conslist[$i]['consec']; ?></td>
				<td><?php echo $conslist[$i]['noexp']; ?></td>
				<td><?php echo $conslist[$i]['codcas']; ?></td>
				<td><?php echo $conslist[$i]['nomusu']; ?></td>
				<td><?php echo substr($conslist[$i]['fechasol'], 0, -8); ?></td>
				<td> <a href="home.php?var=145&pr=<?php echo $conslist[$i]['idpredio'];?>" class="btn btn-primary">Documentos</a></td>
				<td>
 				<?php if ($conslist[$i]['pendiente']==2) 
						{
					?>
					<a href="vista/docestrato2.php?pr=<?php echo $conslist[$i]['idsolint'];?>" class="btn btn-primary" target="_blank">Constancia</a>
					<?php 
						}else{
						echo "Pendiente de estrato";
					} ?>
				</td>		
			</tr>
		<?php
			  }  
		?>
		</tbody>
	</table>
</div>