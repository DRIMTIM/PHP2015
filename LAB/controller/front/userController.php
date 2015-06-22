<?php

Class userController Extends baseController {

	private $usuarioModel = NULL;
	private $usuario = NULL;
	
	public function onConstruct(){
		$this->usuarioModel = new userModel($this->registry);
		if($_SESSION[__USER]!== null){
			$this->usuario = $_SESSION[__USER];
		}
	}
	
	public function index() {
        $this->registry->template->show('user/index');
	}

	public function signin(){
		$this->registry->template->show('user/signin');
	}
	
	public function account(){
		$this->registry->template->show('user/account');
	}
	
	public function closeAccount(){
		$this->registry->template->show('user/closeAccount');
	}
	
	public function login(){
		$nick = $_POST["nick"];
		$password = $_POST["password"];
		if(!empty($nick) && empty($password)){
			$usuario = $this->usuarioModel->obtenerUsuario($nick);
			if($usuario === null){
				$this->registry->template->errores = array( "El nick no existe en el sistema!" );
			}else{
				$this->registry->template->usuario = $usuario;
			}		
		}else if(!empty($password) && !empty($nick)){
			$usuario = $this->usuarioModel->obtenerUsuario($nick);
			if(strcmp($password, $usuario["password"]) === 0){
				$_SESSION[__USER] = $usuario;
				$this->registry->template->show('user/index');
				return;
			}else{
				$this->registry->template->errores = array( "Contraseña Inválida!" );
			}
		}
		$this->registry->template->show('user/login');
	}
	
	public function logout(){
		session_unset();
		$this->registry->template->show('index');
	}

	public function altaUsuario(){
		$password = $_POST["password"];
		$nick = $_POST["nick"];
		$passwordConfirm = $_POST["passwordConfirm"];
		if(strcmp($password, $passwordConfirm) !== 0){
			$this->registry->template->errores = array( "La confirmción de la contraseña no coincide!" );
			$this->signin();
			return;
		}
		$usuario = $this->usuarioModel->obtenerUsuario($nick);
		if($usuario !== null){
			$this->registry->template->errores = array( "El nick ya existe en el sistema!" );
			$this->signin();
			return;
		}
		$this->usuarioModel->guardar();
	}
	
	public function modificarDatos(){
		$modificarPassword = $_POST["modificarPassword"];
		if($this->verificarModificacion($modificarPassword)){
			$password = $_POST["password"];
			$passwordConfirm = $_POST["passwordConfirm"];
			if($modificarPassword === "true"){
				if(strcmp($password, $passwordConfirm) !== 0){
					$this->registry->template->errores = array( "La confirmción de la contraseña no coincide!" );
					$this->account();
					return;
				}
			}else{
				$_POST["password"] = $this->usuario["password"];
			}
			$this->usuarioModel->updateUsuario($this->usuario["id"]);
			$_SESSION[__USER] = $this->usuarioModel->obtenerUsuario($this->usuario["nick"]);
		}
		$this->index();
	}
	
	private function verificarModificacion($modificarPassword){
		if($modificarPassword === "true"){
			return true;
		}
		$valores = array($_POST["nick"], $_POST["nombre"], 
				$_POST["apellido"], $_POST["email"], 
				$_POST["fechaNac"], $_POST["celular"]);
		foreach ($valores as $valor){
			if(!in_array($valor, $this->usuario, true)){
				return true;
			}
		}
		return false;
	}
	
	public function bajaCuenta(){
		$password = $_POST["password"];
		if(strcmp($password, $this->usuario["password"]) === 0){
			$this->usuarioModel->borrar($this->usuario["id"]);
			session_unset();
			$this->registry->template->show('index');
		}else{
			$this->registry->template->errores = array( "Contraseña Inválida!" );
			$this->closeAccount();
		}
	}
	
}
