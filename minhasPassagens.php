<!-- Styles e Scrips -->    
<?php include("includes/head.php") ?>

<?php include_once("includes/config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>
        
    </title>
</head>
<body style="margin-top: 20vh;">
    <div>
        <?php include("includes/header.php"); ?>
    </div>
    
    <?php if (($_SERVER["REQUEST_METHOD"] === "POST") && ($_POST["acao"] === "delete")) {
        $db->exec("DELETE FROM usuariosPassagens WHERE idPassagem = '" . $_POST['idPassagem'] . "'");
    }

    $Passagens = $db->query("SELECT * FROM usuariosPassagens INNER JOIN passagens ON usuariosPassagens.idPassagem = passagens.idPassagem WHERE usuariosPassagens.cpfDono = '".$user['cpf']."'"); 
    ?>
    <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Valor (Reais)</th>
        <th>Origem</th>
        <th>Destino</th>
        <th>Data de Saida</th>
        <th>Horario de Saida</th>
        <th>Horario de Chegada</th>
        <th>Classe</th>
        <th>Remover Passagem</th>
      </tr>
    </thead>
    <tbody>
          <?php 
            while($row = $Passagens->fetchArray()){
          ?>
            <tr>
              <td><?php echo $row['idPassagem']; ?></td>
              <td><?php echo $row['valor']; ?></td>
              <td><?php echo $row['origem']; ?></td>
              <td><?php echo $row['destino']; ?></td>
              <td><?php echo $row['dataSaida']; ?></td>
              <td><?php echo $row['horarioSaida']; ?></td>
              <td><?php echo $row['horarioChegada']; ?></td>
              <td><?php echo $row['classe']; ?></td>
              <td>
                <form method="post">
                   <input type="hidden" name="acao" value="delete">
                   <input type="hidden" name="idPassagem" value="<?php echo $row["idPassagem"]; ?>">
                   <button type="submit">Remover Passagem</button>
                </form>       
              </td> 
            </tr>
          <?php } ?>
        </tbody>
    </table>
</body>
<!-- Footer -->
    <?php include("includes/footer.php") ?>
</html>