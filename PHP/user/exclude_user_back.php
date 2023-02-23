<!--Arquivo pra quando for deletar um usuario-->

<?php
    include "../connection.php";

    $cod_user = $_POST['cod_user'];

    $sql = "UPDATE usuario
            SET excluido = true, data_exclusao = CURRENT_TIMESTAMP
            WHERE cod_user = $cod_user;";

    $result=pg_query($connect,$sql);
    $line=pg_affected_rows($result);

    if ($line > 0 )
        echo "<script type='text/javascript'>alert('Usuário excluido com sucesso.')</script>";

    else
        echo "<script type='text/javascript'>alert('Erro ao excluir Usuário.')</script>";

    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=search_user.php'>";
?>