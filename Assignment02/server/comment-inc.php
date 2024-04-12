<?php
session_start();

if (isset($_POST["submit_comment"])) { 
    $submit_button = $_POST["submit_comment"];
}
var_dump($_POST["anime_id"]);
if (isset($_POST["anime_id"])) { 
    $anime_id = $_POST["anime_id"];
} 
if (isset($_SESSION["user_id"])) { 
    $user_id = $_SESSION["user_id"];
}
if (isset($_POST["comment"])) { 
    $comment = $_POST["comment"];
}


// Database connection parameters
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "assignment02"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO comments (user_id, comment, anime_id) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    // Prepare failed
    error_log("Prepare failed: " . $conn->error);
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("isi", $user_id, $comment, $anime_id);
$stmt->execute();

switch ($anime_id) {

    case "1":
        $url = 'Frieren.php';
    case "2":
        $url = 'Fullmetal.php';
    case "3":
        $url = 'Steins.php';
    case "4":
        $url = 'Gintama.php';
    case "5":
        $url = 'Attack.php';
    case "6":
        $url = 'Hunter.php';
    case "7":
        $url = 'Bleach.php';
    case "8":
        $url = 'Naruto.php';
    
    // default:
    //     $url = 'index.php';
}

if ($stmt->affected_rows > 0) {
    echo "Data inserted successfully!";
    sleep(2);
    header("location: {$url}");
    exit();
} else {
    echo "Failed to insert data.";
}

$stmt->close();
$conn->close();

sleep(2);
header("location: Frieren.php");