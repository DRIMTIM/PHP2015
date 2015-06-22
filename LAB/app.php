<?php 

/**
 * defino la url para el backend
 */
define('__BACK', "backend");

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
 * obtengo la uri del request
 */
$url = $_SERVER['REQUEST_URI'];

/**
 * defino los nombres de los phps disponibles
 */
$__FRONT = "front";
$__BACK = "back";

/**
 * defino el ambito por defecto que es el front
 */
$__DEFAULT = $__FRONT;
$ambito = $__DEFAULT;

/**
 * si la url es del backend cambio el ambito 
 */
if(stripos($url, __BACK)){
	$ambito = $__BACK;
}

/**
 * defino el ambito como constante para usarla en los includes
 */
define('__AMBITO', $ambito);

/**
 * cargo las inicializaciones
 */

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
$registry->router->setPath ( __SITE_PATH . '/controller/' . __AMBITO );

/**
 * * load up the template **
*/
$registry->template = new template ( $registry );

/**
 * inicio la carga del ambito correspondiente
 */
include __AMBITO . '.php';

?>