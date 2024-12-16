<footer>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3" style="background-color: black">
     <div class="container">
        <?php 

            if ($_SESSION['tipoUserUsuarioLogado'] == "Cliente") {
                echo '<a class="navbar-brand" href="home.php">Aura Imóvel</a>';
            }else{
                echo '<a class="navbar-brand" href="area_funcionario.php">Aura Imóvel</a>';
            }

        ?>
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

        <div class="collapse navbar-collapse" id="navbarNav" >
            <div class="mx-auto"></div>
            <ul class="navbar-nav">
            <li class="nav-item">
                <?php 

                    if ($_SESSION['tipoUserUsuarioLogado'] == "Cliente") {
                        echo '<a class="nav-link text-white" href="home.php">Home</a>';
                    }else{
                        echo '<a class="nav-link text-white" href="area_funcionario.php">Home</a>';
                    }

                ?>
                
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="listaImoveis.php">Lista Imoveis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="listaUsuarios.php">Lista Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="homeFunc.php">Cadastro de Imóvel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="cadastro.php">Cadastro de Usuário</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="home.php">Página Cliente</a>
            </li>
            </ul>
        </div>
    </div>
    </nav>
</footer>