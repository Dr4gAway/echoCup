<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./parts/partsStyle.css">
    <link rel="stylesheet" href="./CSS/devStyle.css">
    <title>echoCup | Desenvolvedores</title>
</head>

<body>
    <?php
        include './parts/header.php';
        include './includes/connection.php';
        include './parts/backToTop.php';
    ?>
    <section class="container" id="devs">
        <img id="logoSection" src="./images/Logo-4.svg">
        <div class="dev">
            <img src="./images/devs/carlos.png" alt="">
            <div class="name">
                <h3>Carlos Vitor de Lima Pinto</h3>
                <span>carlos.vitor@unesp.br</span>
            </div>
        </div>
        <div class="dev">
            <img src="./images/devs/gilmar.png" alt="">
            <div class="name">
                <h3>Gilmar Dos Santos Filho</h3>
                <span>gilmar.filho@unesp.br</span>
            </div>
        </div>
        <div class="dev">
            <img src="./images/devs/diorio.png" alt="">
            <div class="name">
                <h3>Guilherme Henrique Pinto Diorio</h3>
                <span>guilherme.hp.diorio@unesp.br</span>
            </div>
        </div>
        <div class="dev">
            <img src="./images/devs/malu.png" alt="">
            <div class="name">
                <h3>Maria Luiza Busatto Truijo</h3>
                <span>maria.busatto@unesp.br</span>
            </div>
        </div>
        <div class="dev">
            <img src="./images/devs/miguel.png" alt="">
            <div class="name">
                <h3>Miguel de Oliveira Correia</h3>
                <span>mo.correia@unesp.br</span>
            </div>
        </div>
    </section>
    <?php
        include './parts/footer.php';
    ?>
</body>
</html>