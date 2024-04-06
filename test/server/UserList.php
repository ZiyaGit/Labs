<?php
//Written by Sebastian Deslauriers 
//Peter Drakulic
session_start();
if (isset($_SESSION["myuser"])) { //if user is not logged in, they can't access this page
    
} else {
    $_SESSION["error"]="Please sign in to access your list";
    header("location: SignIn.php"); //sends them to the sign in page and it will display the message shown above
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Movie List</title>
        <meta name="author" content="Sebastian Deslauriers">
        <!--css used-->
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/styleList.css"> 
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
                
                <p id="signbutt"><a href="SignIn.php"> <?php if (isset($_SESSION["myuser"])) {
                     //if user is logged in changes the sign in button to a sign out button
                     echo 'Sign Out';
                    } else {
                        echo 'Sign in';
                    }
                ?></a></p>
            </div>
            <!--<div id="searchbar">
                <input type="text" placeholder="Search:" id="search" name="search bar" size="60">
                <p id="searchbutt"><a href="Search.php">🔍</a></p>
            </div> -->
        </header>
        <div id="contentwrap">
            <?php 
            require 'SaveSelections.php';
            include 'connectToDb.php';
            $conn = OpenCon();
            $currentUser = $_SESSION["myuser"];?>
            <?php displayMovies($result, $currentUser, $conn) ?>
            <?php include 'Umovietable.php'?>
        </div>
        
    
    
    
    
    
    
    </body>
    
</html>