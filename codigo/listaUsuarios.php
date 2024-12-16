<?php

	include_once("includes/conexao.php");
	
	session_start();

	if(!isset($_SESSION['idUsuarioLogado'])){
      header("Location: index.php");
    }

	if(!isset($_SESSION['idUsuarioLogado']) || $_SESSION['tipoUserUsuarioLogado']=='Cliente'){

		header("Location: index.php?tipo=erro&mensagem=Você precisa estar logado ou acesso não autorizado!");
	}


	if (isset($_GET["idUsuario"])) {
		$sql = "SELECT * FROM imoveis WHERE idImovel = '{$_GET['idUsuario']}'";
		$resultados = mysqli_query($conn, $sql);
		$dados = mysqli_fetch_assoc($resultados);

		$nome = $dados['nome'];
		$email = $dados['email'];
		$tipoUser = $dados['tipoUser'];
	}else{
		
		$nome = "";
		$email = "";
		$tipoUser = "";
	}

	if (!isset($_GET['nome'])) {
		$nome = "";
		$email = "";
		$tipoUser = "";
	}else{
		$nome = $_GET['nome'];
		$email = $_GET['email'];
		$tipoUser = $_GET['tipoUser'];
	}
	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Minha Pagna</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/estilo_listaUsuarios.css">
	<link rel="stylesheet" type="text/css" href="css/rodape.css">
</head>
<body>
	<div class="container">

		<?php
		include_once("includes/menu_func.php");
		
		?>

		<div class="container" style="padding-bottom: 300px;">

			<div class="corpo">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 style="margin-top: 155px">Tabela de Usuários Cadastrados no Sistema</h1>
					</div>
					<br>
					<br><br>
				</div>
				
				<div class="row">
					<form class="form-inline d-flex justify-content-around">
						<input class="btn btn-outline-dark col-md-4" id="entrada" name="nome" type="search" placeholder="Nome Cadastrado" aria-label="esquisar">
						&ensp;
						<input class="btn btn-outline-dark col-md-4" id="entrada" name="email" type="search" placeholder="Email Cadastrado" aria-label="esquisar">
						&ensp;
						<select class="btn btn-outline-dark col-md-3" id="entrada" name="tipoUser" type="search" placeholder="Funcionario/Cliente" aria-label="esquisar">
							<option value="Funcionario">Funcionário</option>
							<option value="Cliente">Cliente</option>
						</select>&ensp;
										
						<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Pesquisar</button>
					</form>
				</div>
				<hr>

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

			<div class="row">
			<div class="col-md-12">
					<table class="table table-bordered">
					<tr>
						<th>idUsuario</th>
						<th>Nome</th>
						<th>email</th>
						<th>senha</th>
						<th>Tipo Usuario</th>
						<th>Ações</th>
					</tr>

					<?php

						if (!isset($_GET['nome'])) {
							$sql = "SELECT * FROM usuarios ORDER BY idUsuario ASC";
						} else {
							$sql = "SELECT * FROM usuarios WHERE nome = '$nome' AND email = '$email' AND tipoUser = '$tipoUser'";
						}

						$resultados = mysqli_query($conn, $sql);
						while ($dados = mysqli_fetch_assoc($resultados)) {
						echo '<tr>
								<td>'.$dados['idUsuario'].'</td>
								<td>'.$dados['nome'].'</td>
								<td>'.$dados['email'].'</td>
								<td>'.$dados['senha'].'</td>
								<td>'.$dados['tipoUser'].'</td>
								
								<td style="text-align: center;">
									<a class="btn btn-warning" href="cadastro.php?idUsuario='.$dados['idUsuario'].'">Editar</a>
									<a href="#excluir" data-toggle="modal" data-target="#excluir_'.$dados['idUsuario'].'" class= "btn btn-danger">Excluir</a>
								</td>
								</tr>';

								echo '<div class="modal fade" id="excluir_'.$dados['idUsuario'].'" tabindex="-1" role="dialog" aria-labelledby="">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
													<h4 class="modal-title">Confirmar Exclusão</h4>
													</div>
													<div class="modal-body">
													Gostaria de excluir esse usuario ('.$dados['nome'].')?
													</div>
													<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
													<a class= "btn btn-danger" href="includes/excluir.usuario.php?idUsuario='.$dados['idUsuario'].'">Excluir</a>
													</div>
												</div>
											</div>
										</div>';
							}
					?>
					</table>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <?php 
      	include_once("includes/rodaPe.php");
      ?>


</body>
</html>