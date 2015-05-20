<?php

Class userController Extends baseController {

	private $usuarioModel = NULL;
	private $usuario = NULL;
	
	public function onConstruct(){
		$this->usuarioModel = new userModel($this->registry);
		$this->usuario = $_SESSION["_usuario"];
	}
	
	public function index() {
        $this->registry->template->show('user/index');
	}

	public function signin(){
		$this->registry->template->show('user/signin');
	}
	
	public function acount(){
		$this->registry->template->show('user/acount');
	}
	
	public function closeAcount(){
		$this->registry->template->show('user/closeAcount');
	}
	
	public function login(){
		$nick = $_POST["nick"];
		$password = $_POST["password"];
		$this->registry->template->loginNick = true;
		if(!empty($nick)){
			$this->registry->template->loginNick = false;
			$usuario = $this->usuarioModel->obtenerUsuario($nick);
			if(count($usuario) === 0){
				$this->registry->template->loginNick = true;
				$this->registry->template->errores = array( "El nick no existe en el sistema!" );
			}else{
				$_SESSION["_usuario"] = $usuario;
			}		
		}else if(!empty($password)){
			if(strcmp($password, $this->usuario[0]["password"]) === 0){
				$this->registry->template->show('user/index');
				return;
			}else{
				$this->registry->template->errores = array( "Contraseña Inválida!" );
				session_unset();
			}
		}
		$this->registry->template->show('user/login');
	}
	
	public function logout(){
		session_unset();
		$this->redirect(_ROOT);
	}
	
	public function all(){
		$this->registry->template->show('user/list');
	}

	public function altaUsuario(){
		$this->usuarioModel->guardar();
	}
	
	public function modificarDatos(){
		$this->usuarioModel->updateUsuario($this->usuario[0]["id"]);
		$this->index();
	}
	
	public function bajaCuenta(){
		$password = $_POST["password"];
		if(strcmp($password, $this->usuario[0]["password"]) === 0){
			$this->usuarioModel->borrar($this->usuario[0]["id"]);
			session_unset();
			$this->redirect(_ROOT);
		}else{
			$this->registry->template->errores = array( "Contraseña Inválida!" );
			$this->closeAcount();
		}
	}
	
}
