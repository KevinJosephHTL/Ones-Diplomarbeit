<?php

//Klasse für die Chatfunktion
class Chat
{
    private $user_obj;
    private $con;

    //Grundlegenden Variablen
    public function __construct($con, $user){
        $this->con = $con;
        $this->user_obj = new User($con, $user);
    }

    //Die neuesten Unterhaltungen werden angezeigt
    public function getMostRecentUser() {
        $userLoggedIn = $this->user_obj->getName();

        /***********************************************************
                SQL - Eigener Anmeldeuser & anderer Chatuser
         ***********************************************************/

        $query = mysqli_query($this->con, "SELECT user_to, user_from FROM messages WHERE user_to='$userLoggedIn' OR user_from='$userLoggedIn' ORDER BY id DESC LIMIT 5");

        if(mysqli_num_rows($query) == 0)
            return false;

        $row = mysqli_fetch_array($query);
        $user_to = $row['user_to'];
        $user_from = $row['user_from'];

        if($user_to != $userLoggedIn)
            return $user_to;
        else
            return $user_from;
    }

    //Funktion für das Senden von Nachrichten
    public function sendMessage($user_to, $body, $date) {
        if($body != "") {
            $userLoggedIn = $this->user_obj->getUsername();
            $query = mysqli_query($this->con, "INSERT INTO messages VALUES('', '$user_to', '$userLoggedIn', '$body', '$date')");
        }

    }

    //Funktion für das Bekommen von Chatnachrichten
    public function getMessages($otherUser) {
        $userLoggedIn = $this->user_obj->getUsername();
        $data = "";
        $get_messages_query = mysqli_query($this->con, "SELECT * FROM messages WHERE ((user_to='$userLoggedIn' AND user_from='$otherUser') OR (user_from='$userLoggedIn' AND user_to='$otherUser')) ORDER BY date DESC");

        while($row = mysqli_fetch_array($get_messages_query)) {
            $user_to = $row['user_to'];
            $user_from = $row['user_from'];
            $body = $row['body'];
            $id = $row['id'];

            /***********************************************************
                    CSS,HTML - Textblöcke (blau & grün) m Chatverlauf
             ***********************************************************/

            $div_top = ($user_to == $userLoggedIn) ? "<div class='message' id='green'>" : "<div class='message' id='blue'>";
            $data = $data . $div_top . $body . "</div><br><br>";
        }
        return $data;
    }

    //Funktion für das sofortige Bekommen von der zuletzt gechatteten Person
    public function getLatestMessage($userLoggedIn, $user2) {
        $details_array = array();

        /***********************************************************
                    SQL - Alle Chatnachrichten
         ***********************************************************/
        $query = mysqli_query($this->con, "SELECT body, user_to, date FROM messages WHERE (user_to='$userLoggedIn' AND user_from='$user2') OR (user_to='$user2' AND user_from='$userLoggedIn') ORDER BY id DESC LIMIT 1");

        $row = mysqli_fetch_array($query);
        $sent_by = ($row['user_to'] == $userLoggedIn) ? "Sie sagten: " : "Du sagtest: ";

        //Zeitframe
        $date_time_now = date("Y-m-d H:i:s");
        $start_date = new DateTime($row['date']); //Zeitpunkt des Posts
        $end_date = new DateTime($date_time_now); //Aktuelle Zeit
        $interval = $start_date->diff($end_date); //Interval der Zeitpunkte
        if($interval->y >= 1) {
            if($interval->y == 1)
                $time_message = $interval->y . " vor einem Jahr"; //vor einem Jahr
            else
                $time_message = $interval->y . " nach einem Jahr"; //nach einem Jahr
        }
        else if ($interval->m >= 1) {
            if($interval->d == 0) {
                $days = " alt";
            }
            else if($interval->d == 1) {
                $days = $interval->d . " Tage alt";
            }
            else {
                $days = $interval->d . " Tage alt";
            }


            if($interval->m == 1) {
                $time_message = $interval->m . " Monate". $days;
            }
            else {
                $time_message = $interval->m . " Monate". $days;
            }

        }
        else if($interval->d >= 1) {
            if($interval->d == 1) {
                $time_message = "Gestern";
            }
            else {
                $time_message = $interval->d . " Tage alt";
            }
        }
        else if($interval->h >= 1) {
            if($interval->h == 1) {
                $time_message = $interval->h . " Stunden alt";
            }
            else {
                $time_message = $interval->h . " Stunden alt";
            }
        }
        else if($interval->i >= 1) {
            if($interval->i == 1) {
                $time_message = $interval->i . " Minuten alt";
            }
            else {
                $time_message = $interval->i . " Minuten alt";
            }
        }
        else {
            if($interval->s < 30) {
                $time_message = "Jetzt gerade";
            }
            else {
                $time_message = $interval->s . " Sekunden alt";
            }
        }

        array_push($details_array, $sent_by);
        array_push($details_array, $row['body']);
        array_push($details_array, $time_message);

        return $details_array;
    }

