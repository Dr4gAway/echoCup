<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./parts/partsStyle.css">
    <link rel="stylesheet" href="./CSS/indexStyle.css">
    <title>echoCup</title>
</head>

<body>
    <?php
        include './parts/header.php';
        include './includes/connection.php';
        include './parts/backToTop.php';
    ?>
    <main>
        <section class="container" id="home">

            <div class="carousel-wrapper">
                <span id="item-1"></span>
                <span id="item-2"></span>
                <span id="item-3"></span>

                <div class="carousel-item item-1">
                    <a href="#item-3" class="arrow arrow-prev"></a>
                    <a href="#item-2" class="arrow arrow-next"></a>
                </div>
                <div class="carousel-item item-2">
                    <a href="#item-1" class="arrow arrow-prev"></a>
                    <a href="#item-3" class="arrow arrow-next"></a>
                </div>
                <div class="carousel-item item-3">
                    <a href="#item-2" class="arrow arrow-prev"></a>
                    <a href="#item-1" class="arrow arrow-next"></a>
                </div>
            </div>

            <div class="homeContent">
                <h2>Encomende já seus copos personalizados</h2>
                <p>Veja os nossos produtos e adquira já os seus copos!</p>
                <div class="homeButton">
                    <a href="./catalog.php" class="button">Ver produtos</a>
                </div>
            </div>
        </section>

        <div class="divider"></div>
        
        <section class="container" id="examples">
            <div class="card">
                <img src="https://i.imgur.com/2zTI6Ko.jpg" alt="" class="cardImg">
                <p>Produtos com grande variedade de cores na echoCup!</p>
            </div>
            <div class="card">
                <img src="https://i.imgur.com/R5IUWpJ.jpg" alt="" class="cardImg">
                <p>Frases pensadas com muito cuidado para agradar vocês!</p>
            </div>
            <div class="card">
                <img src="https://i.imgur.com/OA0UIB2.jpg" alt="" class="cardImg">
                <p>Grande variedade de tamanhos e modelos só na echoCup!</p>
            </div>
        </section>
        <div class="divider"></div>
        <section class="container" id="video">
            <div class="videoContent">
                <img id="iframe" src="https://i.imgur.com/X3Wi7U5.jpg">
                <div class="videoText">
                    <p>Copos de ótima qualidade e personalização própria</p>
                    <h2>Compre na <img src="./images/Logo-4.svg" alt=""></h2>
                    <a href="./catalog.php" class="button">Compre já!</a>
                </div>
            </div>
        </section>
        <div class="divider"></div>
        <section class="container" id="prod">
            <h2>Alguns de nossos produtos</h2>
            <div class="someProducts">
                <?php
                    $sql = "SELECT * FROM produto WHERE excluido = false ";
                    $i=1;
                    $result = pg_query($connect, $sql);
                    $line = pg_num_rows($result);
                    $line = pg_fetch_all($result);
                        foreach($line as $produto){
                            echo "
                                <div class='card'>
                                    <img class='cardImg' src='".$produto['campo_imagem']."'>
                                    
                                        <p>".$produto['nome']."</p>
                                    
                                        <p>".$produto['preco']."</p>
                                    
                                </div>";
                            if($i == 3)
                                break;
                            $i++;
                        }
                ?>
            </div>
            <div class="prodButton">
                <a href="./catalog.php" class="button">Ver produtos</a>
            </div>
        </section>
    </main>
    <?php
        include './parts/footer.php';
    ?>

    
</body>

</html>