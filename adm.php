<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="parts/partsStyle.css">
    <link rel="stylesheet" href="CSS/admStyle.css">
    <title>Administração</title>
</head>
<body>

    <?php session_start(); if($_SESSION['adm'] != 't') { ?>
        <meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>
    <?php } else {?>

    <?php include './parts/admHeader.php'; ?>

    <main> 

        <div class="main-wrapper">
            <h1>Seja bem-vindo, <?php echo $_SESSION['usuarioLogado']['nome'] ?> </h1>
    
            <div class="options-wrapper">
                <a href="./stats/chart.php" class="grid-item bigger">
                    <span>Produtos Mais vendidos</span>
                    <img src="images/sample-1.jpg" alt="Imagem de copo">
                </a>
                <a href="#" class="grid-item">
                    <span>Relatório de Venda [Fazer]</span>
                    <img src="images/sample-1.jpg" alt="Imagem de copo">
                </a>
                <a href="cadprod.php" class="grid-item">
                    <span>Cadastro de Produtos</span>
                    <img src="images/sample-1.jpg" alt="Imagem de copo">
                </a>
                <a href="#" class="grid-item"> 
                    <span>Lista de Produtos [Fazer]</span>
                    <img src="images/sample-1.jpg" alt="Imagem de copo">
                </a>
                <a href="admUser.php" class="grid-item">
                    <span>Lista de Usuários</span>
                    <img src="images/sample-1.jpg" alt="Imagem de copo">
                </a>
            </div>

        </div>

    </main>

    <?php } ?>
</body>
</html>

