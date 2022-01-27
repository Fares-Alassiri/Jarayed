<?php session_start(); if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_SESSION['sign']))
    if($_SESSION['sign'] == 'true')
        $_SESSION['sign'] = 'false';
header("Location: index.php");

?>