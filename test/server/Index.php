<?php
session_start();
$_SESSION["error"]="";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <meta name="author" content="Sebastian Deslauriers">
        <!-- also made by Peter Drakulic-->
        <!--css used-->
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/styleIndex.css"> 
    </head>
    
    <body>
    <?php //gets the cradentials for the database then connects to the database
    require_once('db_credentials.php');
    require_once('database.php');

    $db = db_connect();
    
    ?>
        <header>
            
            
            <p id="sitename"><a href="Index.php">My Movie List</a></p>
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
        <form method="POST">
        <div id="popularwrap"> 
        </form>
        <?php if (isset($_SESSION["adderror"])) {
            /*
             *this display's an error message, if there is one
             */     
                    echo '<p>';
                    echo $_SESSION["adderror"] ;
                    echo '</p>';
                } else {
                    echo ''; //empty string if there is no error
                }
                ?>
            
            
            <?php require 'popularMovies.php'?> <!--made by Peter Drakulic-->
            <?php include 'movietable.php'?>            

        </div>
    
    
    
    
    </body> 

</html>