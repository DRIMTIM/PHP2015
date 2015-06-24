<?php

Abstract Class baseController {

/*
 * @registry object
 */
protected $registry;

function __construct($registry) {
	$this->registry = $registry;
	$this->onConstruct();
}

/**
 * @all controllers must contain an index method
 */
abstract function index();

abstract function onConstruct();

function redirect($url, $statusCode = 303)
{
	header('Location: ' . $url, true, $statusCode);
	die();
}
}

?>
