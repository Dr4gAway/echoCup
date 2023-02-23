<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../CSS/loginStyle.css">
    <title>echoCup</title>
</head>

<body>
    <div class="container">
        <div class="form">
            <form action="./signinBack.php" method="post">
                <h2>Cadastro</h2>
                <label for="name">
                    <span class="material-symbols-outlined">badge</span>
                    <input type="text" placeholder="nome" name="name" id="" required>
                </label>
                <label for="mail">
                    <span class="material-symbols-outlined">mail</span>
                    <input type="email" placeholder="email" name="mail" id="mailLogin" required>
                </label>
                <div class="password-container">
                    <label for="password">
                        <span class="material-symbols-outlined">key</span>
                        <input type="password" placeholder="senha" name="password" id="password" required>
                    </label>
                    <div class="sec-level"></div>
                </div>
                <label for="phone">
                    
                    <span class="material-symbols-outlined">call</span>
                    <input type="text" placeholder="telefone" name="tel" id="" required>
                </label>
                <input type="submit" class="button" value="Enviar">

            </form>
            <a id="back" href="../index.php" class="buttonBack"><span class="material-symbols-outlined">keyboard_backspace</span></a>
        </div>

        <div class="haveAccount">
            <div>
                <h2>Possui conta?</h2>
                <p>Faça login!</p>
            </div>
            <a href="./login.php" class="button">Entrar</a>
        </div>
    </div>

    <script>
        const lockContainer = document.getElementsByClassName("sec-level")[0];

        document.forms[0].onsubmit = function(e){
        return val(e);
        }

        password.oninput = function(e){
        val(e);

        if (lockContainer.firstChild)
            document.getElementsByClassName("password-container")[0].style.marginBottom = '0'
        else
            document.getElementsByClassName("password-container")[0].style.marginBottom = '2em'
        }

        password.onfocus = () => {
            lockContainer.style.display = 'block'
            
            if (lockContainer.firstChild)
                document.getElementsByClassName("password-container")[0].style.marginBottom = '0'
            else
                document.getElementsByClassName("password-container")[0].style.marginBottom = '2em'
        }

        password.addEventListener("focusout", () => {
            lockContainer.style.display = 'none';

            document.getElementsByClassName("password-container")[0].style.marginBottom = '2em'
        }) 

        function increaseLocks(times) {
            while (lockContainer.firstChild) {
                lockContainer.removeChild(lockContainer.firstChild)
            }

            for (let i = 0; i < times; i++) {
                var lock = document.createElement("span");

                lock.innerHTML = 'lock';
                lockContainer.appendChild(lock)
                lock.classList.add("material-symbols-outlined");
            }
            
        }

        function val(e){

            var qtde = 0,
                v = password.value,
                e = e.type == "submit";

            if(v.match(/.{6,}/))
                    qtde++;

            if(v.match(/[A-Z]{1,}/))
                    qtde++;

            if(v.match(/[0-9]{1,}/))
                    qtde++;

            if (qtde == 0) {
                lockContainer.innerHTML = '';
            }

            if (qtde == 1) {
                increaseLocks(1)
            }

            if (qtde == 2) {
                increaseLocks(2)
            }

            if (qtde == 3) {
                increaseLocks(3)
            }
        }

    </script>

</body>

</html>