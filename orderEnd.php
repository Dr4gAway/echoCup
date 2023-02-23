<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="./CSS/orderStyle.css">
    <title>Compra Finalizada</title>
</head>
<body>   
    <?php
        session_start();
        
        $cod_user = $_SESSION['usuarioLogado']['cod_user'];
        include 'includes/endOrder-inc.php';
    ?> 
    <div class="container"> 
        <span class="material-symbols-outlined">task_alt</span>
        <H1>Sua compra foi finalizadaaa!</H1>
        <p>Agradecemos a preferência! <br>Aproveite a Semana do Colégio!</p>
        <a class="button" href="orderPrev.php">Retornar ao início</a>
    </div>
</body>
</html>