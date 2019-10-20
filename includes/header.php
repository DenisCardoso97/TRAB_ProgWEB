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
		<div id="barra1">
			<div class="container text-center">
				<div class="row justify-content-end">
					<button onclick="window.location.href='cadastrar.php'" class="btn btn-primary">Cadastrar</button>
					<button onclick="window.location.href='login.php'" class="btn btn-danger">Login</button>
				</div>
			</div>
		</div>
		<div id="barra2">
			<div class="text-center">
				<img src="images/plane.png" style="max-width: 80px; cursor:pointer; margin-right: 100px" onclick="window.location.href='index.php'">
				<button onclick="window.location.href='voos.php'" style="color: white" class="btn btn-outline-primary">Voos <br>e destinos</button>
				<button onclick="window.location.href='administrar.php'" style="color: white" class="btn btn-outline-primary">Administrar <br>voos</button>
				<button onclick="window.location.href='informacoes.php'" style="color: white" class="btn btn-outline-primary">Informações <br>de viagem</button>
			</div>
		</div>
</header>