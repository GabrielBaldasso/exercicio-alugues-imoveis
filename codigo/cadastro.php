<?php 

	include_once("includes/conexao.php");

	if (isset($_GET["idUsuario"])) {
		$sql = "SELECT * FROM usuarios WHERE idUsuario = '{$_GET['idUsuario']}'";
		$resultados = mysqli_query($conn, $sql);
		$dados = mysqli_fetch_assoc($resultados);

		$idUsuario = $dados['idUsuario'];
		$nome = $dados['nome'];
		$email = $dados['email'];
		$senha = $dados['senha'];
		$tipoUser = $dados['tipoUser'];
		

	} else{
		$idUsuario = 0;
		$nome = "";
		$email = "";
		$senha = "";
		$tipoUser = "";
		
	}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

	<?php
        if (isset($_GET['mensagem'])) {
          
        
          if($_GET['tipo']=='sucesso'){
            echo '<div class="alert alert-success" role="alert">
                    ' . $_GET['mensagem'] . '
                  </div>';
          }
          else{
            echo '<div class="alert alert-danger" role="alert">
                    ' . $_GET['mensagem'] . '
                  </div>';
          }
        }
    ?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/img-01.png" alt="IMG">
				</div>

				<form action="includes/criar.conta.php" method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Crie sua conta
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Nome obrigatório!">
						<input class="input100" type="text" value="<?php echo $nome ?>" name="nome" placeholder="Digite seu nome">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Email obrigatório!">
						<input class="input100" type="text" value="<?php echo $email ?>" name="email" placeholder="Digite seu email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Senha obrigatória!">
						<input class="input100" type="password" name="senha" placeholder="Digite sua senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Tipo Usuario!">
						<select name = "tipoUser" class="input100">
						  <option value="Cliente" <?php if($tipoUser == 'Cliente') echo 'selected'; ?>>Cliente</option>
						  <option value="Funcionario" <?php if($tipoUser == 'Funcionario') echo 'selected'; ?>>Funcionario</option>
						</select>	
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="col-md-1">
						<input type="text" class="form-control" value="<?php echo $idUsuario ?>" name="idUsuario" class="form-control" hidden>
					</div>


					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Cadastrar
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="index.php">
							Ja possio uma conta?
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>

</body>
</html>