<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../CSS/loginStyle.css">
    <title>echoCup</title>
</head>

<body>
    <div class="container">
        <div class="form">
            <form action="../includes/login-inc.php" method="post">
                <h2>Login</h2>
                <label for="mail">
                    <span class="material-symbols-outlined">mail</span>
                    <input type="email" placeholder="email" name="mail" id="mailLogin" required>
                </label>
                <label for="password">
                    <span class="material-symbols-outlined">key</span>
                    <input type="password" placeholder="senha" name="password" id="" required>
                </label>
                <input type="submit" class="button" value="Enviar">

            </form>
            <a id="back" href="../index.php" class="button"><span class="material-symbols-outlined">keyboard_backspace</span></a>
        </div>

        <div class="haveAccount">
            <div class="haveAccount-content">
                <h2>Não possui conta?</h2>
                <p>Cadastre-se e seja nosso cliente!</p>
            </div>
            <a href="./signin.php" class="button">Cadastre-se</a>
        </div>
    </div>
</body>

</html>