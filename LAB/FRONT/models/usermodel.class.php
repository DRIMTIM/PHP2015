<?php
class userModel extends AbstractModel{
    
	protected $table_name = "usuarios";
	protected $id = NULL;
	protected $nick = NULL;
	protected $nombre = NULL;
	protected $apellido = NULL;
	protected $email = NULL;
	protected $fechaNac = NULL;
	protected $celular = NULL;
	protected $password = NULL;
	protected $passwordConfirm = NULL;
    protected $edad = NULL;
    protected $isLoggedIn = false;
    protected $modificarPassword = false;
    
    public function getUsuarios(){
		$usuarios = $this->registry->db->get('usuarios');
		return $usuarios;
	}	
        
	public function guardar(){
		$this->fromArray($_POST);
		$data = $this->toArray();
		//Quito los campos que no existen en la base
		unset($data["passwordConfirm"]);
		unset($data["isLoggedIn"]);
		//Formateo la fecha de nacimiento al formato de sql
		$data["fechaNac"] = GenericUtils::getInstance()->getFormatDateIn($data["fechaNac"]);
		//Calculo la edad
		$data["edad"] = GenericUtils::getInstance()->getYears($data["fechaNac"]);
		return $this->registry->db->insert($this->table_name, $data);
	}
	
	public function borrar($idUsuario){
		return $this->registry->db->where("id", $idUsuario)->delete($this->table_name, 1);
	}

	public function obtenerUsuario($nick){
		$usuario = $this->registry->db->where("nick", $nick)->get('usuarios');
		if(count($usuario) > 0){
			//Formateo la fecha nac de salida
			$usuario[0]["fechaNac"] = GenericUtils::getInstance()->getFormatDateOut($usuario[0]["fechaNac"]);
		}
		return $usuario[0];
	}
	
	public function updateUsuario($idUsuario){
		$this->fromArray($_POST);
		$data = $this->toArray();
		//Quito los campos que no existen en la base
		unset($data["passwordConfirm"]);
		unset($data["isLoggedIn"]);
		unset($data["modificarPassword"]);
		//Formateo la fecha de nacimiento al formato de sql
		$data["fechaNac"] = GenericUtils::getInstance()->getFormatDateIn($data["fechaNac"]);
		return $this->registry->db->where("id", $idUsuario)->update('usuarios', $data);
	}
}
?>