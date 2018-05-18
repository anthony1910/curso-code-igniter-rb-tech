<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // Primeira linha deve ser mantida sempre. Ela define que ninguém consiga acessar o arquivo de maneira direta

class Pagina extends CI_Controller { // Nome do arquivo e da classe deve ser o mesmo sempre

	public function __construct() // Importante ter esse método para carregar as bibliotecas necessárias
	{

		parent::__construct();

		$this->load->helper("url"); // Esse helper me ajuda a usa a URL base do meu projeto para chamar arquivos, com a função base_url()

		$this->load->model("option_model", "option");

	}

	public function index()
	{
		$dados['titulo'] = "Anthony Rafael";
		$this->load->view("home", $dados);
	}

	public function gallery()
	{
		$dados['titulo'] = "Anthony Rafael - Galeria";
		$this->load->view("gallery", $dados);
	}

	public function grid()
	{
		$dados['titulo'] = "Anthony Rafael - Grid";
		$this->load->view("grid", $dados);
	}

	public function left()
	{
		$dados['titulo'] = "Anthony Rafael - Left";
		$this->load->view("left", $dados);
	}

	public function right()
	{
		$dados['titulo'] = "Anthony Rafael - Right";
		$this->load->view("right", $dados);
	}

	public function width()
	{
		$this->load->helper("form");
		$this->load->library(array("form_validation", "email")); // Chamando uma biblioteca do CI
		
		// Regras de validação do formulário
		$this->form_validation->set_rules("nome", "Nome", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("assunto", "Assunto", "trim|required");
		$this->form_validation->set_rules("mensagem", "Mensagem", "trim|required");
		// Teste da validação
		if ($this->form_validation->run() === FALSE) {
			$dados['formerror'] = validation_errors();
		} else {

			$dados_form = $this->input->post(); // Recupera os valores do formulário

			$this->email->from($dados_form['email'], $dados_form['nome']);
			$this->email->to("anthonyribeiro1910@gmail.com");
			$this->email->subject($dados_form['assunto']);
			$this->email->message($dados_form['mensagem']);

			if ($this->email->send()) {
				$dados['formerror'] = "Email enviado com sucesso!";
			} else {
				$dados['formerror'] = "Erro ao enviar o email";
			}		

		}

		$dados['titulo'] = "Anthony Rafael - Width";
		$this->load->view("width", $dados);		
	}

	public function post()
	{

		if ($id = $this->uri->segment(2) > 0) {

			if ($noticia = $this->noticia->get_single($id)) {

				$dados['titulo'] = $noticia->titulo;
				$dados['conteudo'] = $noticia->conteudo;

			} else {

				$dados['titulo'] = "Não encontrado";
				$dados['conteudo'] = "Não encontrado";

			}

		}

	}

}
