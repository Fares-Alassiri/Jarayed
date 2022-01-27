<?php session_start(); 
    
    

    

    if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");
        if(isset($_SESSION['type']))
            if($_SESSION['type'] == 'reader')
                header ("Location: login.php?error=you must sign first");?><?php

    /* 
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    
    $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $journalistID = isset($_SESSION['ID'])?$_SESSION['ID']:"";
    $Subject = isset($_POST['Subject'])?$_POST['Subject']:"";
    $TpoicTextArea = isset($_POST['TpoicTextArea'])?$_POST['TpoicTextArea']:"";
    $section = isset($_POST['section'])?$_POST['section']:"";
    if(isset($_POST['aID'])){
        $iddd = $_POST['aID'];
        mysqli_query($con, "UPDATE `article` SET `Article_title`='".$Subject."',`Article_paragraph`='".$TpoicTextArea."' WHERE Article_ID = ".$iddd."");
        $que2 = "DELETE FROM `comment` WHERE Article_ID = ".$iddd."";
        mysqli_query($con, $que2);
        $que3 = "DELETE FROM `video` WHERE Article_ID = ".$iddd."";
        mysqli_query($con, $que3);
        $que4 = "DELETE FROM `image` WHERE Article_ID = ".$iddd."";
        mysqli_query($con, $que4);
    }
    else
        mysqli_query($con, "INSERT INTO `article`(`Article_ID`, `Article_title`, `Article_paragraph`, `Journalist_ID`, `Article_section`, `Article_published`) VALUES (NULL ,'".$Subject."','".$TpoicTextArea."',".$journalistID.",'".$section."','false')");
    
    $result = mysqli_query($con, "SELECT  * FROM `article` WHERE Article_title = '".$Subject."'");
    $row = mysqli_fetch_array($result);
    $articleID = $row['Article_ID'];
    
    
    //insert photos to database
    
    if(isset($_POST['submit']))
    {
        $total = count($_FILES['images']['name']);

        for( $i=0 ; $i < $total ; $i++ ) {
            $path = "./images/";
            if(isset($_POST['images'][$i]))
                $path .= (string)$_POST['images'][$i];
            //Get the temp file path
            $tmpFilePath = $_FILES['images']['tmp_name'][$i];

            //Make sure we have a file path
            if ($tmpFilePath != ""){
              //Setup our new file path
                $newFilePath = "./images/" . $_FILES['images']['name'][$i];
                mysqli_query($con, "INSERT INTO `image`(`Image_ID`, `Image_path`, `Article_ID`, `Journalist_ID`) VALUES (NULL,'".$newFilePath."','".$articleID."',".$journalistID.")");
                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                  //Handle other code here

                }

            }
            
        }

        $total = count($_FILES['videos']['name']);

        for( $i=0 ; $i < $total ; $i++ ) {
            
            
            //Get the temp file path
            $tmpFilePath = $_FILES['videos']['tmp_name'][$i];
            
            
            /*$nameF = 
            
            $path = "./videos/";
            if(isset($_POST['videos'][$i]))
                $path .= (string)$_POST['videos'][$i];
            */
            
            //Make sure we have a file path
            if ($tmpFilePath != ""){
              //Setup our new file path
                $newFilePath = "./videos/" . $_FILES['videos']['name'][$i];
                mysqli_query($con, "INSERT INTO `video`(`video_ID`, `video_path`, `Article_ID`, `Journalist_ID`) VALUES (NULL,'".$newFilePath."','".$articleID."',".$journalistID.")");
                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                  //Handle other code here

                }

            }
        }
    }
    
    mysqli_close($con);
    header("Location: onway.html");
    
    

?>

