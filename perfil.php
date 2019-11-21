<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>

	<style>
		.container {
            min-height: 92vh;
			margin-top: 77px;
		}

		.form-div{
			margin-bottom: 300px;
		}
		
		.perfil {
			border-top: 1px solid black;
			border-bottom: 1px solid black;
			background-color: rgba(230, 255, 255, 0.3);
			
		}
	</style>
</head>
<body>
	<?php if (isset($_POST['salvarSenha'])) {
		// TODO: alterar senha banco
		echo "<script>alert('Senha alterada!');</script>";
	} ?>
	<?php if (isset($_POST['salvarCampos'])) {
		// TODO: alterar campos banco
		echo "<script>alert('Campo(s) alterado(s)!');</script>";
	} ?>
	<div>
		<!-- Styles e Scrips -->
		<?php include("includes/header.php") ?>
	</div>

	<div class="container d-flex flex-column justify-content-between align-items-center">
		<div class="perfil">
			<h6 class="display-4">Perfil</h6>
		</div>
		
		<?php if(!isset($_POST['alterar'])){ ?>

			<div class="form-div">
				<form method="POST">
					<div class="form-group">
						<label >Nome: </label>
						<input class="form-control bg-white" type="text" readonly name="Nome" value="<?php echo $user['name'];?>">
					</div>
					<div class="form-group">
						<label>E-mail: </label>
						<input class="form-control bg-white" type="email" readonly name="Email" value="<?php echo $user['email'];?>">
					</div>
					<div class="form-group">
						<label>CPF: (Não pode ser mudado) </label>
						<input class="form-control bg-white" type="text" readonly name="CPF" value="<?php echo $user['cpf'];?>">
					</div>
					<div class="form-group">
						<label>Telefone: </label>
						<input class="form-control bg-white" type="text" readonly name="Telefone" value="<?php echo $user['phone'];?>">
					</div>
					<div class="form-group">
						<label>Data de aniversário: </label>
						<input class="form-control bg-white" type="text" readonly name="Data" value="<?php echo $user['birthdate'];?>">
					</div>
					<button type="submit" class="btn btn-primary" name="alterar">Alterar Campos</button>
					<button type="submit" class="btn btn-primary" name="alterar" value="senha">Alterar Senha</button>
				<form>
			</div>
			<?php } else if ($_POST['alterar'] === 'senha') { ?>
				<div class="form-div">
					<form method="POST">
						<div class="form-group">
							<label>Senha: </label>
							<input class="form-control bg-white" type="password" name="Senha">
						</div>
						<button type="submit" class="btn btn-danger" name="salvarSenha">Salvar</button>
						<button type="submit" class="btn btn-secondary" name="cancelar">Cancelar</button>
					</form>
				</div>
			<?php } else { ?>
			<div class="form-div">
				<form method="POST">
					<div class="form-group">
						<label>Nome: </label>
						<input class="form-control bg-white" type="text" name="Nome" value="<?php echo $user['name'];?>">
					</div>
					<div class="form-group">
						<label>E-mail: </label>
						<input class="form-control bg-white" type="email" name="Email" value="<?php echo $user['email'];?>">
					</div>
					<div class="form-group">
						<label>Telefone: </label>
						<input class="form-control bg-white" type="text" name="Telefone" value="<?php echo $user['phone'];?>">
					</div>
					<div class="form-group">
						<label>Data de aniversário: </label>
						<input class="form-control bg-white" type="date" name="Data" value="<?php echo $user['birthdate'];?>">
					</div>
					<button type="submit" class="btn btn-danger" name="salvarCampos">Salvar</button>
					<button type="submit" class="btn btn-secondary" name="cancelar">Cancelar</button>
				</form>	
				<?php } ?>
			</div>
	</div>
	<!-- Footer -->
    <?php include("includes/footer.php") ?>
</body>
</html>