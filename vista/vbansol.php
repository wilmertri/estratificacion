<?php
	include("controlador/csolicitud.php");
?>
<h1 class='page-header'>Solicitudes pendientes</h1>
<div class="plantilla1">
	<table class="table">
		<thead>
			<tr>
				<th colspan="6">SOLICITUDES PENDIENTES DE CIERRE</th>
			</tr>
			<tr>
				<th>Código catastral	</th>
				<th>Número radicado		</th>
				<th>Número de factura	</th>
				<th>Fecha de apertura	</th>
				<th>Cerrar solicitud	</th>
				<th>Constancia			</th>
			</tr>
		</thead>
		
		<?php
			$conssolpend = $ins->selsolpend();
			if (is_null($conssolpend)) 
			{
		?>
			<tr>
				<td colspan="4">No se encuentran registros.</td>
			</tr>		
		<?php 	
		 	}
		 	else
		 	{	 
				for ($i=0; $i<count($conssolpend); $i++) 
				{ 
					$conspredio = $ins->selpred2($conssolpend[$i]['predio']);
		?>
		<tr>
			<td><?php echo $conspredio[0]['codcas']; ?></td>
			<td><?php echo $conssolpend[$i]['radent']; ?></td>
			<td><?php echo $conssolpend[$i]['numfac']; ?></td>
			<td><?php echo $conssolpend[$i]['fechasol']; ?></td>
			<td><a href="home.php?var=135&pr=<?php echo $conssolpend[$i]['idsolicitud'];?>" class="btn btn-success">Cerrar</a></td>
			<td><a href="vista/docestrato1.php?pr1=<?php echo $conssolpend[$i]['idsolicitud'];?>" class="btn btn-primary" target="_blank">Constancia</a></td>
		</tr>
		<?php
				}
			}
		?>
	</table>
</div>
<div class="plantilla1">
	<table class="table">
		<thead>
			<tr>
				<th colspan="6">SOLICITUDES PENDIENTES URBANISMO</th>
			</tr>
			<tr>
				<th>Código de solicitud</th>
				<th>Número de expendiente</th>
				<th>Código catastral</th>
				<th>Solicitante</th>
				<th>Fecha de solicitud</th>
				<th>Responder</th>
			</tr>
		</thead>
		<?php
			$conssolpendurb = $ins->selsolpendurb();
			if (is_null($conssolpendurb)) 
			{
		?>
			<tr>
				<td colspan="4">No se encuentran registros.</td>
			</tr>		
		<?php 	
		 	}
		 	else
		 	{	 
				for ($i=0; $i<count($conssolpendurb); $i++) 
				{ 
					$conspredio = $ins->selpred2($conssolpendurb[$i]['predio']);
		?>
		<tr>
			<td><?php echo $conssolpendurb[$i]['consec']; ?></td>
			<td><?php echo $conssolpendurb[$i]['noexp']; ?></td>
			<td><?php echo $conspredio[0]['codcas']; ?></td>
			<td><?php echo $conssolpendurb[$i]['solicitante']; ?></td>
			<td><?php echo $conssolpendurb[$i]['fechasol']; ?></td>
			<td><a href="home.php?var=140&pr=<?php echo $conssolpendurb[$i]['idsolint'];?>" class="btn btn-success">Estratificar</a></td>
		</tr>
		<?php
				}
			}
		?>
	</table>
</div>	