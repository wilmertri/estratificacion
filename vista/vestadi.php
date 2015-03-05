	<?php
		include("controlador/cestadi.php");
	?>

	<h1 class="page-header">Estadisticas</h1>
	<form action="" method="POST">
		<div class="row">
			<div class="form-group col-lg-6">
				<label for="Tipo estadistica" class="control-label">Seleccione tipo de estadistica</label>
				<select name="tipoestadi" id="" class="form-control">
					<option value="0">Tipo de estadistica</option>
					<option value="1">Total solicitudes</option>
					<option value="2">Descargas via web</option>
					<option value="3">Solicitudes por generador</option>
					<option value="4">Solicitudes por mes</option>
					<option value="5">Solicitudes por ubicación</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<input type="submit" class="btn btn-primary" value="Generar">
			</div>
		</div>
	</form>
	<?php
		if ($tipoestadi) 
		{ 
	?>
	<div class="formu">
		<?php
			if ($tipoestadi==1) 
			{
		?>
			<table class="table">
				<thead>
					<tr>
						<th colspan="2">Total de solicitudes registradas</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						$total_solicitudes = $ins->conteo_solicitudes(); 
					?>
					<tr>
						<td>El número total de solicitudes registradas es:</td>
						<td> <strong><?= $total_solicitudes[0]['totalsoli']; ?></strong> </td>
					</tr>
				</tbody>
			</table>
		<?php  	  	
			}   
			if ($tipoestadi==2) 
			{
		 ?>
		<table class="table">
			<thead>
				<tr>
					<th colspan="2">Solicitudes descargadas de la web</th>
				</tr>
				<tr>
					<th>Solicitud</th>
					<th>Fecha de descarga</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					$descargas = $ins->seldesc();
					for ($i=0; $i <count($descargas) ; $i++) { 
				?>
				<tr>
					<td> <?php echo $descargas[$i]['radent']; ?> </td>
					<td> <?php echo $descargas[$i]['fecha_desc']; ?> </td>
				</tr>
				<?php
					} 
				 ?>
			</tbody>
			<tfoot>
				<tr>
				 	<td><strong>Total de descargas</strong></td>
				 	<td><strong><?= count($descargas) ?></strong></td>
				 </tr>
			</tfoot>
		</table>
		<?php
			}
			if ($tipoestadi==3) 
			{ 
		 ?>
		<table class="table">
			<thead>
				<tr>
					<th colspan="2">Solicitudes realizadas por generador</th>
				</tr>
				<tr>
					<th>Generador</th>
					<th>Cantidad de solicitudes</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					$solxgen = $ins->conteo_soli_generador();
					for ($i=0; $i <count($solxgen) ; $i++) { 
				?>
				<tr>
					<td> <?php echo $solxgen[$i]['nomusu']; ?> </td>
					<td> <?php echo $solxgen[$i]['totalsoli']; ?> </td>
				</tr>
				<?php
					} 
				 ?>
			</tbody>
		</table>
	<?php 
		}
		if ($tipoestadi==4) 
		{  
	?>
		<table class="table">
			<thead>
				<tr>
					<th colspan="2">Solicitudes realizadas por mes</th>
				</tr>
				<tr>
					<th>Mes</th>
					<th>Año</th>
					<th>Cantidad de solicitudes registradas</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					$solxmes = $ins->conteo_soli_mes();
					for ($i=0; $i <count($solxmes) ; $i++) { 
				?>
				<tr>
					<td> <?php echo $meses[$solxmes[$i]['mes']-1]; ?> </td>
					<td><?= $solxmes[$i]['año']?></td>
					<td> <?php echo $solxmes[$i]['solicitud']; ?> </td>
				</tr>
				<?php
					} 
				 ?>
			</tbody>
		</table>
	<?php 
		}
		if($tipoestadi==5)
		{	
	 ?>
	 	<table class="table">
			<thead>
				<tr>
					<th colspan="2">Solicitudes realizadas por ubicación (Zona urbana y veredas)</th>
				</tr>
				<tr>
					<th>Ubicación</th>
					<th>Cantidad de solicitudes registradas</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					$solxubi = $ins->conteo_soli_ubi();
					for ($i=0; $i <count($solxubi) ; $i++) { 
				?>
				<tr>
					<td><?= $solxubi[$i]['nomver']?></td>
					<td><?= $solxubi[$i]['solicitud']; ?> </td>
				</tr>
				<?php
					} 
				 ?>
			</tbody>
		</table>
	 <?php } ?>	
	</div>
	<?php } ?> 