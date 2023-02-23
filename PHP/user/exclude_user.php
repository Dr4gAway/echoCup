<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/formsStyle.css" >
    <title>Exclusão de usuário</title>
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
            <form action='exclude_user_back.php' method='post'>
                <h2 class='title'>Deseja excluir: ".$nome."?</h2>

                <div class='formulario-inputs'>

                    <div class='formulario-item'>
                        <input type='number' name='cod_user' class='formulario-input' placeholder='Código do Usuário' value='".$cod_user."' readonly>

                    </div>

                    <div class='formulario-item'>
                        <input type='text' name='nome' class='formulario-input' placeholder='Nome' value='".$nome."' readonly>
            
                    </div>
            
                    <div class='formulario-item'>
                        <input type='email' name='mail' class='formulario-input' placeholder='Email' value='".$email."' readonly>
            
                    </div>
            
                    <div class='formulario-item'>
                        <input type='password' name='pass' class='formulario-input' placeholder='Senha' value='".$senha."' readonly>
            
                    </div>

                    <div class='formulario-item'>
                        <input type='tel' name='fone' class='formulario-input' placeholder='Telefone' value='".$telefone."' readonly>

                    </div>

                </div>
                
                <div class='formulario-botoes'>
                    <input type='submit' value='Excluir' class='formulario-enviar submit'>
                    <a class='formulario-enviar lp' href='search_user.php'>Voltar</a>

                </div>

            </form>
            ";

            echo "</section>";

        }

        else
        {
            echo '<script language="javascript">';
            echo "alert('Nenhum Usuário foi encontrando no banco de Dados.')";
            echo '</script>';

            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=search_user.php'>";
        }
    ?>

    
</body>
</html>