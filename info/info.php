<?php

//Userregistrierung überprüfen
require '../central/header.php';

//Userfunktion
include '../central/User.php' ;

//Benachrichtigungszentrale
include "../central/benachrichtigung.php";

require "settings_handler.php";

include '../chats/Chat.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Info</title>
        <!--link href="../login/login.css" rel="stylesheet" type="text/css" /-->
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://malsup.github.io/jquery.form.js"></script>
        <script src="info.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>


    <div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="../index.php"> <img src="../Bilder/Ones_Logo_noback_NEU.png" id="ones" width="55" height="45" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" >

            <ul class="navbar-nav ml-auto"  >
                <li class="nav-item ">
                    <a class="nav-link" style="margin-right:40px;" href="../startseite/startseite.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="margin-right:40px;" href="../posts/posts.php">Posts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="margin-right:40px;" href="../chats/chats.php">Chats</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="margin-right:40px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="info.php" >Info</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../datenbank/logout.php">Abmelden</a>
                    </div>
                </li>

            </ul>

            <div class="message_post">
                <form class="form-inline my-2 my-lg-0" action="" method="POST">

                    <input class="form-control mr-sm-2" id='search_text_input' name='q' type="search" autocomplete='off' onkeyup='getUsers(this.value, "<?php echo $userLoggedIn; ?>")' placeholder="Search" aria-label="Search">
                    <?php

                    /***********************************************************
                            CSS,HTML - Ausgabefeld  des Suchbalkens
                     ***********************************************************/

                    echo "<div class='results' class=\"form-inline my-2 my-lg-0\" style='position: absolute;background-color: white;'></div>";
                    ?>

                </form>
            </div>
    </nav>
    </div>



            <div class="col-12">

                <h1 style="font-family:'Poppins', sans-serif; font-size:100px; font-weight: bold;">
                    INFO
                </h1>
                <p style="font-family:'Poppins', sans-serif; font-size:20px;" >
                    Ändere deine Daten hier
                </p>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-6 border-right">
            <?php

            /***********************************************************
                     SQL - Userdaten
             ***********************************************************/

            $user_data_query = mysqli_query($con, "SELECT username, klasse, email  FROM users WHERE username='$userLoggedIn'");
            $row = mysqli_fetch_array($user_data_query);

            $username = $row['username'];
            $klasse = $row['klasse'];
            $email = $row['email'];

            ?>

            <form id="ip1" action="info.php" method="POST">
                <br>
                <div style="width: 400px; height: 65px;   font-size: 30px; border:0;">
                 <input class="form-control" type="text" name="username" value="<?php echo $username; ?>" id="settings_input">
                    <br>
                 <select class="form-control" type="text" name="klasse" value="<?php echo $klasse; ?>">
                        <optgroup label="Informatik">
                            <option value="1AHIF">1AHIF</option>
                            <option value="2AHIF">2AHIF</option>
                            <option value="3AHIF">3AHIF</option>
                            <option value="4AHIF">4AHIF</option>
                            <option value="5AHIF">5AHIF</option>
                        </optgroup>

                        <optgroup label="Elektrotechnik">
                            <option value="1AHET">1AHET</option>
                            <option value="2AHET">2AHET</option>
                            <option value="3AHET">3AHET</option>
                            <option value="4AHET">4AHET</option>
                            <option value="5AHET">5AHET</option>
                        </optgroup>

                        <optgroup label="Elektronik">
                            <option value="1AHEL">1AHEL</option>
                            <option value="2AHEL">2AHEL</option>
                            <option value="3AHEL">3AHEL</option>
                            <option value="4AHEL">4AHEL</option>
                            <option value="5AHEL">5AHEL</option>

                            <optgroup label="IT">
                                <option value="1AHIT">1AHIT</option>
                            </optgroup>

                            <optgroup label="Netzwerktechnik">
                                <option value="2AHITN">2AHITN</option>
                                <option value="3AHITN">3AHITN</option>
                                <option value="4AHITN">4AHITN</option>
                                <option value="5AHITN">5AHITN</option>
                            </optgroup>

                            <optgroup label="Medientechnik">
                                <option value="2AHITM">2AHITM</option>
                                <option value="3AHITM">3AHITM</option>
                                <option value="4AHITM">4AHITM</option>
                                <option value="5AHITM">5AHITM</option>
                            </optgroup>
                    </select>
                        <br>
                 <input class="form-control" type="text" name="email" value="<?php echo $email; ?>" id="settings_input">
                <?php
                if (!empty($error_array)) {

                    /***********************************************************
                            CSS,HTML - Fehlermeldung
                     ***********************************************************/

                    echo "Ihre Eingabe ist falsch";
                }
                echo $message; ?>

                            <br>
                    <div class="d-flex justify-content-center">

                <input type="submit" class="btn btn-dark" name="update_details" id="save_details" value="Daten ändern" class="info settings_submit" style="font-family:'Poppins', sans-serif"><br>
                    </div>
                </div>
            </form>
                </div>

                <div class="col-6">

            <form class="pswd" action="info.php" method="POST">
                <br>
                <div style="width: 400px; height: 65px; margin:5px;  font-size:30px; font-family:'Poppins', sans-serif;">
                <input class="form-control" type="password" name="old_password" id="settings_input" placeholder="altes Passwort">
                    <br>
              <input class="form-control" type="password" name="new_password_1" id="settings_input" placeholder="neues Passwort">
                        <br>
                 <input class="form-control" type="password" name="new_password_2" id="settings_input" placeholder="neues Passwort erneut eingeben">
                    <br>
                    <div class="text-left">
                <?php echo $password_message; ?>
                <input type="submit" class="btn btn-dark " name="update_password" id="save_details" value="Passwort ändern" class="info settings_submit" style="font-family:'Poppins', sans-serif"><br>
                    </div>
                </div>
                <br>
            </form>
        </div>
        </div>
    </div>
    <div class="fixed-bottom">
        <div class="col-12 ">
            <img src="../Bilder/startseite_pik1.jpg" class="mw-100" alt="Responsive image">
        </div>
    </div>
    </body>
</html>