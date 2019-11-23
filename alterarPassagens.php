<!-- Styles e Scrips --> 	
<?php include("includes/head.php") ?>

<?php include_once("includes/config.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista de Passagens</title>
  <style type="text/css">
    .tabela {
      min-height: 92vh;
      margin-top: 77px;
    }

    .form-div{
      margin-bottom: 300px;
    }

    .listaPassagens {
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
	<div>
		<?php include("includes/header.php"); ?>
	</div>
	
	<?php if (($_SERVER["REQUEST_METHOD"] === "POST") && ($_POST["acao"] === "delete")) {
    	$db->exec("DELETE FROM Passagens WHERE idPassagem = '" . $_POST['idPassagem'] . "'");
      echo "<script>alert('Passagem de id: ". $_POST['idPassagem'] ." deletada!');</script>";
  	}

  	$Passagens = $db->query('SELECT * FROM passagens'); 
  	?>
    <?php if (isset($_SESSION['usuario']) && $user['admin'] === 'true') { ?>
    <div class="tabela d-flex flex-column align-items-center">
      <div class="listaPassagens">
        <h6 class="display-4">Lista de Passagens</h6>
      </div>
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
          <th>Assentos restantes</th>
          <th>Deletar</th>
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
              <td><?php echo $row['qntdAssentos']; ?></td>
              <td>
                <form method="post">
                   <input type="hidden" name="acao" value="delete">
                   <input type="hidden" name="idPassagem" value="<?php echo $row["idPassagem"]; ?>">
                   <button type="submit">Deletar</button>
                </form>       
              </td> 
            </tr>
          <?php } ?>
    	</tbody>
  	</table>
  <?php } else {
    header("Location: index.php");
    exit();
  } ?>
</div>
</body>
<!-- Footer -->
    <?php include("includes/footer.php") ?>
</html>