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
            <ul class="navbar-nav">
            <li class="nav-item">
                <?php 

                    if ($_SESSION['tipoUserUsuarioLogado'] == "Cliente") {
                        echo '<a class="nav-link text-white" href="home.php">Home</a>';
                    }else{
                        echo '<a class="nav-link text-white" href="homeFunc.php">Home</a>';
                    }

                ?>
                
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="home.php">Imóveis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#contato">Contato</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="blog.php">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="sobrenos.php">Sobre</a>
            </li>
            </ul>
            
        </div>
    </div>
    </nav>
</footer>