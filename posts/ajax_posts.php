<?php

include("../central/User.php");
include("../posts/Post.php");
include '../central/header.php';



if(isset($_POST['post_text'])){

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
                echo "yes";//image uploaded okay
            }
            else {
                echo "no";
                $uploadOk = 0;
            }
        }

    }

    if($uploadOk) {
        $nummer =1;
        $post = new Post($con, $userLoggedIn);
        $post->submitPost($_POST['post_text'], 'none',$nummer, $imageName);
    }
    else {

        /***********************************************************
                CSS,HTML - Fehlermeldung, falls es nicht gepostet werden kann
         ***********************************************************/

        echo "<div style='text-align:center;' class='alert alert-danger'>
				$errorMessage
			</div>";
    }
}

if(isset($_POST['post_text2'])){



    $uploadOk = 1;
    $imageName = $_FILES['fileToUpload2']['name'];
    $errorMessage = "";

    if($imageName != "") {
        $targetDir = "../Bilder/posts/";
        $imageName = $targetDir . uniqid() . basename($imageName);
        $imageFileType = pathinfo($imageName, PATHINFO_EXTENSION);

        if($_FILES['fileToUpload2']['size'] > 10000000) {
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
            if(move_uploaded_file($_FILES['fileToUpload2']['tmp_name'], $imageName)) {
                //image uploaded okay
            }
            else {
                //image did not upload
                $uploadOk = 0;
            }
        }

    }

    if($uploadOk) {
        $nummer =2;
        $post = new Post($con, $userLoggedIn);
        $post->submitPost($_POST['post_text2'], 'none',$nummer, $imageName);
    }
    else {

        /***********************************************************
        CSS,HTML - Fehlermeldung, falls es nicht gepostet werden kann
         ***********************************************************/
        echo "<div style='text-align:center;' class='alert alert-danger'>
				$errorMessage
			</div>";
    }





}


if(isset($_POST['post_text3'])){




    $uploadOk = 1;
    $imageName = $_FILES['fileToUpload3']['name'];
    $errorMessage = "";

    if($imageName != "") {
        $targetDir = "../Bilder/posts/";
        $imageName = $targetDir . uniqid() . basename($imageName);
        $imageFileType = pathinfo($imageName, PATHINFO_EXTENSION);

        if($_FILES['fileToUpload3']['size'] > 10000000) {
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
            if(move_uploaded_file($_FILES['fileToUpload3']['tmp_name'], $imageName)) {
                //image uploaded okay
            }
            else {
                //image did not upload
                $uploadOk = 0;
            }
        }

    }

    if($uploadOk) {
        $nummer =3;
        $post = new Post($con, $userLoggedIn);
        $post->submitPost($_POST['post_text3'], 'none',$nummer, $imageName);
    }
    else {
        /***********************************************************
        CSS,HTML - Fehlermeldung, falls es nicht gepostet werden kann
         ***********************************************************/
        echo "<div style='text-align:center;' class='alert alert-danger'>
				$errorMessage
			</div>";
    }
}

if(isset($_POST['post_text4'])){

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
                echo "yes";//image uploaded okay
            }
            else {
                echo "no";
                $uploadOk = 0;
            }
        }

    }

    if($uploadOk) {
        $nummer =4;
        $post = new Post($con, $userLoggedIn);
        $post->submitPost($_POST['post_text4'], 'none',$nummer, $imageName);
    }
    else {

        /***********************************************************
        CSS,HTML - Fehlermeldung, falls es nicht gepostet werden kann
         ***********************************************************/

        echo "<div style='text-align:center;' class='alert alert-danger'>
				$errorMessage
			</div>";
    }
}
