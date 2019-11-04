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
						<input class="form-control bg-white" type="text" readonly name="Email" value="<?php echo $user['email'];?>">
					</div>
					<div class="form-group">
						<label>Senha: </label>
						<input class="form-control bg-white" type="password" readonly name="Senha" value="">
					</div>
					<button type="submit" class="btn btn-primary" name="alterar">Alterar Campos</button>
				<form>
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
						<input class="form-control bg-white" type="text" name="Email" value="<?php echo $user['email'];?>">
					</div>
					<div class="form-group">
						<label>Senha: </label>
						<input class="form-control bg-white" type="password" name="Senha" value="">
					</div>
					<button type="submit" class="btn btn-danger" name="salvar">Salvar</button>
				</form>	
				<?php } ?>
			</div>
	</div>
	<!-- Footer -->
    <?php include("includes/footer.php") ?>
</body>
</html>