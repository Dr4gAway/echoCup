<?php

    include 'connection.php';
    session_start();

    $usuario = $_POST['mail'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM usuario WHERE email = '$usuario' AND senha = '$pass'";
    $result = pg_query($connect, $sql);

    $linha = pg_num_rows($result);

    if ($linha == 1) 
    {
        $userData = pg_fetch_array($result);
        $_SESSION['usuarioLogado'] = $userData;
        $_SESSION['adm'] = $userData['adm'];

        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php'>";
    }

    else {
        echo "<script>alert('Senha ou Usuários inválidos')</script>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../login/login.php'>";
    }

?>