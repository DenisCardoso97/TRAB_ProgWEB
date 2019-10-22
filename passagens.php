<!-- Tela de passagens -->
<!DOCTYPE html>
<html>
<?php include("includes/head.php"); ?>
<head>
	<title>Passagens</title>
</head>
<body>
    <!-- Header das páginas -->
	<div>
        <?php include("includes/header.php"); ?>  
    </div>

	<div class="container">      
        <h1>Passagens</h1>
        <div style="display: flex; justify-content: center; align-items: center; height: 600px; background-color: blue;">
            <form action="">
                <label for="passagem">Passagem:</label>
                <input type="text" id="passagem" placeholder="Passagem">
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>