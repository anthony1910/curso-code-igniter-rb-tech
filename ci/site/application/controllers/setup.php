<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

	public function __construct()
	{

		parent::__construct();

		$this->load->helper("form");

		$this->load->library("form_validation");

		$this->load->model("option_model", "option");

	}

	public function index()
	{
		if ($this->option->get_option("setup_executado") === 1) {

			// setup ok
			redirect("setup/alterar", "refresh");

		} else {

			// não instalado, mostra tela de setup
			redirect("setup/instalar", "refresh");

		}
	}

	public function instalar()
	{

		if ($this->option->get_option("setup_executado") === 1) {

			// setup ok, mostra tela de alterar
			redirect("setup/alterar", "refresh");

		}

		// regras de validação
		$this->form_validation->set_rules("login", "NOME", "trim|required|min_length[5]");
		$this->form_validation->set_rules("email", "EMAIL", "trim|required|valid_email");
		$this->form_validation->set_rules("senha", "SENHA", "trim|required|min_length[6]");
		$this->form_validation->set_rules("senha2", "REPITA A SENHA", "trim|required|min_length[6]|matches[senha]");

		// verifica a validação
		if ($this->form_validation->run() === FALSE) {

			if (validation_errors()) {
				set_msg(validation_errors());
			}

		} else {

			$dados_form = $this->input->post(); // recupera os valores dos inputs do formulário

			$this->option->update_option("user_login", $dados_form['login']);
			$this->option->update_option("user_email", $dados_form['email']);
			$this->option->update_option("user_pass", password_hash($dados_form['senha'], PASSWORD_DEFAULT));
			$inserido = $this->option->update_option("setup_executado", 1);

			if ($inserido) {

				set_msg("<p>Sistema instalado, use os dados cadastrados para logar no sistema.</p>");
				redirect("setup/login");

			}			

		}

		// carrega view
		$dados['titulo'] = "Anthony Rafael - Setup do Sistema";
		$dados['h2'] = "Setup do Sistema";
		$this->load->view("painel/setup", $dados);

	}

	public function login() {

		if ($this->option->get_option("setup_executado") != 1) {
			// setup não está ok, redireciona para instalar
			redirect("setup/instalar");
		}

		// regras de validação
		$this->form_validation->set_rules("login", "NOME", "trim|required|min_length[5]");
		$this->form_validation->set_rules("senha", "SENHA", "trim|required|min_length[6]");

		if ($this->form_validation->run() === FALSE) {

			if (validation_errors()) {
				set_msg(validation_errors());
			}

		} else {

			$dados_form = $this->input->post();

			if ($this->option->get_option("user_login") == $dados_form['login']) {
				// usuário existe. Verifica senha
				if (password_verify($dados_form['login'], $this->option->get_option("user_pass"))) {
					// senha ok. Fazer login
					$this->session->set_userdata("logged", true);
					$this->session->set_userdata("user_login", $dados_form['login']);
					$this->session->set_userdata("user_email", $this->option->get_option("user_email"));

					// fazer redirect para a home do painel
					redirect("setup/alterar");
				} else {
					// senha incorreta
					set_msg("Senha está incorreta!");
				}

			} else {
				// usuário não existe
				set_msg("Usuário inexistente!");
			}

		}

		$dados['titulo'] = "Anthony Rafael - Acesso ao Sistema";
		$dados['h2'] = "Acessar o painel";
		$this->load->view("painel/login", $dados);

	}

	public function alterar() {

		// verificar o login do usuário
		verifica_login();

		// regras de validação
		$this->form_validation->set_rules("login", "NOME", "trim|required|min_length[5]");
		$this->form_validation->set_rules("email", "EMAIL", "trim|required|valid_email");
		$this->form_validation->set_rules("senha", "SENHA", "trim|min_length[6]");

		if (isset($_POST['senha']) && $_POST['senha'] != '') {
			$this->form_validation->set_rules("senha2", "REPITA A SENHA", "trim|required|min_length[6]|matches[senha]");
		}

		if ($this->form_validation->run() === FALSE) {

			if (validation_errors()) {
				set_msg(validation_errors());
			}

		} else {

			$dados_form = $this->input->form();

			$this->option->update_option("user_login", $dados_form['login']);
			$this->option->update_option("user_email", $dados_form['email']);
			$this->option->update_option("nome_site", $dados_form['nome_site']);

			if (isset($dados_form['senha']) && $dados_form['senha'] != '') {
				$this->option->update_option("user_pass", password_hash($dados_form['senha'], PASSWORD_DEFAULT));
			}

			set_msg("Dados alterados com sucesso!");

		}

		// carrega a view
		$_POST['login'] = $this->option->get_option("user_login");
		$_POST['email'] = $this->option->get_option("user_email");
		$_POST['nome_site'] = $this->option->get_option("nome_site");
		$dados['titulo'] = "Anthony Rafael - Configuração do Sistema";
		$dados['h2'] = "Alterar configuração básica";
		$this->load->view("painel/config", $dados);

	}

	public function logout() {

		// destrói dados da sessão
		$this->session->unset_userdata('logged');
		$this->session->unset_userdata('user_login');
		$this->session->unset_userdata('user_email');
		
		set_msg("Você saiu do Sistema");
		redirect("setup/login");

	}

}