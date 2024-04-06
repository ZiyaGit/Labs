<?php
//Written by Sebastian Deslauriers 
//Peter Drakulic
session_start(); //starts a session, this is to save the username for later
require_once('db_credentials.php'); //gets the cradentials for the database then connects to the database
require_once('database.php');

$db = db_connect();

    //handle values sent by signup.html
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST["Uname"];
        $pass = $_POST["Pass"];
        $nametrim = trim($name);//trims whitespace on ends of text if there is any
        $passtrim = trim($pass);//trims whitespace on ends of text if there is any
        $namefinal = stripcslashes($nametrim); //removes slashes in username
        $passfinal = $passtrim;
        //origianlly thought that i should strip slashes out of password but realized that could be bad, 
        //kept name cuz passfinal is a good variable name

            //checks if there is a user with the username and password the user typed
            $sql = "SELECT * FROM user WHERE username = '$namefinal' AND Password = '$passfinal'";
        $result = mysqli_query($db, $sql);   
        
        if(mysqli_num_rows($result)===1)//if there is one row, there is a match, if there's more than one row somehting went wrong somewhere
        {
            //username is stored to seesion and forward to next page
            $_SESSION["myuser"]= $namefinal;
            $sql2 = "SELECT userID FROM user WHERE username = '$namefinal' AND Password = '$passfinal'";//takes user's ID
            $query = mysqli_query($db,$sql2);//retrives userID
            $id = $query->fetch_array()[0] ?? '';//converts userID to a string
            $_SESSION["userID"]= $id;//Sets userID
            $_SESSION["error"]="";
            header("location: Index.php");
            
        } else {
            //error is shown on Signup page
            $_SESSION["error"]="incorrect Username or Password";
            header("location: SignIn.php");
            
    }
};


?>