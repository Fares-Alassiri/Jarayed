<?php session_start(); if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");?><?php

if(isset($_POST['aIDd'])){
    echo 'hello';
    $idd = $_POST['aIDd'];
        header("Location: Topic-Account.php?aID=".$idd."");
}
?>