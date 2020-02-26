<?php

//Weterleiten des ungeloggten Users zur Login-Seite durch die header-Seite
require '../central/header.php';
include("../central/User.php");
include '../chats/Chat.php';

?>

<!--Startseite-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Startseite</title>
        <link href="startseite.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://malsup.github.io/jquery.form.js"></script>
        <script src="startseite.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="../index.php"> <img src="../Bilder/Ones_Logo_noback.png" id="ones" width="55" height="55" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" >

            <ul class="navbar-nav mr-auto"  >
                <li class="nav-item ">
                    <a class="nav-link" href="../startseite/startseite.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../posts/posts.php">Posts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../chats/chats.php">Chats</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="margin-right:40px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../info/info.php" >Info</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../datenbank/logout.php">Abmelden</a>
                    </div>
                </li>
            </ul>
            <div class="message_post">
                <form action="" method="POST" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" id='search_text_input' name='q' type="text" autocomplete='off' onkeyup='getUsers(this.value, "<?php echo $userLoggedIn; ?>")' placeholder="Search" aria-label="Search">
                    <?php
                    /***********************************************************
                             HTML,CSS - Ausgabefeld des Suchbalkens
                     ***********************************************************/

                    echo "<div class='results' class=\"form-inline my-2 my-lg-0\" style='position: absolute;background-color: white;'></div>";
                    ?>
                </form>
            </div>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </nav>
    </body>
</html>