<?php  session_start(); if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");
        if(isset($_SESSION['type']))
            if($_SESSION['type'] != 'reader')
                header ("Location: login.php?error=you must sign first");?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my account</title>
    <link href="CSS/homeStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    <section class="head1">
            <span class="head">
                <span class="home-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="grey now">
                    <a style="color: white;" href="indexR.php">home</a>
                </span>
                <a href="logout.php"><span class="grey">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10.278" height="11.437" viewBox="0 0 10.278 11.437">
                        <defs><style>.a{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;}</style></defs>
                        <g transform="translate(-5.5 -4)">
                            <path class="a" d="M15.278,25.979v-1.16A2.319,2.319,0,0,0,12.958,22.5H8.319A2.319,2.319,0,0,0,6,24.819v1.16" transform="translate(0 -11.042)"/>
                            <path class="a" d="M16.639,6.819A2.319,2.319,0,1,1,14.319,4.5,2.319,2.319,0,0,1,16.639,6.819Z" transform="translate(-3.681)"/>
                        </g>
                    </svg>
                    log out 
                </span>
                </a>
            </span>
        </section>
    <section>
        <span class="grey" style="margin-left: 49.1%;"> Reader </span>
    </section>
    <section>
        <p id="name" style="text-align: center;"><?php  $name = isset($_SESSION['Name']) ? $_SESSION['Name'] : ""; echo $name; ?></p>
    </section>
    <section>
        <p style="font-size: large ; margin-left: 5%;"><strong> My Comments </strong></p>
        <section id="Articles" style="margin-left: 5%; border-style: solid; text-align: center; margin-right: 5%; margin-bottom: 2%; border-radius: 50px;" > 
            <?php
                    
    
                    $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
                    if (mysqli_connect_errno($con))
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $rID = isset($_SESSION['ID'])? $_SESSION['ID'] :"";
                    $result2 = mysqli_query($con, "SELECT * FROM `comment_creator` WHERE Table_Creator = 'reader' AND ID_of_creator = ".$rID."");
                    while($row2 = mysqli_fetch_array($result2)){
                        $creatorID1 = $row2['Creator_ID'];
                        $res = mysqli_query($con, "SELECT * FROM `comment` WHERE Creator_ID = ".$creatorID1."");
                        while ($row5 = mysqli_fetch_array($res)) {
                            $aIDd = $row5['Article_ID'];
                            $content2 = $row5['Comment_content'];
                            echo '<span id="comments-div" style="margin-left: 5px; margin-top: 3%;">';
                            echo $content2.": <form action='go.php' method='post'><input type='hidden' name = 'aIDd' value='".$aIDd."'><input type='submit' value='go to article'></form>";
                            echo "</span><br><hr>";
                        }
                        
                    }
                    mysqli_close($con);
                ?>
        </section>
    </section>
</body>
</html>
