<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./parts/partsStyle.css">
    <link rel="stylesheet" href="./CSS/cartStyle.css">
    <title>echoCup | Carrinho</title>
</head>
<body>
    <?php
        include './parts/header.php';
        include './includes/connection.php';
        include './parts/backToTop.php';

        $acao = $_GET['acao'];
        $cod_prod = $_GET['cod_prod'];
        $cod_user = 1;
        
        $sql = "SELECT * FROM carrinho WHERE cod_user = 1";
        
        $result = pg_query($connect, $sql);
        $line = pg_num_rows($result);

        include "./includes/cart-inc.php";

        if ($line_result > 0)
        {
            $precoTotal = null;

            echo "
                <main>

                    <section class='checkout'>
                        <h1>Carrinho de compras</h1>

                        <div class='divider'></div>";

            foreach ($line_result as $produto) {

                echo "

                        <div class='checkout-item'>
                            <div class='img'></div>
                            <div class='checkout-item-text'>
                                <div class='checkout-item-details'>
                                    <span>".$produto['nome']."</span>
                                    <span>Subtotal R$".$produto['subtotal']."</span>
                                    <div class='check-out-item-details-quantity'>
                                            <a href='./cart.php?acao=sub&cod_prod=".$produto['cod_prod']."'>-</a>
                                            <span>".$produto['quantidade']."</span>
                                            <a href='./cart.php?acao=add&cod_prod=".$produto['cod_prod']."'>+</a>
                                    </div>
                                </div>
                                <span class='checkout-item-mainprice'>R$ ".$produto['preco']."</span>
                            </div>
                        </div>

                        <div class='divider'></div>";

                $precoTotal += $produto['subtotal'];
            }

            echo "
                        <section class='purchase'>
                            <div class='purchase-subtotal'>
                                <span>Subtotal </span>
                                <span>R$ ".$precoTotal."</span>
                            </div>
                            <a href='orderConfirm.php' class='purchase-end-btn'>Fechar pedido</a>

                        </section>

                        <a href='./catalog.php' class='back'><span class='material-symbols-outlined buttonSpan'>keyboard_backspace</span></a>
                    
                    </section>

                <?php include './parts/footer.php'; ?>

                </main>
            ";
        }

        else 
        {
            echo "
                <main>

                    <section class='checkout'>
                        <h1>Carrinho de compras</h1>

                        <div class='divider'></div>

                        <h1>Nenhum produto adicionado!</h1>

                        <a href='./catalog.php' class='back'><span class='material-symbols-outlined buttonSpan'>keyboard_backspace</span></a>

                    </section>

                </main>";

        }

        include './parts/footer.php'
    ?>
    
</body>
</html>