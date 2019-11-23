<!-- Styles e Scrips --> 	
<?php include("includes/head.php") ?>

<?php include_once("includes/config.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Adicionar Passagens</title>
	<link rel="stylesheet" href="css/login.css">

</head>
<body>
	<?php
        include("includes/header.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $stmt = $db->prepare("INSERT INTO passagens (valor,origem,destino,dataSaida,horarioSaida,horarioChegada,classe) VALUES (?,?,?,?,?,?,?)");
            $stmt->bindValue(1, $_POST["valor"], SQLITE3_TEXT);
            $stmt->bindValue(2, $_POST["origem"], SQLITE3_TEXT);
            $stmt->bindValue(3, $_POST["destino"], SQLITE3_TEXT);
            $stmt->bindValue(4, $_POST["dataSaida"], SQLITE3_TEXT);
            $stmt->bindValue(5, $_POST["horarioSaida"], SQLITE3_TEXT);
            $stmt->bindValue(6, $_POST["horarioChegada"], SQLITE3_TEXT);
            $stmt->bindValue(7, $_POST["classe"], SQLITE3_TEXT);

            try {
              $result = $stmt->execute();
              echo "<script>alert('Passagem adicionada com sucesso!');</script>";
            } catch (Throwable $th) {
              echo "<script>alert('Passagem já cadastrada!');</script>";
            }
        }
    ?>
 	<?php if (isset($_SESSION['usuario']) && $user['admin'] === 'true') { ?>
 		
        <div class="container-fluid img-fluid bg">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12"></div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <!-- inicio form -->
                    <form method="POST" class="form-container rounded">
                        <h1 class="text-center">Adicionar Passagem</h1>

                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="number" class="form-control" name="valor" required>
                        </div>

                        <div class="form-group">
                            <label for="origem">Origem</label>
                            <select name="origem" class="browser-default custom-select custom-select-lg mb-3" required>
                                <option value="" disabled selected>- Selecione Origem - </option>
                                <option value="Campo Grande">Campo Grande</option>
                                <option value="Maringa">Maringa</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="destino">Destino</label>
                            <select name="destino" class="browser-default custom-select custom-select-lg mb-3" required>
                                <option value="">- Selecione Destino - </option>
                                <option value="Campo Grande">Campo Grande</option>
                                <option value="Maringa">Maringa</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="dataSaida">Data de saida do vôo</label>
                            <input type="date" class="form-control" name="dataSaida" required>
                        </div>

                        <div class="form-group">
                            <label for="horarioSaida">Horário de ida</label>
                            <input type="time" class="form-control" name="horarioSaida" required>
                        </div>

                        <div class="form-group">
                            <label for="horarioChegada">Horário de chegada</label>
                            <input type="time" class="form-control" name="horarioChegada" required>
                        </div>

                        <div class="form-group">
                            <label for="classe">Classe</label>
                            <select name="classe" class="browser-default custom-select custom-select-lg mb-3" required>
                                <option value="">- Selecione a Classe - </option>
                                <option value="Primeira Classe">Primeira Classe</option>
                                <option value="Classe Economica">Classe Econômica</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">Adicionar</button>
                    </form>
                    <!-- /fim form -->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
            </div>
        </div>
	<?php } else {
		header("Location: index.php");
	} ?>
    <!-- Footer -->
    <?php include("includes/footer.php") ?>

</body>
</html>