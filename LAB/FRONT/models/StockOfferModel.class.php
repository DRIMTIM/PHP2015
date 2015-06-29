<?php
class StockOfferModel extends OfferModel{
	
	protected $stock = NULL;
	
	public function onConstruct(){
		parent::onConstruct();
		$this->super_table_name = $this->table_name;
		$this->table_name = "OFERTAS_STOCK";
	}
	
	public function getAll(){
		$items = $this->registry->db->join($this->super_table_name . " AS O", "O.id = OS.id", "INNER")->get($this->table_name . " AS OS");
		return $items;
	}
	
	public function getOfertasValidas(){
		$ofertasValidas = array();
		$ofertas = $this->getAll();
		
		foreach ($ofertas as $oferta){
			if($oferta["activa"] == true && $oferta["stock"] > 0){
				array_push($ofertasValidas, $oferta);
			}
		}
		
		return $ofertasValidas;
	}
	
}
?>