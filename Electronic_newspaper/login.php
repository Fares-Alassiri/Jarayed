<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script> 
        $(document).ready(function(){
            $("#two").animate({
                left: '0px'
            });
        });
    </script> 
</head>
<body>
    <section class="head1">
        <span class="head">
            <span class="home-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="grey">
                <a  href="index.php">home</a> 
            </span>
            <a href="index.php"><span class="grey" style="padding-left: 25px;">
                back 
            </span>
            </a>
        </span>
    </section>
    <section class="login" id="two" >
        <br>
        <p style="text-align: center; color: red"><?php if(isset($_GET['error'])){
                                                print $_GET['error'];
                                            }
                                        ?></p>
        <p style="text-align: center;">Welcome Back</p>
        <p style="text-align: center;"><strong>login</strong></p>
        <form action="LoginSession.php" method="POST" style="margin-top: 0px; position: relative; top: -20px;">
        <p><span><input type="text" name="email" style="border: none;background-color: #F7F7F8; height: 130%; margin-left: 18%; width: 60.8%; margin-right: 18%; position: relative ;top: -5px;"  required placeholder="email" ></textarea></span></p>
        <p><span><input type="password" name="password" style="border: none;background-color: #F7F7F8; height: 130%; position: relative;top: -10px; margin-left: 18%; width: 60.8%; margin-right: 18%;"  required placeholder="password" ></textarea></span></p>
        <p style="text-align: center; position: relative; top: -15px;"><input type="radio" name="typeOfLogin" value="reader" required> Reader | <input type="radio" name="typeOfLogin" value="Journalist" required> Journalist | <input type="radio" name="typeOfLogin" value="cheif_editor" required> Cheif Editor </p>
        <p style="position: relative; top: -10px;"><input type="submit" style="background-color:#000000 ;color: #FFFFFF; margin-left: 17.5%; padding-left: 28.5%; padding-right: 28.5%; margin-right: 18%; height: 300%; padding-top: 15px; padding-bottom: 15px;
            border-radius: 100px;" value="login"></p>
        </form>
        
        <p style="text-align: center; position: relative; top: -25px;">you are new here?<br><span><a href="register.php" style="text-decoration: underline;" >creat your account now</a></span></p>
    </section>
</body>
</html>