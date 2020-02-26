<?php


include('../central/Mail.php');

$username = ""; //Username
$email = ""; //Email
$klasse = ""; //Klasse
$password = ""; //Passwort
$password2 = ""; //Passwort zum Wiederholen
$datum = ""; //Registrierungsdatum
$error_array = array(); //Beinhaltet die Fehlermeldungen
$klassenoptionen = array(
    '1AHIT',
    '1AHITM', '2AHITM', '3AHITM','4AHITM' , '5AHITM',
    '1AHITN', '2AHITN', '3AHITN','4AHITN' , '5AHITN',
    '1AHEL', '2AHEL', '3AHEL', '4AHEL', '5AHEL',
    '1AHIF', '2AHIF', '3AHIF', '4AHIF', '5AHIF',
    '1AHET', '2AHET', '3AHET', '4AHET', '5AHET'
);


//Startet durch das Drücken des Registrierungsbuttons
if(isset($_POST['register_button'])){


    $username = strip_tags($_POST['reg_username']); //Entfernen der html tags beim Usernamen
    $username = str_replace(' ', '', $username); //Entfernen der Abstände beim Usernamen
    $_SESSION['reg_username'] = $username; //Information in der SESSION-Variable wird in die vordefinierte Variable gespeichert

    $klasse = strip_tags($_POST['reg_klasse']);
    $klasse = str_replace(' ', '', $klasse);
    $_SESSION['reg_klasse'] = $klasse;

    $email = strip_tags($_POST['reg_email']);
    $email = str_replace(' ', '', $email);
    $_SESSION['reg_email'] = $email;

    //Password
    $password = strip_tags($_POST['reg_password']);
    $password2 = strip_tags($_POST['reg_password2']);

    //Aktuelles Datum im Format [Jahr-Monat-Tag Stunde:Minute:Sekunde Zeitzone]
    //Zeitzone wird nur dann angegeben/gespeichert, wenn User aus anderen Zeitzonen auf der Website anmelden
    $date = date("Y-m-d G:i:s T");

    //Überprüfen der Eingabe der Email
    if ($email == true) {

        //Überprüfen des Email-Formats
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            //Überprüfen einer vorhandenen Email in der DB
            /***********************************************************
                    SQL - Useremail
             ***********************************************************/
            $email_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

            //Aufzählen aller vorhandenen Emails
            $num_rows = mysqli_num_rows($email_check);

            //Speicherung aller Fehlermeldungen in das Fehlerarray
            if ($num_rows > 100) { //-----------------------------------------------------------------------------------------------------------------------------------------
                array_push($error_array, "Die Email-Addresse ist schon vergeben<br>");
            }
        } else {
            array_push($error_array, "Ungültiges Email-Format<br>");
        }
    } else {
        array_push($error_array, "Die Email-Addresse existiert nicht<br>");
    }

    //Überprüfung des Usernames
    if (strlen($username) <= 25 || strlen($username) >= 5) {
        /***********************************************************
                                SQL - Username
         ***********************************************************/
        $username_check = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        $num_rows = mysqli_num_rows($username_check);
        if ($num_rows > 0) {
            array_push($error_array, "Der Username ist schon vergeben<br>");
        }
    }else {
        array_push($error_array, "Der Username muss zwischen 5 bis 25 Zeichen beinhalten<br>");
    }
    if ($password != $password2) {
        array_push($error_array, "Ihr Zweites Passwort passt nicht überein<br>");
    }

    //Alle Anforderungen für das Passworts
    $r1='/[A-Z]/';  //Großbuchstaben
    $r2='/[a-z]/';  //Kleinbuchstaben
    $r3='/[|!@#$%&*\/=?,;.()}\'*§\"ß€{:\-_+~^\\\]/';  // Ausgeführte Sonderzeichen
    $r4='/[0-9]/';  //Zahlen
    if(preg_match_all($r1,$password, $o)<1) return array_push($error_array, "Das Passwort muss mindestens einen Großbuchstaben beinhalten<br>");;
    if(preg_match_all($r2,$password, $o)<1) return array_push($error_array, "Das Passwort muss mindestens 2 Kleinbuchstaben beinhalten<br>");;
    if(preg_match_all($r4,$password, $o)<1) return array_push($error_array, "Das Passwort muss mindestens eine Zahl beinhalten<br>");;
    if(preg_match_all($r3,$password, $o)<1) return array_push($error_array, "Das Passwort muss mindestens ein Sonderzeichen beinhalten<br>");;
    if(strlen($password)<=8) return array_push($error_array, "Das Passwort muss mindestens 8 Zeichen beinhalten<br>");;

    //Überprüfung der Existenz einer Klasse im Array
    if (!in_array($klasse,$klassenoptionen)){
        array_push($error_array, "Die Klasse existiert nicht<br>");
    }

    //Falls keine Fehlermeldungen im FehlerArray vorhanden sind
    if (empty($error_array)) {
        $cs= True;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cs));
        //Speicherung aller Informationen in die DB
        //SESSION-Variablen werden geleert
        $password = md5($password);
        /***********************************************************
                SQL - Die Registrierungsdaten in die DB einfügen
         ***********************************************************/
        $query = mysqli_query($con, "INSERT INTO users VALUES ('', '$username', '$password', '$email','$klasse', '$date','$token','no')");

        Mail::sendMail($email, $token);

        //query-Format ist die: -> id | username | passwort | email | klasse | signupdate

        array_push($error_array, "Ihre Registrierung ist erfolgreich verlaufen.<br>Bitte verifizieren Sie Ihr Konto mit der eingegebenen Email<br>");
        $_SESSION['reg_username'] = "";
        $_SESSION['reg_klasse'] = "";
        $_SESSION['reg_email'] = "";
    }

}
?>