<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./parts/partsStyle.css">
    <link rel="stylesheet" href="./CSS/catalogStyle.css">
    <title>echoCup | Catálogo</title>
</head>
<body>

    <?php
        include './parts/header.php';
        include './includes/connection.php';
        include './parts/backToTop.php';
    ?>

    <main>
        <section class="intro-all">
            <div class="intro-content">
                <div class="intro-content-text">
                    <h1>Veja nossos produtos!</h1>
                    <span>Na echoCup, os produtos são de qualidade e pensados especialmente nos clientes!</span>
                </div>

            </div>
            <div class="intro-button">
                <a href="#" class="intro-button-btn btn">Populares</a>
                <a href="#" class="intro-button-btn btn">Descontos</a>
            </div>
        </section>

        <div class='divider'></div>

        <section class="produto">
            <h2> Mais Populares</h2>
            <div class="produto-grid">

                <?php
                    $sql = "SELECT * FROM produto WHERE excluido = false ";
                    $i=1;
                    $result = pg_query($connect, $sql);
                    $line = pg_num_rows($result);
                    $line = pg_fetch_all($result);
                    
                    foreach($line as $produto)
                    {
                        echo "
                            <div class='produto-content'>
                                <a href='./prodUn.php?cod_prod=".$produto['cod_prod']."&".$produto['campo_imagem']."'>
                                    <img class='cardImg' src='".$produto['campo_imagem']."'>
                                    <span class='produto-content-name'>".$produto['nome']."</span>
                                    <span>R$ ".$produto['preco']."</span>
                                </a>
                            </div>";
                    }
                ?>

                <!-- <div class="produto-content">
                    <div class="produto-content-span"></div>
                    <span>Nome do produto</span>
                    <span>$999.00</span>
                </div>
                <div class="produto-content">
                    <div class="produto-content-span"></div>
                    <span>Nome do produto</span>
                    <span>$999.00</span>
                </div>
                <div class="produto-content">
                    <div class="produto-content-span"></div>
                    <span>Nome do produto</span>
                    <span>$999.00</span>
                </div> -->
            </div>

        </section>

        <div class='divider'></div>

        <section id="sponsors" class="conatainer">
            <h2>Patrocinadores</h2>
            <div class="sponsor sponsorL">
                <img class="height" src="./images/sponsor/marotos.png" alt="">
                <div class="sponsorText">
                    <h3>Marotos</h3>
                    <p>A Agência Marotos é tem como objetivo orientar e ajudar no amadurecimento da sua marca. Desde o nome, até a criação do seu logo. Através da comunicação, cria uma imagem da sua marca nas redes.</p>
                </div>
            </div>
            <div class="sponsor sponsorR">
                <div class="sponsorText">
                    <h3>Sr. Brechó</h3>
                    <p>O Sr. Brechó é uma loja focada em roupas e vestuário que visa trazer para você um novo conceito de moda. Conheça mais nas redes sociais da loja!</p>
                </div>
                <img class="width" src="./images/sponsor/srBrecho.jpeg" alt="">
            </div>
            <div class="sponsor sponsorL">
                <div class="sponsorText">
                    <h3>Equipe Santos</h3>
                    <p>É uma empresa especializa na sua segurança! Altamente capacitada para realizar a proteção e vigilância de seus eventos e a sua.</p>
                </div>
                <img class="width" src="./images/sponsor/equipeSantos.png" alt="Logo Equipe Santos">
            </div>
            <div class="sponsor sponsorR">
                <div class="sponsorText">
                    <h3>SmartVital</h3>
                    <p>Se você se encontra em urgência para realizar uma troca ou reparo no seu dispositivo movel, a SmartVital está com você! Sempre presente nos melhores e piores momentos</p>
                </div>
                <img class="width" src="./images/sponsor/SmartVital.png" alt="Logo Equipe Santos">
            </div>
        </section>

        <div class='divider'></div>
        
        <section class="intro-all end-page">
            <div class="intro-content">
                <img src="./images/Sample-1.jpg" class='intro-content-img' alt="">

                <div class="intro-content-text end-page">
                    <h1>Deseja conhecer os devs?</h1>
                    <span>Consulte a página de desenvolvedores!</span>
                    <a href="./devs.php" class='end-page-btn'>Dê uma olhada</a>
                </div>
                
            </div>
        </section>

        <?php
        include './parts/footer.php';
    ?>

    </main>
</body>
</html>