<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/admUserStyle.css">
    <link rel="stylesheet" href="./parts/partsStyle.css">
    <title>echoCup | Usuários</title>
</head>
<body>
    <?php session_start(); if($_SESSION['adm'] != 't') { ?>
        <meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>
    <?php } else { ?>

    <header>
        <?php include './parts/admHeader.php'; include './includes/connection.php' ?>
    </header>
    <main>
        <div class="user-table">
            <div class="table-row header">
                <span>Nome</span>
                <span>Email</span>
                <span>Telefone</span>
                <span>Opções</span>
            </div>

        <?php 

            $sql = "SELECT * FROM usuario ORDER BY nome;";
            $result = pg_query($connect, $sql);
            $usuarios = pg_fetch_all($result);

            foreach($usuarios as $usuario) { ?>
                
            <div class="table-row">
                <span><?php echo $usuario['nome']?></span>
                <span><?php echo $usuario['email']?></span>
                <span><?php echo $usuario['telefone']?></span>
                <div class="option">
                    <span class="btn-option">Alterar</span>
                    <span class="btn-option">Excluir</span>
                </div>
            </div>
            
            <?php } ?>

        </div>
    </main>

    <?php } ?>
</body>
</html>