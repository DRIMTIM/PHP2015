<html>
<?php 
	
	$usuario = $_SESSION["_usuario"];
	if($usuario === null){

?>
<div id="modal_signin" class="panel panel-default mCustomScrollbar">
	<div class="panel-heading">
		<h3 class="panel-title">Error</h3>
	</div>
	<div class="panel-body">
		<div class="alert alert-danger" role="alert">
			No has iniciado sesión para mostrar los datos de usuario!.
		</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-default" onclick="window.location.href = '<?php echo _ROOT?>';">Aceptar</button>
	</div>

<?php 
	
	}else{
	
?>
<div id="modal_signin" class="panel panel-default mCustomScrollbar" style="height: 80%;">
	<div class="panel-heading">
		<h3 class="panel-title">Cuenta</h3>
	</div>
	<form action="<?php echo _ROOT . "/user/modificarDatos"?>" method="post">
		<div class="panel-body">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon0">Nick:</span> <input
					type="text" class="form-control" placeholder="Nick"
					aria-describedby="basic-addon0" name="nick" id="nick"
					required="required" value="<?php echo $usuario[0]["nick"];?>">
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Nombre:</span> <input
					type="text" class="form-control" placeholder="Nombre"
					aria-describedby="basic-addon1" name="nombre" id="nombre"
					required="required" value="<?php echo $usuario[0]["nombre"];?>">
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon2">Apellido:</span>
				<input type="text" class="form-control" placeholder="Apellido"
					aria-describedby="basic-addon2" name="apellido" id="apellido"
					required="required" value="<?php echo $usuario[0]["apellido"];?>">
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon3">Email:</span> <input
					type="email" class="form-control" placeholder="email@host.com"
					aria-describedby="basic-addon3" name="email" id="email"
					required="required" value="<?php echo $usuario[0]["email"];?>">
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon4">Fecha Nac.:</span>
				<input type="date" class="form-control"
					placeholder="Fecha de Nacimiento" aria-describedby="basic-addon4"
					name="fechaNac" id="fechaNac" required="required"
					value="<?php echo $usuario[0]["fechaNac"];?>">
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon5">Cel:</span> <input
					type="tel" class="form-control" placeholder="099123456"
					maxlength="9" aria-describedby="basic-addon5" name="celular"
					id="celular" required="required" value="<?php echo $usuario[0]["celular"];?>">
			</div>
			<br />
			<div class="input-group">
				<input type="password" class="form-control"
					placeholder="Contraseña" aria-describedby="basic-addon6"
					name="password" id="password" required="required"> <span
					class="input-group-addon" id="basic-addon6">Password</span>
			</div>
			<br />
			<div class="input-group">
				<input type="password" class="form-control"
					placeholder="Confirmación" aria-describedby="basic-addon7"
					name="passwordConfirm" id="passwordConfirm" required="required">
				<span class="input-group-addon" id="basic-addon7">Confirmación</span>
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon">País:</span> <select
					class="selectpicker form-control" name="pais" id="pais"
					required="required">
					<optgroup label="America Latina">
						<option>Uruguay</option>
					</optgroup>
					<optgroup label="America del Norte">
						<option>Estados Unidos</option>
					</optgroup>
				</select>
			</div>
		</div>
		<div class="panel-footer">
			<button id="botonLogin" type="submit" class="btn btn-default">Modificar</button>
		</div>
	</form>
	<?php 
	
	}
	
	?>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#modal_signin").easyModal({
			autoOpen: true,
			overlayOpacity: 0.3,
			overlayColor: "#333",
			overlayClose: false,
			closeOnEscape: false,
			transitionIn: 'animated bounceInLeft',
			transitionOut: 'animated bounceOutRight',
			closeButtonClass: '.animated-close'
		});
		$("#modal_signin").mCustomScrollbar({
		    axis:"y",
		    theme:"dark",
		    scrollbarPosition:"outside"
		});
	});
</script>
</html>