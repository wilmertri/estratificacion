	<?php
		include("controlador/cestadi.php");
	?>

	<h1 class="page-header">Solicitudes descargadas</h1>
	<div id="formu">
		<table class="table">
			<thead>
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
		</table>
	</div>