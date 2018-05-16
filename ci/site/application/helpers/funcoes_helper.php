<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists("set_msg")) { // Sempre verificar se a função não existe, igual ao projeto padrão

	function set_msg($msg = NULL) {

		$ci = & get_instance();
		$ci->session->set_userdata("aviso", $msg);

	}

}

if (!function_exists("get_msg")) {

	function get_msg($destroy = TRUE) { // Pega a mensagem que o set_msg() definir

		$ci = & get_instance();

		$retorno = $ci->session->userdata("aviso");

		if ($destroy) $ci->session->unset_userdata("aviso");

		return $retorno;

	}

}

if (!function_exists("verifica_login")) {

	function verifica_login($redirect = "setup/login") {

		$ci = & get_instance();

		if ($ci->session->userdata("logged") != TRUE) {
			set_msg("Acesso restrito! Faça login para continuar");
			redirect($redirect);
		}

	}

}