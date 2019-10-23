<!-- Styles e Scrips -->
<?php include("includes/head.php") ?>

<?php session_start(); ?>

<!-- Header -->
<header>
	<div>
		<nav class="nav1 navbar navbar-expand-lg navbar-dark bg-dark">
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
  					<span style="color: white">Olá: </span><a href="perfl.php"><strong><?php echo $user['name']; ?></strong></a>
  				</div>
  				<?php } ?>
  					<?php if (!isset($_SESSION['usuario'])) { ?>
						<a class="nav-item nav-link" href="login.php">Login </a>
						<a class="nav-item nav-link" href="cadastrar.php">Cadastrar</a>
					<?php } else { ?>
						<a class="nav-item nav-link" href="logout.php">Sair</a>
					<?php } ?>
			</div>

			<!-- Search -->
			<!-- <form class="form-inline">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
			</form> -->
		</nav>
	</div>
</header>