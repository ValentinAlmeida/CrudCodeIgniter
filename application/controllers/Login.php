<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function autenticar(){
		//carregar o model de usuarios_model para usar
		$this->load->model("Usuarios_model");

		//puxa o post do formulario do index.php
		$email = $this->input->post("email");
		$senha = sha1($this->input->post("senha")); //sha1 modelo de encriptação

		//faz o login do usuario com a função logarUsuarios passando senha e email
		$usuario = $this->Usuarios_model->logarUsuarios($email, $senha);

		//verifica se o usuario existe
		if($usuario){
			//set_userdata faz com que a session seja usuario_logado
			$this->session->set_userdata("usuario_logado", $usuario);

			//temporariamente caso seja sucess ou danger transmite algo
			$this->session->set_flashdata("success", "Logado com sucesso!");
		}else{
			$this->session->set_flashdata("danger", "Usuario ou senha invalidos!");
		}
		redirect('/');
	}

	public function logout(){
		//tira o valor do set_userdata
		$this->session->unset_userdata("usuario_logado");
		$this->session-> set_flashdata("success", "Deslogado com Sucesso");
		redirect('/');
	}
}
