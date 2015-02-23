<?php
	include("controlador/cusuario.php");
?>
	<div class="forms1">
		<h1 class='page-header'>Registro usuario</h1>
		<form name"FormUsu" method="POST" action="" id="formgen" onSubmit="return confirm('Por  favor primero  verifique  los datos ingresados  antes de hacer clic en  !aceptar!')">
			<div class="row">
				<div class="form-group col-lg-6">	
					<label for="numero de documento" class="control-label">No. Documento:</label>
					<input name="documento" type="text" class="form-control" title="Se requiere el número de documento" required>
				</div>
				<div class="form-group col-lg-6">	
					<label for="Nombre de usuario" class="control-label">Nombre: </label>
					<input name="nombre" type="text" class="form-control" title="Se requiere el nombre del usuario" required>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-lg-6">
					<label for="contraseña de ingreso" class="control-label">Contraseña:</label>
					<input name="password" type="password" pattern=".{6,}" title="Se requiere la contraseña nueva de minimo 6 caracteres" required class="form-control">
				</div>
				<div class="form-group col-lg-6">	
					<label for="perfil de usuario" class="control-label">Perfil:</label>
					<select class="form-control" name="perfil">
						<option value="0">Seleccione perfil</option>
						<?php
							for ($i=0; $i<count($datper); $i++) { 
						?>
							<option value="<?php echo $datper[$i]['idperfil']; ?>"><?php echo $datper[$i]['nomperfil']; ?></option>
						<?php
							}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-6">	
					<label for="Estado" class="control-label">Estado:</label>
					<select class="form-control" name="estado" >
						<option value="0">Seleccione estado</option>
						<option value="1">Activo</option>
						<option value="2">Inactivo</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-6">
						<input type="submit" class="btn btn-primary" value="Ingresar usuario">
						<a href="home.php" class="btn btn-primary">Salir</a>
				</div>
			</div>
		</form>
	</div>	