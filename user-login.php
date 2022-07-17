<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/logo.png">
    <title>Na Régua Barbershop</title>
</head>

<body>

    <section class="user-container">
        <div class="user-bg"><img src="assets/img/logo.png" alt="Na Régua Barbershop Logo" class="logo animate__animated animate__bounceIn"></div>
        <div class="login-user-form">
            <h1 class="title">Área do Profissional</h1>
            <div class="login-hr"></div>
            <p class="user-login-text">Preencha os campos abaixo para acessar a Área do Profissional.</p>
            <form id="form" class="form" action="validate-user-login.php" method="post">
                <input name="userLogin" id="userInput" class="text-input" type="text" placeholder="Nome de usuário" maxlength="40">
                <div class="password-container">
                    <input name="userPassword" id="passwordInput" class="text-input" type="password" placeholder="Senha" maxlength="128">
                    <span class="material-symbols-outlined">visibility_off</span>
                </div>
                <p id="errorText">.</p>
                <input id="submitBtn" class="submit-login-btn" type="button" value="Entrar">
            </form>
            <div id="backButton"><span class="material-icons">arrow_back</span></div>
        </div>
    </section>

    <a id="linkValidateUserLogin" href="validate-user-login.php"></a>

    </main>

    <script src="assets/js/userLogin.js"></script>

</body>

</html>