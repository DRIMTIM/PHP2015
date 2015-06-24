<?php

/**
 * * error reporting on **
 */
error_reporting ( E_ALL );

/**
 * * define the site path **
 */
$site_path = realpath ( dirname ( __FILE__ ) );
define ( '__SITE_PATH', $site_path );

/**
 * * Defino el root de la app **
 */
define ( '__ROOT', substr ( $site_path, strrpos ( $site_path, "/" ) ) );

/**
 * * include the init.php file **
 */
include 'includes/init.php';

/**
 * * load the router **
 */
$registry->router = new router ( $registry );

/**
 * * set the controller path **
 */
$registry->router->setPath ( __SITE_PATH . '/controller' );

/**
 * * load up the template **
 */
$registry->template = new template ( $registry );

?>

<!DOCTYPE html>
<html>
<head>
<?php include 'includes/resources.php';?>
<title>PHP LAB</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div id="_nav_bar" class="navbar-header"></div>
				<script type="text/javascript">
					function buildBar(){
						var usuario = obtenerUsuario();
						if(usuario === null || (usuario !== null && !usuario.isLoggedIn)){
							var logoff = "<a class='navbar-brand' href='<?php echo __ROOT?>/user/login'>Iniciar Sesión</a>" + 
							"<a class='navbar-brand' href='<?php echo __ROOT?>/user/signin'>Registrarse</a>";
							$("#_nav_bar").html(logoff);	
						}else{
							var logon = "<a class='navbar-brand' href='<?php echo __ROOT?>/user/logout' onclick='logOut();'>" + usuario.nombre + " - Cerrar Sesion</a>" + 
								"<a class='navbar-brand' href='<?php echo __ROOT?>/user/acount'>Modificar Datos</a>" +
								"<a class='navbar-brand' href='<?php echo __ROOT?>/user/closeAcount'>Cerrar Cuenta</a>";
							$("#_nav_bar").html(logon);
						}
					}
					buildBar();
				</script>
			</div>
		</nav>
		<h1>
			<img alt="LOGO"
				src="<?php echo __ROOT?>/application/public/images/LOGO.png"
				class="logo">Laboratorio <small>de</small> PHP
		</h1>
	</header>
	<aside class="controlHeight">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Contacto</h3>
			</div>
			<div class="panel-body">Datos del Usuario</div>
		</div>
		<br />
		<br />
		<br />
	</aside>
	<section class="controlHeight">
		<?php 
		$registry->router->loader();
		?>
	</section>
	<aside class="controlHeight right"></aside>
	<footer class="footer">
		<div class="navbar navbar-inverse navbar-fixed-bottom"
			role="navigation">
			<br>LABORATORIO DE PROGRAMACION PHP
		</div>
	</footer>
</body>
</html>
