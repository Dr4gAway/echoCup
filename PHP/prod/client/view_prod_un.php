<!--Arquivo pra quandoir pra tela de pesquisa-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../CSS/clientStyle.css" >
    <title>Lista de produtos</title>
</head>
<body>

    <?php
        include "../../connection.php";


        //Tabela Produtos

        $cod_prod = $_GET['cod_prod'];

        $sql = "SELECT * FROM produto WHERE excluido = false AND cod_prod = $cod_prod";

        $result = pg_query($connect, $sql);
        $produto = pg_num_rows($result);

        if ($produto = 1)
        {
            $produto = pg_fetch_array($result);

            echo "
            <section class='table'>
                <h2>".$produto['nome']."</h2>
            ";

            echo "
                <div class='sqr-table'>

                    <div class='details-info'>
                        <img class='details-img' src='../../../images/produto.jpg'>
                    </div>

                    <div class='details-info'>
                        
                            <p>".$produto['nome']."</p>

                            <p>".$produto['detalhes']."</p>
                        
                            <p>".$produto['preco']."</p>
                        
                    </div>
                </div>
                ";
        }

        else
        {
            echo "
            <section class='table'>
                <div class='warning'>
                    <h2>Nenhum produto foi encontrado<h2>
                    <a href='../../forms_prod.html' class='button end'>Cadastrar novo produto</a>
                    <a class='button back' href='../../index.html'>Voltar</a>
                <div>
            </section>";
        }

        echo "
            </section>
                <section class='table'>
                    <div class='buttons'>
                        <a href='./cart.php?acao=add&cod_prod=$cod_prod' class='button end'>Adicionar ao carrinho</a>
                        <a href='../../../index.html' class='button end'>Voltar</a>
                    </div>
                </section>  
            
            ";
    ?>

    
</body>
</html>