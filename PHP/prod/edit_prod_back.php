<!--Arquivo pra quando clicar no botão "Alterar" na tela de pesquisa-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterando produto</title>
</head>
    <body>
        <?php
            include "../connection.php";

            $cod_prod = $_POST['cod_prod'];
            $nome = $_POST['nome'];
            $desc = $_POST['descricao'];
            $preco = $_POST['preco'];
            $custo = $_POST['custo'];
            $vsCode = $_POST['cod_visual'];
            $margemlucro = $_POST['margem_lucro'];
            $icms = $_POST['icms'];
            $img =  $_POST['campo_imagem'];
            
            $sql = "UPDATE produto
                    SET nome = '$nome',
                        descricao = '$desc',
                        preco = $preco,
                        custo = $custo,
                        cod_visual = '$vsCode',
                        margem_lucro = $margemlucro,
                        icms = $icms,
                        campo_imagem = '$img'
                    WHERE cod_prod = $cod_prod;";

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
                echo "alert('Erro na gravação do produto.')";
                echo '</script>';

                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=search_prod.php'>";
            } 
            
        ?>

    </body>
</html>