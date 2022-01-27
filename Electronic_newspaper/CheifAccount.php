<?php 
    
    session_start();
    
    if(isset($_SESSION['sign']))
        if($_SESSION['sign'] == 'false')
            header ("Location: login.php?error=you must sign first");
    if(isset($_SESSION['type']))
            if($_SESSION['type'] != 'cheif_editor')
                header ("Location: login.php?error=you must sign first");
    
    $con = mysqli_connect("localhost", "root", "123456789", "electronic_newspaper_1") ;
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $id = isset($_POST['idD']) ? $_POST['idD'] : "" ;
    if($id != ""){
        mysqli_query($con, "UPDATE `journalist` SET `Active`='false' WHERE Journalist_ID = ".$id."");
    }

    

?>
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
            <span class="grey" style="margin-left: 48.5%;"> Cheif Editor</span>
        </section>
        <section>
            <p id="name" style="text-align: center;"> <?php  $name = isset($_SESSION['Name']) ? $_SESSION['Name'] : ""; echo $name; ?></p>
        </section>
        <section>
            <p style="font-size: large ; margin-left: 5%;"><strong>Accounts</strong></p>
            <section id="Accounts" style="margin-left: 5%; border-style: solid; text-align: center; margin-right: 5%; margin-bottom: 2%; border-radius: 50px;" > <?php 
		
		
		$result1 = mysqli_query($con, "SELECT * FROM journalist");
		echo "<table style='text-align: center;margin-left: 4%' >
                    <tr>
                    <th></th>
                    <th></th>
                    </tr>";
		
		while($row1 = mysqli_fetch_array($result1)) {
			echo "<tr>";
			echo "<td>".$row1['Journalist_name']."</td>";
                        $a = $row1['Active'];
                        if($a=="true")
                            echo "<td>is active</td>";
                        else
                            echo "<td>is not active</td>";
                        if($row1['Active']=='true'){
                        }
                        else{
                            echo    '<td><form action="Active.php" method="post">
                                        <input type="hidden" name="idA" value="'.$row1['Journalist_ID'].'">
                                        <input type="submit" value="Active">
                                    </form></td>';
                        }
			echo '</tr>'; }
		echo "</table>";
		?> </section>
        </section>
        <section>
            <p style="font-size: large ; margin-left: 5%;"><strong>Articles</strong></p>
            <section id="Articles" style="margin-left: 5%; border-style: solid; text-align: center; margin-right: 5%; margin-bottom: 2%; border-radius: 50px;" > 
            <?php 
                $result2 = mysqli_query($con, "SELECT * FROM article WHERE Article_published = 'false'");
            echo "<table style='text-align: center;margin-left: 4%' >
                    <tr>
                    <th></th>
                    <th></th>
                    </tr>";
		
		while($row2 = mysqli_fetch_array($result2)) {
			echo "<tr>";
			echo "<td>".$row2['Article_title']."</td>";
			echo   '<td>
                                    <form action="Show.php" method="post">
                                    <input type="hidden" name="idS" value="'.$row2['Article_ID'].'">
                                    <input type="submit" name="submit" value="Show">
                                    </form>
                                </td>';
                        echo   '<td>
                                    <form action="ActiveA.php" method="post">
                                    <input type="hidden" name="ida" value="'.$row2['Article_ID'].'">
                                    <input type="submit" name="submit" value="Active">
                                    </form>
                                </td>';
			echo "</tr>"; }
		echo "</table>";
            ?> 
            </section>
        </section>
    </body>
</html>
