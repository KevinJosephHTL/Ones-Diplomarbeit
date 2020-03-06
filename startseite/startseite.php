<?php

//Weterleiten des ungeloggten Users zur Login-Seite durch die header-Seite
require '../central/header.php';
include("../central/User.php");
include '../chats/Chat.php';

include("../posts/Post.php");



$message_obj = new Chat($con, $userLoggedIn);


if(isset($_POST['postsss'])){

    $uploadOk = 1;
    $imageName = $_FILES['fileToUpload']['name'];
    $errorMessage = "";

    if($imageName != "") {
        $targetDir = "../Bilder/posts/";
        $imageName = $targetDir . uniqid() . basename($imageName);
        $imageFileType = pathinfo($imageName, PATHINFO_EXTENSION);

        if($_FILES['fileToUpload']['size'] > 10000000) {
            /***********************************************************
            HTML,CSS - Nur in den "..." verändern, falls der Fehlermeldungstext anders sein sollte
             ***********************************************************/
            $errorMessage = "Die Datei ist zu groß";
            $uploadOk = 0;
        }

        if(strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpg") {
            /***********************************************************
            HTML,CSS - Nur in den "..." verändern, falls der Fehlermeldungstext anders sein sollte
             ***********************************************************/
            $errorMessage = "Nur jpeg, jpg and png Dateien sind erlaubt";
            $uploadOk = 0;
        }

        if($uploadOk) {
            if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $imageName)) {
                //image uploaded okay
            }
            else {
                $uploadOk = 0;
            }
        }

    }

    if($uploadOk = true && $_POST['post_texts']=="" && $_FILES['fileToUpload']['size'] > 1){
        $_POST['post_texts'] = '      ';
        $nummer =4;
        $post = new Post($con, $userLoggedIn);
        $post->submitPics($_POST['post_texts'], 'none',$nummer, $imageName);

    }
    elseif($uploadOk = true && $_POST['post_texts'] !="" && $_FILES['fileToUpload']['size'] > 1){
        $nummer =4;
        $post = new Post($con, $userLoggedIn);
        $post->submitPics($_POST['post_texts'], 'none',$nummer, $imageName);

    }

    elseif($uploadOk) {
        $nummer =4;
        $post = new Post($con, $userLoggedIn);
        $post->submitPost($_POST['post_texts'], 'none',$nummer, $imageName);
    }
    else {
        /***********************************************************
        HTML,CSS - Ausgabefeld für den Suchbalken
         ***********************************************************/
        echo "<div style='text-align:center;' class='alert alert-danger'>
				$errorMessage
			</div>";
    }



}

?>

<!--Startseite-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Startseite</title>
        <link href="startseite.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="startseite.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Required meta tags -->

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>

    <div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="../index.php"> <img src="../Bilder/Ones_Logo_noback_NEU.png" id="ones" width="55" height="45" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" >

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="margin-right:40px;" href="startseite.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="margin-right:40px;" href="../posts/posts.php">Posts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="margin-right:40px;" href="../chats/chats.php">Chats</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="margin-right:40px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../info/info.php" >Info</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../datenbank/logout.php">Abmelden</a>
                    </div>
                </li>
            </ul>

                <form action="" method="POST" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" id='search_text_input' name='q' type="search" autocomplete='off' onkeyup='getUsers(this.value, "<?php echo $userLoggedIn; ?>")' placeholder="Search" aria-label="Search">
                    <?php
                    /***********************************************************
                             HTML,CSS - Ausgabefeld des Suchbalkens
                     ***********************************************************/

                    echo "<div class='results' class=\"form-inline my-2 my-lg-0\" style='position: absolute;background-color: white;'></div>";
                    ?>
                </form>

        </div>
    </nav>
    </div>


    <div id="second">
        <div id="content0-1">
            <form class="post_form" id="post_startseite" class="postings" action="" method="POST" enctype="multipart/form-data">
                <textarea rows="4" cols="100" name="post_text4" id="post_text4" placeholder="Hast irgendetwas zum Posten?"></textarea>
                <input style="    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 90%;" type="submit" name="post" id="post_button" value="Posten">
            </form>
            <button href="#" id="signin" class="signin" style="background-color: grey;">Forum schließen</button>
            <button id="content1-1-o" style="background-color: grey;">Bilder uploaden</button>
            <hr>
        </div>
        <div id="content1-1">
            <form class="post_form" id="post_startseite" action="" method="POST" enctype="multipart/form-data">
                <textarea rows="4" cols="100" name="post_texts" id="post_texts" placeholder="Hast irgendetwas zum Posten?"></textarea>
                <br><input style="    background-color: #4CAF50;
    padding: 14px 20px;
    width: 45%;" type="file" name="fileToUpload" id="fileToUpload">
                <input style="background-color: #4CAF50;
    color: white;
    padding: 17px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 45%;" type="submit" name="postsss" id="post_buttoncool" value="Posten">
            </form>
            <button style="width: 90%;   background-color: grey;  padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;" id="content1-1-z">Forum zum Text senden</button>
            <hr>
        </div>


        <div class="section">
            <?php

            $numpo=4;
            $post = new Post($con, $userLoggedIn);
            $post->loadPosts($numpo);

            ?>
        </div>
        <br>
        <br>
    </div>




    </body>
</html>