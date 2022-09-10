<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Na Régua Barbershop</title>
</head>

<body>

    <section class="user-container">
        <div class="user-bg"><img src="assets/img/barbershop-logo-2.png" alt="Na Régua Barbershop Logo" class="logo select-disable"></div>
        <div class="login-user-form">
            <h1 class="title-login">Área do Profissional</h1>
            <p class="user-login-text">Preencha os campos abaixo para acessar a Área do Profissional.</p>
            <form id="form" class="form" action="validate-user-login.php" method="post">
                <input autofocus name="userLogin" id="userInput" class="text-input select-disable" type="text" placeholder="Nome de usuário" maxlength="40">
                <p class="error-text">Digite um nome de usuário.</p>
                <div class="password-container">
                    <input name="userPassword" id="passwordInput" class="text-input select-disable" type="password" placeholder="Senha" maxlength="128">
                    <span class="material-symbols-outlined eye select-disable">visibility</span>
                </div>
                <p class="error-text">Digite uma senha.</p>
                <input id="submitBtn" class="submit-login-btn" type="button" value="Entrar">
                <p class="error-text">Nome de usuário ou senha incorretos!</p>
            </form>
            <div id="backButton"><span class="material-icons select-disable">arrow_back</span></div>
        </div>
    </section>

    <a id="linkValidateUserLogin" href="validate-user-login.php"></a>

    </main>

    <script src="assets/js/userLogin.js"></script>

</body>

</html>