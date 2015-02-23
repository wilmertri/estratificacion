<?php
	include("controlador/cestratifica.php");
?>
<div class="forms1">	
	<form name="carga" method="post" action="" enctype="multipart/form-data">
		<h1 class='page-header'>Archivos anexos</h1>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Nombre de archivo">Descripción del archivo:</label>
				<input type="text" name="name" class="form-control" required>
				<input type="hidden" name="anexo" value="anexo">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Nombre de archivo">Archivo: </label>
				<input type="file" name="archivo">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<input type="submit" value="Cargar archivo" class="btn btn-primary">
				<a href="home.php" class="btn btn-primary">Salir</a>
			</div>	
		</div>	
	</form>
</div>
	
	<table class="table">
		<thead>
			<th>Código de archivo</th>
			<th>Descripción del archivo</th>
			<th>Archivo</th>
		</thead>
		<?php
			if ($perusu==5) 
	 		{	
				$docs = $ins->selanexos2($pr,$perusu);
			}
			else
			{
				$docs = $ins->selanexos1($pr);	
			}
			for ($i=0; $i <count($docs) ; $i++) 
			{ 
	 	?>
	 	<tr>
	 		<td><?php echo $docs[$i]['iddocsanexos']; ?></td>
	 		<td><?php echo $docs[$i]['nomdoc']; ?></td>
	 		<td>

	 			<?php
	 				if ($docs[$i]['extension']=='pdf') 
	 				{
	 			?>
	 			<a href="<?php echo $docs[$i]['dirdoc']; ?>" target="_blank"> <img src="img/pdf.png" alt="Descarga archivo" width="42" height="42"> </a>
	 			<?php	
	 				}
	 				else
	 				{
	 					if ($perusu==1 || $perusu==4) 
	 					{	 					
	 			?>
	 			<img src="<?php echo $docs[$i]['dirdoc']; ?>" alt="" width="600" height="300">
	 			<?php
	 					}
	 					else
	 					{
	 						echo "Sin visualización";			
	 					}
	 				} 
	 			?>
	 		</td>
	 	</tr>
	 	<?php
	 		}
	 	?>
	</table>