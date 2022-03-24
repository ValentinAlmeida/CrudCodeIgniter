<?php

class Produtos_model extends CI_Model{
	public function buscaTodos(){
		//faz o select + de produtos e guarda na result_array()
		return $this->db->get("produtos")->result_array();
	}

	public function salva($produto){
		$this->db->insert("produtos", $produto);
	}

	public function apagar($produto){
		$this->db->delete("produtos", $produto);
	}
}
