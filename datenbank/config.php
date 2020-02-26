<?php


ob_start();
session_start();


$timezone = date_default_timezone_set("Europe/Berlin");
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$con = mysqli_connect("localhost", "root", "", "ones");//<-NAME DER DB EINGEBN!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if (mysqli_connect_errno()) {
    echo "Verbindung ist fehlgeschlagen: " . mysqli_connect_errno();
}

?>