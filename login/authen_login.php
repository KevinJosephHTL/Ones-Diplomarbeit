<?php

$username = ""; //Username
$password = ""; //Passwort
$error_array = array(); //Beinhaltet die Fehlermeldungen

//Durch Auslösen des LoginButtons
//wird der Benutzer zur Startseite befördert
if(isset($_POST['login_button'])) {
    $username = $_POST['log_username'];
    $_SESSION['log_username'] = $username;
    $password = md5($_POST['log_password']);
    /***********************************************************
            SQL - User wird zu yes eingestellt
     ***********************************************************/
    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password' AND checked='yes'");
    $count = mysqli_num_rows($query);

    if ($count == 1) {
        $row = mysqli_fetch_array($query);
        $username = $row['username'];
        $_SESSION['username'] = $username;
        //Weiterleitung zur Startseite
        header("Location: ../startseite/startseite.php");
        exit();
    } else {
        //Fehlermeldung, falls etwas Username oder Passwort nicht stimmen
        array_push($error_array, "Der Username oder  das Passwort ist falsch<br>");
    }

}

?>
