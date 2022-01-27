<?php session_start(); if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");
        if(isset($_SESSION['type']))
            if($_SESSION['type'] != 'Journalist')
                header ("Location: login.php?error=you must sign first");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my account</title>
    <link href="CSS/homeStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
    <section class="head1">
            <span class="head">
                <span class="home-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="grey now">
                    <a style="color: white;" href="indexR.php">home</a>
                </span>
                <a href="logout.php"><span class="grey">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10.278" height="11.437" viewBox="0 0 10.278 11.437">
                        <defs><style>.a{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;}</style></defs>
                        <g transform="translate(-5.5 -4)">
                            <path class="a" d="M15.278,25.979v-1.16A2.319,2.319,0,0,0,12.958,22.5H8.319A2.319,2.319,0,0,0,6,24.819v1.16" transform="translate(0 -11.042)"/>
                            <path class="a" d="M16.639,6.819A2.319,2.319,0,1,1,14.319,4.5,2.319,2.319,0,0,1,16.639,6.819Z" transform="translate(-3.681)"/>
                        </g>
                    </svg>
                    log out 
                </span>
                </a>
            </span>
        </section>
    <section>
        <span class="grey" style="margin-left: 49.1%;"> Journalist </span>
    </section>
    <section>
        <p id="name" style="text-align: center;"><?php  $name = isset($_SESSION['Name']) ? $_SESSION['Name'] : ""; echo $name; ?></p>
    </section>
    <section>
        <span class="grey" style="margin-left: 47%;"><a href="making.php">Create new Article</a></span>
    </section>
    <section>
        <p style="font-size: large ; margin-left: 5%;"><strong> My unpublished Articles</strong></p>
        <section id="Articles" style="max-height: 50%; overflow: scroll;margin-left: 5%; border-style: solid; text-align: center; margin-right: 5%; margin-bottom: 2%; border-radius: 50px;" > 
            <form action="Search.php" method="POST" style="margin-left: 5%;">
                <span>
                <button style="position: relative; top: -5px; border-style: none; border-radius: 50px; padding: 4px; padding-right: 30px" ><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 13.226 13.226"><defs>
                    <style>.a{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;}</style></defs>
                    <g transform="translate(-4 -4)">
                        <path class="a" d="M15.183,9.842A5.342,5.342,0,1,1,9.842,4.5a5.342,5.342,0,0,1,5.342,5.342Z" transform="translate(0 0)"/>
                    <path class="a" d="M27.879,27.879l-2.9-2.9" transform="translate(-11.361 -11.361)"/>
                    </g>
                </svg>
                </button>
                <label>
                    <input type="text" name="search"style="border: none;background-color: #F0F0F4;border-radius: 50px;  width:30%; padding: 4px; position : relative; top: -5px; left : -25px" required placeholder="Search for an Article"  >
                    <input type="hidden" name="where" value="unpublished" >
                </label>
                </span>
            </form>
            <?php 
            $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
            if (mysqli_connect_errno($con))
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $id5 = isset($_SESSION['ID'])?$_SESSION['ID']:"";
            $result2 = mysqli_query($con, "SELECT * FROM article WHERE Article_published = 'false' AND Journalist_ID = '".$id5."'");
            echo "<table style='text-align: center;margin-left: 4%'>
                    <tr>
                    <th></th>
                    <th></th>
                    </tr>";
		
		while($row2 = mysqli_fetch_array($result2)) {
			echo "<tr>";
			echo "<td>".$row2['Article_title']."</td>";
			echo   '<td>
                                    <form action="JournalistAccount_2.php" method="post">
                                    <input type="hidden" name="idS" value="'.$row2['Article_ID'].'">
                                    <input type="submit" name="submit" value="Show">
                                    </form>
                                </td>';
			echo "</tr>"; }
		echo "</table>";
                
            mysqli_close($con);
            ?>
        </section>
    </section>
    <section>
        <p style="font-size: large ; margin-left: 5%;"><strong> My published Articles</strong></p>
        <section id="Articles" style="max-height: 50%; overflow: scroll;margin-left: 5%; border-style: solid; text-align: center; margin-right: 5%; margin-bottom: 2%; border-radius: 50px;" > 
            <form action="Search.php" method="POST" style="margin-left: 5%;">
                <span>
                <button style="position: relative; top: -5px; border-style: none; border-radius: 50px; padding: 4px; padding-right: 30px" ><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 13.226 13.226"><defs>
                    <style>.a{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;}</style></defs>
                    <g transform="translate(-4 -4)">
                        <path class="a" d="M15.183,9.842A5.342,5.342,0,1,1,9.842,4.5a5.342,5.342,0,0,1,5.342,5.342Z" transform="translate(0 0)"/>
                    <path class="a" d="M27.879,27.879l-2.9-2.9" transform="translate(-11.361 -11.361)"/>
                    </g>
                </svg>
                </button>
                <label>
                    <input type="text" name="search"style="border: none;background-color: #F0F0F4;border-radius: 50px;  width:30%; padding: 4px; position : relative; top: -5px; left : -25px" required placeholder="Search for an Article"  >
                    <input type="hidden" name="where" value="published" >
                </label>
                    
                </span>
            </form>
            <?php 
            $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
            if (mysqli_connect_errno($con))
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $id5 = isset($_SESSION['ID'])?$_SESSION['ID']:"";
            $result2 = mysqli_query($con, "SELECT * FROM article WHERE Article_published = 'true' AND Journalist_ID = '".$id5."'");
            echo "<table style='text-align: center;margin-left: 4%'>
                    <tr>
                    <th></th>
                    <th></th>
                    </tr>";
		
		while($row2 = mysqli_fetch_array($result2)) {
			echo "<tr>";
			echo "<td>".$row2['Article_title']."</td>";
			echo   '<td>
                                    <form action="JournalistAccount_1.php" method="post">
                                    <input type="hidden" name="idS" value="'.$row2['Article_ID'].'">
                                    <input type="submit" name="submit" value="Show">
                                    </form>
                                </td>';
			echo "</tr>"; }
		echo "</table>";
                
            
            mysqli_close($con);
            ?>
        </section>
    </section>
</body>
</html>
