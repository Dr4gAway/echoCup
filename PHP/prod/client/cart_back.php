<?php

    include "../../connection.php";

    function getQntdProdCart($connect, $cod_prod, $cod_user) {
        $sql = "SELECT * FROM carrinho WHERE cod_prod = $cod_prod AND cod_user = $cod_user";
    
        $result=pg_query($connect,$sql);
        $qntd=pg_num_rows($result);

        if ($qntd == 0 )
            return 0;
        
        $prod_cart = pg_fetch_array($result);
            return intval($prod_cart['qntd']);
    }

    function addCart($connect, $cod_prod, $cod_user, $qnt) {
        $qtndProd = getQntdProdCart($connect, $cod_prod, $cod_user);

        if ($qtndProd == 0)
            $sql = "INSERT INTO carrinho(cod_prod, cod_user, qntd) VALUES ($cod_prod, $cod_user, 1)";
        else 
            $sql= "UPDATE carrinho SET qntd = ".($qtndProd + $qnt)."WHERE cod_prod = $cod_prod AND cod_user = $cod_user";

        pg_query($connect,$sql);
    }

    function subtractCart($connect, $cod_prod, $cod_user, $qnt) {
        $qtndProd = getQntdProdCart($connect, $cod_prod, $cod_user);

        if ($qtndProd == 1)
            $sql = "DELETE FROM carrinho WHERE cod_prod = $cod_prod and cod_user = $cod_user";
        else 
            $sql= "UPDATE carrinho SET qntd = ".($qtndProd - $qnt)."WHERE cod_prod = $cod_prod AND cod_user = $cod_user";

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

    $sql = "SELECT c.*, p.nome, p.preco, c.qntd * p.preco AS subtotal, p.descricao
                FROM carrinho c
                INNER JOIN produto p
                ON c.cod_prod = p.cod_prod
                WHERE c.cod_user = $cod_user";

    $result = pg_query($connect, $sql);
    $qntd = pg_num_rows($result);

    $line_result = null;

    if ($qntd > 0)
    {
        $line_result = pg_fetch_all($result);
    }

    pg_close($connect);
?>