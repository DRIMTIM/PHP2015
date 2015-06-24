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
			No has iniciado sesión para dar de baja el usuario!.
		</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-default" onclick="window.location.href = '<?php echo _ROOT?>';">Aceptar</button>
	</div>

<?php 
	
	}else{
	
?>
<div id="modal_signin" class="panel panel-default mCustomScrollbar">
	<div class="panel-heading">
		<h3 class="panel-title">Baja de Cuenta</h3>
	</div>
	<form action="<?php echo _ROOT . "/user/bajaCuenta"?>" method="post">
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
			<button id="botonLogin" type="submit" class="btn btn-default">Dar de Baja</button>
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
	});
</script>
</html>