<?php

Class IndexController Extends baseController {

	private $categoriasModel = null;
	
	public function onConstruct(){
		$this->categoriasModel = new CategoryModel($this->registry);
	}
		
	public function index() {
		/*** Cargo las categorias en el template para mostrarlas ***/
	    $this->registry->template->categorias = $this->categoriasModel->getCategorias();
		/*** load the index template ***/
	    $this->registry->template->show('index');
	}

}

?>
