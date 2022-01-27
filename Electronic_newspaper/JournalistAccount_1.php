<?php 
    
    $ids = isset($_POST['idS']) ? $_POST['idS']  :"";
            
    if($ids != ""){
        header("Location: Topic-Account.php?aID= ".$ids."");
    }
    
?>
