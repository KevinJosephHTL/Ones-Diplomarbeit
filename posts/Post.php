<?php
class Post
{
    private $user_obj;
    private $con;

    public function __construct($con, $user)
    {
        $this->con = $con;
        $this->user_obj = new User($con, $user);
    }

    public function submitPics($body, $user_to, $number, $imageName)
    {

        $body = strip_tags($body); //removes html tags
        $body = mysqli_real_escape_string($this->con, $body);
        $body = str_replace('\r\n', "\n", $body);
        $body = nl2br($body);

        $check_empty = preg_replace('/\s+/', ' ', $body); //Deletes all spaces


        if($check_empty != "") {

            $body_array = preg_split("/\s+/", $body);

            foreach($body_array as $key => $value) {

                if(strpos($value, "www.youtube.com/watch?v=") !== false) {

                    $link = preg_split("!&!", $value);
                    $value = preg_replace("!watch\?v=!", "embed/", $link[0]);

                    /***********************************************************
                                CSS, HTML - Videoframework von YouTube
                     ***********************************************************/
                    $value = "<br><iframe width=\'520\' height=\'340\' src=\'" . $value ."\'></iframe><br>";
                    $body_array[$key] = $value;

                }

            }


            $body = implode(" ", $body_array);
            //Current date and time
            $date_added = date("Y-m-d H:i:s");
            //Get username
            $added_by = $this->user_obj->getUsername();

            //If user is on own profile, user_to is 'none'
            if ($user_to == $added_by)
                $user_to = "none";

            //insert post
            /***********************************************************
                        SQL - Den Post in die DB einfügen
             ***********************************************************/
            $query = mysqli_query($this->con, "INSERT INTO posts VALUES('', '$body', '$added_by', '$user_to', '$date_added','$number','$imageName')");
            $returned_id = mysqli_insert_id($this->con);


        }
    }


    public function submitPost($body, $user_to, $number, $imageName)
    {

        $body = strip_tags($body); //removes html tags
        $body = mysqli_real_escape_string($this->con, $body);

        $body = str_replace('\r\n', "\n", $body);
        $body = nl2br($body);

        $check_empty = preg_replace('/\s+/', '', $body); //Deltes all spaces

        if($check_empty != "") {

            $body_array = preg_split("/\s+/", $body);



            foreach($body_array as $key => $value) {

                if(strpos($value, "www.youtube.com/watch?v=") !== false) {

                    $link = preg_split("!&!", $value);
                    $value = preg_replace("!watch\?v=!", "embed/", $link[0]);
                    /***********************************************************
                             CSS, HTML - Videoframework von YouTube
                     ***********************************************************/
                    $value = "<br><iframe width=\'520\' height=\'340\' src=\'" . $value ."\'></iframe><br>";
                    $body_array[$key] = $value;

                }

            }
            $body = implode(" ", $body_array);
            //Current date and time
            $date_added = date("Y-m-d H:i:s");
            //Get username
            $added_by = $this->user_obj->getUsername();

            //If user is on own profile, user_to is 'none'
            if ($user_to == $added_by)
                $user_to = "none";

            //insert post
            /***********************************************************
                         SQL - Den Post in die DB einfügen
             ***********************************************************/
            $query = mysqli_query($this->con, "INSERT INTO posts VALUES('', '$body', '$added_by', '$user_to', '$date_added','$number','$imageName')");
            $returned_id = mysqli_insert_id($this->con);


        }
    }


