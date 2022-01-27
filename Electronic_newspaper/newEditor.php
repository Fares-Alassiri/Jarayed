<?php session_start(); if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");
        if(isset($_SESSION['type']))
            if($_SESSION['type'] != 'cheif_editor')
                header ("Location: login.php?error=you must sign first");?><!DOCTYPE html>

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
    <link href="CSS/homeStyle.css" rel="stylesheet" type="text/css">
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
                <a  href="indexR.php">home</a> 
            </span>
            <a href="login.php"><span class="grey" style="padding-left: 25px;">
                
                back 
            </span>
            </a>
        </span>
    </section>
    <section class="login" id="two">
        <br>
        <p style="text-align: center;">Welcome, Cheif Editor</p>
        <p style="text-align: center;"><strong>Creat your own password</strong></p>
        <form action="newEditorSession.php" method="POST" style="margin-top: 0px; position: relative; top: -20px;">
        <p><span><input type="password" name="password" style="border: none;background-color: #F7F7F8; height: 130%; position: relative;top: -10px; margin-left: 18%; width: 60.8%; margin-right: 18%;"  required placeholder="new password" ></textarea></span></p>
        <p style="position: relative; top: -10px;"><input type="submit" style="background-color:#000000 ;color: #FFFFFF; margin-left: 17.5%; padding-left: 28.5%; padding-right: 28.5%; margin-right: 18%; height: 300%; padding-top: 15px; padding-bottom: 15px;
            border-radius: 100px;" value="Creat"></p>
        </form>
    </section>
</body>
</html>
