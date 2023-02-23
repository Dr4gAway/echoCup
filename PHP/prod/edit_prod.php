<!--Arquivo pra quando clicar no botão "Alterar" na tela de pesquisa-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/formsStyle.css" >
    <title>Alterar Produto</title>
</head>
    <body>

        <?php
            include "../connection.php";

            $cod_prod = $_GET['cod_prod'];

            $sql = "SELECT * FROM produto WHERE cod_prod = '$cod_prod' ";

            $result = pg_query($connect, $sql);
            $line = pg_num_rows($result);

            if ($line >= 1)
            {
                $line = pg_fetch_array($result);

                $nome = $line['nome'];
                $desc = $line['descricao'];
                $preco = $line['preco'];
                $custo = $line['custo'];
                $vsCode = $line['cod_visual'];
                $margemlucro = $line['margem_lucro'];
                $icms = $line['icms'];
                $img =  $line['campo_imagem'];

                echo "
                <section class='formulario'>
                <form action='edit_prod_back.php' method='post'>
                    <h2 class='title'>Alteração do produto: ".$nome."</h2>

                    <div class='formulario-inputs'>
                        <div class='formulario-item'>
                            <input type='number' name='cod_prod' class='formulario-input' placeholder='Código do produto' value='".$cod_prod."' readonly>

                        </div>

                        <div class='formulario-item'>
                            <input type='text' name='nome' class='formulario-input' placeholder='Nome' value='".$nome."' required>

                        </div>

                        <div class='formulario-item'>
                            <input type='text' name='descricao' class='formulario-input' placeholder='Descrição' value='".$desc."' required>

                        </div>

                        <div class='formulario-item'>
                            <input type='number' name='preco' class='formulario-input' placeholder='Preço' min='1' value='".$preco."' required>

                        </div>

                        <div class='formulario-item'>
                            <input type='number' name='custo' class='formulario-input' placeholder='Custo' min='1' value='".$custo."' required>

                        </div>

                        <div class='formulario-item'>
                            <input type='text' name='cod_visual' class='formulario-input' placeholder='Codigo Visual' value='".$vsCode."' required>

                        </div>

                        <div class='formulario-item'>
                            <input type='number' name='margem_lucro' class='formulario-input' placeholder='Margem de Lucro' min='1' value='".$margemlucro."' required>

                        </div>

                        <div class='formulario-item'>
                            <input type='number' name='icms' class='formulario-input' placeholder='ICMS' min='1' value='".$icms."' required>

                        </div>

                        <div class='formulario-item'>
                            <input type='text' name='campo_imagem' class='formulario-input' placeholder='Link de Imagem' value='".$img."' required>

                        </div>
                    </div>
                    
                    <div class='formulario-botoes'>
                        <input type='submit' value='Alterar' class='formulario-enviar submit'>
                        <a class='formulario-enviar lp' href='search_prod.php'>Voltar</a>

                    </div>
                </form>
                ";

                echo "</section>";
            }

            else
            {
                echo '<script language="javascript">';
                echo "alert('Nenhum produto foi encontrado no banco de dados...')";
                echo '</script>';	
            }
        ?>

    </body>
</html>