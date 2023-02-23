<?php
    $names=['Carlos', 'Gilmar', 'Guilherme Diorio', 'Maria Luiza','Miguel'];
    echo '
    <footer class="container">
        <div class="footer-content">
            <img id="logo" src="./images/Logo-5.svg">
            <p>© 2022 EchoCup</p>
            <p>Todos os direitos reservados.</p>
        </div>
        <div class="footer-names">
            <span>Desenvolvedores</span>';
            for($i=0;$i!=5;$i++)
                echo '<a href="http://projetoscti.com.br/projetoscti23/echoCup/devs.php">'.$names[$i].'</a>';
        echo'
        </div>
    </footer>';
?>