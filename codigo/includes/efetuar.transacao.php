<?php

    include_once('conexao.php');

    $idImovel = $_GET['idImovel'];

    $sql = "UPDATE imoveis SET status = 'Indisponível' WHERE idImovel = '$idImovel'";

    if (mysqli_query($conn, $sql)) {
        echo "Status atualizado com sucesso!";
        header("Location: ../vendaImovelGB.php?idImovel=$idImovel");
        exit();
    } else {
        echo "Erro ao atualizar o status: " . mysqli_error($conn);
    }


?>