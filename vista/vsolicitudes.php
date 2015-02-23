<?php
	include("controlador/csolicitud.php");
?>
<h1 class='page-header'>Solicitudes</h1>
	<table id="example" class="display">
		<thead>
			<tr>
				<th colspan="7">SOLICITUDES</th>
			</tr>
			<tr>
				<th>Código catastral	</th>
				<th>Número radicado		</th>
				<th>Número de factura	</th>
				<th>Fecha de apertura	</th>
				<th>Fecha de cierre		</th>
				<th>Observación			</th>
				<th>Constancia			</th>
			</tr>
		</thead>
		
		<?php
			$conssolpend = $ins->selsol2();
			if (is_null($conssolpend)) 
			{
		?>
			<tr>
				<td colspan="6">No se encuentran registros.</td>
			</tr>		
		<?php 	
		 	}
		 	else
		 	{	 
				for ($i=0; $i<count($conssolpend); $i++) 
				{ 
		?>
		<tr>
			<td><?php echo $conssolpend[$i]['codcas']; ?></td>
			<td><?php echo $conssolpend[$i]['radent']; ?></td>
			<td><?php echo $conssolpend[$i]['numfac']; ?></td>
			<td><?php echo $conssolpend[$i]['fechasol']; ?></td>
			<td>
				<?php
					if (is_null($conssolpend[$i]['fechasal'])) {
					 	echo "Sin cierre";
					}
					else{
						echo $conssolpend[$i]['fechasal'];
					} 
				?>
			</td>
			<td><?php echo $conssolpend[$i]['nomtipobs']; ?></td>
			<?php 
				if ($conssolpend[$i]['observacion']==1) 
				{
			?>
				<td><a href="vista/docestrato1.php?pr1=<?php echo $conssolpend[$i]['idsolicitud'];?>" class="btn btn-primary" target="_blank">Constancia</a></td>		
			<?php
				}
				else if($conssolpend[$i]['observacion']==2)
				{
			?>
				<td>Generada el: <br /><?php echo substr($conssolpend[$i]['fecha_create'], 0, -9); ?></td>	
			<?php		
				}
				else
				{
			?>
				<td><a href="vista/docestrato.php?pr1=<?php echo $conssolpend[$i]['idsolicitud'];?>" class="btn btn-primary" target="_blank">Carta</a></td>
			<?php		
				} 
			?>
		</tr>
		<?php
				}
			}
		?>
	</table>
