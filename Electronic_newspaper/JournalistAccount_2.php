<?php 
    
    $ids = isset($_POST['idS']) ? $_POST['idS']  :"";
            
    if($ids != ""){
        header("Location: how.php?aID= ".$ids."");
    }
    
?>
