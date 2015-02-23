<?php
	include("controlador/csolicitud.php");
?>
<h1 class='page-header'>Solicitudes Generadas</h1>
	<table id="example" class="display">
		<thead>
			<tr>
				<th colspan="3">SOLICITUDES</th>
			</tr>
			<tr>
				<th>Código catastral	</th>
				<th>Número radicado		</th>
				<th>Generador	</th>
			</tr>
		</thead>
		
		<?php
			$conssolpend = $ins->selsol2();
			if (is_null($conssolpend)) 
			{
		?>
			<tr>
				<td colspan="3">No se encuentran registros.</td>
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
			<td><?php echo $conssolpend[$i]['nomusu']; ?></td>			
		</tr>
		<?php
				}
			}
		?>
	</table>
