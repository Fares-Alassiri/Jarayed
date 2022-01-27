<?php if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");
        if(isset($_SESSION['type']))
            if($_SESSION['type'] != 'cheif_editor')
                header ("Location: login.php?error=you must sign first");
        if(isset($_SESSION['type']))
            if($_SESSION['type'] != 'reader')
                header ("Location: login.php?error=you must sign first");
        if(isset($_SESSION['type']))
            if($_SESSION['type'] != 'Journalist')
                header ("Location: login.php?error=you must sign first");
        
        
        
        
        ?>
                
                
                
                
                <?php

$type = "Journalist";
if($type == "Journalist")
        echo 'yes';

?>