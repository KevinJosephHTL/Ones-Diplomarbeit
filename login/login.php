<?php
    require '../datenbank/config.php';
    require '../login/authen_login.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="login.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <nav class="col-1">
            <div class="logo">
                <a href="../index.php">
                    <img src="../Bilder/Ones_Logo_noback.png" id="ones">
                </a>
            </div>

            <ul>
                <li>
                    <a class="a1" href="login.php">Login</a>
                </li>
                <li>
                    <a href="../registrierung/registrierung.php">Registrierung</a>
                </li>
            </ul>
        </nav>

    <?php
        //Durch das Drücken des Loginbuttons
        //wird der Button wird 'true'
        if(isset($_POST['login_button'])){
            echo '';
        }
    ?>

        <div class="col-2">
            <ues>Melde dich jetzt an</ues><br>
            <uns>Username und Passwort</uns><br>
            <uns>und los geht's</uns>

            <div class="name">
                <form id="login-form" action="login.php" method="POST">
                    <table border="0.5" >
                <input id="ip1" type="text" name="log_username" placeholder="name" value="<?php

                //Username wird in die SESSION-Variable gespeichert
                if(isset($_SESSION['log_username'])){
                    echo $_SESSION['log_username'];
                }
                ?>" required>

            </div>
            <div class="password">
                <!--Passwort wird als log_password bezeichnet-->
                <input id="ip2" type="password" name="log_password" placeholder="passwort" />
                <img src="../Bilder/view.png" id="show1" type="checkbox" onclick="myFunction()">
                <script>
                    function myFunction() {
                        var x = document.getElementById("ip2");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                </script>
            </div>
        </div>

        <input type="submit" name="login_button" class="loginbutton" value="Login">
                    </table>
                </form>
        <div class="login">
            <?php

            /***********************************************************
                    CSS,HTML - Fehlermeldung (Nur den Text in echo "..." verändern)
             ***********************************************************/
            //Fehlermeldung
            if(in_array("Der Username oder  das Passwort ist falsch<br>",$error_array)) echo "Der Username oder das Passwort ist falsch <br> oder Sie haben sich nicht verifiziert<br>";
            ?>
        </div>

        <div class="col-3">
            <img src="../Bilder/login.png" alt="Seltfhtml" id="im2">
        </div>
    </body>
</html>