<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $title = isset($_POST['search'])? $_POST['search']: "";
    $where = isset($_POST['where']) ? $_POST['where'] :"";
    if($where == "unpublished"){
        $iid = isset($_SESSION['ID'])?$_SESSION['ID']:"";
        $result9 = mysqli_query($con, "SELECT * FROM `article` WHERE Article_title = '".$title."' AND Journalist_ID = ".$iid." AND Article_published = 'false'");
        if($row9 = mysqli_fetch_array($result9)){
            $idaa = $row9['Article_ID'];
            header("Location: how.php?aID=".$idaa."");
        }
        else
            header("Location: JournalistAccount.php?error=not found");
        
    }
    if($where == "published"){
        $iid = isset($_SESSION['ID'])?$_SESSION['ID']:"";
        $result9 = mysqli_query($con, "SELECT * FROM `article` WHERE Article_title = '".$title."' AND Journalist_ID = ".$iid." AND Article_published = 'true'");
        if($row9 = mysqli_fetch_array($result9)){
            $idaa = $row9['Article_ID'];
            header("Location: Topic-Account.php?aID=".$idaa."");
        }
        else
            header("Location: JournalistAccount.php?error=not found");
        
    }
    mysqli_close($con);