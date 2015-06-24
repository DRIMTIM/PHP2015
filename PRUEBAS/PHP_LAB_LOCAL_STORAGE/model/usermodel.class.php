<?php
class userModel extends AbstractModel{
    
	protected $table_name = "usuarios";
	protected $isLoggedIn = false;
	protected $id = NULL;
	protected $nick = NULL;
	protected $nombre = NULL;
	protected $apellido = NULL;
	protected $email = NULL;
	protected $fechaNac = NULL;
	protected $celular = NULL;
	protected $password = NULL;
	protected $passwordConfirm = NULL;
	protected $pais = NULL;
    protected $edad = NULL;
    
    public function getUsuarios(){
		$usuarios = $this->registry->db->get('usuarios');
		return $usuarios;
	}	
        
	public function guardar(){
		$this->fromArray($_POST);
		$data = $this->toArray();
		unset($data["passwordConfirm"]);
		return $this->registry->db->insert($this->table_name, $data);
	}
	
	public function borrar($idUsuario){
		return $this->registry->db->where("id", $idUsuario)->delete($this->table_name, 1);
	}

	public function obtenerUsuario($nick){
		$usuario = $this->registry->db->where("nick", $nick)->get('usuarios');
		return $usuario[0];
	}
	
	public function obtenerUsuarioForId($id){
		$usuario = $this->registry->db->where("id", $id)->get('usuarios');
		return $usuario[0];
	}
	
	public function updateUsuario($idUsuario){
		$this->fromArray($_POST);
		$data = $this->toArray();
		unset($data["passwordConfirm"]);
		return $this->registry->db->where("id", $idUsuario)->update('usuarios', $data);
	}
}
?>