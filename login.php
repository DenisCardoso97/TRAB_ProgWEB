<!-- Styles e Scrips -->
<?php include("includes/head.php") ?>

<?php include_once("includes/config.php"); ?>

<!-- Tela de login -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/loginn.css">
</head>
    <!-- Header das páginas -->
    <div>
        <?php include("includes/header.php"); ?>
    </div>

    <style>
        .container {
            min-height: 92vh;
            margin-top: 77px;
        }
    </style>
<body>
     <?php
          if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["email"]) && isset($_POST["password"])) {
              $stmt = $db->prepare("SELECT * FROM Usuarios WHERE email = ? AND password = ?");
              $stmt->bindValue(1, strtolower($_POST["email"]), SQLITE3_TEXT);
              $stmt->bindValue(2, openssl_encrypt($_POST["password"], "aes128", "1234", 0, "1234567812345678"), SQLITE3_TEXT);
              $usuario = $stmt->execute()->fetchArray();
              if ($usuario) {
                $_SESSION["usuario"] = $usuario;
                header("Location: index.php");
                exit();
              }
            }
            echo "<script>alert('Email ou senha invalidos!');</script>";
          } else {
            if (isset($_SESSION["usuario"])) {
              header("Location: index.php");
            }
          }
        ?>


    <div class="container-fluid bg">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- inicio form -->
                <form method="POST" class="form-container rounded">
                    <h1 class="text-center">Login</h1>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-light">Jamais iremos compartilhar seu email com ninguém.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Lembrar login</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Entrar</button>

                    <div>
                        <span>Não é cadastrado? <a href="cadastrar.php">Cadastre-se</a></span>
                    </div>
                    <div  style="margin-top: 60px; color: #e6e8e1; display: flex; justify-content: flex-end">
                        <span><a href="#">Esqueceu a senha ?</a></span>
                    </div>
                </form>
                <!-- /fim form -->
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>
    <!-- Footer -->
    <?php include("includes/footer.php") ?>
</body>
</html>