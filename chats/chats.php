<?php

//Userregistrierung überprüfen
//Userfunktion
//Chatfunktion
require '../central/header.php';
include '../central/User.php' ;
include 'Chat.php';

$message_obj = new Chat($con, $userLoggedIn);

//Falls der User mit niemanden gechattet hat, wird der User zum eigenen Suchbalken geführt
if(isset($_GET['u']))
    $user_to = $_GET['u'];
else {
    $user_to = $message_obj->getMostRecentUser();
    if($user_to == false)
        $user_to = 'new';
}
if($user_to != "new")
    $user_to_obj = new User($con, $user_to);
if(isset($_POST['post_message'])) {
    if(isset($_POST['message_body'])) {
        $body = mysqli_real_escape_string($con, $_POST['message_body']);
        $date = date("Y-m-d H:i:s");
        $message_obj->sendMessage($user_to, $body, $date);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Chats</title>
        <link href="chats.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="chats.js"></script>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="../index.php"> <img src="../Bilder/Ones_Logo_noback.png" id="ones" width="55" height="30" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../startseite/startseite.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../posts/posts.php">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chats.php">Chats</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../info/info.php" >Info</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../datenbank/logout.php">Abmelden</a>
                    </div>
                </li>
            </ul>
            <div class="message_post">
            <form action="" method="POST">
                <input class="form-control mr-sm-2" id='search_text_input' name='q' type="text" autocomplete='off' onkeyup='getUsers(this.value, "<?php echo $userLoggedIn; ?>")' placeholder="Search" aria-label="Search">
                <?php
                /***********************************************************
                        CSS,HTML - Ausgabefeld des Suchbalkens
                 ***********************************************************/
                echo "<div class='results' class=\"form-inline my-2 my-lg-0\" style='position: absolute;background-color: white;'></div>";
                ?>
            </form>
            </div>
        </div>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Suchen</button>
    </nav>
    <div class="main_column column" id="main_column">
    <?php

            //Die Chatfunktion wird auf der Seite angezeigt
            //Zeigt den Namen der Person an mit dem der aktuelle User chattet
            //Und den Chatverlauf mit der Person
            if($user_to != "new"){
                /***********************************************************
                        CSS,HTML - Anmeldename des Users und des Chatters
                        CSS,HTML - Der Chatverlauf
                 ***********************************************************/
                echo "<h4> <a href='chats.php?u=$userLoggedIn' style=\"color:#228B22;\"> $userLoggedIn </a> chattet mit dem User <a href='chats.php?u=$user_to' style=\"color:#DC143C;\">" . $user_to_obj->getName() . "</a></h4><hr><br>";
                echo "<div class='loaded_messages' id='scroll_messages'>";
                ?> <div class="passt"> <?php
                echo $message_obj->getMessages($user_to);
                ?> </div><?php
                echo "</div>";
            } else {
                echo "<h4>Suche Chatpartner</h4>";
            }
    ?>
            <div class="message_post">
                <form action="" method="POST">
                    <?php
                    //Live-Suchfunktion wird auf der Seite angezeigt
                    //Funktion für die Suche nach anderen Usern
                    if($user_to == "new") {

                        /***********************************************************
                                CSS,HTML - Eigener Suchbalkens
                         ***********************************************************/
                        echo "Suchen Sie eine Person aus mit der Sie chatten möchten <br><br>";?>
                        Chat mit: <input type='text' onkeyup='getUsers(this.value, "<?php echo $userLoggedIn; ?>")' name='q' placeholder='Name' autocomplete='off' id='seach_text_input'>
                        <?php
                        echo "<div class='results'></div>";
                    }
                    //Das TextFeld, um mit der Person zu schreiben
                    //und das SendeButton
                    else {
                        /***********************************************************
                                CSS,HTML - Feld zum Nachrichten schreiben
                                CSS,HTML - SEND-Button
                         ***********************************************************/
                        echo "<textarea name='message_body' id='message_textarea' placeholder='Write your message ...'></textarea>";
                        echo "<input type='submit' name='post_message' class='info' id='message_submit' value='Send'>";
                    }
                    ?>
                </form>
            </div>
            <script>
                var div = document.getElementById("scroll_messages");
            </script>
        </div>
        <div class="user_details column" id="conversations">
            <h4>Konversationen</h4>
            <div class="loaded_conversations">
                <?php
                //Konversationsfeld
                echo $message_obj->getConvos(); ?>
            </div>
            <br>
        </div>
    </body>
</html>