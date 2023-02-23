<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./parts/partsStyle.css">
    <link rel="stylesheet" href="./CSS/prevOrderStyle.css">
    <title>echoCup | Histórico de Compras</title>
</head>
<body>

    <?php
        session_start();
        include './parts/header.php';
        include './includes/connection.php';
        include './parts/backToTop.php';
    ?>

    <main>

        <?php

        $cod_user = $_SESSION['usuarioLogado']['cod_user'];

        $sql = "SELECT * FROM venda WHERE cod_user = $cod_user;";
        $result = pg_query($connect, $sql);
        $line = pg_num_rows($result);

        if ($line > 0)
        {

            $line_venda = pg_fetch_all($result);

            foreach ($line_venda as $venda)
            {
                $sql = "SELECT i.quantidade, i.preco,
                               p.nome, p.cod_prod, p.campo_imagem as imagem
                        FROM itemVenda i
                        INNER JOIN produto p ON  i.cod_prod = p.cod_prod
                        WHERE i.cod_venda = ".$venda['cod_venda'].";";

                $result = pg_query($connect, $sql);
                $line_itemVenda = pg_fetch_all($result);

                $venda_ts = $venda['horario'];
                $venda_dt = new DateTime($venda_ts);
                
                echo '
                
                <div class="order">
                    <div class="order-header-wrapper">
                        <div class="order-information">
                            <div class="order-information-item">
                                <span>Pedido realizado</span>
                                <span>'.$venda_dt->format('Y-m-d').'</span>
                            </div>
                            <div class="order-information-item">
                                <span>Total</span>
                                <span>R$ '.$venda['total'].'</span>
                            </div>
                            <div class="order-information-item">
                                <span>Enviado para</span>
                                <span>'.$_SESSION['usuarioLogado']['nome'].'</span>
                            </div>
                        </div>

                        <div class="order-information">
                            <div class="order-information-item">
                                <span>Código da compra '.$venda['cod_venda'].'</span>
                                <span class="order-information-show">Mostrar mais</span>
                            </div>
                        </div>
                    </div>';

                foreach ($line_itemVenda as $item)

                {
                    echo 
                    '<div class="order-items">
                        <div class="order-items-item">
                            <img class="order-item-img" src="'.$item['imagem'].'">
                            <div class="order-items-information">
                                <span>'.$item['nome'].'</span>
                                <span>Preço R$'.$item['preco'].'</span>
                                <span>Quantidade '.$item['quantidade'].'</span>
                            </div>
                        </div>
                        <div class="order-items-buy">
                            <span>Comprar novamente?</span>
                            <a href="./prodUn.php?cod_prod='.$item['cod_prod'].'"><span>Página na loja</span></a>
                        </div>
                    </div>';
                }

           echo '</div>';
            }
                    
        }
        
        ?>

        <!-- <div class="order">
            <div class="order-header-wrapper  show-more">
                <div class="order-information">
                    <div class="order-information-item">
                        <span>Pedido realizado</span>
                        <span>27 de Set. de 2022</span>
                    </div>
                    <div class="order-information-item">
                        <span>Total</span>
                        <span>R$ 257.90</span>
                    </div>
                    <div class="order-information-item">
                        <span>Enviado para</span>
                        <span>Gilmar S. Filho</span>
                    </div>
                </div>
                <div class="order-information">
                    <div class="order-information-item">
                        <span>Código da compra UX71CH2</span>
                        <span class="order-information-show">Mostrar mais</span>
                    </div>
                </div>
            </div> -->

            <div class="order-items off">
                <div class="order-items-item">
                    <img class="order-item-img" src="./images/home/ex1.jpg">
                    <div class="order-items-information">
                        <span>Terra das gemas: Vol. 1</span>
                        <span>Preço R$56.98</span>
                        <span>Quantidade 2</span>
                    </div>
                </div>
                <div class="order-items-buy">
                    <span>Comprar novamente?</span>
                    <span>Página na loja</span>
                </div>
            </div>

        </div>

           

    </main>

    <?php include './parts/footer.php'; ?>
    
</body>
</html>