<?php
//Written by Sebastian Deslauriers 
//Peter Drakulic
session_start();
require_once('db_credentials.php');//gets the cradentials for the database then connects to the database
require_once('database.php');
$db = db_connect();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Missing Movie</title>
        <!--css used-->
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/styleMissing.css"> 
        <!--JS used-->
        <script src="../scripts/newmov.js"></script>
    </head>

    <body>
        <header>
            
            
            <p id="sitename"><a href="Index.php">Site Name</a></p>
            <div class="sidebutton"> 
                <p id="ulist"><a href="UserList.php"><?php if (isset($_SESSION["myuser"])) 
                {   //if user is signed in sets the hyperlink to userlist.php to say their username's list, 
                    //otheriwse it sets it to just say "my movie list"
                    echo $_SESSION["myuser"];
                    echo "'s ";
                } else {
                    echo 'My ';
                } ?>Movie List</a></p>

                <p id="signbutt"><a href="SignIn.php"> <?php if (isset($_SESSION["myuser"])) { 
                    //if user is logged in changes the sign in button to a sign out button
                    echo 'Sign Out';
                } else {
                    echo 'Sign in';
                }
                ?></a></p>
            </div>
        </header>
        <div id="contentwrap">
            <h1>Missing Movie Form</h1>
            <form method="POST" action="addmovie.php" id="missmovie" onsubmit="return validate();">

            <input type="text" placeholder="Name of movie"       id="moviename"   name="mname"      class="moviedetails" autocomplete="off"><br>
            <input type="text" placeholder="Year of Release"     id="yearCreated" name="year"       class="moviedetails" autocomplete="off">
            <input type="text" placeholder="Length in Minutes"   id="length"      name="length"     class="moviedetails" autocomplete="off"><br>
            <select id="genre"       name="genre"      class="moviedetails">
                <option>Genre:</option>
                <?php   $sql = "SELECT genreID,genre_name FROM genre ORDER BY GenreID;";
                        $result = mysqli_query($db,$sql); //uses the querry with the databse and store the result
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value={$row['genreID']}>{$row['genre_name']}</option>";
                        }
            ?>
            </select>
            <select name="rating" id="rating" class="moviedetails">
                <option>Rating:</option>
                <option value=4>G</option>
                <option value=1>PG</option>
                <option value=2>PG-13</option>
                <option value=3>MA</option>
            </select><br>

            <button type="submit" onclick="">Submit</button>

        </form>
            
        </div>
    
    
    
    
    </body>
    
</html>