<!-- Styles e Scrips --> 	
<?php include("includes/head.php") ?>

<?php include_once("includes/config.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>

	<style>
		.container {
            min-height: 92vh;
			margin-top: 77px;
		}

		.form-div{
			margin-bottom: 300px;
		}
		
		.perfil {
			border-top: 1px solid black;
			border-bottom: 1px solid black;
			background-color: rgba(230, 255, 255, 0.3);
			
		}
	</style>
</head>
<body>
	<div>
		<!-- Styles e Scrips -->
		<?php include("includes/header.php"); 
			if (!isset($user)) {
        		header("Location: index.php");
        		exit();
     		 }
		?>
	</div>

	<?php if (isset($_POST['salvarSenha'])) {

		
		$stmt = $db->prepare("UPDATE usuarios SET password = ? WHERE cpf = ?" );
		$stmt->bindvalue(1, openssl_encrypt($_POST["NovaSenha"], "aes128", "1234", 0, "1234567812345678"), SQLITE3_TEXT);
		$stmt->bindvalue(2, $user["cpf"]);

		if ($_POST["NovaSenha"] === '') {
			echo "<script>alert('Senha inválida!');</script>";
		} else {

			try {
            	$result = $stmt->execute();
       		} catch (Throwable $th) {
           		echo "<script>alert('Erro!');</script>";
        	}
			echo "<script>alert('Senha alterada!');</script>";

		}

	} ?>

	<?php if(isset($_POST['excluirConta'])) {

		$password = $_POST['conferirSenha']; 
		$passEncrip = openssl_encrypt($password, "aes128", "1234", 0, "1234567812345678");
		$cpfUser = $user['cpf'];


		$stmt = $db->query("SELECT cpf, password, name FROM usuarios WHERE password = '$passEncrip' AND cpf = '$cpfUser'");
		$row = $stmt->fetchArray();

		if($row === false){
			echo "<script>alert('Senha incorreta!');</script>";
		} else { 
			$db->exec("DELETE FROM usuarios WHERE cpf = '$cpfUser' AND password = '$passEncrip'");
			echo "<script>alert('Conta excluída com sucesso!');";
            echo "javascript:window.location='login.php';</script>";
            session_destroy();
		}
	} ?>

	<?php if (isset($_POST['salvarCampos'])) {

		$stmt = $db->prepare("UPDATE usuarios SET name = ?, email = ?, phone = ?, birthdate = ? WHERE cpf = ?" );
		$stmt->bindvalue(1, $_POST["Nome"], SQLITE3_TEXT);
		$stmt->bindvalue(2, $_POST["Email"], SQLITE3_TEXT);
		$stmt->bindvalue(3, $_POST["Telefone"], SQLITE3_TEXT);
		$stmt->bindvalue(4, $_POST["Data"], SQLITE3_TEXT);
		$stmt->bindvalue(5, $user['cpf']);

        try {
            $result = $stmt->execute();
        } catch (Throwable $th) {
            echo "<script>alert('Erro!');</script>";
        }

        $user['name'] = $_POST["Nome"];
        $user['email'] = $_POST["Email"];
        $user['phone'] = $_POST["Telefone"];
        $user['birthdate'] = $_POST["Data"];
        $_SESSION['usuario'] = $user;

        echo "<script>alert('Campo(s) alterado(s)!');</script>";
	} ?>

	<div class="container d-flex flex-column justify-content-between align-items-center">
		<div class="perfil">
			<h6 class="display-4">Perfil</h6>
		</div>
		
		<?php if(!isset($_POST['alterar'])){ ?>

			<div class="form-div">
				<form method="POST">
					<div class="form-group">
						<label >Nome: </label>
						<input class="form-control bg-white" type="text" readonly name="Nome" value="<?php echo $user['name'];?>">
					</div>
					<div class="form-group">
						<label>E-mail: </label>
						<input class="form-control bg-white" type="email" readonly name="Email" value="<?php echo $user['email'];?>">
					</div>
					<div class="form-group">
						<label>CPF: (Não pode ser mudado) </label>
						<input class="form-control bg-white" type="text" readonly name="CPF" value="<?php echo $user['cpf'];?>">
					</div>
					<div class="form-group">
						<label>Telefone: </label>
						<input class="form-control bg-white" type="text" readonly name="Telefone" value="<?php echo $user['phone'];?>">
					</div>
					<div class="form-group">
						<label>Data de aniversário: </label>
						<input class="form-control bg-white" type="text" readonly name="Data" value="<?php echo $user['birthdate'];?>">
					</div>
					<button type="submit" class="btn btn-primary" name="alterar">Alterar Campos</button>
					<button type="submit" class="btn btn-primary" name="alterar" value="senha">Alterar Senha</button>
					<button type="submit" class="btn btn-danger" name="alterar" value="deletar">Deletar Conta</button>
				<form>
			</div>
			<?php } else if ($_POST['alterar'] === 'senha') { ?>
				<div class="form-div">
					<form method="POST">
						<div class="form-group">
							<label>Digite a nova senha: </label>
							<input class="form-control bg-white" type="password" name="NovaSenha">
						</div>
						<button type="submit" class="btn btn-danger" name="salvarSenha">Salvar</button>
						<button type="submit" class="btn btn-secondary" name="cancelar">Cancelar</button>
					</form>
				</div>
<!-- ---------------------------------------------------- FINALIZAR IMPLEMENTAÇÃO------------------------------------------------------- -->
			<?php } else if ($_POST['alterar'] === 'deletar') { ?>
				<div class="form-div">
					<form action="perfil.php" method="POST">
						<div class="form-group">
							<label>Deletar conta: </label>
							<input placeholder="Digite sua senha" class="form-control bg-white" type="password" name="conferirSenha">
						</div>
						<button type="submit" class="btn btn-danger" name="excluirConta">Excluir</button>
						<button type="submit" class="btn btn-secondary" name="cancelar" onclick="">Cancelar</button>
					</form>
				</div>
<!-- ----------------------------------------------------------------------------------------------------------------------------------- -->
			<?php } else { ?>
			<div class="form-div">
				<form method="POST">
					<div class="form-group">
						<label>Nome: </label>
						<input class="form-control bg-white" type="text" name="Nome" value="<?php echo $user['name'];?>">
					</div>
					<div class="form-group">
						<label>E-mail: </label>
						<input class="form-control bg-white" type="email" name="Email" value="<?php echo $user['email'];?>">
					</div>
					<div class="form-group">
						<label>Telefone: </label>
						<input class="form-control bg-white" type="text" name="Telefone" value="<?php echo $user['phone'];?>">
					</div>
					<div class="form-group">
						<label>Data de aniversário: </label>
						<input class="form-control bg-white" type="text" name="Data" value="<?php echo $user['birthdate'];?>">
					</div>
					<button type="submit" class="btn btn-danger" name="salvarCampos">Salvar</button>
					<button type="submit" class="btn btn-secondary" name="cancelar">Cancelar</button>
				</form>	
				<?php } ?>
			</div>
	</div>
	<!-- Footer -->
    <?php include("includes/footer.php") ?>
</body>
</html>