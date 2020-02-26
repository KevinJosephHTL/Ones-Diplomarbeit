<?php

//DB-Verbindung
include('../datenbank/config.php');

if (isset($_GET['token'])) {

    $user_token=($_GET['token']);
    $user_token_query = mysqli_query($con, "SELECT token FROM users WHERE token='$user_token'");
    $row = mysqli_fetch_array($user_token_query);
    $num_rows = mysqli_num_rows($user_token_query);
    if($num_rows > 0) {
        if (($user_token) == $row['token']) {
            $password_query = mysqli_query($con, "UPDATE users SET checked='yes' WHERE token='$user_token'");
            ?>

            <h1>Hallo HTL-Student,</h1>
            <p>willkommen bei Ones. Mit Ihrem neuen Konto können Sie Ones nutzen.</p>
            <a href="http://localhost/ones/">Bitte Melden Sie sich direkt hier an</a>

            <?php

        } else {
            /***********************************************************
            CSS,HTML - Fehlermeldung (Nur den Text in echo "..." verändern)
             ***********************************************************/

            echo "<br>echo \"Falsche Seite\";";
        }
    }else{
        echo "Falsche Seite";
    }
}

//Überprüfung der aktuellen User-Session
elseif (isset($_SESSION['username'])) {
    header("Location: /ones/startseite/startseite.php");
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
    exit();
}
//Weterleiten des ungeloggten Users zur Login-Seite
else {
    include '../central/header.php';
}
?>




