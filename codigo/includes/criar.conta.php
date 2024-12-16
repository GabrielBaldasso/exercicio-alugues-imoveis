<?php 

	include_once("conexao.php");

	$idUsuario = mysqli_real_escape_string($conn, $_POST['idUsuario']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$senha = mysqli_real_escape_string($conn, $_POST['senha']);
	$tipoUser = mysqli_real_escape_string($conn, $_POST['tipoUser']);
	$senha = md5($senha);

	if($idUsuario == 0){
		$resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$email'");
		if (mysqli_num_rows($resultado)>0) {
			header("Location: ../index.php?tipo=erro&mensagem=E-mail já cadastrado!");
		}
		else{
			$sql = "INSERT INTO usuarios (nome, email, senha, tipoUser)
										VALUES ('$nome', '$email', '$senha', '$tipoUser')";

			if (mysqli_query($conn, $sql)) {
				header("Location:../index.php?tipo=sucesso&mensagem=Seu usuario foi cadastrado com sucesso");
			} else {
				header("Location: ../index.php?tipo=erro&mensagem=ERRO usuario não foi cadastrado");
			}
		}
	} else {

		$sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', tipoUser = '$tipoUser' WHERE idUsuario = '$idUsuario'";
			if (mysqli_query($conn, $sql)) {
				header("Location: ../index.php?tipo=sucesso&mensagem=O cadastro da conta do usuario foi atualizado com sucesso");
			}
			else{
				header("Location: ../index.php?tipo=erro&mensagem=ERRO-cadastro da conta do usuario não foi atualizado");
			}

	}
	
	mysqli_close($conn);
?>