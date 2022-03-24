<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function novo(){
		//cria um array usuario com o post recebido no form de index
		$usuario=array(
			"nome"=> $this->input->post("nome"),
			"email" => $this->input->post("email"),
			"senha" => sha1($this->input->post("senha"))
		);

		//faz o load do model para poder usar suas functions
		$this->load->model("Usuarios_model");

		//usa a function salva que faz um insert no banco
		$this->Usuarios_model->salva($usuario, $email);

		//faz um redirect a view usuario novo
		$this->load->view('usuarios/novo');
	}
}
