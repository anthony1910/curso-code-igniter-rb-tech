<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // Primeira linha deve ser mantida sempre. Ela define que ninguém consiga acessar o arquivo de maneira direta

class Pagina extends CI_Controller { // Nome do arquivo e da classe deve ser o mesmo sempre

	public function __construct() // Importante ter esse método para carregar as bibliotecas necessárias
	{

		parent::__construct();

		$this->load->helper("url"); // Esse helper me ajuda a usa a URL base do meu projeto para chamar arquivos, com a função base_url()

	}

	public function index()
	{
		$dados['titulo'] = "Anthony Rafael";
		$this->load->view("home", $dados);
	}

}
