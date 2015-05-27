<?php

session_start ();

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
define ( '_ROOT', substr ( $site_path, strrpos ( $site_path, "/" ) ) );

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
<meta charset="UTF-8">
<script type="text/javascript" src="<?php echo _ROOT . "/application/public/js/jquery-2.1.3.min.js"?>"></script>
<script type="text/javascript" src="<?php echo _ROOT . "/application/public/js/bootstrap.min.js"?>"></script>
<script type="text/javascript" src="<?php echo _ROOT . "/application/public/js/bootstrap-select.js"?>"></script>
<script type="text/javascript" src="<?php echo _ROOT . "/application/public/js/jquery.easyModal.js"?>"></script>
<script type="text/javascript" src="<?php echo _ROOT . "/application/public/js/jquery.mCustomScrollbar.concat.min.js"?>"></script>
<link rel="stylesheet" href="<?php echo _ROOT . "/application/public/css/bootstrap.min.css"?>">
<link rel="stylesheet" href="<?php echo _ROOT . "/application/public/css/bootstrap-select.min.css"?>">
<link rel="stylesheet" href="<?php echo _ROOT . "/application/public/css/style.css"?>">
<link rel="stylesheet" href="<?php echo _ROOT . "/application/public/css/jquery.mCustomScrollbar.css"?>">
<title>PHP LAB - Home</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<?php $usuario = $_SESSION["_usuario"];
						if($usuario === null){
					?>
					<a class="navbar-brand" href="<?php echo _ROOT . "/user/login"?>">Iniciar Sesión</a>
					<a class="navbar-brand" href="<?php echo _ROOT . "/user/signin"?>">Registrarse</a>	
					<?php }else{?>
					<a class="navbar-brand" href="<?php echo _ROOT . "/user/logout"?>">
						<?php echo $usuario[0]["nombre"] . " - Cerrar Sesión";?>
					</a>
					<a class="navbar-brand" href="<?php echo _ROOT . "/user/acount"?>">Modificar Datos</a>
					<a class="navbar-brand" href="<?php echo _ROOT . "/user/closeAcount"?>">Cerrar Cuenta</a>
					<?php }?>
				</div>
			</div>
		</nav>
		<h1>
			<img alt="LOGO"
				src="<?php echo _ROOT . "/application/public/images/LOGO.png"?>"
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
		<?php $registry->router->loader();?>
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
