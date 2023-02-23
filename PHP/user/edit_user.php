<!--Arquivo pra quando clicar em "Alterar" na tela de pesquisa-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/formsStyle.css" >
    <title>Alterar usuário</title>
</head>
    <body>

        <?php
            include "../connection.php";

            $cod_user = $_GET['cod_user'];

            $sql = "SELECT * FROM usuario WHERE cod_user = '$cod_user' ";

            $result = pg_query($connect, $sql);
            $line = pg_num_rows($result);

            if ($line >= 1)
            {
                $line = pg_fetch_array($result);

                $nome = $line['nome'];
                $email = $line['email'];
                $senha = $line['senha'];
                $telefone = $line['telefone'];

                echo "
                <section class='formulario'>
                <form action='edit_user_back.php' method='post'>
                    <h2 class='title'>Alteração do Usuário: ".$nome."</h2>

                    <div class='formulario-inputs'>
                        <div class='formulario-item'>
                            <input type='number' name='cod_user' class='formulario-input' placeholder='Código do Usuário' value='".$cod_user."' readonly>
                
                        </div>

                        <div class='formulario-item'>
                            <input type='text' name='nome' class='formulario-input' placeholder='Nome' value='".$nome."' required>
                
                        </div>
                
                        <div class='formulario-item'>
                            <input type='email' name='mail' class='formulario-input' placeholder='Email' value='".$email."' required>
                
                        </div>
                
                        <div class='formulario-item'>
                            <input type='password' name='pass' class='formulario-input' placeholder='Senha' value='".$senha."' required>
                
                        </div>

                        <div class='formulario-item'>
                            <input type='tel' name='fone' class='formulario-input' placeholder='Telefone' value='".$telefone."' required>

                        </div>

                    </div>
                    
                    <div class='formulario-botoes'>
                        <input type='submit' value='Alterar' class='formulario-enviar submit'>
                        <a class='formulario-enviar lp' href='search_user.php'>Voltar</a>

                    </div>

                </form>
                ";

                echo "</section>";
            }

            else
            {
                echo '<script language="javascript">';
                echo "alert('Esse usuário não foi encontrado.')";
                echo '</script>';	
            }
        ?>

    </body>
</html>