<?php

    include 'connection.php';

    $nome = $_POST['nome'];
    $desc = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $custo = $_POST['custo'];
    $visual = $_POST['cod_visual'];
    $lucro = $_POST['mar_lucro'];
    $icms = $_POST['icms'];
    $imagem = $_POST['imagem'];

    $sql = "INSERT INTO produto(nome, descricao, preco, estoque, custo, cod_visual, margem_lucro, icms, campo_imagem)
    VALUES('$nome', '$desc', $preco, $estoque, $custo, '$visual', $lucro, $icms, '$imagem')";
    $result = pg_query($connect, $sql);
    $line = pg_affected_rows($result);

    if ($line > 0)
        {
            echo '<script language="javascript">';
            echo "alert('Produto salvo com sucesso.')";
            echo '</script>';

            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../catalog.php'>";
        }

        else
        {
            echo '<script language="javascript">';
            echo "alert('Erro ao cadastrar Produto')";
            echo '</script>';

            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../cadprod.php'>";
        }


