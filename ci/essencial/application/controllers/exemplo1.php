<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // Primeira linha deve ser mantida sempre. Ela define que ninguém consiga acessar o arquivo de maneira direta

class Exemplo1 extends CI_Controller { // Nome do arquivo e da classe deve ser o mesmo sempre e extender do CI_Controller

	public function __construct() // Importante ter esse método para carregar as bibliotecas necessárias
	{

		parent::__construct();

		$this->load->model("Exemplo1_model", "apelido_model"); // Com esse método posso chamar um model. Devo usar tal método no construtor do controller como configuração. O model se torna uma parte do objeto. Segundo parâmetro espera um apelido para o model

	}

	public function index()
	{
		$dados['titulo'] = "Essa é a minha segunda view!"; // Sempre fazer isso ao passar dados para as views. Tratar esses dados
		$dados['conteudo'] = "May the Force be with you";
		$this->load->view("exemplo1", $dados); // Esse método chama uma view. Sempre chamar views
	}

	public function login()
	{
		/*
		echo "Executando método login do controller e passado o parâmetro ";
		echo $this->uri->segment(3); // Esse método recupera o parâmetro passado na URL. É necessário informar a posição nela. A primeira é o nome do controller, a segunda o nome do método e a terceira o primeiro parâmetro
		*/

		$this->apelido_model->salvar();

	}

}
