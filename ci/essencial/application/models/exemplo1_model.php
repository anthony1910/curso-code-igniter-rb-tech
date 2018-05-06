<?php

defined('BASEPATH') OR exit('No direct script access allowed'); // Primeira linha deve ser mantida sempre. Ela define que ninguém consiga acessar o arquivo de maneira direta

class Exemplo1_model extends CI_Model { // Nome do arquivo e do model deve ser o mesmo sempre e extender do CI_Model

	public function __construct() // Importante ter esse método para carregar as bibliotecas necessárias
	{

		parent::__construct();

	}

	public function salvar()
	{
		echo "Executando método salvar do model";		
	}

}