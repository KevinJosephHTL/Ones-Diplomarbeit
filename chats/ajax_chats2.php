<?php

require '../central/header.php';
include '../central/User.php' ;
include 'Chat.php';

$message_obj = new Chat($con, $userLoggedIn);

//Falls User gechattet wurde, dann den Unterhaltungsverlauf anzeigen, ansonsten nicht
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