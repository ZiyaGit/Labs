<?php
//Written by Sebastian Deslauriers 
//Peter Drakulic
session_start();
//if user is signed in and clicks the sign out button this will sign them out
if (isset($_SESSION["myuser"])){
    unset($_SESSION['myuser']);
    unset($_SESSION['userID']);
    header("location: Index.php");
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
        <!--css used-->
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/styleSign.css">
        <!-- JS used -->
        <!--<script src="SignIn.js"></script> -->
        
    </head>  
    
    <body>
        <header>
            <nav>
                <!--link to the main page-->                
                <p class="nav_list" id="sitename"><a href="Index.php">My Movie List</a></p>
                
                
            </nav>
    
        </header>
    <div id="signwrap"> <!-- wrapper for the sign up fourm -->
        <h2>Sign In:</h2>
        <form method="post" action="Login.php" id="Login" onsubmit="return validate();">
        <!-- when user clicks submit, it will send this data through the SignIn.js 
            file and make sure the data is fine before sending it to the Login.php file-->

            <input type="text" placeholder="Username:" id="username" name="Uname"  autocomplete="off"><br>
            <input type="password" placeholder="Password:" id="password" name="Pass"  autocomplete="new-password"><br>
            

            <button type="submit" onclick="">Sign In</button>

        </form>
        <p id="error"><?php if (isset($_SESSION["error"])) {
            /*
             *this display's an error message, if there is one, so far the only redirects to here are from this page 
             *itself or the userlist page if the user is not logged in
             */
                    echo $_SESSION["error"] ;
                } else {
                    echo ''; //empty string if there is no error
                }
        ?></p>
        <!-- if user does not have an account, they can make one here-->
        <p id="Dont">Don't have an account?<br><a id="NoAcc" href="../pages/SignUp.html">Sign Up</a></p>
    </div>
    
    </body>

</html>