<!-- Styles e Scrips -->    
<?php include("includes/head.php") ?>

<?php include_once("includes/config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Minhas Passagens</title>
    <style type="text/css">
    .tabela {
      min-height: 92vh;
      margin-top: 77px;
    }

    .form-div{
      margin-bottom: 300px;
    }

    .minhasPassagens {
      border-top: 1px solid black;
      border-bottom: 1px solid black;
      background-color: rgba(230, 255, 255, 0.3);
    }

    .btnn {
      margin-top: 15px;
  }
  </style>
    </style>
</head>
<body>
    <div>
      <?php include("includes/header.php"); ?>
    </div>
    
    <?php if (($_SERVER["REQUEST_METHOD"] === "POST") && ($_POST["acao"] === "delete")) {
        $db->exec("DELETE FROM usuariosPassagens WHERE idPassagem = '" . $_POST['idPassagem'] . "'");
        $db->exec("UPDATE passagens SET qntdAssentos = qntdAssentos+1 WHERE idPassagem = '" . $_POST['idPassagem'] . "'");
        echo "<script>alert('Você removeu a passagem da sua lista!');</script>";
    }
      if (!isset($user)) {
        header("Location: index.php");
        exit();
      }

    $Passagens = $db->query("SELECT * FROM usuariosPassagens INNER JOIN passagens ON usuariosPassagens.idPassagem = passagens.idPassagem WHERE usuariosPassagens.cpfDono = '".$user['cpf']."'");

    $a = $db->query("SELECT * FROM usuariosPassagens INNER JOIN passagens ON usuariosPassagens.idPassagem = passagens.idPassagem WHERE usuariosPassagens.cpfDono = '".$user['cpf']."'");

    $raw = $a->fetchArray();
    //var_dump($raw);
    ?>

    <div class="tabela d-flex flex-column align-items-center">
    <div class="minhasPassagens">
      <h6 class="display-4">Minhas Passagens</h6>
    </div>
    <?php  
      if ($raw['idPassagem'] == '') { ?>
        <h3 style="margin: 20vh 0px; color: red ">Você não possui reservas de passagens</h3>
    <?php } else { ?>
    <table class="table">
      <thead>
        <tr style="text-align: center">
          <th>Id</th>
          <th>Valor (R$)</th>
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
            <tr style="text-align: center">
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
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExemploModalCentralizado">
                    Remover
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="TituloModalCentralizado">Deseja realmente remover a passagem?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Ao remover a passagem não será possível voltar atrás. Tem certeza?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-danger">Remover</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>       
              </td> 
            </tr>
          <?php } ?>
        </tbody>
    </table>
    <?php } ?>
  </div>
</body>
<!-- Footer -->
    <?php include("includes/footer.php") ?>
</html>