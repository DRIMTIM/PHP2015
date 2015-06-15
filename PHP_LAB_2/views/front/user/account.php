<html>
<?php if($usuario === null){ ?>
	<div id="modal_signin" class="panel panel-default mCustomScrollbar login-form">
		<div class="panel-heading">
			<h3 class="panel-title">Error</h3>
		</div>
		<div class="panel-body">
			<div class="alert alert-danger" role="alert">
				No has iniciado sesión para mostrar los datos de usuario!.
			</div>
		</div>
		<div class="panel-footer">
			<button class="btn btn-default" onclick="window.location.href = '<?php echo __ROOT?>';">Aceptar</button>
		</div>
	</div>
<?php }else{ ?>
	<div id="modal_signin" class="mCustomScrollbar login-form">
		<form action="<?php echo __ROOT . "/user/modificarDatos"?>" method="post" class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Cuenta</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<input type="text" placeholder="Nick" class="form-control" aria-describedby="basic-addon0" name="nick" id="nick" required="required" value="<?php echo $usuario["nick"];?>">
					</div>
					<div class="col-sm-6">
						<input type="text" placeholder="Nombre" class="form-control"
							aria-describedby="basic-addon1" name="nombre" id="nombre"
							required="required" value="<?php echo $usuario["nombre"];?>">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
				  		<input type="text" placeholder="Apellido"
							aria-describedby="basic-addon2" name="apellido" id="apellido"
							required="required" value="<?php echo $usuario["apellido"];?>">
					</div>
					<div class="col-sm-6">
						<input type="email" placeholder="email@host.com"
							aria-describedby="basic-addon3" name="email" id="email"
							required="required" value="<?php echo $usuario["email"];?>">
			  		</div>
		  		</div>
		  		<div class="row">
		  			<div class="col-sm-6">
		  				<input type="date"
							placeholder="Fecha de Nacimiento" aria-describedby="basic-addon4"
							name="fechaNac" id="fechaNac" required="required"
							value="<?php echo $usuario["fechaNac"];?>">
		  			</div>
		  			<div class="col-sm-6">
		  				<input type="tel" placeholder="099123456"
							maxlength="9" aria-describedby="basic-addon5" name="celular"
							id="celular" required="required" value="<?php echo $usuario["celular"];?>">
		  			</div>
		  		</div>
		  		<div class="row">
		  			<div class="col-sm-6">
		  				<input type="password"
							placeholder="Contraseña" aria-describedby="basic-addon6"
							name="password" id="password" required="required">
		  			</div>
					<div class="col-sm-6">
						<input type="password"
							placeholder="Confirmación" aria-describedby="basic-addon7"
							name="passwordConfirm" id="passwordConfirm" required="required">
					</div>
	  			</div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-6">
						<button id="botonLogin" type="submit" class="btn btn-default">Modificar</button>
					</div>
					<div class="col-sm-6">
						<button class="btn btn-default" onclick="window.location.href = '<?php echo __ROOT?>';">Cancelar</button>
					</div>
				</div>
			</div>
		</form>
	</div>
<?php } ?>
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