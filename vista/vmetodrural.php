	<script type="text/javascript">
		function mostrar(val){
			if (document.getElementById){ //se obtiene el id
				var el = document.getElementById('mostrar'); //se define la variable "el" igual a nuestro div
				el.style.display = 'none';
				if (val!='3'){
					el.style.display = 'block';
				}else{
					el.style.display = 'none';
				}
			}
		};
	</script>
	<form name="simuestra" method="post" action="">
		<div class="row">
			<div class="form-group col-lg-12 center">
                <label for="Metodología rural">METODOLOGÍA RURAL<hr> </label>
            </div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Pregunta 0" class="control-label">Uso de la vivienda:<br>&nbsp;</label>
				<select name="pre" class="form-control" onchange="javascript:mostrar(this.value);">
					<option>Seleccione: </option>
					<option value=0>Habitacional solamente</option>
					<option value=1>Vivienda con negocio</option>
					<option value=2>Vivienda con finca productiva</option>
					<option value=3>No residencial</option>
				</select>
			</div>
		</div>	
		<div id="mostrar">
			<div class="row">
				<div class="form-group col-lg-4">	
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
				<div class="form-group col-lg-4">	
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
				<div class="form-group col-lg-4">	
					<label for="Pregunta 3" class="control-label">Los MUROS de la vivienda son de:</label>
					<select name="pre3" class="form-control">
						<option>Seleccione: </option>
						<option value=0>Materiales de desecho, esterilla</option>
						<option value=1>Adobe, bahareque, tapia</option>
						<option value=2>Madera pulida</option>
						<option value=3>Concreto prefabricado</option>
						<option value=4>Bloque, ladrillo</option>
					</select>
				</div>
			</div>
		</div>
	</form>