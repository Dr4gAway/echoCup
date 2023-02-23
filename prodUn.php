<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./parts/partsStyle.css">
    <link rel="stylesheet" href="./CSS/prodStyle.css">
    <title>echoCup | Produto</title>
</head>
<body>
    <?php
        include './parts/header.php';
        include './includes/connection.php';
        include './parts/backToTop.php';

        //Programação de verdade kkk

        $cod_prod = $_GET['cod_prod'];

        $sql = "SELECT * FROM produto WHERE excluido = false AND cod_prod = $cod_prod";

        $result = pg_query($connect, $sql);
        $produto = pg_num_rows($result);

        if ($produto != 1)
        {
            echo '<script language="javascript">';
            echo "alert('Produto não encontrado!')";
            echo '</script>';

            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=./catalog.php'>";
        }

        $produto = pg_fetch_array($result)
    ?>
    
    <main>

        <section class="view">
            <!--Arrumar essa parte do código pra quando tiver imagem nos produtos-->
            <?php
                echo '<img src="'.$produto['campo_imagem'].'" id="main-image">';
                $imagem = $produto['campo_imagem'];
            ?>

            <div class="view-buy">
                <div class="view-buy-content">
                    <div class="view-buy-info">
                        <span>Código do produto: </span> <span> <?php echo $produto['cod_prod']; ?> </span>
                    </div>
                    <h2><?php echo $produto['nome']; ?></h2>
                    <div class="view-buy-info">
                        <span>Disponibilidade: </span> <span> <?php echo "Em ".($produto['estoque'] > 0 ? "estoque!" : "falta") ?> </span>
                    </div>
                </div>

                <div class="view-buy-price">
                    <span>Preço</span>
                    <span>R$ <?php echo $produto['preco']; ?> </span>
                </div>
                <div class="view-buy-check">
                    <?php
                        echo '<a href="./cart.php?acao=add&cod_prod='.$cod_prod.'&imagem='.$imagem.'"class="view-buy-check-btn '.($produto['estoque'] > 0 ? '' : 'off"').' ">Adicionar ao carrinho</a>';
                    ?>
                </div>
            </div>
        </section>

        <div class="divider"></div>

        <section class="view-details">
            <h3>Descrição </h3>
            <span> <?php echo $produto['descricao']; ?> </span>
            
        </section>

        <?php include './parts/footer.php'; ?>

    </main>

</body>
</html>