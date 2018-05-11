<!DOCTYPE html>
<!--
Template Name: Geodarn
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
	<head>
		<title>
		  <?php
		  if(isset($titulo)) {
		    echo $titulo;
		  } else {
		    echo "Título da Página";
		  }
		  ?>
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link href="<?php echo base_url('assets/layout/styles/layout.css'); ?>" rel="stylesheet" type="text/css" media="all">
		<link href="<?php echo base_url('assets/layout/styles/painel.css'); ?>" rel="stylesheet" type="text/css" media="all">
	</head>
	<body id="top">

		<div class="linha">
			<div class="coluna col3">&nbsp;</div>
			
			<div class="coluna col6">
				<h2><?php echo $h2; ?></h2>
				<?php

					echo form_open();
					echo form_label("Nome para login:", "login");
					echo form_input("login", set_value("login"), array("autofocus" => "autofocus"));

					echo form_label("Email do Administrador do site:", "email");
					echo form_input("email", set_value("email"));

					echo form_label("Senha:", "senha");
					echo form_password("senha", set_value("senha"));

					echo form_label("Repita a senha:", "senha2");
					echo form_password("senha2", set_value("senha2"));

					echo form_submit("enviar", "Salvar dados", array("class" => "botão"));

					echo form_close();

				?>
			</div>

			<div class="coluna col3">&nbsp;</div>
		</div>

	</body>

</html>