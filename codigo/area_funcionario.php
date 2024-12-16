<?php 
  
    session_start();

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
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="css/area_funcionario.css">
    <title>Imóveis</title>
</head>
<body>
    <!-- Navbar  -->
         <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
             <div class="container">
                <a class="navbar-brand" href="#">Aura imóvel</a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mx-auto"></div>
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="listaImoveis.php">Listagem de Imóvel </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="listaUsuarios.php">Listagem de Usuário </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="homeFunc.php">Cadastro de imóvel </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white" href="index.php">Cadastro de usuário </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white" href="homeFunc.php">Página Cliente </a>
                  </li>
                    </ul>
                </div>
            </div>
        </nav>
      <!-- Banner Image  -->
        <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
            <div class="content text-center">
            <h2 class="text-white title">Qualidade e conforto se encontram para criar o ambiente perfeito para você</h2>
            </div>
        </div>
        <div class="album py-5  ">
            <div class="container">
        
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                  <div class="card shadow-sm">
                    <img>
                    <div class="card-body">
                      <p style="text-align: center;">Para acessar a lista de imóveis e verificar/ editar todos os imóveis, clique no botão de visualizar</p>
                      <p class="card-text" style="text-align: center; font-weight: bold;">Acessar a listagem de imóveis</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a type="button" class="btn btn-outline-dark" href="listaImoveis.php" role="button">Visualizar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow-sm">
                    
                    <div class="card-body">
                        <p class="card-text" style="text-align: center;">Para acessar o cadastro dos imóveis, adicionando casas, apartamentos, kitnet, etc. Clique no botão cadastrar</p>
                        <p class="card-text" style="text-align: center;font-weight: bold;">Acessar o cadastro de imóveis</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <a type="button" class="btn btn-outline-dark" href="homeFunc.php" role="button">Cadastrar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow-sm">
                      <p class="card-text" style="text-align: center;">Para acessar a lista de usuários e verificar/ editar todos os usuários, clique no botão de visualizar</p>
                      <p class="card-text" style="text-align: center;font-weight: bold;">Acessar a listagem de usuários</p>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <a type="button" class="btn btn-outline-dark" href="listaUsuarios.php" role="button">Visualizar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        
                <div class="col">
                  <div class="card shadow-sm">
                    <div class="card-body">
                      <p class="card-text" style="text-align: center;">Para acessar o cadastro dos usuários, adicionando email, senha, kitnet, etc. Clique no botão cadastrar</p>
                      <p class="card-text" style="text-align: center;font-weight: bold;">Acessar o cadastro de usuários</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <a type="button" class="btn btn-outline-dark" href="cadastro.php" role="button">Cadastrar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow-sm">
                    
                    <div class="card-body">
                      <p class="card-text" style="text-align: center;">Para acessar o seu chat de conversa, fechar negócios, conversar com os usuários e ajudar clientes.</p>
                      <p class="card-text" style="text-align: center;font-weight: bold;">Acessar o chat de conversa</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <a type="button" class="btn btn-outline-dark" href="" role="button">Visualizar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow-sm">
                    <p class="card-text" style="text-align: center;">Para acessar a página principal de nosso site, para verificação de informações. Clique no botão entrar </p>
                    <p class="card-text" style="text-align: center;font-weight: bold;">Acessar página principal</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button"  class="btn btn-outline-dark">Entrar</button>
                        </div>
                      </div>
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
     