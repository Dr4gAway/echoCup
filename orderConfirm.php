<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/cartStyle.css">
    <link rel="stylesheet" href="./parts/partsStyle.css">
    <title>Carrinho</title>
</head>
<body>
    <?php
        
        session_start();
        include './parts/header.php';
        include './includes/connection.php';
        include './parts/backToTop.php';

        $acao = $_GET['acao'];
        $cod_prod = $_GET['cod_prod'];
        $cod_user = $_SESSION['usuarioLogado']['cod_user'];;

        include './includes/order-inc.php';

        if ($_SESSION['produto'] == null) { ?>
            <script> alert("Não foi possível finalizar a compra, o carrinho está vazio.") </script>
            <meta HTTP-EQUIV='refresh' CONTENT='0;URL=./catalog.php'>
        <?php } else { ?>

    <h1>Confirmar compra</h1>

    <main class="wrapper">

        <section class="checkout">
            <?php 
                $precoTotal = null;

                foreach($_SESSION['produto'] as $produto)
                {
                    echo '
                    
                    <div class="checkout-item">
                        <div class="checkout-details">
                            <img src='.$produto['campo_imagem'].' class="checkout-img">
                            <div class="checkout-details-text">
                                <span class="checkout-name">'.$produto['nome'].'</span>
                                <div class="checkout-subprice">
                                    <span>Subtotal</span>
                                    <span>R$ '.$produto['subtotal'].'</span>
                                </div>
                                <div class="checkout-quantity">
                                    <span>'.$produto['quantidade'].'</span>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-price">
                            <span>Preço Unitário</span>
                            <span>R$ '.$produto['preco'].'</span>
                        </div>
                    </div>';

                    $precoTotal += $produto['subtotal'];
                }

                $_SESSION['precototal'] = $precoTotal;
            ?>

        </section>

        <section class="fixed">
            <div class="menu">
                <div class="menu-values">
                    <div class="menu-itens">
                        <?php
                        foreach($_SESSION['produto'] as $produto)
                        {
                            echo '
                                <div class="menu-itens-content">
                                    <span>'.$produto['nome'].'</span>
                                    <span>R$ '.$produto['subtotal'].'</span>
                                </div>
                            ';
                        }

                        ?>
                    </div>

                    <div class="menu-price">
                        <span>Total</span>
                        <span>R$ <?php echo $precoTotal ?></span>
                    </div>
                </div>
                <a href="orderEnd.php">Finalizar</a>
            </div>

        </section>

    </main>

    <?php include './parts/footer.php' ?>
</body>

    <?php } ?>
</html>