<?php
	include("controlador/cpredio.php");
?>
<div class="forms1">
	<form name"FormPer" method="POST" action="" id="formgen" onSubmit="return confirm('Por  favor primero  verifique  los datos ingresados  antes de hacer clic en  !aceptar!')">
		<h1 class='page-header'>Registro predio</h1>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Codigo catastral" class="control-label">Codigo catastral: </label>
				<input name="codcas" type="text" class="form-control" pattern="[0-9]{15}" title="La cédula catastral se compone de 15 digitos numericos" autocomplete="off" required maxlength="15">
			</div>
			<div class="form-group col-lg-6">
				<label for="Codigo catastral nuevo" class="control-label">Codigo catastral nuevo: </label>
				<input name="codcasnew" type="text" class="form-control"  maxlength="30">
			</div>
			
		</div>
		<div class="row">
			<div class="form-group col-lg-6">	
				<label for="Direccion del predio" class="control-label">Dirección: </label>
				<input name="dirpred" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label for="Uso economico" class="control-label">Uso economico: </label>
				<select name="usoecono" class="form-control">
					<option value=0>Uso economico</option>
					<?php
						for ($i=0; $i<count($datusoeco); $i++) { 
					?>
						<option value="<?php echo $datusoeco[$i]['idusoeconopred'];?>"><?php echo $datusoeco[$i]['idusoeconopred'];?></option>
					<?php
						}	
					?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<label for="Area total" class="control-label">Area total: (m<sup>2</sup>)</label>
				<input name="areatotal" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label for="Area construida" class="control-label">Area construida: (m<sup>2</sup>)</label>
				<input name="areacons" type="text" class="form-control">
			</div>
			
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<label for="Latitud" class="control-label">Latitud: </label>
				<input name="latitud" type="text" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<label for="Longitud" class="control-label">Longitud: </label>
				<input name="longitud" type="text" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-6">
				<label for="Zona POT" class="control-label">Zona POT: </label>
				<select name="zonapot" class="form-control">
					<option value=0>Zona POT</option>
					<?php
						for ($i=0; $i<count($datzonpot); $i++) { 
					?>
						<option value="<?php echo $datzonpot[$i]['idzonapot'];?>"><?php echo $datzonpot[$i]['zonapot'];?></option>
					<?php
						}	
					?>
				</select>
			</div>
			<div class="form-group col-lg-6">
				<label for="Zona de Ubicacion" class="control-label">Zona de ubicación: </label>
				<select name="zonaubi" class="form-control">
					<option value=0>Zona de ubicación</option>
					<?php
						for ($i=0; $i<count($datzonubi); $i++) { 
					?>
						<option value="<?php echo $datzonubi[$i]['idzonaubi'];?>"><?php echo $datzonubi[$i]['zonaubi'];?></option>
					<?php
						}	
					?>
				</select>
			</div>
		</div>		
		<div class="row">
			<div class="form-group col-lg-6">
				<label for="Vereda" class="control-label">Vereda: </label>
				<select name="vereda" class="form-control">
					<option value=0>Vereda</option>
					<?php
						for ($i=0; $i<count($datver); $i++) { 
					?>
						<option value="<?php echo $datver[$i]['idvereda'];?>"><?php echo $datver[$i]['nomver'];?></option>
					<?php
						}	
					?>
				</select>
			</div>
		</div>	
		<div class="form-group">
			<div class="col-xs-12 colbutton">
				<input type="submit" class="btn btn-primary" value="Ingresar">
			</div>
		</div>
	</form>
</div>		