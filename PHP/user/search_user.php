<!--Arquivo pra quando abrir a tela de pesquisa-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/tableStyle.css" >
    <title>Lista de usuários</title>
</head>
<body>

    <?php
        include "../connection.php";

        //Barra de pesquisa

        $search = $_POST['search'];

        echo "
        <section class='table'>

            <form action='custom_search_user.php' method='post'>
                <div class='search-container'>
                    <input type='text' placeholder='Pesquise um usuário' name='search' required value='".$search."' class='search-input'>
                    <label>
                        <input type='submit'>
                        <svg class='search-svg' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z'/></svg>
                    </label>
                </div>
            </form>

        </section>";

        $sql = "SELECT * FROM usuario WHERE excluido = false";

        $result = pg_query($connect, $sql);
        $line = pg_num_rows($result);

        if ($line >= 1)
        {
            $line = pg_fetch_all($result);

            echo "
            <section class='table'>
                <h2>Usuários</h2>
                <div class='line header'>
                    <div class='data'>
                        <p>Usuário</p>
                    </div>

                    <div class='data'>
                        <p>Email</p>
                    </div>
            
                    <div class='data'>
                        <p>Telefone</p>
                    </div>

                    <div class='data'>
                        <p>Alterar</p>
                    </div>
                </div>
            ";

            foreach($line as $usuario){
                echo "
                <div class='line'>
                    <div class='data'>
                        <p>".$usuario['nome']."</p>
                    </div>

                    <div class='data'>
                        <p>".$usuario['email']."</p>
                    </div>
        
                    <div class='data price'>
                        <p>".$usuario['telefone']."</p>
                    </div>

                    <div class='data menu'>
                    <a href='edit_user.php?cod_user=".$usuario['cod_user']."' class='button'>Alterar</a>
                    <a href='exclude_user.php?cod_user=".$usuario['cod_user']."' class='button'>Excluir</a>
                </div>
                </div>
                ";
            }

            echo "
                <div class='buttons'>
                    <a href='../../forms_user.html' class='button end'>Cadastrar novo usuário</a>
                    <a href='../../index.html' class='button end'>Home</a>
                </div>
                </section>  
            ";

        }

        else
        {
            echo "
            <section class='table'>
                <div class='warning'>
                    <h2>Nenhum usuário foi encontrado<h2>
                    <a href='../../forms_user.html' class='button end'>Cadastrar novo usuário</a>
                    <a class='button back' href='../../index.html'>Voltar</a>
                <div>
            </section>";
        }
    ?>

    
</body>
</html>