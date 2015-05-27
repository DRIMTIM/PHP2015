<html>
<div id="modal_signout_error" class="panel panel-default mCustomScrollbar" hidden="hidden">
	<div class="panel-heading">
		<h3 class="panel-title">Error</h3>
	</div>
	<div class="panel-body">
		<div class="alert alert-danger" role="alert">
			No has iniciado sesión para dar de baja el usuario!.
		</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-default" onclick="window.location.href = '<?php echo __ROOT?>/';">Aceptar</button>
	</div>
</div>
<div id="modal_signout" class="panel panel-default mCustomScrollbar" hidden="hidden">
	<div class="panel-heading">
		<h3 class="panel-title">Baja de Cuenta</h3>
	</div>
	<form action="<?php echo __ROOT?>/user/bajaCuenta" method="post">
		<div class="panel-body">
		<?php 
			if(count($errores) > 0){
			
		?>
			<div class="alert alert-danger" role="alert">
				<?php foreach ($errores as $error){
					echo $error;
				}?>
			</div>	
		<?php
		
		}?>
		
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
		</div>
		<div class="panel-footer">
			<button type="button" class="btn btn-default" onclick="window.location='<?php echo __ROOT?>/user';">Cerrar</button>
			<button id="botonLogin" type="submit" class="btn btn-default">Dar de Baja</button>
		</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var modalActual = null;
		var usuario = obtenerUsuario();
		if(usuario !== null && usuario.isLoggedIn){
			modalActual = "#modal_signout";
		}else{
			modalActual = "#modal_signout_error";
		}
		$(modalActual).easyModal({
			autoOpen: true,
			overlayOpacity: 0.3,
			overlayColor: "#333",
			overlayClose: false,
			closeOnEscape: false,
			transitionIn: 'animated bounceInLeft',
			transitionOut: 'animated bounceOutRight',
			closeButtonClass: '.animated-close'
		});
		$(modalActual).show();
	});
</script>
</html>