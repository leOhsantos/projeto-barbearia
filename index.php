<?php
require_once("class/Service.php");
require_once("class/Product.php");

$service = new Service();
$stmt = $service->list();

$product = new Product();
$stmt2 = $product->list();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Na Régua Barbershop</title>
</head>

<body class="index-bg">

    <header id="home" class="index-header">
        <nav class="navbar navbar-expand-lg fixed-top">
            <a href="#home"><img src="assets/img/barbershop-logo.png" alt="Logo Na Regua Barbershop" class="barbershop-logo select-disable"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarNavDropdown" class="menu collapse navbar-collapse">
                <ul class="navbar-nav select-disable">
                    <li class="nav-item">
                        <a class="bottom-animation" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="bottom-animation" href="#service">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="bottom-animation" href="#product">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="bottom-animation" href="#contactUs">Fale Conosco</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-logo">
            <img src="assets/img/barbershop-logo-2.png" alt="Na Régua Barbershop Logo" class="logo select-disable animate__animated animate__fadeInDown">
            <h3 class="animate__animated animate__fadeInLeft">Tá afim de dar um trato no seu visual? Cola aqui!<br>
                Rua Borboletas Psicodélicas Nº665 - São Paulo</h3>
            <a href="#service">
                <span class="see-more arrow-animation select-disable">Veja mais<br>
                    <span class="material-symbols-outlined arrow arrow-animation">expand_more</span>
                </span>
            </a>
        </div>
    </header>

    <main>
        <section id="service" class="container">
            <div class="title-container" data-anime="top">
                <h2 class="title-section">Nossos Serviços</h2>
            </div>
            <div class="img-col">
                <?php
                foreach ($stmt as $row) { ?>
                    <div class="img-container" data-anime="left">
                        <img src="<?php echo "restricted-area/img/service-img/" . $row[3] ?>" alt="Imagem do produto" class="img select-disable">
                        <p class="img-name"><?php echo $row[2] ?></p>
                        <p><?php echo $row[1] ?></p>
                    </div>
                <?php } ?>
            </div>
        </section>

        <section id="product" class="container">
            <div class="title-container" data-anime="top">
                <h2 class="title-section">Nossos Produtos</h2>
            </div>
            <div class="img-col">
                <?php
                foreach ($stmt2 as $row) { ?>
                    <div class="img-container" data-anime="left">
                        <img src="<?php echo "restricted-area/img/product-img/" . $row[3] ?>" alt="Imagem do produto" class="img select-disable">
                        <p class="img-name"><?php echo $row[2] ?></p>
                        <p><?php echo $row[1] ?></p>
                    </div>
                <?php } ?>
            </div>
        </section>

        <section id="contactUs" data-anime="bottom">
            <h2 class="title-section">Fale Conosco!</h2>
            <form id="form" class="form" method="post" action="restricted-area/crud-message.php">
                <label for="emailInput">Digite seu endereço de e-mail:</label>
                <input type="email" id="emailInput" class="index-text-input select-disable" name="clientEmail" maxlength="60" placeholder="exemplo123@gmail.com">
                <label for="messageInput">Digite sua mensagem:</label>
                <textarea type="text" id="messageInput" class="index-text-input select-disable" name="clientMessage" maxlength="250" placeholder="Deixe aqui sua crítica/sugestão sobre nosso estabelecimento"></textarea>
                <p id="errorText">.</p>
                <div class="btn-container"><input id="submitBtn" class="index-submit-btn" type="button" value="Enviar"></div>
            </form>
            </div>
        </section>
    </main>

    <footer>
        <h6><a href="user-login.php">Área do Profissional</a></h6>
        <h6>© 2021 Copyright - Na Régua Barbershop</h6>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>

</html>