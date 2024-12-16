<?php 

	include_once("conexao.php");
	session_start();

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$senha = mysqli_real_escape_string($conn, $_POST['senha']);

	$senha = md5($senha);

	$sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");

	echo mysqli_error($conn);
	
	if (mysqli_num_rows($sql)==1) {

		$dados = mysqli_fetch_assoc($sql);

		$_SESSION['idUsuarioLogado'] = $dados['idUsuario'];
		$_SESSION['nomeUsuarioLogado'] = $dados['nome'];
		$_SESSION['emailUsuarioLogado'] = $dados['email'];
		$_SESSION['tipoUserUsuarioLogado'] = $dados['tipoUser'];

		if ($dados['tipoUser'] == "Cliente") {
			header("Location: ../home.php");
		}else{
			header("Location: ../area_funcionario.php");
		}

	} else {
		header("Location: ../index.php?tipo=erro&mensagem=Login e/ou senha invalidos!");
	}

?>