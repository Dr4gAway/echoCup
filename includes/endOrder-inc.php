<?php
    include "connection.php"; 

    $compraFinalizada = FALSE;

    function validarProdutos($connect, $resultado_lista)
    {
        foreach($resultado_lista as $linha)
        {
            $sql = "SELECT * FROM produto WHERE cod_prod = ".$linha['cod_prod'].";";
            
            $result = pg_query($connect, $sql);
            $linhaConf = pg_fetch_array($result);

            if ($linha['quantidade'] > $linhaConf['estoque']) {
                $sql=" DELETE FROM carrinho
                       WHERE cod_user = ".$linha['cod_user']." AND cod_prod = ".$linha['cod_prod']."";
                $result = pg_query($connect, $sql);
                return false;
            }
        }

        return true;
    }

    function atualizarEstoque($connect, $cod_prod, $qtdeVendida)
    {
        $sql = "SELECT * FROM produto WHERE cod_prod = $cod_prod";
        $result = pg_query($connect, $sql);
        $qtdeProd = pg_fetch_array($result);

        $newQtde = ($qtdeProd['estoque'] - $qtdeVendida);

        $sql = "UPDATE produto SET estoque = $newQtde WHERE cod_prod = $cod_prod";
        $result = pg_query($connect, $sql);
    }

    /*-----Código de Verdade-----*/

    session_start();
    $cod_user = $_SESSION['usuarioLogado']['cod_user'];
    $resultado_lista = $_SESSION['produto'];
    $precoTotal = $_SESSION['precototal'];

    //Código tá sempre dando falso <--

    if (!validarProdutos($connect, $resultado_lista))
    {
        echo '
            <script>
                alert("Algo está errado! validarProdutos");
            </script>';
            return;
    }

    else
    {

    $sql = "INSERT INTO venda (cod_user, total) VALUES ( $cod_user, $precoTotal);";
    $result = pg_query($connect, $sql);
    $line = pg_affected_rows($result);

    if ($line == 0)
        echo '
        <script>
            alert("Algo está errado!");
        </script>';

    foreach($resultado_lista as $lineOrder)
    {
        $preco = $lineOrder['preco'];
        $qtde = $lineOrder['quantidade'];
        $cod_prod = $lineOrder['cod_prod'];

        $sql = "INSERT INTO itemVenda (cod_venda, cod_prod, quantidade, preco) VALUES (CURRVAL('venda_cod_venda_seq'),".$cod_prod.",".$qtde.",".$preco.");";
        $result = pg_query($connect, $sql);

        atualizarEstoque($connect, $cod_prod, $qtde);
    } 

    // Limpar carrinho
    $sql=" DELETE FROM carrinho
           WHERE cod_user = $cod_user";

    pg_query($connect,$sql);

    }

    //Envia e-mail após finalizar compra
    $sql = "SELECT * FROM usuario WHERE cod_user = $cod_user";
    $result = pg_fetch_array(pg_query($connect, $sql)); 
    

    include 'mailer-inc.php';

    sendMail($_SESSION['usuarioLogado']['email']);

    // Fecha a conexão com o PostgreSQL
    pg_close($connect);

?>