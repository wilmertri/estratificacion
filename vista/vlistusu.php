	<?php
		include("controlador/cusuario.php");
	?>
	<div class="forms1">
		<h1 class='page-header'>Lista de usuarios registrados</h1>
		<table class="table">
			<thead>
				<th>Número de documento</th>
				<th>Nombre</th>
				<th>Estado</th>
				<th>Perfil</th>
			</thead>
			<?php
				for ($i=0; $i <count($datusu) ; $i++) { 
			?>
			<tr>
				<td><?php echo $datusu[$i]['numdocusu']; ?></td>
				<td><?php echo $datusu[$i]['nomusu']; ?></td>
				<td>
					<?php
						if ($datusu[$i]['estado']==1) {
					 		echo "Activo";
					 	}
					 	else
					 	{
					 		echo "Desactivo";	
					 	}	  
					?>
				</td>
				<td><?php echo $datusu[$i]['nomperfil']; ?></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>