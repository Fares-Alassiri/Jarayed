<?php

    session_start();
    
    $password = isset($_POST["password"]) ? $_POST["password"]:"";
    $email = isset($_POST["email"]) ? $_POST["email"]:"" ;
    
    $type = isset($_POST["typeOfLogin"]) ? $_POST["typeOfLogin"] : "" ;
    $name = isset($_POST["name"]) ? $_POST["name"]:"";
    
    $_SESSION["email"]= $email;
    $_SESSION["password"]= $password;
    $_SESSION["type"]= $type;
    $_SESSION["name"]= $name;
    
    $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if($type == "Journalist")
        $query1 = "SELECT Journalist_email FROM ".$type." WHERE Journalist_email='".$email."'" ;
    else
        $query1 = "SELECT Reader_email FROM reader WHERE Reader_email='".$email."'" ;
    $result = mysqli_query($con, $query1);
    
    if(mysqli_num_rows($result)==1){
        header("Location: register.php?error=Email is already used");
    }
    else{
        if($type == "Journalist")
            $query = "INSERT INTO `journalist`(`Journalist_ID`, `Journalist_name`, `Journalist_email`, `Journalist_password`, `Active`) VALUES (NULL,'".$name."','".$email."','".$password."','false')";
        else
            $query = "INSERT INTO `reader`(`Reader_ID`, `Reader_name`, `Reader_email`, `Reader_password`) VALUES (NULL,'".$name."','".$email."','".$password."')" ;
        
        mysqli_query($con, $query);
        if($type == "Journalist"){
            $_SESSION["Active"] = mysqli_query($con, "SELECT Active FROM journalist WHERE Journalist_email='".$email."'");
        }
        header("Location: login.php");
    }
    mysqli_close($con);
    
?>