<style type="text/css">
	#barra1 {
		background-color: #000066;
	}
	#barra2 {
		background-color: #000099;
	}
</style>
<?php include("head.php"); ?>
<header>
		<!-- <div id="barra1">
			<div class="container text-center">
				<div class="row justify-content-end">
					<button onclick="window.location.href='cadastrar.php'" class="btn btn-primary">Cadastrar</button>
					<button onclick="window.location.href='login.php'" class="btn btn-danger">Login</button>
				</div>
			</div>
		</div> -->
		<div>
			<header>
				<nav class="nav1 navbar navbar-expand-lg navbar-dark bg-dark">
					<a class="navbar-brand" href="index.php"><img src="images/plane.png" alt="" style="width:50px; heigth:50px;"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
						<div class="navbar-nav d-flex justify-content-end">
							<a class="nav-item nav-link " href="passagens.php">Passagens<span class="sr-only">(current)</span></a>
							<a class="nav-item nav-link" href="login.php">Login </a>
							<a class="nav-item nav-link" href="cadastrar.php">Cadastro</a>
							<a class="nav-item nav-link " href="sobre.php" tabindex="-1">Sobre nós</a>
						</div>
					</div>
					<!-- <form class="form-inline">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
					</form> -->
				</nav>
			</header>
		</div>
</header>