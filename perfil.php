<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
</head>
<body>
	<div>
		<!-- Styles e Scrips -->
		<?php include("includes/header.php") ?>
	</div>

	<div class="container">
		<h1>Perfil</h1>


		<?php if(!isset($_POST['alterar'])){ ?>

			<form method="POST">
				<div>
					<label>Nome: </label>
					<input type="text" readonly name="Nome" value="<?php echo $user['name'];?>">
				</div>
				<div>
					<label>E-mail: </label>
					<input type="text" readonly name="Email" value="<?php echo $user['email'];?>">
				</div>
				<div>
					<label>Senha: </label>
					<input type="password" readonly name="Senha" value="">
				</div>
				<button type="submit" class="btn btn-primary" name="alterar">Alterar Campos</button>
			<form>
			<?php } else { ?>
			<form method="POST">
				<div>
					<label>Nome: </label>
					<input type="text" name="Nome" value="<?php echo $user['name'];?>">
				</div>
				<div>
					<label>E-mail: </label>
					<input type="text" name="Email" value="<?php echo $user['email'];?>">
				</div>
				<div>
					<label>Senha: </label>
					<input type="password" name="Senha" value="">
				</div>
				<button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
				<?php } ?>
			</form>	
	</div>
</body>
</html>