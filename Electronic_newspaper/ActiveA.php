<?php

    $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $ida = isset($_POST['ida'])?$_POST['ida']:"";
    $query5 = "UPDATE `article` SET `Article_published`='true' WHERE Article_ID = ".$ida."";
    if($ida != ""){
        mysqli_query($con, $query5);
    }
    header("Location: CheifAccount.php");
    mysqli_close($con);
?>