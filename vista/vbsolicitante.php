<?php
	include("controlador/csolicitante.php");
?>
<div class="forms1">
	<h1 class='page-header'>Busqueda de solicitante</h1>
	<form name"FormPer" method="POST" action="" id="formgen" >
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Numero del solicitante" class="control-label">Número de documento:</label>
				<input name="numdocbus" type="text" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<input type="submit" class="btn btn-success" value="Buscar">
			</div>
		</div>
	</form>
<?php
	if ($numdocbus) {
		if ($datsol1) {
	?>
		<table class="table">
			<thead>
				<th colspan="4">DATOS DEL SOLICITANTE</th>
			</thead>
			<tr>
				<td>Número de documento:</td>
				<td><strong><?php echo $datsol1[0]['documento']; ?></strong></td>
				<td>Nombre:</td>
				<td><strong><?php echo $datsol1[0]['nombre']; ?></strong></td>
			</tr>
			<tr>
				<td>Telefono:</td>
				<td><strong><?php echo $datsol1[0]['telefono']; ?></strong></td>
				<td>Correo electronico:</td>
				<td><strong><?php echo $datsol1[0]['email']; ?></strong></td>
			</tr>
		</table>
	<?php
		}
		else
		{
	?>
			<div class="row">
				<div class="col-lg-6">
					<div class="alert alert-info">
						<strong>Solicitante no encontrado!</strong>
					</div>
				</div>
			</div>
			
	<?php		
		}
	}	
	?>
</div>		