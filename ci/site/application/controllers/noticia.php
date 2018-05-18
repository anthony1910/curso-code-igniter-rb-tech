<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends CI_Controller {

	public function __construct()
	{

		parent::__construct();

		$this->load->helper("form");

		$this->load->library("form_validation");

		$this->load->model("option_model", "option");

		$this->load->model("noticia_model", "noticia");

	}

	public function index()
	{

		redirect("noticia/listar");

	}

	public function listar()
	{

		// verifica o login
		verifica_login();

		$dados['titulo'] = "Anthony Rafael - Listagem de Notícias";
		$dados['h2'] = "Listagem de Notícias";
		$dados['tela'] = "listar";
		$dados['noticias'] = $this->noticia->get();
		$this->load->view("painel/noticias", $dados);

	}

	public function cadastrar()
	{

		// verifica o login
		verifica_login();

		// regras de validação
		$this->form->set_rules("titulo", "TITULO", "trim|required");
		$this->form->set_rules("conteudo", "CONTEUDO", "trim|required");

		if ($this->form_validation->run() == FALSE) {

			if (validation_errors()) {
				set_msg(validation_errors());
			}

		} else {

			$this->load->library("upload", config_upload());

			if ($this->upload->do_upload("imagem")) {

				$dados_upload = $this->upload->data();

				$dados_form = $this->input->post();

				// recupera os dados
				$dados_insert['titulo'] = $dados_form['titulo'];
				$dados_insert['conteudo'] = $dados_form['conteudo'];
				$dados_insert['imagem'] = $dados_upload['file_name'];

				// salvar no banco
				if ($id = $this->noticia->salvar($dados_insert)) {

					set_msg("Noticía cadastrada com sucesso!");
					redirect("noticia/listar");

				} else {

					set_msg("Notícia não cadastrada");

				}

			} else {
				$msg = $this->upload->display_errors();
				set_msg($msg);
			}

		}

		$dados['titulo'] = "Anthony Rafael - Cadastro de Notícias";
		$dados['h2'] = "Cadastro de Notícias";
		$dados['tela'] = "cadastrar";
		$this->load->view("painel/noticias", $dados);

	}

	public function excluir()
	{

		verifica_login();

		// verifica se o id da noticia foi informado
		if ($id = $this->uri->segment(3) > 0) {

			if ($noticia = $this->noticia->get_single($id)) {

				$dados['noticia'] = $noticia;

			} else {

				set_msg("Notícia inexistente");
				redirect("noticia/listar");

			}

		} else {
			set_msg("Você deve escolher uma notícia para excluir");
			redirect("noticia/listar");
		}

		$this->form_validation->set_rules("enviar", "ENVIAR", "trim|required");

		 if ($this->form_validation->run() === FALSE) {

		 	if (validation_errors()) {
		 		set_msg(validation_errors());
		 	}

		 } else {

		 	$imagem = 'uploads/' . $noticia->imagem;

		 	if ($this->noticia->excluir($id)) {

		 		unlink($imagem);

		 		set_msg("Notícia excluída");

		 		redirect("noticia/listar");

		 	} else {
		 		set_msg("Não excluiu")
		 	}

		 }

		$dados['titulo'] = "Anthony Rafael - Cadastro de Notícias";
		$dados['h2'] = "Cadastro de Notícias";
		$dados['tela'] = "cadastrar";
		$this->load->view("excluir", $dados);

	}

	public function editar()
	{

		verifica_login();

		if ($id = $this->uri->segment(3) > 0) {

			if ($noticia = $this->noticia->get_single($id)) {

				$dados['noticia'] = $noticia;

				$dados_update['id'] = $noticia->id;

			} else {

				set_msg("Notícia inexistente");
				redirect("noticia/listar");

			}

		} else {
			set_msg("Você deve escolher uma notícia para editar");
			redirect("noticia/listar");
		}

		$this->form_validation->set_rules("titulo", "TÍTULO", "trim|required");
		$this->form_validation->set_rules("conteudo", "CONTEÚDO", "trim|required");

		if ($this->form_validation->run() === FALSE) {

			if (validation_errors()) {
				set_msg(validation_errors());
			} else {

				$this->load->library("upload", config_upload());

				if (isset($_FILES['imagem']) && $_FILES['imagem']['name'] !== '') {

					if ($this->upload->do_upload("imagem")) {

						$imagem_antiga = 'uploads/' . $noticia->imagem;

						$dados_upload = $this->upload->data();

						$dados_form = $this->input->post();

						if ($this->noticia->salvar($dados_update)) {

							unlink($imagem_antiga);

							set_msg("Notícia alterada");

							$dados['noticia']->imagem = $dados_update['imagem']

						} else {
							set_msg("Falhou");
						}

					} else {

						$msg = $this->upload->display_errors();

						set_msg($msg);

					}

				} else {

					

				}

			}

		}

	}

}