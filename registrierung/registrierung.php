<?php

//DB
require '../datenbank/config.php';
//Registrieurungshandler (Überprüfung der eingegebenen Daten)
require '../registrierung/register_handler.php';

?>
<!--Registrierungsseite-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrierung</title>
        <link href="registrierung.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    </head>
    <body>
        <nav>
            <div class="logo">
                <a href="../index.php">
                    <img src="../Bilder/Ones_Logo_noback.png" id="ones">
                </a>
            </div>

            <ul>
                <li>
                    <a class="a1" href="../login/login.php">Login</a>
                </li>
                <li>
                    <a href="registrierung.php">Registrierung</a>
                </li>
            </ul>
        </nav>

        <ues>ONES</ues>
        <uns>Registrierung</uns>

        <?php

        //Durch das Drücken des Registrierungsbuttons
        //wird der Button wird 'true'
        if(isset($_POST['register_button'])) {
            echo '';
        }

        ?>
        <form action="registrierung.php" method="POST">
            <div class="name">
                <input id="ip1" type="text" name="reg_username" placeholder="Name" value="<?php

                //Username wird in die SESSION-Variable gespeichert
                if(isset($_SESSION['reg_username'])){
                    echo $_SESSION['reg_username'];
                }

                ?>" maxlength="25" minlength="5" title="Der Username soll insgesamt zwischen 4 bis 26 Zeichen beinhalten" required>
            </div>

            <div class="klasse">
                <select id="ip2" name="reg_klasse">
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
            </div>
                <?php

                //Klasse wird in die SESSION-Variable gespeichert
                if(isset($_SESSION['reg_klasse'])){
                    echo $_SESSION['reg_klasse'];
                }

                ?>
            <div class="email">
                <input id="ip3" type="email" name="reg_email" placeholder="E-Mail" value="<?php

                //Email wird in die SESSION-Variable gespeichert
                if(isset($_SESSION['reg_email'])){
                    echo $_SESSION['reg_email'];
                }

                ?>"  title="Bitte geben Sie eine gültige Studierende-Email-Adresse ein." pattern=".+studierende.htl-donaustadt.at"" required>
            </div>
<!--Das sind die besten Möglichkeiten-> pattern=".+aol.com|.+protonmail.com|.+protonmail.com|.+yandex.com|.+gmx.net|.+mein.gmx|.+gmx.at|.+gmx.ch|.+mail.gmx|.+email.gmx|.+gmx.eu|.+gmx.org|.+gmx.info|.+gmx.biz|.+gmx.com|.+gmx.de|.+icloud.com|.+inbox.com|.+hotmail.com|.+outlook.de|.+outlook.com|.+@gmail.com|.+yahoo.com|.+studierende.htl-donaustadt.at"-->
            <div class="passwort">
                <input id="ip4" type="password" name="reg_password" autocomplete="none" placeholder="Passwort" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Das Passwort muss mindestens eine Zahl, ein Sonderzeichen und einen Groß- und Kleinbuchstaben sowie mindestens 8 oder mehr Zeichen enthalten." required/>
            </div>
            <div class="passwortwiederholen">
                <input id="ip5" type="password" name="reg_password2"  placeholder="Passwort wiederholen" required/>
            </div>
            <input type="submit" name="register_button" class="registrierbutton" value="Registrieren">
        </form>
        <div class="registrierung">
            <?php

            /***********************************************************
                    CSS,HTML - Alle Fehlermeldungen (Nur den Text in echo "..." verändern)
             ***********************************************************/

            //Alle Fehlermeldungen
            if(in_array("Ungültiges Email-Format<br>",$error_array)) echo "Ungültiges Email-Format<br>";

            if(in_array("Die Email-Addresse existiert nicht<br>",$error_array)) echo "Die Email-Addresse existiert nicht<br>";

            if(in_array("Der Username muss zwischen 5 bis 25 Zeichen beinhalten<br>",$error_array)) echo "Der Username muss zwischen 5 bis 25 Zeichen beinhalten<br>";

            if(in_array("Der Username ist schon vergeben<br>",$error_array)) echo "Der Username ist schon vergeben<br>";

            if(in_array("Ihr Zweites Passwort passt nicht überein<br>",$error_array)) echo "Ihr Zweites Passwort passt nicht überein<br>";

            if(in_array("Das Passwort muss mindestens einen Großbuchstaben beinhalten<br>",$error_array)) echo "Das Passwort muss mindestens einen Großbuchstaben beinhalten<br>";

            if(in_array("Das Passwort muss mindestens 2 Kleinbuchstaben beinhalten<br>",$error_array)) echo "Das Passwort muss mindestens 2 Kleinbuchstaben beinhalten<br>";

            if(in_array("Das Passwort muss mindestens eine Zahl beinhalten<br>",$error_array)) echo "Das Passwort muss mindestens eine Zahl beinhalten1<br>";

            if(in_array("Das Passwort muss mindestens ein Sonderzeichen beinhalten<br>",$error_array)) echo "Das Passwort muss mindestens ein Sonderzeichen beinhalten<br>";

            if(in_array("Das Passwort muss mindestens 8 Zeichen beinhalten<br>",$error_array)) echo "Das Passwort muss mindestens 8 Zeichen beinhalten<br>";

            if(in_array("Die Klasse existiert nicht<br>",$error_array)) echo "Die Klasse existiert nicht<br>";

            if(in_array("Die Email-Addresse ist schon vergeben<br>",$error_array)) echo "Die Email-Addresse ist schon vergeben<br>";

            if(in_array("Ihre Registrierung ist erfolgreich verlaufen.<br>Bitte verifizieren Sie Ihr Konto mit der eingegebenen Email<br>",$error_array)) echo "Ihre Registrierung ist erfolgreich verlaufen.<br>Bitte verifizieren Sie Ihr Konto mit der eingegebenen Email<br>";

            ?>
        </div>

        <img src="../Bilder/registrierung.png" alt="Seltfhtml" id="im4">
        <br>

    </body>
</html>