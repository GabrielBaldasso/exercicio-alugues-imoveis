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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Minha Pagna</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo_homeFunc.css">
	<link rel="stylesheet" type="text/css" href="css/rodape.css">
    <title>Imóveis</title>
</head>
<body>
	<?php include_once('includes/menu_func.php');
	?>
      <!-- Banner Image  -->
        <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
            <div class="content text-center">
            	<div class="formulario container">
					<h2 class="cenntro">Cadastro Imovel</h2>

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
					<div class="quadrado">
						<form id="cadastroImovel" action="includes/criar.imovel.php" method="POST">

							<div class="row">
							<div class="col-md-3">
								<label class="form-label">Cidade</label>
									<select name = "cidade" class="form-control"  required>
										<option value = "">Escolha a cidade</option>
										<option value="Maringa" <?php if($cidade == 'Maringa') echo 'selected'; ?>>Maringá</option>
										<option value="Curitiba" <?php if($cidade == 'Curitiba') echo 'selected'; ?>>Curitiba</option>
										<option value="Londrina" <?php if($cidade == 'Londrina') echo 'selected'; ?>>Londrina</option>
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
									</select>
								</div>
								<div class="col-md-2">
									<label class="form-label">Estado</label>
									<select name = "estado" class="form-control"  required>
										<option value="" >Escolha o estado</option>
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
									</select>
								</div>

								

								<div class="col-md-5">
									<label class="form-label">Tipo de Compra</label>
									<select name = "tipoCompra" class="form-control" required> 
										<option value = "">Eslha o Tipo de Compra</option>
										<option value="Aluguel" <?php if($tipoCompra == 'Aluguel') echo 'selected'; ?>>Aluguel</option>
										<option value="Compra" <?php if($tipoCompra == 'Compra') echo 'selected'; ?>>Compra</option>
										<option value="Alocação" <?php if($tipoCompra == 'Alocação') echo 'selected'; ?>>Alocação</option>
									</select>
									
								</div>
								<div class="col-md-2">
									<label class="form-label">Nº garagem</label>
									<input type="number" name="garagem" value="<?php echo $garagem ?>" class="form-control" placeholder="1" required>
								</div>
							</div>


							<div class="row">
								<div class="col-md-3">
									<label class="form-label " style="margin-top:25px">Tipo de Imovel</label>
									<select name = "tipoImovel" class="form-control" required> 
										<option value="Apartamento" <?php if($tipoImovel == 'Apartamento') echo 'selected'; ?>>Apartamento</option>
										<option value="Casa" <?php if($tipoImovel == 'Casa') echo 'selected'; ?>>Casa</option>
										<option value="Kitnet" <?php if($tipoImovel == 'Kitnet') echo 'selected'; ?>>Kitnet</option>
									</select>
								</div>

								<div class="col-md-2">
									<label class="form-label" style="margin-top:20px">Tamanho</label>
									<input type="text" name="tamanho" value="<?php echo $tamanho ?>" class="form-control" placeholder="40,3 m²" required>
								</div>

								<div class="col-md-5">
									<label class="form-label" style="margin-top:20px">Endereço</label>
									<input type="text" name="endereco" value="<?php echo $endereco ?>" class="form-control" placeholder="Rua Pioneiro Juan Saldanha Garcia N: 50" required>
							
								</div>

								<div class="col-md-2">
									<label class="form-label" style="margin-top:20px">Nº de quartos</label>
									<input type="number" name="quartos" value="<?php echo $quartos ?>" class="form-control" placeholder="3" required>
								</div>

								
							</div>

							<div class="row">
								<div class="col-md-1">
									<input type="text" class="form-control" value="<?php echo $idImovel ?>" name="idImovel" class="form-control" hidden>
								</div>
								<div class="col-md-8" style="margin-left:65px">
									<label class="form-label" style="margin-top:15px">Preço</label>
									<input type="text" name="preco" style=" text-align: center;"value=""<?php echo $preco ?> class="form-control" placeholder="R$1200.00" required>
									
								</div>

								
							
							</div>
							<div class="row">
								<div class="col-md-12">
									<label class="form-label" style="margin-top:15px">Descrição</label>
									<textarea name="descricao"  class="form-control" placeholder="Descrição do imovél que está sendo cadastrado." required><?php echo $descricao ?></textarea>
								</div>	
							</div>		

							<div class="row">
							
							<div class="col-md-1" style="padding-top:50px">	
								<button class="btn btn-primary">Cadastrar</button>
							</div>
							<div class="col-md-1" style="padding-top:50px">
								<button type="button" onclick="limparCampos()" class="btn btn-danger">Cancelar</button>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


      
        <script src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">

        	function limparCampos() {
        		document.getElementById("cadastroImovel").reset();
    		}
            var nav = document.querySelector('nav');
    
            window.addEventListener('scroll', function () {
            if (window.pageYOffset > 100) {
                nav.classList.add('bg-dark', 'shadow');
            } else {
                nav.classList.remove('bg-dark', 'shadow');
            }
            });
        </script>
		
			<?php 
		    	include_once("includes/rodaPe.php");
		    ?>
    
    </body>
  </html>