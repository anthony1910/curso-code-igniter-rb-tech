<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // Primeira linha deve ser mantida sempre. Ela define que ninguém consiga acessar o arquivo de maneira direta

class Base extends CI_Controller { // Nome do arquivo e da classe deve ser o mesmo sempre

	public function __construct() // Importante ter esse método para carregar as bibliotecas necessárias
	{

		parent::__construct();

	}

	public function index()
	{
		// método padrão do controller
	}

}
