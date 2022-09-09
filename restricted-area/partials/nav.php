<header>
    <nav class="navbar navbar-expand-lg fixed-top">
        <img src="../assets/img/barbershop-logo.png" alt="Logo Na Regua Barbershop" class="barbershop-logo select-disable">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="menu collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav select-disable">
                <li class="nav-item">
                    <a class="bottom-animation" href="show-scheduling.php">Agendamentos</a>
                </li>
                <li class="nav-item">
                    <a class="bottom-animation" href="show-client.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="bottom-animation" href="show-service.php">Serviços</a>
                </li>
                <li class="nav-item">
                    <a class="bottom-animation" href="show-product.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="bottom-animation" href="show-message.php">Mensagens</a>
                </li>
                <li class="nav-item">
                    <a type="button" class="bottom-animation" data-bs-toggle="modal" data-bs-target="#exampleModal">Sair</a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Sair</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Tem certeza de que deseja sair do modo administrador?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a class="btn btn-danger" href="logout.php">Sair</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</header>

<main class="restricted-area">