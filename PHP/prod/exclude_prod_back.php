<!--Arquivo pra quando clicar no botão "Excluir" na tela de pesquisa-->

<?php
    include "../connection.php"; 

    $cod_prod = $_POST['cod_prod'];

    $sql="UPDATE produto
        SET excluido = true, data_exclusao = CURRENT_TIMESTAMP 
        WHERE cod_prod = $cod_prod;";

    $result=pg_query($connect,$sql);
    $line=pg_affected_rows($result);

    if ($line > 0 )
        echo "<script type='text/javascript'>alert('Exclusão OK !!!')</script>";
    else
        echo "<script type='text/javascript'>alert('Erro na exclusÃ£o !!!')</script>";

    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=search_prod.php'>";
?>
