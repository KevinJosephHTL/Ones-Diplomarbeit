<?php

//DB-Verbindung
include('../datenbank/config.php');

//Überprüfung der aktuellen User-Session
if (isset($_SESSION['username'])) {
    header("Location: /ones/startseite/startseite.php");
    $userLoggedIn = $_SESSION['username'];
    /***********************************************************
        SQL - Eigener Username
     ***********************************************************/
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
    exit();
}
//Weterleiten des ungeloggten Users zur Login-Seite
else {
    include '../central/header.php';
}
?>




