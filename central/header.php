<?php

//Die Datei zum Verbinden der DB
include('../datenbank/config.php');

//Überprüfen, ob der aktuelle User eingeloggt ist
//Falls der Benutzer eingeloggt ist
if (isset($_SESSION['username'])) {

    //Aktuell eingeloggter Benutzer
	$userLoggedIn = $_SESSION['username'];
    /***********************************************************
                         SQL - Username
     ***********************************************************/
    // Durchführung einer Abfrage, wo alle Details vom User aufgerufen wird
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");

    // Holt alle Ergebnisse von der Abfrage in eine Reihe heraus
	$user = mysqli_fetch_array($user_details_query);

}
else {
    //Leitet den ungeloggten User zur Login-Seite
	header("Location: /ones/login/login.php");
}

?>