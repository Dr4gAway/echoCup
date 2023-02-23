<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuario</title>
</head>
    <body>
        <?php
            include "../connection.php";

            $nome = $_POST['nome'];
            $email = $_POST['mail'];
            $senha = $_POST['pass'];
            $telefone = $_POST['fone'];

            $sql = "INSERT INTO usuario(nome, email, senha, telefone)
                     VALUES ('$nome', '$email', '$senha', $telefone);";

            $result = pg_query($connect, $sql);
            $line = pg_affected_rows($result);

            if ($line > 0)
            {
                echo '<script language="javascript">';
                echo "alert('Usuário salvo com sucesso!')";
                echo '</script>';

                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=search_user.php'>";
            }

            else
            {
                echo '<script language="javascript">';
                echo "alert('Erro ao cadastrar produto.')";
                echo '</script>';

                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=search_user.php'>";
            }

        ?>
    </body>
</html>