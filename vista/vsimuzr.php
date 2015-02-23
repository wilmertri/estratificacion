<?php
	include("controlador/csimuzr.php");
?>
<div class="forms1">
	<h1 class='page-header'>Simulador de estrato para la zona rural</h1>
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
			<div class="form-group col-lg-12 center">
                <label for="Estructura de la vivienda">Estructura de la vivienda<hr> </label>
            </div>
		</div>	
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 1" class="control-label">El ARMAZÓN de la vivienda es de:</label>
				<select name="pre1" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Madera, adobe, bahareque, tapia</option>
					<option value=1>Prefabricado</option>
					<option value=2>Ladrillo, bloque</option>
					<option value=4>Concreto hasta tres pisos</option>
					<option value=6>Concreto cuatro o mas pisos</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 2" class="control-label">La CUBIERTA de la vivienda es:</label>
				<select name="pre2" class="form-control">
					<option>Seleccione: </option>
					<option value=1>De materiales de desecho, telas asfálticas</option>
					<option value=3>De zinc, teja de barro, eternit rustico</option>
					<option value=6>Entrepiso (cubierta provisional), prefabricado</option>
					<option value=9>Eternit o teja de barro (cubierta sencilla)</option>
					<option value=13>Azotea, placa sencilla con eternit o teja de barro</option>
					<option value=16>Placa impermeabilizada, cubierta lujosa, ornamental</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 3" class="control-label">Los MUROS de la vivienda son de:<br>&nbsp;</label>
				<select name="pre3" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Materiales de desecho, esterilla</option>
					<option value=1>Adobe, bahareque, tapia</option>
					<option value=2>Madera pulida</option>
					<option value=3>Concreto prefabricado</option>
					<option value=4>Bloque, ladrillo</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 4" class="control-label">El estado de conservación de la ESTRUCTURA es:</label>
				<select name="pre4" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Malo</option>
					<option value=2>Regular</option>
					<option value=4>Bueno</option>
					<option value=5>Excelente</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-12 center">
                <label for="Acabados de la vivienda">Acabados de la vivienda<hr> </label>
            </div>
		</div>	
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 5" class="control-label">El acabado exterior de los MUROS esta:</label>
				<select name="pre5" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Sin cubrimiento</option>
					<option value=1>En pañete, papel común, ladrillo prensado</option>
					<option value=2>En estuco con ceramica o con papel fino</option>
					<option value=3>En madera con piedra ornamental</option>
					<option value=4>En marmol, materiales lujosos, otros</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 6" class="control-label">El acabado de los PISOS de la vivienda es de:</label>
				<select name="pre6" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Tierra pisada</option>
					<option value=2>Cemento, madera burda</option>
					<option value=3>Baldosa común de cemento, tablón, ladrillo</option>
					<option value=4>Listón machihembrado</option>
					<option value=6>Tableta, caucho, acrilico, granito, baldosa fina</option>
					<option value=8>Parquet, alfombra, retal de marmol (grano pequeño)</option>
					<option value=9>Retal de marmol, marmol, otros lujos</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 7" class="control-label">La FACHADA de la vivienda es:<br>&nbsp;</label>
				<select name="pre7" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Pobre</option>
					<option value=2>Sencilla</option>
					<option value=4>Regular</option>
					<option value=6>Buena</option>
					<option value=8>Lujosa</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 8" class="control-label">El estado de conservación de los ACABADOS es:</label>
				<select name="pre8" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Malo</option>
					<option value=2>Regular</option>
					<option value=4>Bueno</option>
					<option value=5>Excelente</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-12 center">
                <label for="Baño de la vivienda">Baño de la vivienda<hr> </label>
            </div>
		</div>	
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 9" class="control-label">El tamaño del baño es:</label>
				<select name="pre9" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Sin baño</option>
					<option value=1>Pequeño</option>
					<option value=2>Mediano</option>
					<option value=3>Grande</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 10" class="control-label">El ENCHAPE del baño es:</label>
				<select name="pre10" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Sin cubrimiento</option>
					<option value=1>Pañete, baldosa común de cemento</option>
					<option value=2>Baldosín unicolor, papel común</option>
					<option value=3>Baldosín decorado, papel fino</option>
					<option value=4>Ceramica, cristanac, granito</option>
					<option value=5>Marmol, enchape lujoso</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 11" class="control-label">El MOBILIARIO del baño es:</label>
				<select name="pre11" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Pobre</option>
					<option value=3>Sencillo</option>
					<option value=6>Regular</option>
					<option value=9>Bueno</option>
					<option value=11>Lujoso</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 12" class="control-label">El estado de conservación del BAÑO es:</label>
				<select name="pre12" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Malo</option>
					<option value=2>Regular</option>
					<option value=4>Bueno</option>
					<option value=5>Excelente</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-12 center">
                <label for="Cocina de la vivienda">Cocina de la vivienda<hr> </label>
            </div>
		</div>	
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 13" class="control-label">El tamaño de la cocina es:</label>
				<select name="pre13" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Sin cocina</option>
					<option value=1>Pequeña</option>
					<option value=2>Mediana</option>
					<option value=3>Grande</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 14" class="control-label">El ENCHAPE de la cocina es:</label>
				<select name="pre14" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Sin cubrimiento</option>
					<option value=1>Pañete, baldosa común de cemento</option>
					<option value=2>Baldosín unicolor, papel común</option>
					<option value=3>Baldosín decorado, papel fino</option>
					<option value=4>Ceramica, cristanac, granito</option>
					<option value=5>Marmol, enchape lujoso</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 15" class="control-label">El MOBILIARIO de la cocina es:</label>
				<select name="pre15" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Pobre</option>
					<option value=2>Sencillo</option>
					<option value=3>Regular</option>
					<option value=4>Bueno</option>
					<option value=6>Lujoso</option>
				</select>
			</div>
			<div class="form-group col-lg-6">	
				<label for="Pregunta 16" class="control-label">El estado de conservación de la COCINA es:</label>
				<select name="pre16" class="form-control">
					<option>Seleccione: </option>
					<option value=0>Malo</option>
					<option value=2>Regular</option>
					<option value=4>Bueno</option>
					<option value=5>Excelente</option>
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