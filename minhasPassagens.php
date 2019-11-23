<!-- Styles e Scrips -->    
<?php include("includes/head.php") ?>

<?php include_once("includes/config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Minhas Passagens</title>
    <style type="text/css">
      .minhasPassagens {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        background-color: rgba(230, 255, 255, 0.3);
      
    }
    </style>
</head>
<body style="margin-top: 12vh;">
    <div class="minhasPassagens">
      <h6 class="display-4">Minhas Passagens</h6>
    </div>
    <div>
      <?php include("includes/header.php"); ?>
    </div>
    
    <?php if (($_SERVER["REQUEST_METHOD"] === "POST") && ($_POST["acao"] === "delete")) {
        $db->exec("DELETE FROM usuariosPassagens WHERE idPassagem = '" . $_POST['idPassagem'] . "'");
        $db->exec("UPDATE passagens SET qntdAssentos = qntdAssentos+1 WHERE idPassagem = '" . $_POST['idPassagem'] . "'");
        echo "<script>alert('Você removeu a passagem de id: ".$_POST['idPassagem']." das suas passagens!');</script>";
    }
      if (!isset($user)) {
        header("Location: index.php");
      }
    $Passagens = $db->query("SELECT * FROM usuariosPassagens INNER JOIN passagens ON usuariosPassagens.idPassagem = passagens.idPassagem WHERE usuariosPassagens.cpfDono = '".$user['cpf']."'"); 
      if (!isset($Passagens)) { 
    ?>
      <h1>NÃO TEM PASSAGENS</h1>
    <?php } ?>

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