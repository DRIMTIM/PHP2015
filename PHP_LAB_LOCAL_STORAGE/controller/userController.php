<html>
<?php

Class userController Extends baseController {

	public function onConstruct(){
		$this->model = new userModel($this->registry);
		$this->usuario = json_decode($_POST["__usuario"]);
	}
	
	public function index() {
        $this->show('user/index');
	}

	public function signin(){
		$this->show('user/signin');
	}
	
	public function acount(){
		$this->show('user/acount');
	}
	
	public function closeAcount(){
		$this->show('user/closeAcount');
	}
	
	public function login(){
		$nick = $_POST["nick"];
		$password = $_POST["password"];
		$this->registry->template->loginNick = true;
		if(!empty($nick)){
			$this->registry->template->loginNick = false;
			$usuario = $this->model->obtenerUsuario($nick);
			if(count($usuario) === 0){
				$this->registry->template->loginNick = true;
				$this->errores = array( "El nick no existe en el sistema!" );
			}else{
				$this->usuario = $usuario;
				$this->usuario["isLoggedIn"] = false;
			}		
		}else if(!empty($password)){
			if($this->checkPassword($password, $_POST["__uid_"])){
				$this->usuario = $this->model->obtenerUsuarioForId($_POST["__uid_"]);
				$this->usuario["isLoggedIn"] = true;
				$this->show('user/index');
				return;
			}else{
				$this->errores = array( "Contraseña Inválida!" );
			}
		}
		$this->show('user/login');
	}
	
	private function checkPassword($password, $id){
		$usuario = $this->model->obtenerUsuarioForId($id);
		if(strcmp($password, $usuario["password"]) === 0){
			return true;
		}
		return false;
	}
	
	public function logout(){
		unset($this->usuario);
		$this->redirect(__ROOT);
	}
	
	public function all(){
		$this->show('user/list');
	}

	public function altaUsuario(){
		$this->model->guardar();
	}
	
	public function modificarDatos(){
		$this->model->updateUsuario($this->usuario->id);
		$this->usuario = $this->model->obtenerUsuario($this->usuario->nick);
		$this->usuario["isLoggedIn"] = true;
		$this->index();
	}
	
	public function bajaCuenta(){
		$password = $_POST["password"];
		if(strcmp($password, $this->usuario->password) === 0){
			$this->model->borrar($this->usuario->id);
			unset($this->usuario);
			$this->redirect(__ROOT . "?ca=true");
		}else{
			$this->errores = array( "Contraseña Inválida!" );
			$this->closeAcount();
		}
	}
	
}
?>
</html>