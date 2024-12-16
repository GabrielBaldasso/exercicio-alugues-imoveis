<?php
	include_once("conexao.php");

	$idUsuario = $_GET['idUsuario'];

	$sql = "DELETE FROM usuarios WHERE idUsuario = '$idUsuario'";

	if (mysqli_query($conn, $sql)) {
		header("Location: ../listaUsuarios.php?tipo=sucesso&mensagem=Usuario excluida com sucesso");
	}else{
		header("Location: ../listaUsuarios.php?tipo=erro&mensagem=Erros usuario não excluida");
	}

//echo mysqli_error($conn);
?>