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
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </head>

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


    <body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="../index.php"> <img src="../Bilder/Ones_Logo_noback_NEU.png" id="ones" width="55" height="50" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav" >
            <ul class="navbar-nav ml-auto" >

                <li class="nav-item">
                    <a class="nav-link" href="#">Anmelden</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../registrierung/registrierung.php">Registrierung</a>
                </li>


            </ul>
        </div>
    </nav>

    <?php
        //Durch das Drücken des Loginbuttons
        //wird der Button wird 'true'
        if(isset($_POST['login_button'])){
            echo '';
        }
    ?>

    <div class="container">

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="row justify-content-center">
            <div class="col-6 ">

                <h1 style="font-family:'Poppins', sans-serif; font-size:50px;">
                    Melde dich jetzt an
                </h1>

                <p style="font-family:'Poppins', sans-serif; font-size:20px;" >
                    Username und Passwort und Los Geht's
                </p>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6  ">

                <form id="login-form" action="login.php" method="POST">
                    <div class="row">
                        <div class="input-group">

                            <input class="form-control" type="text" name="log_username" style="font-family:'Poppins', sans-serif" placeholder="Benutzername" value="<?php

                            //Username wird in die SESSION-Variable gespeichert
                            if(isset($_SESSION['log_username'])){
                                echo $_SESSION['log_username'];
                            }
                            ?>" required>
                            <br>


                        <!--Passwort wird als log_password bezeichnet-->

                            <input class="form-control" type="password" name="log_password" style="font-family:'Poppins', sans-serif" placeholder="Passwort" />
                        <br>
                        <input type="submit" class="btn btn-dark" name="login_button" style="font-family:'Poppins', sans-serif" value="Login">
            </div>
            </div>
                </form>

            <?php

            /***********************************************************
                    CSS,HTML - Fehlermeldung (Nur den Text in echo "..." verändern)
             ***********************************************************/
            //Fehlermeldung
            if(in_array("Der Username oder  das Passwort ist falsch<br>",$error_array)) echo "Der Username oder das Passwort ist falsch <br> oder Sie haben sich nicht verifiziert<br>";
            ?>

        </div>
    </div>





    </body>
</html>