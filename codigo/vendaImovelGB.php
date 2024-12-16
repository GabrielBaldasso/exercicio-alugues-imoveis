<?php
    include_once("includes/conexao.php");
    session_start();
    include_once("includes/menu2.php");
    $idImovel = $_GET['idImovel'];

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
  }

  echo mysqli_error($conn);

  if(!isset($_SESSION['idUsuarioLogado'])){
    header("Location: index.php");
  }
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/home.css" >
    <link rel="stylesheet" type="text/css" href="css/rodape.css" >
    <link rel="stylesheet" href="style.css" href="css/vendaImovelGB.css">
    <link rel="stylesheet" type="text/css" href="css/vendaImovel.css">
  
    <title>Imóvel</title>
</head>
<body>
    <div class="container text-center">
      <main>
          <div class="py-5 ">
            <div class="row g-5">
              <?php
                $sql = "SELECT * FROM imoveis WHERE idImovel = '$idImovel' ";
                $resultados = mysqli_query($conn, $sql);
                while ($dados = mysqli_fetch_assoc($resultados)) {
                    echo '
                      <div class="py-5 text-center">
                        <div class="row g-5">
                          <div class="col-md-5 col-lg-4 order-md-last">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                              <span class="text-primary"></span>
                            </h4>
                            <ul class="list-group mb-3">
                              <li class="list-group-item d-flex justify-content-between lh-sm ">
                                  <div>
                                    <h6 class="my-0 "><img src="img/casa_home.jpg" style="width: 50%;"></h6>
                                    <small class="text-body-secondary">Casa</small>
                                  </div>
                              <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                  <h6 class="my-0">Descrição</h6>
                                  <small class="text-body-secondary">'.$dados['descricao'].'</small>
                                </div>
                              </li>
                      
                              <li class="list-group-item d-flex justify-content-between">
                                <span>Total (R$)</span>
                                <strong class="valor">R$ '.$dados['preco'].'</strong>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                <span>Gostaria de saber mais sobre este imvóvel?</span>
                                <strong href="#"><u style="color:rgb(144, 199, 250)"><i>Envie uma mensagem!</i></u></strong>
                              </li>
                            </ul>';
                }
              ?>

                <div class="col-md-12">
                    <form action="include/conversa.php"  method="POST" id="chat-container">
                      <div class="row">
                        <div class="col-md-12 grid">
                          <label for="" class="g-col-6" id="espaco" >Destinatário</label>
                          <select name="idUsuarioDestinatario" class="form-select" id="espaco">
                          <?php
                            
                            $sql = "SELECT nome FROM usuarios WHERE tipoUser = 'Funcionario'";
                            $resultados = mysqli_query($conn, $sql);
                            while ($dados = mysqli_fetch_assoc($resultados)) {
                              echo "<option value=".$dados['nome'].">".$dados['nome']."</option>";
                            }
                          ?>
                          </select>
                          <textarea name="mensagemChat" id="espaco" class="form-control" rows="5" placeholder="Introduza a sua mensagem"></textarea>
                            <div class="d-flex justify-content-end"  >
                             <a href="#negociar" data-toggle="modal" data-target="#negociar_<?php echo $idImovel; ?>" class="btn btn-danger px-4">Efetuar Transação</a>
                              &ensp;
                              <button class="btn btn-primary px-9" type="button" id="send-button espaco">Enviar</button>

                              <?php
                                echo '<div class="modal fade" id="negociar_'.$idImovel.'" tabindex="-1" role="dialog" aria-labelledby="">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Confirmar Negociação</h4>
                                            </div>
                                            <div class="modal-body">
                                              Gostaria de confirme a '.$tipoCompra.' do(a) '.$tipoImovel.'?
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                              <a class= "btn btn-danger" href="includes/efetuar.transacao.php?idImovel='.$idImovel.'">Efetuar</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>';

                              ?>
                            </div>
                        </div>
                      </div>
                    </form>
              </div>
            </div>

            <div class="col-md-7 ">
                  
                    <div class="carousel slide" 
                        id="carouselDemo"
                        data-bs-wrap="true" 
                        data-bs-ride="carousel" style="margin-top: display: flex;">
                        
    
                     <div class="carousel-inner">
                      <h4>Veja mais de seu futuro lar</h4>
                        <div class="carousel-item active">
                            <img src="img/sala.jpg" class="w-100">
                            <div class="carousel-caption">
                                <h5></h5>
                                <p>
                                    
                                </p>
                            </div>
                        </div>
    
                        <div class="carousel-item " 
                        data-bs-interval="2000">
                            <img src="img/casa_home.jpg" class="w-100">
                            <div class="carousel-caption">
                                <h5></h5>
                                <p>
                                   
                                </p>
                            </div>
                        </div>
    
                        <div class="carousel-item ">
                            <img src="img/cama.jpg" class="w-100">
                            <div class="carousel-caption">
                                <h5></h5>
                                <p>
                                   
                                </p>
                            </div>
                        </div>
    
                    </div>
                    
    
                    <button class="carousel-control-prev" 
                    type="button"
                    data-bs-target="#carouselDemo" 
                    data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
    
                  <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#carouselDemo"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    
                    </button>
    
                    <div class="carousel-indicators">
                        <button type="button" class="active"
                            data-bs-target="#carouselDemo"
                            data-bs-slide-to="0">
                            
                        </button>
    
                        <button type="button" 
                        data-bs-target="#carouselDemo"
                        data-bs-slide-to="1">
                            
                        </button>
    
                        <button type="button"
                        data-bs-target="#carouselDemo"
                        data-bs-slide-to="2">
              
                        </button>
                    </div>
              </div>
  
                <?php
                 $sql = "SELECT * FROM imoveis WHERE idImovel = '$idImovel' ";
                  $resultados = mysqli_query($conn, $sql);
                  while ($dados = mysqli_fetch_assoc($resultados)) {
                      echo '
                            
  
              <hr style="width: 310px; margin-left: 256px; margin-top: 80px;">
              <div style="margin-top: 80px;">
                  <div class="row ">
                    <div class="col-md-4">
                      <h5>Status:</h5><p><h5>'.$dados['status'].'</h5></p>
                  </div>
                  <div class="col-md-4">
                    <h5>Tipo de Imovel:</h5><p><h5> <i class="fa-solid fa-building"></i> '.$dados['tipoImovel'].'</i></h5></p>
                  </div>
                <div class="col-md-4">
                  <h5>Tipo de Negociação:</h5><p><h5>'.$dados['tipoCompra'].'</h5></p>
                  </div>
                </div>
                <br>  
                  <div class="row">
                    <div class="col-md-4">
                      <h5>Tamanho:</h5><p style = "font-size: 124%;"><i class="bi bi-rulers" style="margin-top:20px;"> </i> '.$dados['tamanho'].'m²</p>
                    </div>
                    <div class="col-md-4">
                      <h5>Quartos:</h5><p style = "font-size: 124%;"><i class="fa-solid fa-bed"></i> '.$dados['quartos'].' quartos</p>
                    </div>
                    <div class="col-md-4">
                      <h5>Vagas de Garagem:</h5><p style = "font-size: 124%;"><i class="fa-solid fa-car" ></i> '.$dados['garagem'].' vaga</p>
                    </div>
                  </div>
                  <div class="row "style="margin-top: 20px;">
                
                  <hr style="width: 310px; margin-left: 256px; margin-top: 80px;">
                  <div class="row">
                    <div class="col-md-12 " >
                      <h6 style="text-align: justify;">Endereço</h6><p> <h4  style="text-align: justify;"> <i class="fa-solid fa-location-dot" style="color: #ED1C24;" ></i>  '.$dados['endereco'].' - '.$dados['estado'].' - '.$dados['cidade'].'</h4></p>
                    </div>
                  </div>
                  </div>
                  
                    <hr style="width: 310px; margin-left: 256px; margin-top: 70px;">
                    <h6 style="text-align: center; padding-top: 20px;">Descrição</h6><p>
                    <h7 style="text-align: justify; padding-top: 20px;">'.$dados['descricao'].'</h7>
                  </div>
                </div>
              </div>
            </div>';
                  }
                ?>
      </main>        
    </div>
          </footer>

          
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

          <?php

            include_once("includes/rodaPe.php")
         ?>
  </body>
</html>
