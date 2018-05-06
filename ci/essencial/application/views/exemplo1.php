<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // Essa linha deve estar sempre nos arquivos para garantir que ninguém irá ter acesso direto ao projeto
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>View de Exemplo</title>
</head>
<body>

<div id="container">

	<h1><?php echo $titulo; ?></h1>

	<div id="body">
		<p><?php echo $conteudo; ?></p>
	</div>

</div>

</body>
</html>