<?php
	include("controlador/csimucp.php");
?>
<div class="forms1">
	<h1 class='page-header'>Simulador de estrato para Centros poblados</h1>
		<?php
			if ($estrato>0) 
			{
		?>
			<h3 class="text-success"><strong>Estrato simulado: <?php echo $estletra." (".$estrato.")"; ?></strong></h3><br>
		<?php
			}
		?>
		<form name="simuestra" method="post" action="">
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 1" class="control-label">¿Cuál es el material predominante en las paredes de la vivienda?</label>
				<select name="pre1" class="form-control">
					<option>Seleccione: </option>
					<option value=1>Tabla, Zinc, Guadua, Caña, o Tela</option>
					<option value=2>Bahareque, Tapia Pisada o Adobe</option>
					<option value=3>Bloque, Ladrillo, Piedra, Material Prefabricado o Madera Pulida</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 7" class="control-label">La vía de acceso a la vivienda es:<br>&nbsp;</label>
				<select name="pre7" class="form-control">
					<option>Seleccione: </option>
					<option value=1>Sendero o camino</option>
					<option value=2>Vehicular sin pavimentar</option>
					<option value=3>Vehicular pavimentada</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 2" class="control-label">¿Cuál es el material predominante en los techos de la vivienda?</label>
				<select name="pre2" class="form-control">
					<option>Seleccione: </option>
					<option value=1>Palma, Paja, o Zinc sin Cielo Raso</option>
					<option value=2>Teja de Cemento o Barro sin Cielo Raso</option>
					<option value=3>Teja con Cielo Raso o Plancha</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 8" class="control-label">El basurero, el amtadero, la plaza de mercado o la plaza de ferias están:</label>
				<select name="pre8" class="form-control">
					<option>Seleccione: </option>
					<option value=1>Al frente o una cuadra de la vivienda</option>
					<option value=2>A dos o tres cuadras de la vivienda</option>
					<option value=3>A mas de tres cuadras</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 3" class="control-label">¿Cuál es el material predominante de los pisos de la vivienda?</label>
				<select name="pre3" class="form-control">
					<option>Seleccione: </option>
					<option value=1>Tierra o Tablones</option>
					<option value=2>Cemento</option>
					<option value=3>Baldosa, vinilo, ladrillo o madera pulida</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 9" class="control-label">¿A la vivienda llega agua por el acueducto?<br>&nbsp;</label>
				<select name="pre9" class="form-control">
					<option>Seleccione: </option>
					<option value=1>No</option>
					<option value=2>Si, solo unas horas</option>
					<option value=3>Si, todo el día</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 4" class="control-label">¿Cuál es el material predominante de las ventanas de la vivienda?</label>
				<select name="pre4" class="form-control">
					<option>Seleccione: </option>
					<option value=1>Rejilla, Anjeo o no hay Ventanas</option>
					<option value=2>Madera</option>
					<option value=3>Vidrio</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 10" class="control-label">La vivienda:<br>&nbsp;</label>
				<select name="pre10" class="form-control">
					<option>Seleccione: </option>
					<option value=1>No tiene sanitario</option>
					<option value=2>Tiene letrina o pozo septico</option>
					<option value=3>Tiene inodoro conectado al alcantarillado</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 5" class="control-label">¿Cuál es el material de la puerta principal?</label>
				<select name="pre5" class="form-control">
					<option>Seleccione: </option>
					<option value=1>Tabla, guadua, esterilla, zinc o tela</option>
					<option value=2>Madera pulida</option>
					<option value=3>Lamina metalica, hierro, aluminio o madera tallada</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 11" class="control-label">Las basuras de la vivienda:</label>
				<select name="pre11" class="form-control">
					<option>Seleccione: </option>
					<option value=1>Las tiran al rio, caño, patio. las queman o las entierran</option>
					<option value=2>Las llevan a un botadero de basura o basurero</option>
					<option value=3>Las recoge la empresa de aseo</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 6" class="control-label">¿La vivienda esta deteriorada?</label>
				<select name="pre6" class="form-control">
					<option>Seleccione: </option>
					<option value=1>Si</option>
					<option value=2>No</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 12" class="control-label">¿La vivienda tiene energía eléctrica?</label>
				<select name="pre12" class="form-control">
					<option>Seleccione: </option>
					<option value=1>No</option>
					<option value=2>Si, solo unas horas</option>
					<option value=3>Si, todo el día</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<input type="submit" class="btn btn-primary" value="Simular estrato">
			</div>
		</div>
		</form>
</div>		