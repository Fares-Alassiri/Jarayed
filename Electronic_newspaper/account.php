<?php session_start(); if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");?>

<?php
    
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : "";
    $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if(isset($_SESSION["sign"])){
        if($_SESSION['sign'] == 'true'){
            if(isset($_SESSION['type'])){
                if($_SESSION['type']=="Journalist"){
                    $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
                    if (mysqli_connect_errno($con))
                    {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $result = mysqli_query($con, "SELECT  * FROM `journalist` WHERE Journalist_email = '".$email."'");
                    $row = mysqli_fetch_array($result);
                    if($row['Active']=="true"){
                        header ("Location: JournalistAccount.php?".$email."");
                    }
                    
                }
                 else if($_SESSION['type']=="cheif_editor"){
                    header ("Location: CheifAccount.php?".$email."");
                }
                else if($_SESSION['type']=="reader"){
                    header ("Location: readerAccount.php?".$email."");
                }
                   
            }
        }
    }
    
?>
