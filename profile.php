<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/profileStyle.css">
    <link rel="stylesheet" href="./parts/partsStyle.css">
    <title>echoCup | Perfil</title>
</head>

<body>

    <?php
        include './parts/header.php'; session_Start(); 
        if (!isset($_SESSION['usuarioLogado'])) { ?>
        <meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>
    <?php } else { ?>

    <div class="mae">
        <div class="left">
            <img src="./images/user.svg" alt="user" width="100" height="100">

            <h3> <?php echo $_SESSION['usuarioLogado']['nome'] ?> </h3>
        </div>

        <div class="right">
            <div class="info">
                <h3>PERFIL</h3>
                <div class="info_data">
                    <form action="program.php" method="post">
                        <div class="data">
                            <label for="imail">Email</label>
                            <input type="email" name="mail" placeholder="Email" value="<?php echo $_SESSION['usuarioLogado']['email']?>">
                        </div>

                        <div class="data">
                            <label for="senha">Senha</label>
                            <input type="password" name="passold" placeholder="Senha Antiga">
                            <input type="password" name="passnew" placeholder="Senha Nova">
                        </div>

                        <div class="data">
                            <label for="cell">Telefone</label>
                            <input type="tel" name="tel" placeholder="Telefone" value="<?php echo $_SESSION['usuarioLogado']['telefone']?>">
                        </div>

                        <input type="submit" value="Atualizar">
                    </form>
                </div>
            </div>

        </div>
    </div>

    <?php } ?>
</body>

</html>