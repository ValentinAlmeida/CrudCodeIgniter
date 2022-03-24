<!--  -->
<html>
<head>
	<!-- Recebe o css do bootstrap -->
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
	<title>
		Formulario
	</title>
</head>
<body>

<div class="container">

	<!-- carrega no topo da pagina o flashdata -->

	<?php
	if($this->session->flashdata("success")) : ?>
		<p class="alert alert-success"><?= $this->session->flashdata("success")    ?></p>
	<?php endif; ?>

	<?php
	if($this->session->flashdata("danger")) : ?>
		<p class="alert alert-danger"> <?= $this->session->flashdata("danger") ?></p>
	<?php endif; ?>
	<!-- So entra no h1 produtos quando passar pelo userdata usuario_logado -->
	<?php if($this->session->userdata("usuario_logado")) : ?>

		<h1>Formulario</h1>
		<?php
		echo form_open("produtos/novo");

		echo form_label("Nome", "nome");
		echo form_input(array(
			"name" => "nome",
			"id" => "nome",
			"class" => "form-control",
			"maxlength" => "255"
		));

		echo form_label("Preço", "preco");
		echo form_input(array(
			"name" => "preco",
			"id" => "preco",
			"class" => "form-control",
			"maxlength" => "255"
		));

		echo form_label("Descrição", "descricao");
		echo form_textarea(array(
			"name" => "descricao",
			"id" => "descricao",
			"class" => "form-control",
			"maxlength" => "255"
		));

		echo form_button(array(
			"class" => "btn btn-primary",
			"type" => "submit",
			"content" => "Cadastrar"
		));

		echo form_close();
		?>

		<?= anchor("produtos/index", "Voltar", array("class"=>"btn btn-primary")) ?>


	<?php else: redirect("/");?>


	<?php endif ?>

</div>
</body>
</html>
