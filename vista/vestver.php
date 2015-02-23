	<?php
		include("controlador/cestadi.php");
	?>

	<h1 class="page-header">Estrato por vereda</h1>
		<table class="table">
			<thead>
				<tr>
					<th colspan="9">
						Estrato Municipio de Chía
					</th>
				</tr>
				<tr>
					<th>Estrato</th>
					<th>Zona urbana</th>
					<th>Cerca de piedra y Fonqueta</th>
					<th>Fagua y Tiquiza</th>
					<th>Bojaca</th>
					<th>Yerbabuena</th>
					<th>Fusca</th>
					<th>La Balsa</th>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<?php
						$est1 = $ins->selestver1();
					?>
					<td><?php echo $est1[0]['numestrato']; ?></td>
					<?php
						for ($i=0; $i <count($est1)-1 ; $i++) { 
					?>
						<td> <?php echo $est1[$i]['Estrato_1']; ?> </td>
					<?php
						} 
					 ?>
				</tr>
				<tr>
					<?php
						$est2 = $ins->selestver2();
					?>
					<td><?php echo $est2[0]['numestrato']; ?></td>
					<?php	
						for ($i=0; $i <count($est2)-1 ; $i++) { 
					?>
						<td> <?php echo $est2[$i]['Estrato_2']; ?> </td>
					<?php
						} 
					 ?>
				</tr>
				<tr>
					<?php
						$est3 = $ins->selestver3();
					?>
					<td><?php echo $est3[0]['numestrato']; ?></td>
					<?php	
						for ($i=0; $i <count($est3)-1 ; $i++) { 
					?>
						<td> <?php echo $est3[$i]['Estrato_3']; ?> </td>
					<?php
						} 
					 ?>
				</tr>
				<tr>
					<?php
						$est4 = $ins->selestver4();
					?>
					<td><?php echo $est4[0]['numestrato']; ?></td>
					<?php	
						for ($i=0; $i <count($est4)-1 ; $i++) { 
					?>
						<td> <?php echo $est4[$i]['Estrato_4']; ?> </td>
					<?php
						} 
					 ?>
				</tr>
				<tr>
					<?php
						$est5 = $ins->selestver5();
					?>
					<td><?php echo $est5[0]['numestrato']; ?></td>
					<?php	
						for ($i=0; $i <count($est5)-1 ; $i++) { 
					?>
						<td> <?php echo $est5[$i]['Estrato_5']; ?> </td>
					<?php
						} 
					 ?>
				</tr>
				<tr>
					<?php
						$est6 = $ins->selestver6();
					?>
					<td><?php echo $est6[0]['numestrato']; ?></td>
					<td>0</td>
					<?php	
						for ($i=0; $i <count($est6)-1 ; $i++) { 
					?>
						<td> <?php echo $est6[$i]['Estrato_6']; ?> </td>
					<?php
						} 
					 ?>
				</tr>

			</tbody>
		</table>
		<a href="vista/vestverexcel.php" class="button button-3d-primary button-rounded">Descarga excel</a>