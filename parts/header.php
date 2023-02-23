<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,500,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,500,0,0" />
    <link rel="icon" type="" href="./images/cup.png" />
    <title>Document</title>
</head>
<body>
<?php
    session_start();

    if (!isset($_SESSION['usuarioLogado'])){

        echo '
            <header>
            <nav>
                <a href="./index.php"><img id="logo" src="./images/Logo-4.svg" alt=""></a>
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./catalog.php">Produtos</a></li>
                    <li><a href="./devs.php">Devs</a></li>
                    <li><a href="./cart.php"><span class="material-symbols-outlined">
                    shopping_cart
                    </span></a></li>
                    <li><a href="./login/login.php"><span class="material-symbols-outlined">
                    account_circle
                    </span></a></li>
                </ul>
            </nav>
                </header>
                <div class="divider"></div>';
    
    } else { ?> 

        <header>
            <nav>
                <a href="./index.php"><img id="logo" src="./images/Logo-4.svg" alt=""></a>
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./catalog.php">Produtos</a></li>
                    <li><a href="./devs.php">Devs</a></li>
                    

                    <?php if ($_SESSION['adm'] == 't') { ?>
                        
                        <li><a href="./adm.php"><span class="material-symbols-outlined">
                        settings
                        </span></a></li>

                    <?php } ?>
                    
                    <li><a href="./cart.php"><span class="material-symbols-outlined">
                    shopping_cart
                    </span></a></li>
                    <li class="menu-wrapper">
                        <span class="material-symbols-outlined"> account_circle </span>
                        <?php echo $_SESSION['usuarioLogado']['nome'] ?>

                        <div id="userMenu" class="menu-nav">
                            <ul>
                                <li>
                                    <a href="orderPrev.php">
                                    <span class="material-symbols-outlined">article</span>
                                    <span>Histórico</span></a>
                                </li>
                                <li>
                                    <a href="profile.php">
                                    <span class="material-symbols-outlined"> account_circle </span>    
                                    <span>Perfil</span></a>
                                </li>
                                <li>
                                <a href="./includes/logOut-inc.php">
                                    <span class="material-symbols-outlined"> logout </span>
                                    <span>Log-out</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="divider"></div> 

    <?php } ?>

    <script>
        const button = document.querySelector(".menu-wrapper")
        const menu = document.getElementById("userMenu");

        /* function isVisible(el) {
            var style = window.getComputedStyle(el);
            return (style.visibility === 'visible')
        }
        
        function mostraMenu(){
            menu.style.visibility = "visible"
            
        }

        document.addEventListener("click", (event) => {
            if (event.target.classlist.contains(".menu-wrapper"))

            if (isVisible(menu))
               alert("Está visivel")
        }) */

        button.addEventListener("mouseover", () => {
            menu.style.display = "block"
        }) 

        button.addEventListener("mouseout", () => {
            menu.style.display = "none"
        })

    </script>

</body>
</html>