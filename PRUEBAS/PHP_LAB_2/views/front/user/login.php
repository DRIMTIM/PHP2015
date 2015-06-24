<html>
<div id="modal_login" class="login-form">
	<form action="<?php echo __ROOT . "/user/login"?>" method="post" class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Inicio de Sesión</h3>
		</div>
		<div class="panel-body">
		<?php if(count($errores) > 0){ ?>
			<div class="alert alert-danger" role="alert">
				<?php foreach ($errores as $error){echo $error;}?>
			</div>	
		<?php } if($loginNick){ ?>
			<div class="input-group">
				<input type="text" class="form-control"
						placeholder="Escriba su Nick" aria-describedby="basic-addon0"
					 	name="nick" id="nick" required="required">
			</div>
		</div>
		<div class="panel-footer">
			<button id="botonLogin" type="submit"
				class="btn btn-default">Inicio</button>
		</div>
		<?php }else{ ?>
			<div class="input-group">
				<input type="password" class="form-control"
					placeholder="Escriba su Contraseña" aria-describedby="basic-addon6"
					 name="password" id="password" required="required">
			</div>
		</div>
		<div class="panel-footer">
			<button id="botonLogin" type="submit"
				class="btn btn-default">Confirmar</button>
		</div>
		<?php } ?>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#modal_login").easyModal({
			top: 100,
			autoOpen: true,
			overlayOpacity: 0.3,
			overlayColor: "#333",
			overlayClose: false,
			closeOnEscape: false,
			transitionIn: 'animated bounceInLeft',
			transitionOut: 'animated bounceOutRight',
			closeButtonClass: '.animated-close'
		});
	});
</script>
</html>