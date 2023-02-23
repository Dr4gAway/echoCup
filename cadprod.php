<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="./CSS/cadProdStyle.css">
    <link rel="stylesheet" href="./parts/partsStyle.css">
    <title>echoCup | Cadastro de Produtos</title>
</head>
<body>

    <?php session_start(); if($_SESSION['adm'] != 't') { ?>
        <meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>
    <?php } else { ?>

    <?php include './parts/admHeader.php'; ?>

    <main>
        <section class="prod-wrapper">
            <h1>Cadastro de Produtos</h1>
            
            <form class="prod-inputs" action="includes/newProd-inc.php" method="post">

                <div class="prod-input-wrapper">
                    <div class="prod-input-c">
                        <input type="text" name="nome" id="nome" placeholder="Nome" required>
                    </div>
                    
                    <div class="prod-input-c-wrapper">

                        <div class="prod-input-c">
                            <textarea name="descricao" id="desc" placeholder="Descrição"></textarea>
                        </div>
                        
                        <div class="prod-input-c">
                            <input type="number" step="0.01" name="preco" placeholder="Preço" min="0" required>
                            <input type="number" step="0.01" name="custo" placeholder="Custo" min="0" required>
                            <input type="number" name="estoque" placeholder="Estoque" min="1" required>
                        </div>
                    </div>
                </div>

                <div class="prod-input-wrapper">
                    <div class="prod-input-c ">
                        <input type="number" step="0.01" name="icms" placeholder="ICMS" min="0" max="100" required>
                        <input type="number" step="0.01" name="mar_lucro" placeholder="Margem de Lucro" min="0" max="100" required>
                    </div>
                    <div class="prod-input-c">
                        <input type="text" name="cod_visual" placeholder="Código Visual" required>
                        <input type="text" name="imagem" placeholder="Link da Imagem" required>
                    </div>
                </div>
                
                <input type="submit" value="Cadastrar">
            </form>
        </section>
    </main>

    <?php } ?>
</body>
</html>