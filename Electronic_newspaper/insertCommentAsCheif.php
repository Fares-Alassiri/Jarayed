<?php session_start(); if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");
        if(isset($_SESSION['type']))
            if($_SESSION['type'] != 'cheif_editor')
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
    
    
    $content = isset($_POST['content']) ? $_POST['content'] : "" ;
    $aID = isset($_POST['aID']) ? $_POST['aID'] : "" ;
    $IDC = isset($_SESSION['ID']) ? $_SESSION['ID'] :"";
    $result3 = mysqli_query($con, "SELECT * FROM comment_creator WHERE ID_of_creator = ".$IDC." AND Table_Creator = 'cheif_editor'");
    if($row3 = mysqli_fetch_array($result3)){
        $creatorID = $row3['Creator_ID'];
        mysqli_query($con, "INSERT INTO `comment` (`Comment_ID`, `Comment_content`, `Article_ID`, `Creator_ID`) VALUES (NULL, '".$content."', ".$aID.", ".$creatorID.");");
    }
    else{
        mysqli_query($con, "INSERT INTO `comment_creator`(`Creator_ID`, `Table_Creator`, `ID_of_creator`) VALUES (NULL, 'cheif_editor',".$IDC.")");
        $result4 = mysqli_query($con, "SELECT * FROM comment_creator WHERE ID_of_creator = ".$IDC." AND Table_Creator = 'cheif_editor'");
        if($row4 = mysqli_fetch_array($result4)){
            $creatorID = $row4['Creator_ID'];
            mysqli_query($con, "INSERT INTO `comment` (`Comment_ID`, `Comment_content`, `Article_ID`, `Creator_ID`) VALUES (NULL, '".$content."', ".$aID.", ".$creatorID.");");
    }
    }
    mysqli_close($con);
    header("Location: Show.php?aID=".$aID."");
?>