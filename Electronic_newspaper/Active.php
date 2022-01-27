<?php session_start();
if(isset($_SESSION['type']))
            if($_SESSION['type'] != 'cheif_editor')
                header ("Location: login.php?error=you must sign first");
    $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $id2 = isset($_POST['idA']) ? $_POST['idA'] : "" ;
    if($id2 != ""){
        mysqli_query($con, "UPDATE `journalist` SET `Active`='true' WHERE Journalist_ID = ".$id2."");
    }
    header("Location: CheifAccount.php");
    mysqli_close($con);
?>