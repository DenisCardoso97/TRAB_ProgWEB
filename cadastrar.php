<?php
  define("TITLE", "Cadastrar");
  include_once("includes/config.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastrar</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <?php
      include("includes/session.php");

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // $stmt = $db->prepare("INSERT INTO Usuarios (email,cpf,name,password,birthdate,phone) VALUES (?,?,?,?,?,?)");
        // $stmt->bindValue(1, $_POST["email"], SQLITE3_TEXT);
        // $stmt->bindValue(2, $_POST["cpf"], SQLITE3_TEXT);
        // $stmt->bindValue(3, strtolower($_POST["name"]), SQLITE3_TEXT);
        // $stmt->bindValue(4, openssl_encrypt($_POST["password"], "aes128", "1234", 0, "1234567812345678"), SQLITE3_TEXT);
        // $stmt->bindValue(5, $_POST["birthdate"], SQLITE3_TEXT);
        // $stmt->bindValue(6, $_POST["phone"], SQLITE3_TEXT);
        
        // TODO: Inserção no banco, do cadastro.

        try {
          // $result = $stmt->execute();
          header("Location: login.php");
          exit();
        } catch (Throwable $th) {
          echo "<script>alert('CPF já cadastrado!');</script>";
        }
      }
    ?>
    <div>
        <?php include("includes/header.php"); ?>  
    </div>
    
    <div class="container-fluid img-fluid bg">

        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- inicio form -->
                <form method="POST" class="form-container rounded">
                    <h1>Register form</h1>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Complete Name">
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <input type="text" class="form-control" id="birthdate" placeholder="dd/mm/aaaa" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}">
                    </div>

                    <div class="form-group">
                        <label for="phone">phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Phone Number">
                    </div>

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" placeholder="CPF">
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-light">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Confirm Password">
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Submit</button>

                    <div clas>
                        <span>Já tem uma conta? <a href="login.php">Logue-se</a></span>
                    </div>
                </form>
                <!-- /fim form -->
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
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