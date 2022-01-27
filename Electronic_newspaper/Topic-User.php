<?php
    $aID = isset($_GET['aID'])? $_GET['aID'] : die() ;
    
    $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $result = mysqli_query($con, "SELECT * FROM article WHERE Article_ID = ".$aID."");
    
    $row = mysqli_fetch_array($result);
    
    $subject = $row['Article_title'];
    $topic = $row['Article_paragraph'];
    $journalist = $row['Journalist_ID'];
    
    
    
    
    /*
    require_once "./database.php";
    $st = $mysqli->prepare("select * from article");
    $article = $st->execute();
    $article = $st->get_result()->fetch_array(MYSQLI_ASSOC);
    $article_title = $article["Article_title"];
    $article_content = $article["Article_paragraph"];
    $article_id = $article["Article_ID"];
    $a7a = "SELECT * FROM `comment`";
    $c = $mysqli->prepare($a7a);
    $comments = $c->execute();
    $comments = $c->get_result()->fetch_all(MYSQLI_ASSOC);
    */
?>


<html>
    <head>
        <title>Article page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="Simple Writer Website"/>
        <link rel="stylesheet" href="CSS/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="CSS/homeStyle.css" type="text/css">
        <style type="text/css">
            body {
                margin-left: 25px;
            }
        </style>
    </head>
        
    <body>
        <section class="head1">
            <span class="head">
                <span class="home-title" style="margin-right: 30%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                
                    <span class="grey">
                        <a  href="index.php">home</a> 
                    </span>
                        <span class="grey"><a href="login.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10.278" height="11.437" viewBox="0 0 10.278 11.437">
                        <defs><style>.a{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;}</style></defs>
                        <g transform="translate(-5.5 -4)">
                            <path class="a" d="M15.278,25.979v-1.16A2.319,2.319,0,0,0,12.958,22.5H8.319A2.319,2.319,0,0,0,6,24.819v1.16" transform="translate(0 -11.042)"/>
                            <path class="a" d="M16.639,6.819A2.319,2.319,0,1,1,14.319,4.5,2.319,2.319,0,0,1,16.639,6.819Z" transform="translate(-3.681)"/>
                        </g>
                    </svg>
                    login</a>
                </span>
            </span>
        </section>
        <section>
            <section style="margin-left: 3%; text-align: center;"><span class="grey" id="ReviewTitle"> <?php echo $subject; ?> </span></section>
            <section >
                <?php
                    $result6 = mysqli_query($con, "SELECT * FROM image WHERE Article_ID = ".$aID."");
                    while($row6 = mysqli_fetch_array($result6)){
                        $path = $row6['Image_path'];
                        echo '<span style="margin-left: 5px; margin-top: 5%;">';
                        echo '<img alt="img" src="'.$path.'" heigh="30%" width="30%" style="margin-left: 33%; margin-top: 3%;">';
                        echo "</span><br><hr>";
                    }
                ?>
            </section>
            <section >
                <?php
                    $result7 = mysqli_query($con, "SELECT * FROM video WHERE Article_ID = ".$aID."");
                    while($row7 = mysqli_fetch_array($result7)){
                        $path = $row7['video_path'];
                        echo '<span style="margin-left: 5px; margin-top: 5%;">';
                        echo '<video controls  heigh="30%" width="30%" style="margin-left: 33%; margin-top: 3%;"><source src="'.$path.'" type="video/mp4"></video>';
                        echo "</span><br><hr>";
                    }
                ?>
            </section>
            <section style="margin-left: 3%; text-align: center; margin-top: 20px;"><span class="grey" id="Topic"> <?php echo $topic;?> </span></section>
            
            <section style="margin-left: 25%; margin-right: 25%; border-style: solid; padding: 20px; margin-top: 2%; max-height: 50%;overflow: scroll">
                <p style="margin-bottom: 20px; font-size: 20px;">comments:</p>
                <?php
                    $result2 = mysqli_query($con, "SELECT * FROM comment WHERE Article_ID = ".$aID."");
                    while($row2 = mysqli_fetch_array($result2)){
                        $content = $row2['Comment_content'];
                        $creatorID = $row2['Creator_ID'];
                        
                        $result3 = mysqli_query($con, "SELECT * FROM comment_creator WHERE Creator_ID = ".$creatorID." AND Table_Creator = 'reader'");
                        if($row3 = mysqli_fetch_array($result3)){
                            $IDC = $row3['ID_of_creator'];
                        
                            $result4 = mysqli_query($con, "SELECT * FROM reader WHERE Reader_ID = ".$IDC."");
                            if($row4 = mysqli_fetch_array($result4)){
                                $name = $row4['Reader_name'];

                                echo '<span id="comments-div" style="margin-left: 5px; margin-top: 3%;">';
                                echo $name.": ".$content;
                                echo "</span><br><hr>";
                            }
                            
                        }
                        
                    }
                    mysqli_close($con);
                ?>
            </section>
        </section>
        <div id="footer"></div>
    </body>
</html>