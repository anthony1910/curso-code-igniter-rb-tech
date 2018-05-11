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

		// carrega view
		$dados['titulo'] = "Anthony Rafael - Setup do Sistema";
		$dados['h2'] = "Setup do Sistema";
		$this->load->view("painel/setup", $dados);

	}

}