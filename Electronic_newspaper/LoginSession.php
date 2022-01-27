<?php

    session_start();
    
    $password = isset($_POST["password"]) ? $_POST["password"]:"";
    $email = isset($_POST["email"]) ? $_POST["email"]:"" ;
    $type = isset($_POST["typeOfLogin"]) ? $_POST["typeOfLogin"] : "" ;
    
    $_SESSION["email"]= $email;
    $_SESSION["password"]= $password;
    $_SESSION["type"]= $type;
    
    
    $_SESSION["sign"]='false';
    
    $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    if($type == "Journalist")
        $query = "SELECT `Journalist_ID` FROM `journalist` WHERE Journalist_email = '".$email."' AND Journalist_password = '".$password."'" ;
    if($type == "reader")
        $query = "SELECT `Reader_ID` FROM `reader` WHERE Reader_email = '".$email."' AND Reader_password = '".$password."'" ;
    if($type == "cheif_editor")
        $query = "SELECT `Cheif_ID` FROM `cheif_editor` WHERE Cheif_email = '".$email."' AND Cheif_password = '".$password."'" ;
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result)==1){
        $_SESSION["sign"]='true';
        if($type == "Journalist"){
            $result5 = mysqli_query($con, "SELECT * FROM `journalist` WHERE Journalist_email = '".$email."'");
            $row5 = mysqli_fetch_array($result5);
            $_SESSION["Name"] = $row5['Journalist_name'];
            if($row5['Active']=="true"){
                $_SESSION["Active"] = "true";
            }
            else if ($row5['Active']=="false"){
               $_SESSION["Active"] = "false";
               $_SESSION["sign"]='false';
               header("Location: login.php?error=wait until cheif editor active your account");
               die();
            }
            $result2 = mysqli_query($con, "SELECT * FROM `journalist` WHERE Journalist_email = '".$email."'");
            $row2 = mysqli_fetch_array($result2);
            $_SESSION["ID"] = $row2['Journalist_ID'];
        }
        if($type == "reader"){
            $result5 = mysqli_query($con, "SELECT * FROM `reader` WHERE Reader_email = '".$email."'");
            $row5 = mysqli_fetch_array($result5);
            $_SESSION["Name"] = $row5['Reader_name'];
            $result = mysqli_query($con, "SELECT * FROM `reader` WHERE Reader_email = '".$email."'");
            $row = mysqli_fetch_array($result);
            $_SESSION["ID"] = $row['Reader_ID'];
        }
        if($type == "cheif_editor"){
            $result5 = mysqli_query($con, "SELECT  * FROM `cheif_editor` WHERE Cheif_email = '".$email."'");
            $row5 = mysqli_fetch_array($result5);
            $_SESSION["Name"] = $row5['Cheif_name'];
            $result = mysqli_query($con, "SELECT  * FROM `cheif_editor` WHERE Cheif_email = '".$email."'");
            $row = mysqli_fetch_array($result);
            $_SESSION["ID"] = $row['Cheif_ID'];
        }
        if($type == "cheif_editor" && $password == "asdf1234"){
            $email1 = "".$email."";
            header("Location: newEditor.php?email=".$email1."");
        }
        else{
            $email1 = "".$email."";
            $ID = isset($_SESSION['ID'])?$_SESSION['ID']:"";
            header("Location: indexR.php?email=".$email1."?id=".$ID."?name=".$_SESSION["Name"]."");
        }
    }
    else {
        header("Location: login.php?error=Username or Password Wrong");
    }
    
    mysqli_close($con);
    
?>