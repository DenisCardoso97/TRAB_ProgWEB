<!-- Styles e Scrips -->
<?php include("includes/head.php") ?>

<?php include_once("includes/config.php"); ?>

<!-- Tela de cadastro -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastrar</title>

    <link rel="stylesheet" href="css/login.css">

    <style>
        .container {
            min-height: 92vh;
            margin-top: 77px;
        }
    </style>
</head>

<body>
    <?php
        include("includes/header.php");

        if (isset($_SESSION["usuario"])) {
            header("Location: index.php");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST["password"] != $_POST["senha"]) {
                echo "<script>alert('Senhas não são iguais!');</script>";
                header("Location: cadastrar.php");
            }
            $stmt = $db->prepare("INSERT INTO Usuarios (email,cpf,name,password,birthdate,phone) VALUES (?,?,?,?,?,?)");
            $stmt->bindValue(1, $_POST["email"], SQLITE3_TEXT);
            $stmt->bindValue(2, $_POST["cpf"], SQLITE3_TEXT);
            $stmt->bindValue(3, strtolower($_POST["name"]), SQLITE3_TEXT);
            $stmt->bindValue(4, openssl_encrypt($_POST["password"], "aes128", "1234", 0, "1234567812345678"), SQLITE3_TEXT);
            $stmt->bindValue(5, $_POST["birthdate"], SQLITE3_TEXT);
            $stmt->bindValue(6, $_POST["phone"], SQLITE3_TEXT);

            try {
              $result = $stmt->execute();
              echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
              header("Location: login.php");
              exit();
            } catch (Throwable $th) {
              echo "<script>alert('Usuário já cadastrado!');</script>";
            }
        }
    ?>

    <div class="container-fluid img-fluid bg">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12"></div>
            <div class="col-md-6 col-sm-4 col-xs-12">
                <!-- inicio form -->
                <form method="POST" class="form-container rounded">
                    <h1 class="text-center">Cadastrar-se</h1>

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nome completo">
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Data de nascimento</label>
                        <input type="text" class="form-control" name="birthdate" id="birthdate" placeholder="dd/mm/aaaa" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Número de telefone celular</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Digite seu número de telefone celular">
                    </div>

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Entre com seu endereço de e-mail">
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
                    </div>

                    <div class="form-group">
                        <label for="password">Confirme sua senha</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Confirme sua Senha">
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Cadastrar</button>
                    
                    <div>
                        <span>Já tem uma conta? <a href="login.php">Logue-se</a></span>
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