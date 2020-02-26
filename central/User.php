<?php
class User {
    private $user;
    private $con;

    //Startfunktion ist wichtig
    public function __construct($con, $user){
        $this->con = $con;
        /***********************************************************
                            SQL - Eigener Username
         ***********************************************************/
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$user'");
        $this->user = mysqli_fetch_array($user_details_query);
    }

    //Usernamenfunktion ist wichitg
    public function getUsername() {
        return $this->user['username'];
    }

    //Userfunktion ist wichtig
    public function getName() {
        $username = $this->user['username'];
        /***********************************************************
                        SQL - Anderer Username
         ***********************************************************/
        $query = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
        $row = mysqli_fetch_array($query);
        return $row['username'];
    }

    public function justTrue($just_give_true) {
            return true;
    }

}

?>