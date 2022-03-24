<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index(){
		//faz o load da model de produtos
		$this->load->model("Produtos_model");

		//lista todos os produtos e guarda na variavel como um array
		$lista = $this->Produtos_model->buscaTodos();

		//recebe a lista como array
		$dados = array("produtos" => $lista);

		//carrega a view com os dados recebidos na lista
		$this->load->view('produtos/index', $dados);

	}

	public function formulario(){
		$this->load->view('produtos/formulario');
	}

	public function novo(){
		$user_id = $this->session->userdata("usuario_logado");
		$produto = array(
			"nome" => $this->input->post("nome"),
			"preco" => $this->input->post("preco"),
			"descricao" => $this->input->post("descricao"),
			"user_id" => $user_id['id']
		);

		$this->load->model("Produtos_model");
		$this->Produtos_model->salva($produto);
		$this->session->set_flashdata("success", "Produto cadastrado com sucesso!");
		redirect("/");
	}

	public function formulario_apagar(){
		$this->session->set_flashdata("danger", "É necessario que você tenha colocado o produto para apagar");
		$this->load->view('produtos/apagar');
	}

	public function apagar(){
		$user_id = $this->session->userdata("usuario_logado");
		$produto = array(
			"id" => $this->input->post("id"),
			"user_id" => $user_id['id']
		);

		$this->load->model("Produtos_model");
		$this->Produtos_model->apagar($produto);
		$this->session->set_flashdata("success", "Produto apagado com sucesso!");
		redirect("/");
	}
}
