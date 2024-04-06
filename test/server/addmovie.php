<?php 
//Written by Sebastian Deslauriers 
//Peter Drakulic
require_once('db_credentials.php'); //gets the cradentials for the database then connects to the database
require_once('database.php');

$db = db_connect();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $mname = $_POST["mname"];
    $year = $_POST["year"];
    $len = $_POST["length"];
    $gen = $_POST["genre"];
    $rat = $_POST["rating"];

            $SQL = "INSERT INTO movie (title,yearCreated,length,GenreID,RatingID) VALUES ('$mname',$year,$len,$gen,$rat);";
            $addmovie = mysqli_query($db, $SQL);
            echo '<!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="refresh" content="0; URL=../server/Index.php" />
            </head>
            </html>';
        



}else{
    $_SESSION["adderror"] = "COULDN'T ADD MOVIE";
    header("index.php");
}





?>