<?php
    include "connection.php";

    function getQntdProdCart($connect, $cod_prod, $cod_user) {
        $sql = "SELECT * FROM carrinho WHERE cod_prod = $cod_prod AND cod_user = $cod_user";
    
        $result = pg_query($connect, $sql);
        $qntd = pg_num_rows($result);

        if ($qntd == 0 )
            return 0;
        
        $prod_cart = pg_fetch_array($result);
            return intval($prod_cart['quantidade']);
    }

    function getQntdProd($connect, $cod_prod) {
        $sql = "SELECT * FROM produto WHERE cod_prod = $cod_prod";
        $result = pg_query($connect, $sql);
        $qntd = pg_num_rows($result);

        if ($qntd == 0)
            return 0;

        $prod = pg_fetch_array($result);
            return intval($prod['estoque']);
    }

    function addCart($connect, $cod_prod, $cod_user, $qnt) {
        $qtndProdCart = getQntdProdCart($connect, $cod_prod, $cod_user);
        $qtndProd = getQntdProd($connect, $cod_prod);
        $qtndFinal = $qtndProdCart + $qnt;

        if ($qtndProdCart == 0)
            $sql = "INSERT INTO carrinho(cod_prod, cod_user, quantidade) VALUES ($cod_prod, $cod_user, $qnt)";
        
        else if ( $qtndFinal > $qtndProd)
            $sql = "UPDATE carrinho SET quantidade = $qtndProd WHERE cod_prod = $cod_prod AND cod_user = $cod_user";
        
        else 
            $sql= "UPDATE carrinho SET quantidade = ".($qtndProdCart + $qnt)."WHERE cod_prod = $cod_prod AND cod_user = $cod_user";

        pg_query($connect,$sql);
    }

    function subtractCart($connect, $cod_prod, $cod_user, $qnt) {
        $qtndProd = getQntdProdCart($connect, $cod_prod, $cod_user);

        if ($qtndProd <= 1)
            $sql = "DELETE FROM carrinho WHERE cod_prod = $cod_prod and cod_user = $cod_user";
        else 
            $sql= "UPDATE carrinho SET quantidade = ".($qtndProd - $qnt)."WHERE cod_prod = $cod_prod AND cod_user = $cod_user";

        pg_query($connect,$sql);
    }

    function removeCart($connect, $cod_prod, $cod_user) {
        $sql = "DELETE FROM carrinho WHERE cod_prod = $cod_prod and cod_user = $cod_user";
        pg_query($connect,$sql);
    }

    //Código de verdade

    if (!empty($acao))
    {
        if ($acao == 'add') {
            addCart($connect, $cod_prod, $cod_user, 1);
        } else if ($acao == 'sub') {
            subtractCart($connect, $cod_prod, $cod_user, 1);
        }
        else if($acao == 'del'){
            removeCart($connect, $cod_prod, $cod_user);
        }
        else if($acao == 'up'){
            updateCart($connect, $cod_prod, $cod_user);
        }
    }

    $sql = "SELECT c.*, p.nome, p.campo_imagem, p.preco, c.quantidade * p.preco AS subtotal, p.cod_prod
                FROM carrinho c
                INNER JOIN produto p
                ON c.cod_prod = p.cod_prod
                WHERE c.cod_user = $cod_user
                ORDER BY p.nome";

    $result = pg_query($connect, $sql);
    $qntd = pg_num_rows($result);

    $line_result = null;

    if ($qntd > 0)
    {
        $line_result = pg_fetch_all($result);
    }
    pg_close($connect);
?>