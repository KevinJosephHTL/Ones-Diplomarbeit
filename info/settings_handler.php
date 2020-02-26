<?php  
if(isset($_POST['update_details'])) {


    $message = "";
    $password_message = "";
    $username = ""; //Username
    $email = ""; //Email
    $klasse = ""; //Klasse

    $datum = ""; //Registrierungsdatum
    $error_array = array(); //Beinhaltet die Fehlermeldungen
    $klassenoptionen = array(
        '1AHIT',
        '1AHITM', '2AHITM', '3AHITM', '4AHITM', '5AHITM',
        '1AHITN', '2AHITN', '3AHITN', '4AHITN', '5AHITN',
        '1AHEL', '2AHEL', '3AHEL', '4AHEL', '5AHEL',
        '1AHIF', '2AHIF', '3AHIF', '4AHIF', '5AHIF',
        '1AHET', '2AHET', '3AHET', '4AHET', '5AHET'
    );

    $username = $_POST['username'];
    $klasse = $_POST['klasse'];
    $email = $_POST['email'];

    if ($email == true) {

        //Überprüfen des Email-Formats
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            //Überprüfen einer vorhandenen Email in der DB
            $email_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

            //Aufzählen aller vorhandenen Emails
            $num_rows = mysqli_num_rows($email_check);


        } else {
            array_push($error_array, "Ungültiges Email-Format<br>");
        }
    } else {
        array_push($error_array, "Die Email-Addresse existiert nicht<br>");
    }


    //Überprüfung des Usernames
    if (strlen($username) <= 25 || strlen($username) >= 5) {
        $username_check = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        $num_rows = mysqli_num_rows($username_check);

    } else {
        array_push($error_array, "Der Username muss zwischen 5 bis 25 Zeichen beinhalten<br>");
    }

    //Überprüfung der Existenz einer Klasse im Array
    if (!in_array($klasse, $klassenoptionen)) {
        array_push($error_array, "Die Klasse existiert nicht<br>");
    }

    if (empty($error_array)) {
        $message = "Details updated!<br><br>";
        $query = mysqli_query($con, "UPDATE users SET username='$username', klasse='$klasse', email='$email' WHERE username='$userLoggedIn'");
        header("Location: /ones/datenbank/logout.php");
    }
}

else {
    $message = "";
}

//**************************************************

if(isset($_POST['update_password'])) {

	$old_password = strip_tags($_POST['old_password']);
	$new_password = strip_tags($_POST['new_password_1']);
	$new_password_2 = strip_tags($_POST['new_password_2']);


    //Alle Anforderungen für das Passworts
    $r1 = '/[A-Z]/';  //Großbuchstaben
    $r2 = '/[a-z]/';  //Kleinbuchstaben
    $r3 = '/[|!@#$%&*\/=?,;.()}\'*§\"ß€{:\-_+~^\\\]/';  // Ausgeführte Sonderzeichen
    $r4 = '/[0-9]/';  //Zahlen
    if (preg_match_all($r1, $new_password, $o) < 1) return array_push($error_array, "Das Passwort muss mindestens einen Großbuchstaben beinhalten<br>");;
    if (preg_match_all($r2, $new_password, $o) < 1) return array_push($error_array, "Das Passwort muss mindestens 2 Kleinbuchstaben beinhalten<br>");;
    if (preg_match_all($r4, $new_password, $o) < 1) return array_push($error_array, "Das Passwort muss mindestens eine Zahl beinhalten<br>");;
    if (preg_match_all($r3, $new_password, $o) < 1) return array_push($error_array, "Das Passwort muss mindestens ein Sonderzeichen beinhalten<br>");;
    if (strlen($new_password) <= 8) return array_push($error_array, "Das Passwort muss mindestens 8 Zeichen beinhalten<br>");;

    if (empty($error_array)) {

        $password_query = mysqli_query($con, "SELECT password FROM users WHERE username='$userLoggedIn'");
        $row = mysqli_fetch_array($password_query);
        $db_password = $row['password'];

        if (md5($old_password) == $db_password) {

            if ($new_password == $new_password_2) {


                if (strlen($new_password) <= 4) {
                    $password_message = "Das Passwort soll größer als 4 Zeichen haben<br><br>";
                } else {
                    $new_password_md5 = md5($new_password);

                    /***********************************************************
                            SQL - Die Userdaten werden verändert
                     ***********************************************************/

                    $password_query = mysqli_query($con, "UPDATE users SET password='$new_password_md5' WHERE username='$userLoggedIn'");
                    $password_message = "Das Passwort wurde erfolgreich verändert<br><br>";
                }


            } else {
                $password_message = "Das Passwörter müssen übereinander stimmen<br><br>";
            }

        } else {
            $password_message = "Das alte Passwort ist falsch <br><br>";
        }

    } else{
        $password_message = "Falsche Eingabe";
    }
}
else {
	$password_message = "";
}




?>