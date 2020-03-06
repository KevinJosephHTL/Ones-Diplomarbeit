<?php

include '../central/header.php';
include '../central/User.php';
include 'Chat.php';

$query = $_POST['query'];
$userLoggedIn = $_POST['userLoggedIn'];

//Teit den Namen in einzelne Strings
$names = explode(" ", $query);


/***********************************************************
            SQL - Konversationsusernamen finden
 ***********************************************************/
//Gibt alle User aus
$usersReturned = mysqli_query($con, "SELECT * FROM users WHERE username LIKE '%$query%' AND NOT username='$userLoggedIn' LIMIT 8");

//Falls die gefundenen Abfragen nicht leer sind
if($query != "") {
	while($row = mysqli_fetch_array($usersReturned)) {
		$user = new User($con, $userLoggedIn);

        /***********************************************************
                CSS,HTML - Ausgabefeld des Suchbalkens!!!!!!!!!!
         ***********************************************************/

        if($user->justTrue($row['username'])) {
            echo "<div class='resultDisplay'>
					<a href='../chats/chats.php?u=" . $row['username'] . "' style='color: #000'>
					<div class='liveSearchText'>
							".$row['username']. "
						</div>
					</a>
				</div>";
        }
	}
}
?>