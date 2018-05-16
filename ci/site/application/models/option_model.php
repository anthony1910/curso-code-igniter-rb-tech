<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Option_model extends CI_Model {

	public function __construct()
	{

		parent::__construct();

	}

	public function get_option($option_name)
	{

		$this->db->where('option_name', $option_name);

		$query = $this->db->get("options", 1);

		if ($query->num_rows() === 1) {

			$row = $query->row();

			return $row->option_value;

		} else {
			return NULL;
		}

	}

	public function update_option($option_name, $option_value) {

		$this->db->where("option_name", $option_name);

		$query = $this->db->get("options", 1);

		if ($query->num_rows() === 1) {
			// a opção já existe. Devo atualizá-la
			$this->db->set("option_value", $option_value); // Atualiza o valor de um dado na tabela. Espera o nome do campo e o novo valor
			$this->db->where("option_name", $option_name);
			$this->db->update("options"); // Realiza o processo de update
			return $this->db->affected_rows(); // retorna número de linhas afetadas pela query
		} else {
			// a opção não existe. Devo criá-la
			$dados = array( // todas as validações são feitas no Controller
				"option_name"=>$option_name,
				"option_value"=>$option_value
			);

			$this->db->insert("options", $dados); // insere os dados. Informo o nome da tabela e os dados a ser inseridos

			return $this->db->insert_id();
		}



	}

}