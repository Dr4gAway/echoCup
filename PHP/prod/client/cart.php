<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../CSS/tableStyle.css" >
    <title>Carrinho</title>
</head>
<body>
    <?php
        include "../../connection.php";

        //Tabela Produtos do Carrinho

        $acao = $_GET['acao'];
        $cod_prod = $_GET['cod_prod'];
        $cod_user = 1;
        
        $sql = "SELECT * FROM carrinho WHERE cod_user = 1";

        $result = pg_query($connect, $sql);
        $line = pg_num_rows($result);

        include "cart_back.php";

        if ($line >= 1)
        {
            $line = pg_fetch_all($result);

            echo "
            <section class='table'>
                <h2>Produtos</h2>
                <div class='line header'>
                    <div class='data'>
                        <p>Produto</p>
                    </div>
                    
                    <div class='data'>
                        <p>Quantidade</p>
                    </div>

                    <div class='data'>
                        <p>Preço</p>
                    </div>

                    <div class='data'>
                        <p>Subtotal</p>
                    </div>

                    <div class='data'>
                        <p>Alterar</p>
                    </div>
                </div>
            ";
            
            foreach($line_result as $produto){
               
                echo "
                <div class='line'>
                    <div class='data'>
                        <p>".$produto['nome']."</p>
                    </div>

                    <div class='data'>
                        <a href='cart.php?acao=sub&cod_prod=".$produto['cod_prod']."' class='button-add'>-</a>
                        <p>".$produto['qntd']."</p>
                        <a href='cart.php?acao=add&cod_prod=".$produto['cod_prod']."' class='button-add'>+</a>
                    </div>
        
                    <div class='data price'>
                        <p>".$produto['preco']."</p>
                    </div>

                    <div class='data'>
                        <p>".$produto['subtotal']."</p>
                    </div>

                    <div class='data menu'>
                        <a href='cart.php?acao=del&cod_prod=".$produto['cod_prod']."' class='button'>Excluir</a>
                    </div>
                </div>
                ";
            }

            echo "
                <div class='buttons'>
                    <a href='../../../' class='button end'>Home</a>
                </div>
            </section>  
            ";

        }

        else
        {
            echo "
            <section class='table'>
                <div class='warning'>
                    <h2>Nenhum produto foi encontrado<h2>
                    <a href='../../../PHP/prod/client/view_prod.php' class='button end'>Comprar</a>
                    <a class='button back' href='../../../'>Voltar</a>
                <div>
            </section>";
        }
    ?>
<body>
</html>    