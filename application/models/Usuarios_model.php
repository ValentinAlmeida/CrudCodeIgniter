<?php
class Usuarios_model extends CI_Model{

	public function salva($usuario){
		//faz um insert das variaveis do array $usuario
	$this->db->insert("usuarios", $usuario);
	}

	public function logarUsuarios($email, $senha){
		//procura na database as variaveis
		$this->db->where("senha", $senha);
		$this->db->where("email", $email);


		//procura o usuario em get -> select * from usuarios e guarda na row_array()
		$usuario = $this->db->get("usuarios")->row_array();

		return $usuario;
	}
}
