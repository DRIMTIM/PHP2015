<?php
/**
 * Defino el nombre de la variable de usuario en sesión
 */
define('__USER', '__USER_');
/**
 * * Defino la url root de la app **
 */
define ( '__ROOT', substr ( $site_path, strrpos ( $site_path, "/" ) ) );
/**
 * * Defino la url root de los css **
 */
define ( '__ROOT_CSS', __ROOT . '/application/public/css/');
/**
 * * Defino la url root de los javascript **
 */
define ( '__ROOT_JS', __ROOT . '/application/public/js/');
/**
 * * Defino la url root de las imagenes **
 */
define ( '__ROOT_IMG', __ROOT . '/application/public/images/' . __AMBITO . "/");


/**
 * * include the controller class **
 */
include __SITE_PATH . '/application/' . 'controller_base.class.php';

include __SITE_PATH . '/application/' . 'AbstractModel.class.php';

/**
 * * include the registry class **
 */
include __SITE_PATH . '/application/' . 'registry.class.php';

/**
 * * include the router class **
 */
include __SITE_PATH . '/application/' . 'router.class.php';

/**
 * * include the template class **
 */
include __SITE_PATH . '/application/' . 'template.class.php';

/**
 * * auto load model classes **
 */
function __autoload($class_name) {
	$__modelos_comunes = array( "db", "MysqliDb" );
	$filename = strtolower ( $class_name ) . '.class.php';
	$file = __SITE_PATH . '/model/' . __AMBITO . '/' . $filename;
	
	foreach($__modelos_comunes as $modelo){
		if(strcasecmp($class_name, $modelo) == 0){
			$file = __SITE_PATH . '/model/common/' . $filename;
			break;
		}
	}
	
	if (file_exists ( $file ) == false) {
		return false;
	}
	include ($file);
}

/**
 * * a new registry object **
 */
$registry = new registry ();

/**
 * * create the database registry object **
 */

$registry->db = new MysqliDb ( 'localhost', 'root', 'chonabook', 'PHP_LAB' );
?>