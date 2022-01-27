<?php session_start(); if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jarayed</title>
    <link rel="stylesheet" href="CSS/homeStyle.css" type="text/css">
    <style>.show{
        background-color: #0cffad;
        padding: 1% 10% 1% 10%;
        border: none;
        border-radius: 3px;
        margin-left: -4%;
        margin-bottom: 3%;
    }
    .cardhome{

        text-align: center;
    margin-left: 4%;
    background-color: rgb(255, 255, 255);
    box-shadow: 0px 0px 30px rgba(62, 61, 61, 0.1);
    margin-left: 18%;
    margin-top: 6%;
    border-radius: 3%;
    padding-left: -19px;
    width: 69%;
    border-radius: 4%;
    padding-left: 12%;
    padding-right: 12%;
    padding-top: 3%;

    }
    </style>
</head>
<body>
    <section class="head1">
        <span class="head">
            <span class="home-title" style="margin-right: 30%;">Jarayed</span>
            
                <span class="grey now">
                    home 
                </span>
                    <span class="grey"><a href="account.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="10.278" height="11.437" viewBox="0 0 10.278 11.437">
                    <defs><style>.a{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;}</style></defs>
                    <g transform="translate(-5.5 -4)">
                        <path class="a" d="M15.278,25.979v-1.16A2.319,2.319,0,0,0,12.958,22.5H8.319A2.319,2.319,0,0,0,6,24.819v1.16" transform="translate(0 -11.042)"/>
                        <path class="a" d="M16.639,6.819A2.319,2.319,0,1,1,14.319,4.5,2.319,2.319,0,0,1,16.639,6.819Z" transform="translate(-3.681)"/>
                    </g>
                </svg>
                my account</a>
            </span>
        </span>
    </section>
    <section style="margin-left: 5%;">
        <p style="font-size: large ; margin-left: 5%;"><strong>sections</strong></p>
        <span class="one"><a href="indexR.php" >Tech</a></span>
        <span class="two"><a href="index2R.php">Sports</a></span>
        <span class="two now">Policy</span>
        <span class="two"><a href="index4R.php">news</a></span>
    </section>
    
    <section id="Articles" style="margin-left: 5%;
margin-top: 3%;
max-height: 100%;
overflow: scroll;
border-style: none;
text-align: center;
margin-right: 5%;
margin-bottom: 2%;
border-radius: 50px;
background-color: #f4f4f4 ;" > 
    <?php 
            $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
            if (mysqli_connect_errno($con))
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result2 = mysqli_query($con, "SELECT * FROM article WHERE Article_published = 'true' AND Article_section = 'Policy'");
            echo "<div>";
		while($row2 = mysqli_fetch_array($result2)) {
            echo "<div style='text-align: center;margin-left: 4%' class='cardhome' >";
		 	echo "<div > ";
	 	echo "".$row2['Article_title']."</div>";
			echo   '
                                 <form action="index3R.php" method="post">
                                   <input type="hidden" name="idS" value="'.$row2['Article_ID'].'">
                                  <input class="show" type="submit" name="submit" value="Show">
                                   </form>
                               ';
	 	echo "</div>"; }
		echo "</div>";
                
            $ids = isset($_POST['idS']) ? $_POST['idS']  :"";
            
            if($ids != ""){
                header("Location: Topic-Account.php?aID= ".$ids."");
            }
            mysqli_close($con);
            ?> 
    </section>
</body>
</html>
