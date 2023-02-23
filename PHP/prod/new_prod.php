<!--Arquivo pra quando clicar "Adicionar novo produto" na tela de pesquisa-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produto</title>
</head>
    <body>
        <?php
            include "../connection.php";

            $nome = $_POST['nome'];
            $desc = $_POST['descricao'];
            $preco = $_POST['preco'];
            $custo = $_POST['custo'];
            $vsCode = $_POST['cod_visual'];
            $margemluco = $_POST['margem_lucro'];
            $icms = $_POST['icms'];
            $img =  $_POST['campo_imagem'];

            $sql = "INSERT INTO produto(nome, descricao, preco, custo, cod_visual, margem_lucro, icms, campo_imagem)
                    VALUES ('$nome', '$desc', '$preco', '$custo', '$vsCode', '$margemluco', $icms, '$img');";

            $result = pg_query($connect, $sql);
            $line = pg_affected_rows($result);

            if ($line > 0)
            {
                echo '<script language="javascript">';
                echo "alert('Produto salvo com sucesso.')";
                echo '</script>';

                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=search_prod.php'>";
            }

            else
            {
                echo '<script language="javascript">';
                echo "alert('Erro ao cadastrar Produto')";
                echo '</script>';

                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=search_prod.php'>";
            }

        ?>
    </body>
</html>