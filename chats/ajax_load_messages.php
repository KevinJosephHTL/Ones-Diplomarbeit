<?php


include("../datenbank/config.php");
include("../central/User.php");
include("../chats/Chat.php");

$limit = 7; //Number of messages to load
$userLoggedIn = $this->user_obj->getUsername();
$message = new Message($con, $userLoggedIn);
echo $message->getConvosDropdown($userLoggedIn, $limit);

