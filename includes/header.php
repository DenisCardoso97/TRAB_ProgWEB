<!-- Styles e Scrips -->
<?php include("includes/head.php") ?>

<!-- Começa a sessão atual -->
<?php session_start(); ?>

<!-- Header -->
<header>
	<div>
		<nav class="nav1 navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="opacity: 0.90;">

			<!-- Aviãozinho -->
			<a class="navbar-brand" href="index.php"><img src="images/plane.png" alt="" style="width:50px; heigth:50px;"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav d-flex justify-content-end">
					<a class="nav-item nav-link " href="passagens.php">Passagens<span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link " href="sobre.php" tabindex="-1">Sobre nós</a>
				</div>
				<div class="collapse navbar-collapse">
				</div>
				<?php if (isset($_SESSION['usuario'])) {
      					$user = $_SESSION['usuario']; 	
  				?>
  				<div class="navbar-right">
  					<span style="color: white">Olá: </span><a href="perfil.php"><strong><?php echo $user['name']; ?></strong></a>
  				</div>
  					<a class="nav-item nav-link" href="minhasPassagens.php">Minhas Passagens</a>
  				<?php } ?>
  					<?php if (!isset($_SESSION['usuario'])) { ?>
						<a class="nav-item nav-link" href="login.php">Login </a>
						<a class="nav-item nav-link" href="cadastrar.php">Cadastrar</a>
					<?php } else {
							if ($user['admin'] === 'true') { ?>
								<a class="nav-item nav-link" href="adicionarPassagens.php">Adicionar Passagens</a>
								<a class="nav-item nav-link" href="alterarPassagens.php">Lista de Passagens</a>
						<?php }	?>				
						<a class="nav-item nav-link" href="logout.php">Sair</a>
					<?php } ?>
			</div>
		</nav>
	</div>
</header>