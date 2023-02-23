<?php
    include "connection.php"; 

    /* seleciona todos os itens do carrinho do usuário */
    $sql="SELECT c.*,
                 p.preco, p.nome,
                 c.quantidade * p.preco as subtotal,
                 p.estoque,
                 p.campo_imagem
            FROM carrinho c
           inner join produto p
              on c.cod_prod = p.cod_prod
           WHERE c.cod_user = $cod_user
           ORDER BY p.nome;";

    $result= pg_query($connect, $sql);
    $qtde=pg_num_rows($result);

    $line_result = null;

    if ($qtde > 0)
    {
        $line_result = pg_fetch_all($result);
    }

    // Fecha a conexão com o PostgreSQL
    pg_close($connect);

    session_start();
    $_SESSION['produto'] = $line_result;
?>