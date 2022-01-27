<?php session_start(); if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");
        if(isset($_SESSION['type']))
            if($_SESSION['type'] != 'cheif_editor')
                header ("Location: login.php?error=you must sign first");?><?php
            
            include './newEditor.php';
            $password = isset($_POST["password"]) ? $_POST["password"]:"";
            $_SESSION["password"]= $password;

            $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
            if (mysqli_connect_errno($con))
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $email1 = isset($_SESSION['email']) ? $_SESSION['email'] : "";
            if($email1 == "") {
                header("Location: login.php?error=ERROR");
                mysqli_close($con);
            }
            else{
                $query = "UPDATE `cheif_editor` SET `Cheif_password`='".$password."' WHERE Cheif_email='".$email1."'";
                mysqli_query($con, $query);
                $email1 = "".$email1."";
                header("Location: indexR.php?email=".$email1."");
            }
            mysqli_close($con);
?>