	<?php
		include("controlador/cusuario.php");
	?>
	<div class="forms1">
		<h1 class='page-header'>Mi perfil</h1>
		<table class="table">
			<thead>
				<th>Número de documento</th>
				<th>Nombre</th>
				<th>Perfil</th>
			</thead>
			<tr>
				<td><?php echo $usuario; ?></td>
				<td><?php echo $datusu1[0]['nomusu']; ?></td>
				<td><?php echo $datusu1[0]['nomperfil']; ?></td>
			</tr>
		</table>
		<a href="home.php?var=25" class="btn btn-primary">Cambiar contraseña</a>
		<a href="home.php" class="btn btn-primary">Salir</a>
	</div>