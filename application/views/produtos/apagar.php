<!--  -->
<html>
<head>
	<!-- Recebe o css do bootstrap -->
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
	<title>
		Formulario para apagar
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

		<h1>Apagar produto</h1>
		<?php
		echo form_open("produtos/apagar");

		echo form_label("Id", "id");
		echo form_input(array(
			"name" => "id",
			"id" => "id",
			"class" => "form-control",
			"maxlength" => "255"
		));

		echo form_button(array(
			"class" => "btn btn-primary",
			"type" => "submit",
			"content" => "Apagar"
		));

		echo form_close();
		?>

		<?= anchor("produtos/index", "Voltar", array("class"=>"btn btn-primary")) ?>

	<?php else: redirect("/");?>

	<?php endif ?>

</div>
</body>
</html>
