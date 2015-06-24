<?php
class CategoryModel extends AbstractModel{
    
	protected $table_name = "CATEGORIAS";
	protected $id = null;
	protected $nombre = null;
	protected $descripcion = null;
	
	public function getCategorias(){
		$categorias = $this->registry->db->get($this->table_name);
		return $categorias;
	}
	
}
?>