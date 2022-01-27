<?php session_start(); if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");
        if(isset($_SESSION['type']))
            if($_SESSION['type'] != 'Journalist')
                header ("Location: login.php?error=you must sign first");
        
            ?><html>
    <head>
        <title>New Article</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="Simple Writer Website"/>
        <link rel="stylesheet" href="CSS/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="CSS/homeStyle.css" type="text/css">
        <script type="text/javascript">                   
            alert("do not exceed 255 letter in topic area");            
        </script>
    </head>

    <body>
        <section class="head1">
            <span class="head">
                <span class="home-title" style="margin-right: 30%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                
                    <span class="grey">
                        <a  href="indexR.php">home</a> 
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
        
        <form action="makingSession.php" method="POST" enctype='multipart/form-data'>
            <div id="formdiv">
                <center><p id="title">New Article</p></center>
                <?php 
                            if(isset($_POST['aID'])){
                                $idddd = $_POST['aID'];
                                echo '<input type="hidden" name="aID" value='.$idddd.'>';
                            }
                ?>
                <input type="text" name="Subject" placeholder="Title" required>
                    <textarea id="c" name="TpoicTextArea" placeholder="Topic" cols="300" rows="100" required></textarea>
                <p>add photo(optional):<input type='file' name='images[]' accept='image/*' multiple="multiple"></p>
                <p>add video(optional):<input type='file' name='videos[]' accept='video/mp4' multiple="multiple"></p>
                <select name="section" dir="rtl" required >
                    <option  value="Tech" dir="rtl" >Tech</option>
                    <option  value="Sports" dir="rtl">Sports</option>
                    <option  value="Policy" dir="rtl">Policy</option>
                    <option  value="news" dir="rtl">news</option>
                </select> 
                <input type="submit" name="submit" value="Post" >
            </div>
        </form>
        <div id="footer"></div>
    </body>
</html>
