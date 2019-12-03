<?php include_once("includes/config.php"); ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['procurar'])) {
        $Passagens = $db->query("
        SELECT idPassagem, origem, destino, dataSaida, horarioSaida, horarioChegada, qntdAssentos FROM passagens WHERE origem = '".$_POST["origem"]."' AND destino = '".$_POST["destino"]."' AND dataSaida = '".$_POST['dataSaida']."' AND qntdAssentos > 0
        ");

        $a = $db->query("
        SELECT idPassagem, origem, destino, dataSaida, horarioSaida, horarioChegada, qntdAssentos FROM passagens WHERE origem = '".$_POST["origem"]."' AND destino = '".$_POST["destino"]."' AND dataSaida = '".$_POST['dataSaida']."' AND qntdAssentos > 0
        ");

        $raw = $a->fetchArray();
    }
?>

<!-- Tela de passagens -->
<!DOCTYPE html>
<html>
<head>
    <meta> 
	<title>Passagens</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .tabela {
            min-height: 92vh;
            margin-top: 77px;
        }

        .form-div{
			margin-bottom: 300px;
		}

        .passagens {
			border-top: 1px solid black;
			border-bottom: 1px solid black;
			background-color: rgba(230, 255, 255, 0.3);
		}

        .btnn {
            margin-top: 15px;
        }


    </style>
</head>
<body>
    <!-- Header das páginas -->
	<div>
        <?php include("includes/header.php"); 

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reservar'])) {
            if (!isset($user)) {
                echo "<script>alert('Você deve estar logado para reservar passagens!');";
                echo "javascript:window.location='login.php';</script>";
            } else {
                $stmt = $db->prepare("INSERT INTO usuariosPassagens (idPassagem, cpfDono) VALUES (?,?)");
                $stmt->bindvalue(1, $_POST["idPassagem"], SQLITE3_TEXT);
                $stmt->bindvalue(2, $user["cpf"]);

                try {
                    $result = $stmt->execute();
                    echo "<script>alert('Passagem reservada com sucesso!');</script>";
                    $db->exec("UPDATE passagens SET qntdAssentos = qntdAssentos-1 WHERE idPassagem = '" . $_POST['idPassagem'] . "'");
                } catch (Throwable $th) {
                    echo "<script>alert('Erro, talvez você esteja tentando adicionar a mesma passagem!');";
                    echo "javascript:window.location='passagens.php';</script>";
                }

            }
        }    
        ?>  
    </div>

    <!-- justify-content-center align-items-center -->
	<div class="tabela d-flex flex-column align-items-center">      
        <div class="passagens">
            <h6 class="display-4">Passagens</h6>
        </div>
        <?php 
            if (!isset($_POST['procurar'])) {
        ?>
            <div class="p-2">
                <form method="POST" class="form-div">
                    <div>
                        <label for="origem">Origem *</label>
                        <select name="origem" class="browser-default custom-select custom-select-lg mb-3" required>
                            <option value="" disabled selected>- Selecione Origem - </option>
                            <option value="Campo Grande">Campo Grande</option>
                            <option value="Maringa">Maringa</option>
                        </select>
                    </div>

                    <div>
                        <label for="destino">Destino *</label>
                        <select name="destino" class="browser-default custom-select custom-select-lg mb-3" required>
                            <option value="">- Selecione Destino - </option>
                            <option value="Campo Grande">Campo Grande</option>
                            <option value="Maringa">Maringa</option>
                        </select>
                    </div>

                    <div class="d-flex flex-column">
                        <label for="dataSaida">Data da passagem *</label>
                        <input type="date" name="dataSaida" required>
                    </div>

                    <div class="btnn d-flex flex-column">
                        <input type="hidden" name="procurar">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div> 
        <?php
        } else { 
        ?>
        <?php  
          if ($raw['idPassagem'] == '') { ?>
            <h3 style="margin: 20vh 0px; color: red ">Não existem passagens com essas informações</h3>
        <?php } else { ?>
            <table class="align-middle table">
                <thead>
                  <tr style="text-align: center">
                    <th scope="col">Origem</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Data de saida do vôo</th>
                    <th scope="col">Horário prevista de ida</th>
                    <th scope="col">Horário prevista de chegada</th>
                    <th scope="col">Reservar</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        while($row = $Passagens->fetchArray()){
                    ?>
                        <tr style="text-align: center">
                            <td><?php echo $row['origem']; ?></td>
                            <td><?php echo $row['destino']; ?></td>
                            <td><?php echo $row['dataSaida'];?></td>
                            <td><?php echo $row['horarioSaida'];?></td>
                            <td><?php echo $row['horarioChegada'];?></td>
                            <td>
                            <form method="POST">
                                <input type="hidden" name="reservar">
                                <input type="hidden" name="idPassagem" value="<?php echo $row["idPassagem"]; ?>">
                               <button type="submit" class="btn btn-primary">Reservar</button>
                            </form>       
                          </td> 
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }} ?> 
    </div>
    <!-- Footer -->
    <?php include("includes/footer.php") ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>