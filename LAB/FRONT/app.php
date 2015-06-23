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
$registry->router->setPath ( __SITE_PATH . '/controllers');

/**
 * * load up the template **
*/
$registry->template = new template ( $registry );

/**
 * inicio la carga del ambito correspondiente
 */
include 'front.php';

?>