<?php
    session_start();
    include_once("includes/conexao.php");
    include_once("includes/menu.php");

    if (!isset($_GET['estado'])) {
        $estado = "";
        $cidade = "";
        $tipoImovel = "";
        $tipoCompra = "";
        $preco = "";
    } else {
        $estado = $_GET['estado'];
        $cidade = $_GET['cidade'];
        $tipoImovel = $_GET['tipoImovel'];
        $tipoCompra = $_GET['tipoCompra'];
        $preco = $_GET['preco'];
    }

    if(!isset($_SESSION['idUsuarioLogado'])){
      header("Location: index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/rodape.css">
    <title>Aura Imóveis</title>
</head>
<body>
    <!-- Navbar  -->
     
         <?php 
            include_once("includes/conexao.php");
            include_once("includes/menu.php");
        ?>
      <!-- Banner Image  -->
        <div
            class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center"
        >
            <div class="content text-center">
            <h2 class=" title fonte" style="color:aliceblue" >Qualidade e conforto se encontram para criar o ambiente perfeito para você!</h2>
            </div>
        </div>
        
        <form action="" method="GET">
            <!-- Main Content Area -->
            <div class="container my-5 d-grid gap-5">
                <div class="p-5 border" style="border-radius: 10px;">
                    <div class="row">

                        <div class="col-md-2">
                            <select name="estado" class="form-select btn btn-outline-dark btn-lg" aria-label="Default select example" required>
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
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name = "cidade" class="form-select btn btn-outline-dark btn-lg" required>
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
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name = "tipoImovel" class="btn btn-outline-dark btn-lg dropdown-toggle" required>
                                <option value="">Tipo Imovel</option> 
                                <option value="Apartamento" <?php if($tipoImovel == 'Apartamento') echo 'selected'; ?>>Apartamento</option>
                                <option value="Casa" <?php if($tipoImovel == 'Casa') echo 'selected'; ?>>Casa</option>
                                <option value="Kitnet" <?php if($tipoImovel == 'Kitnet') echo 'selected'; ?>>Kitnet</option>
                            </select>
                        </div>   

                        <div class="col-md-2">
                            <select name="preco" class="form-select btn btn-outline-dark btn-lg" aria-label="Default select example" required>
                                <option value="estado">Preço Venda</option> 
                                <option value="100000" <?php if($preco == '100000') echo 'selected'; ?>>A patir de R$100.000</option>
                                <option value="200000" <?php if($preco == '200000') echo 'selected'; ?>>A patir de R$200.000</option>
                                <option value="300000" <?php if($preco == '300000') echo 'selected'; ?>>A patir de R$300.000</option>
                                <option value="400000" <?php if($preco == '400000') echo 'selected'; ?>>A patir de R$400.000</option>
                                <option value="500000" <?php if($preco == '500000') echo 'selected'; ?>>A patir de R$500.000</option>
                                <option value="600000" <?php if($preco == '600000') echo 'selected'; ?>>A patir de R$600.000</option>
                                <option value="700000" <?php if($preco == '700000') echo 'selected'; ?>>A patir de R$700.000</option>
                                <option value="800000" <?php if($preco == '800000') echo 'selected'; ?>>A patir de R$800.000</option>
                            </select>     
                         </div> 

                        <div class="col-md-2">
                            <select name = "tipoCompra" class=" btn btn-outline-dark btn-lg dropdown-toggle" required>
                                <option value="">Tipo Compra</option>
                                <option value="Aluguel" <?php if($tipoCompra == 'Aluguel') echo 'selected'; ?>>Aluguel</option>
                                <option value="Compra" <?php if($tipoCompra == 'Compra') echo 'selected'; ?>>Compra</option>
                                <option value="Alocação" <?php if($tipoCompra == 'Alocação') echo 'selected'; ?>>Alocação</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary btn-lg active">Filtrar</button>
                        </div>
                    </div> 
                </div>
            </div>
        </form>

        <div class="alinhamento" id="imovel">
            <h2>Imóveis</h2>
        </div>

        <br>
            <div class="container">
                <div class="row">
                    <?php
                        if (!isset($_GET['estado'])) {
                            $sql = "SELECT * FROM imoveis ORDER BY idImovel ASC";
                        } else {
                            $sql = "SELECT * FROM imoveis WHERE estado = '$estado' AND cidade = '$cidade' AND preco >= '$preco' AND tipoCompra = '$tipoCompra'AND tipoImovel = '$tipoImovel' ORDER BY idImovel ASC";
                        }
                        $resultados = mysqli_query($conn, $sql);
                        while ($dados = mysqli_fetch_assoc($resultados)) {
                            echo '  
                                <div class="col-md-3">
                                    <a href="vendaImovelGB.php?idImovel='.$dados['idImovel'].'">
                                        <div class="card" style="width: 18rem; margin-bottom: 40px;">
                                            <img src="img/condo.jpg" class="card-img-top imagem" alt="...">
                                            <div class="card-body">
                                                <div class="info d-flex">
                                                    <div class="barra">
                                                        <i class="fa-solid fa-house"></i>
                                                         <span>'.$dados['tamanho'].' m²</span>
                                                    </div>
                                                    <div class="barra">  
                                                        <i class="fa-solid fa-bed"></i>   
                                                        <span>'.$dados['quartos'].'</span>
                                                    </div>
                                                    <div class="barra">
                                                        <i class="fa-solid fa-car"></i></i>
                                                        <span>'.$dados['garagem'].'</span>
                                                    </div>
                                                </div>
                                                <div class="margin">
                                                    <strong class="tipoImovel">'.$dados['tipoImovel'].'</strong><br>
                                                    <span>'.$dados['estado'].' - '.$dados['cidade'].' - '.$dados['endereco'].'</span><br>
                                                    <span>Valor de '.$dados['tipoCompra'].':<br> <strong class="valor">R$ '.$dados['preco'].'</strong></span>
                                                </div>
                                            </div>  
                                        </div>         
                                    </a>
                                </div>';
                        }
                    ?>
                </div>
            </div>
        

        <div class="container_pai">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="quadrado2">
                            <h3 style="color:black">Conteúdos em alta</h3>
                            <h6 style="color:black">Descubra insights valiosos e dicas exclusivas sobre o mercado imobiliário em nosso blog! 
                                Não perca a chance de estar à frente nas melhores oportunidades de investimento.
                            </h6>
                            <br>
                            <button type="button" class="btn btn-outline-dark" style="text-align: center;"><a href="blog.php">Confira nosso blog</a></button>
                        </div>
                    </div> 
                    <div class="col-md-6 ">
                        <div class="quadrado2">
                            <h3 style="color: black">Descubra mais sobre nós</h3>
                            <h6 style="color:black;">Na nossa corretora, unimos expertise e paixão para oferecer as melhores oportunidades no mercado imobiliário,
                            sempre priorizando a satisfação e confiança dos nossos clientes.</h6>
                            <br>
                            <button style="text-align: center;" type="button" class="btn btn-outline-dark"><a href="sobrenos.php">Sobre nós</a></button>
                        </div>          
                    </div>          
                </div>
            </div>  
        </div> 
    
        <?php
            include_once("includes/rodaPe.php")
        ?>
         <script src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            var nav = document.querySelector('nav');
    
            window.addEventListener('scroll', function () {
            if (window.pageYOffset > 100) {
                nav.classList.add('bg-dark', 'shadow');
            } else {
                nav.classList.remove('bg-dark', 'shadow');
            }
            });
        </script>
            
    </body>
</html>