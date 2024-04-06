<?php
//Written by Sebastian Deslauriers
//Peter Drakulic
require_once('db_credentials.php');//gets the cradentials for the database then connects to the database
require_once('database.php');

$db = db_connect();

    //handle values sent by signup.html
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST["Uname"];
        $pass = $_POST["Pass"];
        $nametrim = trim($name);//trims whitespace on ends of text if there is any
        $passtrim = trim($pass);//trims whitespace on ends of text if there is any
        $namefinal = stripcslashes($nametrim);//removes slashes in username
        $passfinal = $passtrim;
        //origianlly thought that i should strip slashes out of password but realized that could be bad, 
        //kept name cuz passfinal is a good variable name

            //adds username and password to database
            $sql = "INSERT INTO user (username, Password) VALUES ('$namefinal', '$passfinal')";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
            
        
            $id = mysqli_insert_id($db); //i forgot why i added this here but i dont want to break anything so just leave this here
            header("Location: Index.php?id=  $id");
            
    } else {
            header("Location Missing.php");
    }


?>