    public function getConvos() {
        $userLoggedIn = $this->user_obj->getUsername();
        $return_string = "";
        $convos = array();

        /***********************************************************
                SQL - Alle Chatnachrichten
         ***********************************************************/

        $query = mysqli_query($this->con, "SELECT user_to, user_from FROM messages WHERE user_to='$userLoggedIn' OR user_from='$userLoggedIn' ORDER BY id DESC");

        while($row = mysqli_fetch_array($query)) {
            $user_to_push = ($row['user_to'] != $userLoggedIn) ? $row['user_to'] : $row['user_from'];

            if(!in_array($user_to_push, $convos)) {
                array_push($convos, $user_to_push);
            }
        }

        foreach($convos as $username) {
            $user_found_obj = new User($this->con, $username);
            $latest_message_details = $this->getLatestMessage($userLoggedIn, $username);

            $dots = (strlen($latest_message_details[1]) >= 12) ? "..." : "";
            $split = str_split($latest_message_details[1], 12);
            $split = $split[0] . $dots;

            /***********************************************************
                        CSS,HTML - Ausgabefeld des Suchbalkens
             ***********************************************************/

            $return_string = "<a href='chats.php?u=$username'> <div class='user_found_messages'>
								" . $user_found_obj->getName() . "
								<span class='timestamp_smaller' id='grey'> " . $latest_message_details[2] . "</span>
								<p id='grey' style='margin: 0;'>" . $latest_message_details[0] . $split . " </p>
								</div>
								</a>";
        }

        return $return_string;

    }

    public function getConvosDropdown($data, $limit) {


        $userLoggedIn = $this->user_obj->getUsername();
        $return_string = "";
        $convos = array();

        /***********************************************************
                SQL - Alle Chatnachrichten
         ***********************************************************/
        $query = mysqli_query($this->con, "SELECT user_to, user_from FROM messages WHERE user_to='$userLoggedIn' OR user_from='$userLoggedIn' ORDER BY id DESC");

        while($row = mysqli_fetch_array($query)) {
            $user_to_push = ($row['user_to'] != $userLoggedIn) ? $row['user_to'] : $row['user_from'];

            if(!in_array($user_to_push, $convos)) {
                array_push($convos, $user_to_push);
            }
        }



        foreach($convos as $username) {

            $user_found_obj = new User($this->con, $username);
            $latest_message_details = $this->getLatestMessage($userLoggedIn, $username);

            $dots = (strlen($latest_message_details[1]) >= 12) ? "..." : "";
            $split = str_split($latest_message_details[1], 12);
            $split = $split[0] . $dots;

            /***********************************************************
                    CSS,HTML - Konversationsfeld
            ***********************************************************/

            $return_string .= "<a href='chats.php?u=$username'> 
                                    <div class='user_found_messages' >
                                        " . $user_found_obj->getName() . "
                                        <span class='timestamp_smaller' id='grey'> " . $latest_message_details[2] . "</span>
                                        <p id='grey' style='margin: 0;'>" . $latest_message_details[0] . $split . " </p>
                                    </div>
								</a>";
        }
    }
}

