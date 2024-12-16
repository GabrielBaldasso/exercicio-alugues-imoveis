<?php
	include_once("conexao.php");

	$idImovel = $_GET['idImovel'];

	$sql = "DELETE FROM imoveis WHERE idImovel = '$idImovel'";

	if (mysqli_query($conn, $sql)) {
		header("Location: ../listaImoveis.php?tipo=sucesso&mensagem=Imovel excluida com sucesso");
	}else{
		header("Location: ../listaImoveis.php?tipo=erro&mensagem=Erros imovel não excluida");
	}

//echo mysqli_error($conn);
?>