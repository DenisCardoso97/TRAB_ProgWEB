<!-- Styles e Scrips -->
<?php include("includes/head.php"); ?> 

<!-- Tela principal -->
<!DOCTYPE html>
<html lang="en">
	<head>
	    <title>Companhia Aérea - Aviões do Forró</title>
	</head>
		<body>
			<!-- Header das páginas -->
			<div>
				<?php include("includes/header.php"); ?>
			</div>
			<!-- Slideshow da página principal -->
			<link rel="stylesheet" type="text/css" href="css/slideshow.css">
			<div>
				<img src="images/img1.jpg" class="mySlides img-fluid" style="width: 100%;" >
				<img src="images/img2.jpg" class="mySlides img-fluid" style="width: 100%;">
				<img src="images/img3.jpg" class="mySlides img-fluid" style="width: 100%;">
			</div>
			<!-- Script para slideshow -->
			<?php include("includes/script.php"); ?>
		</body>
</html>