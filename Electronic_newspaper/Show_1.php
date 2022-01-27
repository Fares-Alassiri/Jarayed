<?php 
session_start(); if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");
        if(isset($_SESSION['type']))
            if($_SESSION['type'] != 'cheif_editor')
                header ("Location: login.php?error=you must sign first");?><?php
    $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

$idr = isset($_POST['aIDr'])?$_POST['aIDr']:"";
                if($idr != ""){
                    $resu = mysqli_query($con, "DELETE FROM `article` WHERE Article_ID = ".$idr."");
                    $que = "DELETE FROM `comment` WHERE Article_ID = ".$idr."";
                    mysqli_query($con, $que);
                    $que3 = "DELETE FROM `video` WHERE Article_ID = ".$idr."";
                    mysqli_query($con, $que3);
                    $que4 = "DELETE FROM `image` WHERE Article_ID = ".$idr."";
                    mysqli_query($con, $que4);
                    header("Location: CheifAccount.php");
                }
?>