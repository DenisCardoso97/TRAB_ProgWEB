<link rel="stylesheet" type="text/css" href="css/header.css">
<?php include("head.php"); ?>
<header>
		<div id="barra1">
			<div class="text-center">
				<button onclick="window.location.href='cadastrar.php'" id="btnCadastro">Cadastrar</button>
				<button onclick="window.location.href='login.php'" id="btnLogin">Login</button>
			</div>
		</div>
		<div id="barra2">
			<div class="text-center">
				<img src="images/plane.png" style="max-width: 80px; cursor:pointer;" onclick="window.location.href='index.php'">
				<button onclick="window.location.href='voos.php'" id="btn">Voos <br>e destinos</button>
				<button onclick="window.location.href='administrar.php'" id="btn">Administrar <br>voos</button>
				<button onclick="window.location.href='informacoes.php'" id="btn">Informações <br>de viagem</button>
			</div>
		</div>
</header>