<!-- Styles e Scrips -->
<?php include("includes/head.php"); ?> 

<!-- Tela principal -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Companhia Aérea - Aviões do Forró</title>
		
		<style>
			body {
				background: url("images/imagensPS1.jpg") no-repeat;
			}

			.container {
				min-height: 92vh;
				margin-top: 77px;
			}

			.message {
				border-top: 3px solid black;
				border-bottom: 3px solid black;
				margin-bottom: 28px;
				background-color: rgba(230, 255, 255, 0.3);
				
			}
		</style>
	</head>
		<body>
			<!-- Header das páginas -->
			<div>
				<?php include("includes/header.php"); ?>
			</div>

			<!-- Body -->
			<div class="container d-flex justify-content-center align-items-center bd-highlight">
				<div class="message d-flex flex-column justify-content-center align-items-center bd-highlight shadow">
					<h1 class="display-1">As melhores experiências</h1>
					<h3><em>Viaje para onde quiser. E nem precisa de cartão de crédito</em></h3>
				</div>
				
			</div>
			
			<?php include("includes/footer.php") ?>
		</body>
</html>