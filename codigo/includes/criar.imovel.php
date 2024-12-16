<?php
	include_once("conexao.php");

	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];
	$endereco = $_POST['endereco'];
	$tipoImovel = $_POST['tipoImovel'];
	$tipoCompra = $_POST['tipoCompra'];
	$tamanho = $_POST['tamanho'];
	$preco = $_POST['preco'];
	$quartos = $_POST['quartos'];
	$garagem = $_POST['garagem'];
	$descricao = $_POST['descricao'];
	$idImovel = $_POST['idImovel'];
	$status = 'Disponivel';


	if($idImovel == 0){
		$sql2 ="SELECT * FROM imoveis WHERE cidade = '$cidade' AND endereco = '$endereco' AND estado = '$estado'";
		$resultado = mysqli_query($conn, $sql2);
		if (mysqli_num_rows($resultado)>0) {
			header("Location: ../homeFunc.php?tipo=erro&mensagem=Este imovel já esta cadastrado.");
		} else{
			$sql = "INSERT INTO imoveis (estado, cidade, endereco, tipoImovel, tipoCompra, tamanho, preco, quartos, garagem, descricao, status)
					VALUES('$estado', '$cidade', '$endereco', '$tipoImovel', '$tipoCompra', '$tamanho', '$preco', '$quartos', '$garagem', '$descricao', '$status')";

			if (mysqli_query($conn, $sql)) {
					header("Location:../homeFunc.php?tipo=sucesso&mensagem=Seu imovel foi cadastrado com sucesso");
				} else {
					header("Location: ../homeFunc.php?tipo=erro&mensagem=ERRO imovel não foi cadastrado");
				}

		}
	} else {

		$sql = "UPDATE imoveis SET estado = '$estado', cidade = '$cidade', endereco = '$endereco', tipoImovel = '$tipoImovel', tipoCompra = '$tipoCompra', tamanho = '$tamanho', preco = '$preco', quartos = '$quartos', garagem = '$garagem', descricao = '$descricao', status = '$status' WHERE idImovel = '$idImovel'";
			if (mysqli_query($conn, $sql)) {
				header("Location: ../homeFunc.php?tipo=sucesso&mensagem=O cadastro do imovel foi atualizado com sucesso");
			}
			else{
				header("Location: ../homeFunc.php?tipo=erro&mensagem=ERRO-cadastro imovel não foi atualizado");
			}

	}
	
	mysqli_close($conn);
?>
