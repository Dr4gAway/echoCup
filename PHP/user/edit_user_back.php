<!--Arquivo pra quando clicar em "Alterar" na tela de pesquisa-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterando usuário</title>
</head>
    <body>
        <?php
            include "../connection.php";

            $cod_user = $_POST['cod_user'];
            $nome = $_POST['nome'];
            $email = $_POST['mail'];
            $senha = $_POST['pass'];
            $telefone = $_POST['fone'];
            
            $sql = "UPDATE usuario
                    SET nome = '$nome',
                        email = '$email',
                        senha = '$senha',
                        telefone = $telefone
                    WHERE cod_user = $cod_user;";

            $result = pg_query($connect, $sql);
            $line = pg_affected_rows($result);

            if ($line > 0)
            {
                echo '<script language="javascript">';
                echo "alert('Usuário alterado com sucesso.')";
                echo '</script>';

                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=search_user.php'>";
            }

            else
            {
                echo '<script language="javascript">';
                echo "alert('Erro ao alterar o Usuário')";
                echo '</script>';

                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=search_user.php'>";
            } 
        ?>

    </body>
</html>