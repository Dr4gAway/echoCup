<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servidor conectado</title>
</head>
    <body>
        <?php
            $connect = pg_connect("host=none
                                port=5432
                                dbname=none
                                user=none
                                password=none");

            if(!$connect)
            { echo "Deu errado, não conectou com o banco!"; exit; }
        ?>
    </body>
</html>