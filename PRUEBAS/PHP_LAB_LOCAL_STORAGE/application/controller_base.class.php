<?php

Abstract Class baseController {

/*
 * @registry object
 */
protected $registry;
protected $model = NULL;
protected $errores = NULL;
protected $usuario = NULL;

function __construct($registry) {
	$this->registry = $registry;
	$this->onConstruct();
	if($this->usuario == null){
		$idUsuario = $_GET["__uid_"];
		if($idUsuario != null && $idUsuario != "undefined"){
			$userModel = new userModel($this->registry);
			$this->usuario = $userModel->obtenerUsuarioForId($idUsuario);
			$this->usuario["isLoggedIn"] = true;
		}
	}
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
function show($path){
	$this->registry->template->errores = $this->errores;
	$this->registry->template->usuario = $this->usuario;
	$this->registry->template->show($path);
}
}

?>