    public function loadPosts($number)
    {

        $userLoggedIn = $this->user_obj->getUsername();

        $str = ""; //String to return
        /***********************************************************
                    SQL - Postverlauf
         ***********************************************************/
        $data_query = mysqli_query($this->con, "SELECT * FROM posts WHERE numberpost='$number' ORDER BY id DESC");

        if (mysqli_num_rows($data_query) > 0) {


            $num_iterations = 0; //Number of results checked (not necasserily posted)
            $count = 1;

            while ($row = mysqli_fetch_array($data_query)) {
                $id = $row['id'];
                $body = $row['body'];
                $added_by = $row['added_by'];
                $date_time = $row['date_added'];
                $imagePath = $row['image'];


                //Prepare user_to string so it can be included even if not posted to a user
                if ($row['user_to'] == "none") {
                    $user_to = "";
                } else {
                    $user_to_obj = new User($this->con, $row['user_to']);
                    $user_to_name = $user_to_obj->getName();
                    $user_to = "to <a href='" . $row['user_to'] . "'>" . $user_to_name . "</a>";
                }

                //Check if user who posted, has their account closed
                $added_by_obj = new User($this->con, $added_by);

                $user_logged_obj = new User($this->con, $userLoggedIn);

                /***********************************************************
                             SQL - Postverlauf
                 ***********************************************************/
                $user_details_query = mysqli_query($this->con, "SELECT username FROM users WHERE username='$added_by'");
                $user_row = mysqli_fetch_array($user_details_query);
                $username = $user_row['username'];


                //Timeframe
                $date_time_now = date("Y-m-d H:i:s");
                $start_date = new DateTime($date_time); //Time of post
                $end_date = new DateTime($date_time_now); //Current time
                $interval = $start_date->diff($end_date); //Difference between dates
                if ($interval->y >= 1) {
                    if ($interval->y == 1)
                        $time_message = $interval->y . " vor einem Jahr"; //1 year ago
                    else
                        $time_message = $interval->y . " nach einem Jahr"; //1+ year ago
                } else if ($interval->m >= 1) {
                    if ($interval->d == 0) {
                        $days = " ago";
                    } else if ($interval->d == 1) {
                        $days = $interval->d . " Tage alt";
                    } else {
                        $days = $interval->d . " Tage alt";
                    }


                    if ($interval->m == 1) {
                        $time_message = $interval->m . " Monate " . $days;
                    } else {
                        $time_message = $interval->m . " Monate " . $days;
                    }

                } else if ($interval->d >= 1) {
                    if ($interval->d == 1) {
                        $time_message = "Gestern";
                    } else {
                        $time_message = $interval->d . " Tage alt";
                    }
                } else if ($interval->h >= 1) {
                    if ($interval->h == 1) {
                        $time_message = $interval->h . " Stunden alt";
                    } else {
                        $time_message = $interval->h . " Stunden alt";
                    }
                } else if ($interval->i >= 1) {
                    if ($interval->i == 1) {
                        $time_message = $interval->i . " Minuten alt";
                    } else {
                        $time_message = $interval->i . " Minuten alt";
                    }
                } else {
                    if ($interval->s < 30) {
                        $time_message = "Jetzt gerade";
                    } else {
                        $time_message = $interval->s . " Sekunden alt";
                    }
                }

                /***********************************************************
                        HTML,CSS - Profilbildpfad für jeden in $imagePic für Posts
                 ***********************************************************/
                $imagePic = "../Bilder/head_blue.png";

                if ($imagePath != "") {
                    /***********************************************************
                            HTML,CSS - Bildpfad vom Post
                     ***********************************************************/
                    $imageDiv =    "<div class='postedImage'>
										<img src='$imagePath'>
                                    </div>";
                } else {
                    $imageDiv = "";
                }


                /***********************************************************
                        HTML,CSS - Postverlauf
                 ***********************************************************/
                $str .= "<div class='status_post'>
                            <div class='post_profile_pic'>
									<img src='$imagePic' width='50'>
								</div>
                            <div class='posted_by' style='color:#ACACAC;'>
                                <a href='../chats/chats.php?u=$added_by'> $username </a> $user_to &nbsp; &nbsp;&nbsp &nbsp;$time_message
                            </div>
                            <div id='post_body'>
                                $body
                                <br>
                            <div id='pics' style='width: 200%;max-width: 200%;height: auto; display: block;margin: 5px auto;'>   
                                $imageDiv
                                </div> 
                            </div>
                        </div>
							<hr>";
            } //End while loop
            echo $str;
        }
    }

}



?>