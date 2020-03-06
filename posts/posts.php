<?php

include("../central/User.php");
include("../posts/Post.php");
include '../central/header.php';
include '../chats/Chat.php';


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
        $nummer =1;
        $post = new Post($con, $userLoggedIn);
        $post->submitPics($_POST['post_texts'], 'none',$nummer, $imageName);

    }
    elseif($uploadOk = true && $_POST['post_texts'] !="" && $_FILES['fileToUpload']['size'] > 1){
        $nummer =1;
        $post = new Post($con, $userLoggedIn);
        $post->submitPics($_POST['post_texts'], 'none',$nummer, $imageName);

    }

    elseif($uploadOk) {
        $nummer =1;
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


if(isset($_POST['postsss2'])){

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
        $nummer =2;
        $post = new Post($con, $userLoggedIn);
        $post->submitPics($_POST['post_texts'], 'none',$nummer, $imageName);

    }
    elseif($uploadOk = true && $_POST['post_texts'] !="" && $_FILES['fileToUpload']['size'] > 1){
        $nummer =2;
        $post = new Post($con, $userLoggedIn);
        $post->submitPics($_POST['post_texts'], 'none',$nummer, $imageName);

    }

    elseif($uploadOk) {
        $nummer =2;
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

if(isset($_POST['postsss3'])){

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
        $nummer =3;
        $post = new Post($con, $userLoggedIn);
        $post->submitPics($_POST['post_texts'], 'none',$nummer, $imageName);

    }
    elseif($uploadOk = true && $_POST['post_texts'] !="" && $_FILES['fileToUpload']['size'] > 1){
        $nummer =3;
        $post = new Post($con, $userLoggedIn);
        $post->submitPics($_POST['post_texts'], 'none',$nummer, $imageName);

    }

    elseif($uploadOk) {
        $nummer =3;
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



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Posts</title>
        <link href="posts.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="posts.js"></script>

        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!--script src="https://malsup.github.io/jquery.form.js"></script-->
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="../index.php"> <img src="../Bilder/Ones_Logo_noback_NEU.png" id="ones" width="55" height="45" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" >

            <ul class="navbar-nav ml-auto" >
                <li class="nav-item ">
                    <a class="nav-link" style="margin-right:40px;" href="../startseite/startseite.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="margin-right:40px;" href="posts.php">Posts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="margin-right:40px;" href="../chats/chats.php">Chats</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="margin-right:40px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../info/info.php" >Info</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../datenbank/logout.php">Abmelden</a>
                    </div>
                </li>

            </ul>
                <form class="form-inline my-2 my-lg-0" action="" method="POST">
                <input class="form-control mr-sm-2" id='search_text_input' name='q' type="search" autocomplete='off' onkeyup='getUsers(this.value, "<?php echo $userLoggedIn; ?>")' placeholder="Search" aria-label="Search">
                <?php
                /***********************************************************
                        HTML,CSS - Ausgabefeld für den Suchbalken
                 ***********************************************************/
                echo "<div class='results' class=\"form-inline my-2 my-lg-0\" style='position: absolute;background-color: white;'></div>";
                ?>
                </form>
        </div>


    </nav>




        <div class="flex-container">
            <div class="wrapper">
                <div class="post_box">
                    <div class="login_header">
                        <h1>Hausübungen</h1>
                    </div>
                    <br>
                    <div id="first">
                        <form action="posts.php" method="POST">
                            <a href="#" id="signup" class="signup" >Forum starten</a>
                            <br>
                            <img src="../Bilder/hu.png" class="pics">
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>

            <div class="wrapper">
                <div class="post_box2">
                    <div class="login_header2">
                        <h1>Tipps & Tricks</h1>
                    </div>
                    <br>
                    <div id="first2">
                        <form action="posts.php" method="POST">
                            <a  href="#" id="signup2" class="signup2" >Forum starten</a>
                            <br>
                            <img src="../Bilder/bulb.png" class="pics">
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>

            <div class="wrapper">
                <div class="post_box3">
                    <div class="login_header3">
                        <h1>Freizeit</h1>
                    </div>
                    <br>
                    <div id="first3">
                        <form action="posts.php" method="POST">
                            <a href="#" id="signup3" class="signup3" >Forum starten</a>
                            <br>
                            <img src="../Bilder/sports.png" class="pics">
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="second">
        <div id="content0-1">
            <form class="post_form" id="posters" class="postings" action="" method="POST" enctype="multipart/form-data">
                <textarea rows="4" cols="100" name="post_text" id="post_text" placeholder="Hast irgendetwas zum Posten?"></textarea>
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
                    <form class="post_form" id="posterss" action="posts.php" method="POST" enctype="multipart/form-data">
                        <textarea rows="4" cols="100" name="post_texts" id="post_texts" placeholder="Hast irgendetwas zum Posten?"></textarea>
                        <input style="    background-color: #4CAF50;
    padding: 14px 20px;
    width: 45%;" type="file" name="fileToUpload" id="fileToUpload">
                        <input style="    background-color: #4CAF50;
    color: white;
    padding: 17px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 20%;" type="submit" name="postsss" id="post_buttoncool" value="Posten">
                    </form>
                <button style="width: 90%;   background-color: grey;  padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;" id="content1-1-z">Forum zum Text senden</button>
                <hr>
        </div>


                <div class="section">
                    <?php

                    $numpo=1;
                    $post = new Post($con, $userLoggedIn);
                    $post->loadPosts($numpo);

                    ?>
                </div>
                <br>
                <br>
        </div>

        <div id="second2">
            <div id="content0-2">
            <form class="post_form2" id="posters2" class="postings" action="" method="POST" enctype="multipart/form-data">
                <textarea rows="4" cols="100" name="post_text2" id="post_text2" placeholder="Hast irgendetwas zum Posten?"></textarea>
                <input style="    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 90%;" type="submit" name="post2" id="post_button2" value="Posten">
            </form>
                <button href="#" id="signin2" class="signin2" style="background-color: grey;">Forum schließen</button>
                <button id="content2-2-o" style="background-color: grey;">Bilder uploaden</button>
                <hr>
            </div>
            <!-- The Modal -->
            <div id="content2-2">
                <form class="post_form" id="posterss2" action="posts.php" method="POST" enctype="multipart/form-data">
                    <textarea rows="4" cols="100" name="post_texts" id="post_texts2" placeholder="Hast irgendetwas zum Posten?"></textarea>
                    <input style="    background-color: #4CAF50;
    padding: 14px 20px;
    width: 45%;" type="file" name="fileToUpload" id="fileToUpload2">
                    <input style="    background-color: #4CAF50;
    color: white;
    padding: 17px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 20%;" type="submit" name="postsss2" id="post_buttoncool2" value="Posten">
                </form>
                <button style="width: 90%;   background-color: grey;  padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;" id="content2-2-z">Forum zum Text senden</button>
                <hr>
            </div>

            <div class="section2">
                    <?php

                    $numpo=2;
                    $post = new Post($con, $userLoggedIn);
                    $post->loadPosts($numpo);

                    ?>
                </div>
                <br>
                <br>

        </div>

        <div id="second3">
            <div id="content0-3">

            <form class="post_form3" id="posters3" class="postings" action="" method="POST" enctype="multipart/form-data">

                <textarea rows="4" cols="100" name="post_text3" id="post_text3" placeholder="Hast irgendetwas zum Posten?"></textarea>
                <input style="    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 90%;" type="submit" name="post3" id="post_button3" value="Posten">

            </form>
                <button href="#" id="signin3" class="signin3"style="background-color: grey;">Forum schließen</button>
                <button id="content3-3-o" style="background-color: grey;">Bilder uploaden</button>
                <hr>
            </div>
            <!-- The Modal -->
            <div id="content3-3">

               <form class="post_form" id="posterss3" action="posts.php" method="POST" enctype="multipart/form-data">

                        <textarea rows="4" cols="100" name="post_texts" id="post_texts3" placeholder="Hast irgendetwas zum Posten?"></textarea>
                   <input style="    background-color: #4CAF50;
    padding: 14px 20px;
    width: 45%;" type="file" name="fileToUpload" id="fileToUpload3">
                   <input style="    background-color: #4CAF50;
    color: white;
    padding: 17px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 20%;" type="submit" name="postsss3" id="post_buttoncool3" value="Posten">
                    </form>
                <button style="width: 24%;   background-color: grey;  padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;" id="content3-3-z">Forum zum Text senden</button>
                <hr>

            </div>

                <div class="section3">
                    <?php

                    $numpo=3;
                    $post = new Post($con, $userLoggedIn);
                    $post->loadPosts($numpo);

                    ?>
                </div>
                <br>
                <br>
        </div>

    </body>
</html>