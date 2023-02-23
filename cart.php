<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./parts/partsStyle.css">
    <link rel="stylesheet" href="./CSS/cartStyle.css">
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
    ?>

    <?php if (!isset($_SESSION['usuarioLogado'])) { ?>
    
        <meta HTTP-EQUIV='refresh' CONTENT='0;URL=login/login.php'>
        
    <?php } else { ?>

    <?php
        $cod_user = $_SESSION['usuarioLogado']['cod_user']; 
        include './includes/cart-inc.php';
    ?>

    <h1>Carrinho</h1>

    <main class="wrapper">
        <section class="checkout">
            <?php 
                $precoTotal = 0.00;
                
                if ($line_result > 0)
                {

                    foreach($line_result as $produto)
                    {
                        echo '
                        <div class="checkout-item">
                            <div class="checkout-details">
                                <img class="checkout-img" src="'.$produto['campo_imagem'].'">
                                <div class="checkout-details-text">
                                    <span class="checkout-name">'.$produto['nome'].'</span>
                                    <div class="checkout-subprice">
                                        <span>Subtotal</span>
                                        <span>R$ '.$produto['subtotal'].'</span>
                                    </div>
                                    <div class="checkout-quantity">
                                        <a href="./cart.php?acao=sub&cod_prod='.$produto['cod_prod'].'">-</a>
                                        <span>'.$produto['quantidade'].'</span>
                                        <a href="./cart.php?acao=add&cod_prod='.$produto['cod_prod'].'">+</a>
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

                }

                else
                echo "<h2>Nenhum produto adicionado!</h2>"
            ?>

        </section>

        <section class="fixed">
            <div class="menu">
                <div class="menu-values">
                    <div class="menu-itens">
                        <?php
                            if ($line_result > 0) 
                            {
                                foreach($line_result as $produto)
                                {
                                    echo '
                                        <div class="menu-itens-content">
                                            <span>'.$produto['nome'].'</span>
                                            <span>R$ '.$produto['subtotal'].'</span>
                                        </div>
                                    ';
                                }
                            }
                        ?>
                    </div>

                    <div class="menu-price">
                        <span>Total</span>
                        <span>R$ <?php echo $precoTotal?></span>
                    </div>
                </div>
                <a href="orderConfirm.php">Fechar pedido</a>
            </div>

        </section>
        
    </main>

    <?php include './parts/footer.php' ?>
    <?php } ?>
</body>
</html>