<?php 

	session_start();
	
	if(!isset($_SESSION['idUsuarioLogado'])){
      header("Location: index.php");
    }

	
	if(!isset($_SESSION['idUsuarioLogado']) || $_SESSION['tipoUserUsuarioLogado']=='Cliente'){

		header("Location: index.php?tipo=erro&mensagem=Você precisa estar logado ou acesso não autorizado!");
	}


	include_once("includes/conexao.php");

	if (isset($_GET["idImovel"])) {
		$sql = "SELECT * FROM imoveis WHERE idImovel = '{$_GET['idImovel']}'";
		$resultados = mysqli_query($conn, $sql);
		$dados = mysqli_fetch_assoc($resultados);

		$idImovel = $dados['idImovel'];
		$preco = $dados['preco'];
		$estado = $dados['estado'];
		$cidade = $dados['cidade'];
		$tipoImovel = $dados['tipoImovel'];
		$tipoCompra = $dados['tipoCompra'];
		$endereco = $dados['endereco'];
		$tamanho = $dados['tamanho'];
		$descricao = $dados['descricao'];
		$quartos = $dados['quartos'];
		$garagem = $dados['garagem'];
		$status = $dados['status'];

	} else{
		$idImovel = 0;
		$preco = "";
		$estado = "";
		$cidade = "";
		$tipoImovel = "";
		$tipoCompra = "";
		$endereco = "";
		$tamanho = "";
		$descricao = "";
		$quartos = "";
		$garagem = "";
		$status = "Disponivel";
	}

	if (!isset($_GET['estado'])) {
        $estado = "";
        $cidade = "";
        $tipoImovel = "";
        $tipoCompra = "";
        $preco = "";
        $status = "";
    } else {
        $estado = $_GET['estado'];
        $cidade = $_GET['cidade'];
        $tipoImovel = $_GET['tipoImovel'];
        $tipoCompra = $_GET['tipoCompra'];
        $preco = $_GET['preco'];
        $status = $_GET['status'];
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
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/estilo_listaImovel.css">
	<link rel="stylesheet" type="text/css" href="css/rodape.css">

</head>
<body>
	<?php
		include_once("includes/conexao.php");
		include_once("includes/menu_func.php");	
	?>

	<div class="container" style="padding-bottom: 300px;">

		<br><br><br><br>
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 style="margin-top:30px">Tabela de Imoveis Cadastrados</h1>
			</div>
		</div>
		<form action="" method="GET">
			<div class="row">
				<div class="col-md-4">
					<select name = "estado" class="form-select btn btn-outline-dark ">
						<option value="">Estado</option>
						<option value="AC" <?php if($estado == 'AC') echo 'selected'; ?>>Acre (AC)</option>
					    <option value="AL" <?php if($estado == 'AL') echo 'selected'; ?>>Alagoas (AL)</option>
					    <option value="AP" <?php if($estado == 'AP') echo 'selected'; ?>>Amapá (AP)</option>
					    <option value="AM" <?php if($estado == 'AM') echo 'selected'; ?>>Amazonas (AM)</option>
					    <option value="BA" <?php if($estado == 'BA') echo 'selected'; ?>>Bahia (BA)</option>
					    <option value="CE" <?php if($estado == 'CE') echo 'selected'; ?>>Ceará (CE)</option>
					    <option value="DF" <?php if($estado == 'DF') echo 'selected'; ?>>Distrito Federal (DF)</option>
					    <option value="ES" <?php if($estado == 'ES') echo 'selected'; ?>>Espírito Santo (ES)</option>
					    <option value="GO" <?php if($estado == 'GO') echo 'selected'; ?>>Goiás (GO)</option>
					    <option value="MA" <?php if($estado == 'MA') echo 'selected'; ?>>Maranhão (MA)</option>
					    <option value="MT" <?php if($estado == 'MT') echo 'selected'; ?>>Mato Grosso (MT)</option>
					    <option value="MS" <?php if($estado == 'MS') echo 'selected'; ?>>Mato Grosso do Sul (MS)</option>
					    <option value="MG" <?php if($estado == 'MG') echo 'selected'; ?>>Minas Gerais (MG)</option>
					    <option value="PA" <?php if($estado == 'PA') echo 'selected'; ?>>Pará (PA)</option>
					    <option value="PB" <?php if($estado == 'PB') echo 'selected'; ?>>Paraíba (PB)</option>
					    <option value="PR" <?php if($estado == 'PR') echo 'selected'; ?>>Paraná (PR)</option>
					    <option value="PE" <?php if($estado == 'PE') echo 'selected'; ?>>Pernambuco (PE)</option>
					    <option value="PI" <?php if($estado == 'PI') echo 'selected'; ?>>Piauí (PI)</option>
					    <option value="RJ" <?php if($estado == 'RJ') echo 'selected'; ?>>Rio de Janeiro (RJ)</option>
					    <option value="RN" <?php if($estado == 'RN') echo 'selected'; ?>>Rio Grande do Norte (RN)</option>
					    <option value="RS" <?php if($estado == 'RS') echo 'selected'; ?>>Rio Grande do Sul (RS)</option>
					    <option value="RO" <?php if($estado == 'RO') echo 'selected'; ?>>Rondônia (RO)</option>
					    <option value="RR" <?php if($estado == 'RR') echo 'selected'; ?>>Roraima (RR)</option>
					    <option value="SC" <?php if($estado == 'SC') echo 'selected'; ?>>Santa Catarina (SC)</option>
					    <option value="SP" <?php if($estado == 'SP') echo 'selected'; ?>>São Paulo (SP)</option>
					    <option value="SE" <?php if($estado == 'SE') echo 'selected'; ?>>Sergipe (SE)</option>
					    <option value="TO" <?php if($estado == 'TO') echo 'selected'; ?>>Tocantins (TO)</option>
					</select><hr> 
				</div>
				<div class="col-md-4">
					<select name = "cidade" class="form-select btn btn-outline-dark ">
						<option value="">Cidade</option>
					    <option value="Curitiba" <?php if($cidade == 'Curitiba') echo 'selected'; ?>>Curitiba</option>
				        <option value="Londrina" <?php if($cidade == 'Londrina') echo 'selected'; ?>>Londrina</option>
				        <option value="Maringa" <?php if($cidade == 'Maringa') echo 'selected'; ?>>Maringá</option>
				        <option value="Cascavel" <?php if($cidade == 'Cascavel') echo 'selected'; ?>>Cascavel</option>
				        <option value="Ponta Grossa" <?php if($cidade == 'Ponta Grossa') echo 'selected'; ?>>Ponta Grossa</option>
				        <option value="Foz do Iguacu" <?php if($cidade == 'Foz do Iguacu') echo 'selected'; ?>>Foz do Iguaçu</option>
				        <option value="Guarapuava" <?php if($cidade == 'Guarapuava') echo 'selected'; ?>>Guarapuava</option>
				        <option value="Paranagua" <?php if($cidade == 'Paranagua') echo 'selected'; ?>>Paranaguá</option>
				        <option value="Sao Paulo" <?php if($cidade == 'Sao Paulo') echo 'selected'; ?>>São Paulo</option>
				        <option value="Rio de Janeiro" <?php if($cidade == 'Rio de Janeiro') echo 'selected'; ?>>Rio de Janeiro</option>
				        <option value="Belo Horizonte" <?php if($cidade == 'Belo Horizonte') echo 'selected'; ?>>Belo Horizonte</option>
				        <option value="Porto Alegre" <?php if($cidade == 'Porto Alegre') echo 'selected'; ?>>Porto Alegre</option>
				        <option value="Salvador" <?php if($cidade == 'Salvador') echo 'selected'; ?>>Salvador</option>
				        <option value="Brasilia" <?php if($cidade == 'Brasilia') echo 'selected'; ?>>Brasília</option>
				        <option value="Fortaleza" <?php if($cidade == 'Fortaleza') echo 'selected'; ?>>Fortaleza</option>
				        <option value="Recife" <?php if($cidade == 'Recife') echo 'selected'; ?>>Recife</option>
				        <option value="Florianopolis" <?php if($cidade == 'Florianopolis') echo 'selected'; ?>>Florianópolis</option>
				        <option value="Manaus" <?php if($cidade == 'Manaus') echo 'selected'; ?>>Manaus</option>
				        <option value="Belem" <?php if($cidade == 'Belem') echo 'selected'; ?>>Belém</option>
				        <option value="Goiania" <?php if($cidade == 'Goiania') echo 'selected'; ?>>Goiânia</option>
					</select><hr> 
				</div>
			
				<div class="col-md-4">
					<select name="preco" class="form-select btn btn-outline-dark " aria-label="Default select example" required>
                        <option value="estado">Preço Venda</option> 
                        <option value="100000" <?php if($preco == '100000') echo 'selected'; ?>>A patir de R$100.000</option>
                        <option value="200000" <?php if($preco == '200000') echo 'selected'; ?>>A patir de R$200.000</option>
                        <option value="300000" <?php if($preco == '300000') echo 'selected'; ?>>A patir de R$300.000</option>
                        <option value="400000" <?php if($preco == '400000') echo 'selected'; ?>>A patir de R$400.000</option>
                        <option value="500000" <?php if($preco == '500000') echo 'selected'; ?>>A patir de R$500.000</option>
                        <option value="600000" <?php if($preco == '600000') echo 'selected'; ?>>A patir de R$600.000</option>
                        <option value="700000" <?php if($preco == '700000') echo 'selected'; ?>>A patir de R$700.000</option>
                        <option value="800000" <?php if($preco == '800000') echo 'selected'; ?>>A patir de R$800.000</option>
                    </select> <hr> 
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<select name = "tipoImovel" class="form-select btn btn-outline-dark " > 
						<option value="">Tipo Imovel</option>
						<option value="Apartamento" <?php if($tipoImovel == 'Apartamento') echo 'selected'; ?>>Apartamento</option>
	          <option value="Casa" <?php if($tipoImovel == 'Casa') echo 'selected'; ?>>Casa</option>
	          <option value="Kitnet" <?php if($tipoImovel == 'Kitnet') echo 'selected'; ?>>Kitnet</option>
					</select><hr> 
				</div>
				<div class="col-md-4">
					<select name = "tipoCompra" class="form-select btn btn-outline-dark "> 
						<option value="">Tipo Compra</option>
						<option value="Aluguel" <?php if($tipoCompra == 'Aluguel') echo 'selected'; ?>>Aluguel</option>
		        <option value="Compra" <?php if($tipoCompra == 'Compra') echo 'selected'; ?>>Compra</option>
		        <option value="Alocação" <?php if($tipoCompra == 'Alocação') echo 'selected'; ?>>Alocação</option>
					</select><hr> 
				</div>
				<div class="col-md-4">
					<select name = "status" class="form-select btn btn-outline-dark " >
						<option value="">status</option>
						<option value="Disponivel" <?php if($tipoCompra == 'Disponivel') echo 'selected'; ?>>Disponivel</option>
				    <option value="Indisponivel" <?php if($tipoCompra == 'Indisponivel') echo 'selected'; ?>>Indisponivel</option>
					</select> <hr> 
				</div>
			</div>	
				<div class="col-md-12 text-center">
						<button class="btn btn-secondary btn-block active" type="submit">Filtra</button>
				</div>
			<br>
		</form>

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
        <br>
		<div class="row">
	      <div class="col-md-12">
	        <table class="table table-bordered">
	          <tr>
	            <th>idImovel</th>
	            <th>Estado</th>
	            <th>cidade</th>
	            <th>Emdereco</th>
	            <th>Preço</th>
	            <th>Tipo Imovel</th>
	            <th>Tipo Contrato</th>
	            <th>Status</th>
	            <th>Ações</th>
	          </tr>

	          <?php

	            if (!isset($_GET['estado'])) {
                    $sql = "SELECT * FROM imoveis ORDER BY idImovel ASC";
                } else {
                    $sql = "SELECT * FROM imoveis WHERE estado = '$estado' AND cidade = '$cidade' AND preco >= '$preco' AND tipoCompra = '$tipoCompra'";
                }

	            $resultados = mysqli_query($conn, $sql);
	            while ($dados = mysqli_fetch_assoc($resultados)) {
	              echo '<tr>
	                      <td>'.$dados['idImovel'].'</td>
	                      <td>'.$dados['estado'].'</td>
	                      <td>'.$dados['cidade'].'</td>
	                      <td>'.$dados['endereco'].'</td>
	                      <td>'.$dados['preco'].'</td>
	                      <td>'.$dados['tipoImovel'].'</td>
	                      <td>'.$dados['tipoCompra'].'</td>
	                      <td>'.$dados['status'].'</td>
	                      
	                      <td style="text-align: center;">
	                      	<a class="btn btn-warning" href="homeFunc.php?idImovel='.$dados['idImovel'].'">Editar</a>
	                        <a href="#excluir" data-toggle="modal" data-target="#excluir_'.$dados['idImovel'].'" class= "btn btn-danger">Excluir</a>
	                      </td>
	                    </tr>';

	                     echo '<div class="modal fade" id="excluir_'.$dados['idImovel'].'" tabindex="-1" role="dialog" aria-labelledby="">
								      <div class="modal-dialog" role="document">
								        <div class="modal-content">
								          <div class="modal-header">
								            <h4 class="modal-title">Confirmar Exclusão</h4>
								          </div>
								          <div class="modal-body">
								            Gostaria de excluir esse Imovel ('.$dados['idImovel'].')?
								          </div>
								          <div class="modal-footer">
								          	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
								            <a class= "btn btn-danger" href="includes/excluir.imovel.php?idImovel='.$dados['idImovel'].'">Excluir</a>
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
		  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <?php 
      	include_once("includes/rodaPe.php");
      ?>

     

</body>
</html>